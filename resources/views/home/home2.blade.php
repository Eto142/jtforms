<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Forms with AI</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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

    /* ============================================================
       SECTION 1: HERO + AI FORM + SIGNUP POPUP STACK
       ============================================================ */
    .hero-section {
      position: relative;
      padding: 1.75rem 1.25rem 3rem;
      background: linear-gradient(160deg, #e8e0ff 0%, #ffe8d6 40%, #d6f0ff 80%, #ffffff 100%);
      overflow: hidden;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(255, 97, 0, 0.15) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      bottom: -40%;
      left: -15%;
      width: 450px;
      height: 450px;
      background: radial-gradient(circle, rgba(108, 59, 244, 0.12) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .hero-inner {
      position: relative;
      z-index: 1;
      max-width: 720px;
      margin: 0 auto;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: #ffffff;
      padding: 0.4rem 1rem;
      border-radius: 2rem;
      font-size: 0.78rem;
      font-weight: 600;
      color: var(--jf-dark);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      margin-bottom: 0.85rem;
    }

    .hero-badge .badge-free {
      background: var(--jf-purple);
      color: white;
      padding: 0.15rem 0.6rem;
      border-radius: 1rem;
      font-size: 0.7rem;
      font-weight: 700;
    }

    .hero-title {
      font-size: clamp(1.75rem, 5vw, 3rem);
      font-weight: 800;
      line-height: 1.12;
      letter-spacing: -0.03em;
      margin-bottom: 1.5rem;
      color: var(--jf-dark);
    }

    .hero-title .ai-gradient {
      background: linear-gradient(90deg, #6c3bf4 0%, #ff6100 50%, #00c2ff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ---- STACK: AI form (behind) + Signup popup (on top) ---- */
    .stack-wrapper {
      position: relative;
      margin-bottom: 1.25rem;
    }

    /* AI FORM CREATOR (behind, smaller) */
    .form-creator-card {
      background: #ffffff;
      border-radius: 1.25rem;
      padding: 1.15rem 1.25rem;
      box-shadow: 0 8px 30px -10px rgba(108, 59, 244, 0.18),
                  0 0 0 1.5px rgba(108, 59, 244, 0.1);
      transition: box-shadow 0.3s;
      position: relative;
      z-index: 1;
    }

    .form-creator-card:focus-within {
      box-shadow: 0 8px 30px -10px rgba(108, 59, 244, 0.3),
                  0 0 0 2px rgba(108, 59, 244, 0.22);
    }

    .form-creator-label {
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .form-creator-label i {
      color: var(--jf-purple);
    }

    .form-creator-card textarea {
      width: 100%;
      border: none;
      outline: none;
      font-size: 0.92rem;
      color: var(--jf-dark);
      resize: none;
      font-family: inherit;
      min-height: 52px;
      background: transparent;
      line-height: 1.5;
      padding: 0;
    }

    .form-creator-card textarea::placeholder {
      color: #a8b0bf;
    }

    .form-creator-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 0.65rem;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .form-creator-tools {
      display: flex;
      gap: 0.5rem;
    }

    .tool-btn {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      border: 1.5px solid #e0e4ec;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #6c7a8e;
      font-size: 0.82rem;
      cursor: pointer;
      transition: all 0.2s;
      flex-shrink: 0;
    }

    .tool-btn:hover {
      border-color: var(--jf-purple);
      color: var(--jf-purple);
      background: rgba(108, 59, 244, 0.05);
      transform: translateY(-1px);
    }

    .btn-create-form {
      background: linear-gradient(135deg, var(--jf-green-light), var(--jf-green));
      color: white;
      border: none;
      padding: 0.55rem 1.25rem;
      border-radius: 2rem;
      font-size: 0.85rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 0.45rem;
      transition: all 0.2s;
      box-shadow: 0 6px 18px -4px rgba(92, 184, 92, 0.5);
      white-space: nowrap;
    }

    .btn-create-form:hover {
      transform: translateY(-1px);
      box-shadow: 0 8px 22px -4px rgba(92, 184, 92, 0.6);
      color: white;
    }

    .btn-create-form:active { transform: translateY(0); }
    .btn-create-form:disabled { opacity: 0.85; cursor: wait; }

    /* SIGNUP POPUP (on top, overlapping the form) */
    .signup-popup-wrap {
      position: relative;
      margin-top: -18px;
      margin-left: 8px;
      margin-right: 8px;
      padding: 3px;
      border-radius: 1.5rem;
      background: linear-gradient(135deg, #6c3bf4, #ff6100, #00c2ff, #6c3bf4);
      background-size: 300% 300%;
      animation: gradientShift 8s ease infinite, popIn 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) both;
      box-shadow:
        0 25px 60px -12px rgba(108, 59, 244, 0.45),
        0 15px 30px -10px rgba(255, 97, 0, 0.3),
        0 0 0 1px rgba(108, 59, 244, 0.15);
      transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
      z-index: 5;
    }

    @keyframes popIn {
      0%   { opacity: 0; transform: translateY(-18px) scale(0.96); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    @keyframes gradientShift {
      0%   { background-position: 0% 50%; }
      50%  { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .signup-popup-wrap:hover {
      transform: translateY(-4px);
      box-shadow:
        0 35px 70px -12px rgba(108, 59, 244, 0.55),
        0 20px 40px -10px rgba(255, 97, 0, 0.4),
        0 0 0 1px rgba(108, 59, 244, 0.25);
    }

    .signup-popup-badge {
      position: absolute;
      top: -14px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, #ff6100, #6c3bf4);
      color: white;
      font-size: 0.68rem;
      font-weight: 800;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.35rem 0.9rem;
      border-radius: 2rem;
      white-space: nowrap;
      box-shadow: 0 8px 20px -4px rgba(255, 97, 0, 0.6);
      z-index: 10;
      animation: badgePulse 2.5s ease-in-out infinite;
    }

    @keyframes badgePulse {
      0%, 100% { transform: translateX(-50%) scale(1); }
      50%      { transform: translateX(-50%) scale(1.05); }
    }

    .signup-popup-badge .pulse-dot {
      display: inline-block;
      width: 7px;
      height: 7px;
      background: #7ed321;
      border-radius: 50%;
      margin-right: 6px;
      box-shadow: 0 0 0 0 rgba(126, 211, 33, 0.7);
      animation: pulseDot 1.8s infinite;
      vertical-align: middle;
      position: relative;
      top: -1px;
    }

    @keyframes pulseDot {
      0%   { box-shadow: 0 0 0 0 rgba(126, 211, 33, 0.7); }
      70%  { box-shadow: 0 0 0 10px rgba(126, 211, 33, 0); }
      100% { box-shadow: 0 0 0 0 rgba(126, 211, 33, 0); }
    }

    .signup-popup {
      background: #1a1a2e;
      border-radius: calc(1.5rem - 3px);
      padding: 1.75rem 1.35rem 1.5rem;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .signup-popup::before {
      content: '';
      position: absolute;
      top: -60%;
      right: -20%;
      width: 380px;
      height: 380px;
      background: radial-gradient(circle, rgba(108, 59, 244, 0.35) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .signup-popup::after {
      content: '';
      position: absolute;
      bottom: -40%;
      left: -15%;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(255, 97, 0, 0.2) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .signup-popup > * {
      position: relative;
      z-index: 1;
    }

    .signup-popup-eyebrow {
      font-size: 0.68rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #c4b5ff;
      margin-bottom: 0.4rem;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .signup-popup-eyebrow i {
      color: #ff6100;
    }

    .signup-popup-title {
      font-size: clamp(1.2rem, 3.2vw, 1.55rem);
      font-weight: 800;
      color: white;
      margin-bottom: 0.4rem;
      line-height: 1.15;
      letter-spacing: -0.02em;
    }

    .signup-popup-title .gradient-text {
      background: linear-gradient(90deg, #ff6100, #7ed321, #00c2ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .signup-popup-subtitle {
      font-size: 0.83rem;
      color: #c8cdd8;
      line-height: 1.5;
      margin-bottom: 1.15rem;
    }

    .signup-popup-subtitle strong {
      color: #ffffff;
      font-weight: 700;
    }

    .signup-options {
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }

    .btn-signup-provider {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      width: 100%;
      background: #ffffff;
      color: var(--jf-dark);
      border: 2px solid transparent;
      padding: 0.75rem 1rem;
      border-radius: 2rem;
      font-size: 0.88rem;
      font-weight: 700;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
      text-align: center;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .btn-signup-provider::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, transparent 30%, rgba(108, 59, 244, 0.08) 50%, transparent 70%);
      transform: translateX(-100%);
      transition: transform 0.6s;
    }

    .btn-signup-provider:hover::before {
      transform: translateX(100%);
    }

    .btn-signup-provider:hover {
      transform: translateY(-2px) scale(1.01);
      box-shadow: 0 12px 28px -8px rgba(255, 255, 255, 0.35);
      background: #f8f9fc;
    }

    .btn-signup-provider:active { transform: translateY(0) scale(0.99); }
    .btn-signup-provider:disabled { opacity: 0.85; cursor: wait; }

    .btn-signup-provider .provider-icon {
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      flex-shrink: 0;
    }

    .btn-signup-provider .google-icon {
      background: linear-gradient(90deg, #4285F4, #EA4335, #FBBC05, #34A853);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .btn-signup-provider .microsoft-icon {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 1.5px;
      width: 16px;
      height: 16px;
    }

    .btn-signup-provider .microsoft-icon span {
      display: block;
      width: 100%;
      height: 100%;
    }

    .btn-signup-provider .microsoft-icon span:nth-child(1) { background: #F25022; }
    .btn-signup-provider .microsoft-icon span:nth-child(2) { background: #7FBA00; }
    .btn-signup-provider .microsoft-icon span:nth-child(3) { background: #00A4EF; }
    .btn-signup-provider .microsoft-icon span:nth-child(4) { background: #FFB900; }

    .btn-signup-provider.email-btn {
      background: linear-gradient(135deg, #6c3bf4, #8b5cf6);
      color: white;
      box-shadow: 0 8px 20px -6px rgba(108, 59, 244, 0.5);
    }

    .btn-signup-provider.email-btn:hover {
      background: linear-gradient(135deg, #5a2de0, #7c4ce6);
      color: white;
      box-shadow: 0 14px 30px -6px rgba(108, 59, 244, 0.7);
    }

    .signup-divider {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin: 0.75rem 0;
      color: #6c7a8e;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .signup-divider::before,
    .signup-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: rgba(255, 255, 255, 0.15);
    }

    .signup-note {
      font-size: 0.72rem;
      color: #a8b0bf;
      text-align: center;
      margin: 1rem 0 0;
      line-height: 1.5;
    }

    .signup-note a {
      color: #c4b5ff;
      text-decoration: none;
      font-weight: 600;
    }

    .signup-note a:hover {
      text-decoration: underline;
    }

    /* Trust indicators */
    .signup-trust {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 0.75rem 1.5rem;
      margin-bottom: 0.5rem;
      font-size: 0.78rem;
      color: #6c7a8e;
      font-weight: 500;
    }

    .signup-trust span {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
    }

    .signup-trust i {
      color: var(--jf-green);
      font-size: 0.85rem;
    }

    /* ============================================================
       SECTION 2: FULL SIGNUP SHOWCASE (reference-style)
       ============================================================ */
    .signup-hero {
      padding: 3rem 1.25rem 4rem;
      background: #ffffff;
      text-align: center;
      position: relative;
      overflow: hidden;
      border-top: 1px solid var(--border-light);
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

    /* ===== LAYOUT: illustration | buttons | illustration ===== */
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

    /* ===== PROVIDER BUTTONS CARD ===== */
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

    /* Illustrations */
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

    /* ===== FOOTER ===== */
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

    /* ===== RESPONSIVE ===== */
    @media (min-width: 576px) {
      .jf-navbar { padding: 0.9rem 2rem; }
      .hero-section { padding: 2rem 2rem 3.5rem; }
      .signup-hero { padding: 3.5rem 2rem 4.5rem; }
      .recommended-section { padding: 3rem 2rem 3.5rem; }
      .form-creator-card { padding: 1.35rem 1.5rem; }
      .signup-popup { padding: 2rem 1.75rem 1.75rem; }
      .signup-card { padding: 2rem 1.75rem; }
    }

    @media (min-width: 768px) {
      .jf-navbar { padding: 0.9rem 3rem; }
      .hero-section { padding: 2.5rem 3rem 4rem; }
      .signup-hero { padding: 4rem 3rem 5rem; }
      .recommended-section { padding: 3.5rem 3rem 4rem; }
      .form-creator-card { padding: 1.5rem 1.75rem; }
      .hero-title { max-width: 640px; }
      .signup-popup { padding: 2.25rem 2rem 1.9rem; }
    }

    @media (min-width: 992px) {
      .jf-navbar { padding: 1rem 4rem; }
      .hero-section { padding: 3rem 4rem 4.5rem; }
      .signup-hero { padding: 5rem 4rem 6rem; }
      .recommended-section { padding: 4rem 4rem 4.5rem; }
      .hero-inner { max-width: 800px; }
      .recommended-inner { max-width: 800px; }
      .form-creator-card { padding: 1.75rem 2rem; }
      .signup-popup { padding: 2.5rem 2.5rem 2.1rem; }
      .hero-title { max-width: 720px; font-size: 3rem; }

      .recommended-list {
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
      }
    }

    @media (min-width: 1200px) {
      .jf-navbar { padding: 1rem 5rem; }
      .hero-section { padding: 3.5rem 5rem 5rem; }
      .signup-hero { padding: 5.5rem 5rem 6.5rem; }
      .recommended-section { padding: 4.5rem 5rem 5rem; }
      .hero-inner { max-width: 880px; }
      .recommended-inner { max-width: 880px; }
    }

    button:focus-visible, a:focus-visible, textarea:focus-visible {
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

    .btn-provider.success,
    .btn-signup-provider.success {
      animation: successPulse 0.4s ease;
    }

    @media (prefers-reduced-motion: reduce) {
      .signup-popup-wrap,
      .signup-popup-badge,
      .signup-popup-badge .pulse-dot {
        animation: none;
      }
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
      <a href="#" class="btn-signup">Sign Up for Free</a>
      <button class="menu-icon" aria-label="Open menu">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>

  <!-- ============================================================
       SECTION 1: HERO WITH AI FORM + SIGNUP POPUP STACKED
       ============================================================ -->
  <section class="hero-section">
    <div class="hero-inner">

      <div class="hero-badge">
        <span>The easiest online form builder</span>
        <span class="badge-free">It's free</span>
      </div>

      <h1 class="hero-title">
        Create forms with <span class="ai-gradient">AI</span>
      </h1>

      <!-- STACK: AI form (behind) + Signup popup (on top) -->
      <div class="stack-wrapper">

        <!-- AI FORM CREATOR -->
        <div class="form-creator-card">
          <div class="form-creator-label">
            <i class="fas fa-wand-magic-sparkles"></i> AI form builder
          </div>
          <textarea
            id="aiPrompt"
            placeholder="Create a registration form for new customers"
            rows="2"
            aria-label="Describe the form you want to create"
          ></textarea>
          <div class="form-creator-footer">
            <div class="form-creator-tools">
              <button class="tool-btn" title="Attach file" aria-label="Attach file">
                <i class="fas fa-paperclip"></i>
              </button>
              <button class="tool-btn" title="Add link" aria-label="Add link">
                <i class="fas fa-link"></i>
              </button>
            </div>
            <button class="btn-create-form" id="createFormBtn">
              Create Form <i class="fas fa-arrow-right"></i>
            </button>
          </div>
        </div>

        <!-- SIGNUP POPUP ON TOP -->
        <div class="signup-popup-wrap">
          <div class="signup-popup-badge">
            <span class="pulse-dot"></span> Free • No credit card
          </div>

          <div class="signup-popup">
            <div class="signup-popup-eyebrow">
              <i class="fas fa-bolt"></i> Easiest online form builder
            </div>
            <h2 class="signup-popup-title">
              Powerful forms <span class="gradient-text">get it done.</span>
            </h2>
            <p class="signup-popup-subtitle">
              Go from busywork to less work with <strong>powerful forms</strong> that use conditional logic, accept payments, generate reports, and automate workflows.
            </p>

            <div class="signup-options">
              <button class="btn-signup-provider" id="googleSignupPopup" type="button">
                <span class="provider-icon google-icon"><i class="fab fa-google"></i></span>
                <span>Sign Up with Google</span>
              </button>

              <button class="btn-signup-provider" id="microsoftSignupPopup" type="button">
                <span class="provider-icon microsoft-icon">
                  <span></span><span></span><span></span><span></span>
                </span>
                <span>Sign Up with Microsoft</span>
              </button>

              <div class="signup-divider">OR</div>

              <button class="btn-signup-provider email-btn" id="emailSignupPopup" type="button">
                <span class="provider-icon"><i class="fas fa-envelope"></i></span>
                <span>Sign Up with an email</span>
              </button>
            </div>

            <p class="signup-note">
              By signing up, you agree to our <a href="#">Terms</a> & <a href="#">Privacy Policy</a>
            </p>
          </div>
        </div>

      </div>

      <!-- Trust indicators -->
      <div class="signup-trust">
        <span><i class="fas fa-check-circle"></i> 10M+ users</span>
        <span><i class="fas fa-star"></i> 4.7 rating</span>
        <span><i class="fas fa-shield-alt"></i> Secure</span>
      </div>

    </div>
  </section>

  <!-- ============================================================
       SECTION 2: FULL SIGNUP SHOWCASE (reference style)
       ============================================================ -->
  <section class="signup-hero">
    <div class="signup-hero-inner">

      <div class="signup-eyebrow-top">Easiest online form builder</div>
      <h1 class="signup-main-title">Powerful forms get it done.</h1>
      <p class="signup-main-subtitle">
        Go from busywork to less work with powerful forms that use conditional logic, accept payments, generate reports, and automate workflows.
      </p>

      <div class="signup-layout">

        <!-- LEFT illustration -->
        <div class="signup-illustration">
          <svg class="illustration-svg" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M20 60 Q40 20 110 20 L260 20 Q300 20 310 70 L310 180 Q300 220 240 220 L60 220 Q20 220 20 170 Z" fill="#1E88E5"/>
            <path d="M0 90 Q20 50 80 45 L240 45 Q300 50 300 110 L300 200 Q280 240 200 240 L60 240 Q0 235 0 180 Z" fill="#42A5F5"/>
            <ellipse cx="120" cy="180" rx="100" ry="60" fill="#90CAF9" opacity="0.5"/>
            <ellipse cx="105" cy="200" rx="55" ry="45" fill="#8BC34A"/>
            <path d="M60 160 Q70 130 110 130 Q150 130 160 160 L160 200 L60 200 Z" fill="#7CB342"/>
            <circle cx="110" cy="115" r="30" fill="#FFCC80"/>
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

        <!-- CENTER card -->
        <div class="signup-card">
          <div class="signup-card-buttons">

            <button class="btn-provider btn-google" id="googleSignupMain" type="button">
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

            <button class="btn-provider btn-microsoft" id="microsoftSignupMain" type="button">
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

            <button class="btn-provider btn-email" id="emailSignupMain" type="button">
              <span class="provider-icon" style="font-size: 1rem; color: #ffffff;">
                <i class="fas fa-envelope"></i>
              </span>
              <span>Sign Up with an email</span>
            </button>

          </div>
        </div>

        <!-- RIGHT illustration -->
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

      // ===== CREATE FORM BUTTON =====
      const createBtn = document.getElementById('createFormBtn');
      const prompt = document.getElementById('aiPrompt');

      if (createBtn && prompt) {
        createBtn.addEventListener('click', () => {
          const value = prompt.value.trim();
          if (!value) {
            prompt.focus();
            prompt.style.transition = 'box-shadow 0.3s';
            prompt.style.boxShadow = '0 0 0 2px rgba(255, 97, 0, 0.4)';
            setTimeout(() => { prompt.style.boxShadow = ''; }, 800);
            return;
          }
          createBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Creating...';
          createBtn.disabled = true;

          setTimeout(() => {
            createBtn.innerHTML = '<i class="fas fa-check me-1"></i> Created!';
            createBtn.style.background = 'linear-gradient(135deg, #34c759, #28a745)';
            setTimeout(() => {
              createBtn.innerHTML = 'Create Form <i class="fas fa-arrow-right"></i>';
              createBtn.style.background = '';
              createBtn.disabled = false;
              prompt.value = '';
            }, 1500);
          }, 1400);
        });
      }

      // ===== SIGNUP BUTTON HANDLER (works for both sections) =====
      function handleSignup(buttonId, customSuccessHTML) {
        const btn = document.getElementById(buttonId);
        if (!btn) return;
        const originalHTML = btn.innerHTML;
        const originalBg = btn.style.background;
        const originalColor = btn.style.color;

        btn.addEventListener('click', () => {
          btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing up...';
          btn.disabled = true;
          setTimeout(() => {
            btn.innerHTML = customSuccessHTML || '<i class="fas fa-check"></i> Signed up!';
            btn.style.background = '#34c759';
            btn.style.color = 'white';
            btn.classList.add('success');
            setTimeout(() => {
              btn.innerHTML = originalHTML;
              btn.style.background = originalBg;
              btn.style.color = originalColor;
              btn.classList.remove('success');
              btn.disabled = false;
            }, 1500);
          }, 1400);
        });
      }

      // Popup buttons
      handleSignup('googleSignupPopup');
      handleSignup('microsoftSignupPopup');
      handleSignup('emailSignupPopup');

      // Main section buttons
      handleSignup('googleSignupMain', '<i class="fas fa-check me-2"></i> Signed up!');
      handleSignup('microsoftSignupMain', '<i class="fas fa-check me-2"></i> Signed up!');
      handleSignup('emailSignupMain', '<i class="fas fa-check me-2"></i> Signed up!');

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