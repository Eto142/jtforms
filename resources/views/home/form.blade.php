<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Tenant Appointment & Application Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
  <!-- Signature Pad Library -->
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
  <style>
    :root {
      --primary: #6c5ce7;
      --primary-dark: #5a4bd1;
      --dark: #2c3344;
      --light-bg: #f3f3fe;
      --card-bg: #ffffff;
      --border: #dde0e7;
      --text-muted: #6c7a8e;
      --danger: #dc3545;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #f3f3fe 0%, #e8e8fc 100%);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      color: var(--dark);
      padding: 1.5rem 0.75rem;
      min-height: 100vh;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    @media (min-width: 768px) {
      body {
        padding: 2.5rem 1rem;
      }
    }

    .form-container {
      max-width: 820px;
      margin: 0 auto;
      background: var(--card-bg);
      border-radius: 1.5rem;
      box-shadow: 0 25px 50px -12px rgba(108, 92, 231, 0.15), 
                  0 0 0 1px rgba(108, 92, 231, 0.05);
      padding: 1.75rem 1.25rem 2rem;
      transition: all 0.3s ease;
    }

    @media (min-width: 576px) {
      .form-container {
        padding: 2.5rem 2rem 2.5rem;
      }
    }

    @media (min-width: 992px) {
      .form-container {
        padding: 3rem 3rem 3rem;
        border-radius: 2rem;
      }
    }

    /* Header */
    .form-header-logo {
      max-width: 280px;
      width: 100%;
      height: auto;
      border-radius: 0.75rem;
      margin-bottom: 1rem;
      box-shadow: 0 8px 24px -6px rgba(44, 51, 68, 0.12);
    }

    @media (min-width: 768px) {
      .form-header-logo {
        max-width: 320px;
      }
    }

    .main-title {
      font-size: clamp(1.1rem, 3vw, 1.35rem);
      font-weight: 700;
      color: var(--dark);
      letter-spacing: -0.02em;
      line-height: 1.3;
    }

    /* Section headers */
    .section-header {
      position: relative;
      margin: 2rem 0 1.25rem;
      padding-bottom: 0.75rem;
    }

    .section-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), #a29bfe);
      border-radius: 3px;
    }

    .section-header h2,
    .section-header h3 {
      font-size: clamp(0.95rem, 2.5vw, 1.15rem);
      font-weight: 700;
      color: var(--dark);
      margin: 0;
      letter-spacing: 0.02em;
      text-transform: uppercase;
    }

    .section-header h2 {
      font-size: clamp(1.05rem, 2.8vw, 1.3rem);
    }

    /* Form controls */
    .form-label {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 0.4rem;
      font-size: 0.9rem;
      display: block;
    }

    .form-control, .form-select {
      border-radius: 0.65rem;
      border: 1.5px solid var(--border);
      padding: 0.65rem 0.95rem;
      background-color: #ffffff;
      font-size: 0.95rem;
      color: var(--dark);
      transition: all 0.2s ease;
      width: 100%;
    }

    .form-control:focus, .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.15);
      outline: none;
    }

    .form-control::placeholder {
      color: #a8b0bf;
    }

    .required-star {
      color: var(--danger);
      margin-left: 2px;
      font-weight: 700;
    }

    /* Buttons */
    .btn-submit {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 0.85rem 2.5rem;
      border-radius: 3rem;
      font-weight: 700;
      letter-spacing: 0.5px;
      border: none;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      width: 100%;
      max-width: 320px;
      box-shadow: 0 8px 20px -6px rgba(108, 92, 231, 0.4);
    }

    @media (min-width: 576px) {
      .btn-submit {
        width: auto;
      }
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px -6px rgba(108, 92, 231, 0.5);
      color: white;
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    /* Refund note */
    .refund-note {
      background: linear-gradient(135deg, #f8f9fe, #f0eeff);
      border-left: 5px solid var(--primary);
      padding: 1.25rem 1.5rem;
      border-radius: 0.85rem;
      font-size: 0.9rem;
      color: var(--dark);
      line-height: 1.65;
    }

    .refund-note p {
      margin-bottom: 0.5rem;
    }

    .refund-note p:last-child {
      margin-bottom: 0;
    }

    .refund-note .note-title {
      font-weight: 700;
      font-size: 0.85rem;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      color: var(--primary);
      margin-bottom: 0.75rem;
    }

    .refund-note .highlight {
      background: rgba(108, 92, 231, 0.1);
      padding: 0.6rem 0.9rem;
      border-radius: 0.5rem;
      margin-top: 0.75rem;
      font-weight: 500;
    }

    /* Signature */
    .signature-wrapper {
      position: relative;
      border: 2px dashed var(--border);
      border-radius: 0.85rem;
      background: #fbfcff;
      transition: all 0.2s ease;
      overflow: hidden;
    }

    .signature-wrapper:hover {
      border-color: var(--primary);
      background: #f5f4ff;
    }

    .signature-wrapper.active {
      border-color: var(--primary);
      border-style: solid;
      background: #ffffff;
    }

    #signatureCanvas {
      width: 100%;
      height: 180px;
      display: block;
      touch-action: none;
      cursor: crosshair;
    }

    @media (min-width: 768px) {
      #signatureCanvas {
        height: 200px;
      }
    }

    .signature-placeholder {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #b0b8c5;
      font-size: 0.95rem;
      pointer-events: none;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      transition: opacity 0.2s;
    }

    .signature-placeholder i {
      font-size: 1.5rem;
      color: var(--primary);
      opacity: 0.5;
    }

    .signature-wrapper.signed .signature-placeholder {
      opacity: 0;
    }

    .signature-actions {
      display: flex;
      gap: 0.5rem;
      margin-top: 0.5rem;
      justify-content: flex-end;
    }

    .btn-clear-signature {
      background: transparent;
      border: 1.5px solid var(--border);
      color: var(--text-muted);
      padding: 0.4rem 1rem;
      border-radius: 2rem;
      font-size: 0.8rem;
      font-weight: 600;
      transition: all 0.2s;
    }

    .btn-clear-signature:hover {
      border-color: var(--primary);
      color: var(--primary);
      background: rgba(108, 92, 231, 0.05);
    }

    /* Radio & Check groups */
    .form-check-input {
      border: 2px solid #c8cdd8;
      width: 1.15em;
      height: 1.15em;
      margin-top: 0.15em;
      transition: all 0.15s;
    }

    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .form-check-input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
    }

    .form-check-label {
      font-size: 0.9rem;
      color: var(--dark);
      cursor: pointer;
      padding-left: 0.25rem;
      line-height: 1.5;
    }

    .form-check {
      margin-bottom: 0.35rem;
    }

    /* Inline radio groups */
    .radio-group-inline {
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      margin-top: 0.25rem;
    }

    .radio-group-inline .form-check {
      margin-bottom: 0;
    }

    /* Payment methods grid */
    .payment-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 0.75rem;
      margin-top: 0.5rem;
    }

    @media (min-width: 576px) {
      .payment-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    .payment-option {
      position: relative;
    }

    .payment-option input[type="radio"] {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
      z-index: 2;
      margin: 0;
    }

    .payment-option label {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.75rem 0.5rem;
      border: 2px solid var(--border);
      border-radius: 0.65rem;
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-muted);
      text-align: center;
      transition: all 0.2s ease;
      cursor: pointer;
      background: #ffffff;
      height: 100%;
      gap: 0.4rem;
    }

    .payment-option input[type="radio"]:checked + label {
      border-color: var(--primary);
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.08), rgba(108, 92, 231, 0.03));
      color: var(--primary);
      box-shadow: 0 4px 12px -4px rgba(108, 92, 231, 0.25);
    }

    .payment-option label i {
      font-size: 1rem;
    }

    /* Custom agreement cards */
    .agreement-card {
      border: 1.5px solid var(--border);
      border-radius: 0.75rem;
      padding: 1rem 1.15rem;
      margin-bottom: 0.75rem;
      transition: all 0.2s ease;
      cursor: pointer;
      background: #ffffff;
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
    }

    .agreement-card:hover {
      border-color: rgba(108, 92, 231, 0.5);
      background: #fbfaff;
    }

    .agreement-card.checked {
      border-color: var(--primary);
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.06), rgba(108, 92, 231, 0.02));
      box-shadow: 0 4px 16px -6px rgba(108, 92, 231, 0.3);
    }

    .agreement-card .form-check-input {
      margin-top: 0.1rem;
      flex-shrink: 0;
    }

    .agreement-card .form-check-label {
      font-weight: 500;
      font-size: 0.88rem;
      line-height: 1.55;
    }

    /* Small hints */
    .small-hint {
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 0.25rem;
      display: block;
      line-height: 1.4;
    }

    /* Footer */
    .form-footer {
      margin-top: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(0,0,0,0.06);
      text-align: center;
    }

    /* Grid spacing tweaks */
    .row.g-3 > [class*="col-"] {
      margin-bottom: 0.25rem;
    }

    @media (max-width: 575.98px) {
      .radio-group-inline {
        flex-direction: column;
        gap: 0.5rem;
      }

      .refund-note {
        padding: 1rem 1.1rem;
        font-size: 0.85rem;
      }

      .agreement-card {
        padding: 0.85rem 1rem;
      }
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(12px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 0.5s ease-out;
    }

    /* Focus visible for accessibility */
    *:focus-visible {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  <div class="form-container fade-in-up">
    <!-- ========== HEADER ========== -->
    <div class="text-center mb-3">
      <img src="https://www.jotform.com/uploads/tenantapprovall/form_files/IMG_6539.69d7a87350bf79.86488066.jpeg" 
           alt="Tenant Application Form" 
           class="form-header-logo">
      <h1 class="main-title mt-3">TENANT APPOINTMENT AND APPLYING APPLICATION FORM</h1>
    </div>

    <form id="tenantForm" novalidate>
      <!-- ========== ZIP & VIEWING ========== -->
      <div class="row g-3 mt-2">
        <div class="col-12">
          <label for="zipCode" class="form-label">
            Zip code of property you’re applying for: <span class="required-star">*</span>
          </label>
          <input type="text" class="form-control" id="zipCode" placeholder="e.g. 10001" required>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <div class="col-12 col-md-6">
          <label for="viewingDate" class="form-label">
            Preferable viewing date: <span class="required-star">*</span>
          </label>
          <input type="date" class="form-control" id="viewingDate" required>
        </div>
        <div class="col-12 col-md-6">
          <label class="form-label">
            Preferable viewing time: <span class="required-star">*</span>
          </label>
          <div class="d-flex gap-2 align-items-center">
            <input type="time" class="form-control" id="viewingTime" required style="flex: 1;">
            <select class="form-select" id="ampm" style="width: auto; min-width: 85px;">
              <option value="AM">AM</option>
              <option value="PM" selected>PM</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <div class="col-12 col-md-6">
          <label for="targetDate" class="form-label">
            Target date to move in: <span class="required-star">*</span>
          </label>
          <input type="date" class="form-control" id="targetDate" required>
        </div>
      </div>

      <!-- ========== APPLICANT BASIC INFO ========== -->
      <div class="section-header">
        <h3>Applicant Basic Information</h3>
      </div>

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">
            Applicant Name: <span class="required-star">*</span>
          </label>
          <div class="row g-2">
            <div class="col-12 col-md-4">
              <input type="text" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" class="form-control" placeholder="Middle Name">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" class="form-control" placeholder="Last Name" required>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <label for="email" class="form-label">
            Email: <span class="required-star">*</span>
          </label>
          <input type="email" class="form-control" id="email" placeholder="example@example.com" required>
        </div>
        <div class="col-12 col-md-6">
          <label for="phone" class="form-label">
            Phone Number: <span class="required-star">*</span>
          </label>
          <input type="tel" class="form-control" id="phone" placeholder="(000) 000-0000" required>
        </div>

        <div class="col-12 col-md-6">
          <label for="dob" class="form-label">
            Date of birth: <span class="required-star">*</span>
          </label>
          <input type="date" class="form-control" id="dob" required>
        </div>

        <div class="col-12 mt-2">
          <label class="form-label">
            Applicant current address: <span class="required-star">*</span>
          </label>
          <div class="row g-2">
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Street Address" required>
            </div>
            <div class="col-12 col-md-5">
              <input type="text" class="form-control" placeholder="City" required>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" class="form-control" placeholder="State / Province" required>
            </div>
            <div class="col-12 col-md-3">
              <input type="text" class="form-control" placeholder="Postal / Zip Code" required>
            </div>
            <div class="col-12 col-md-6 mt-2">
              <select class="form-select" required>
                <option value="" disabled selected>Please Select Country</option>
                <option value="United States" selected>United States</option>
                <option value="Canada">Canada</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Australia">Australia</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Germany">Germany</option>
                <option value="France">France</option>
                <option value="India">India</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 mt-2">
          <label for="annualIncome" class="form-label">Annual income:</label>
          <input type="text" class="form-control" id="annualIncome" placeholder="$">
        </div>
      </div>

      <!-- ========== GENERAL ========== -->
      <div class="section-header">
        <h2>General</h2>
      </div>

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label d-block">
            Do you smoke? <span class="required-star">*</span>
          </label>
          <div class="radio-group-inline">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="smoke" id="smokeYes" value="Yes" required>
              <label class="form-check-label" for="smokeYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="smoke" id="smokeNo" value="No">
              <label class="form-check-label" for="smokeNo">No</label>
            </div>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label d-block">
            Do you have a guarantor? <span class="required-star">*</span>
          </label>
          <div class="radio-group-inline">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="guarantor" id="guarantorYes" value="Yes" required>
              <label class="form-check-label" for="guarantorYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="guarantor" id="guarantorNo" value="No">
              <label class="form-check-label" for="guarantorNo">No</label>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <label for="petInfo" class="form-label">Do you intend to keep any pet?</label>
          <input type="text" class="form-control" id="petInfo" placeholder="If yes, number of pet and type">
          <span class="small-hint">If yes, number of pet and type:</span>
        </div>

        <div class="col-12 col-md-6">
          <label for="deposit" class="form-label">
            How much will you be able to pay for deposit if your application was approved? <span class="required-star">*</span>
          </label>
          <input type="text" class="form-control" id="deposit" placeholder="$" required>
          <span class="small-hint">Fully refundable:</span>
        </div>

        <div class="col-12 col-md-6">
          <label for="tenancyLength" class="form-label">Desire length of tenancy:</label>
          <input type="text" class="form-control" id="tenancyLength" placeholder="e.g. 12 months">
        </div>
      </div>

      <!-- ========== REFUNDABLE APPLICATION FEE ========== -->
      <div class="section-header">
        <h3>Refundable Application Fee</h3>
      </div>

      <div class="refund-note">
        <div class="note-title"><i class="fas fa-info-circle me-2"></i>Important Information</div>
        <p><i class="fas fa-check-circle me-2" style="color: var(--primary);"></i>(i) To fixed/booked appointment</p>
        <p><i class="fas fa-check-circle me-2" style="color: var(--primary);"></i>(ii) To know serious and interested applicant</p>
        <p><i class="fas fa-check-circle me-2" style="color: var(--primary);"></i>(iii) To review submission immediately</p>
        <p class="fw-bold mt-3 mb-1" style="color: var(--primary);">NOTE:</p>
        <p>cash/Cheque were not accepted!</p>
        <div class="highlight">
          <i class="fas fa-undo-alt me-2"></i>A refundable <strong>$100 application fee</strong> is required to book your viewing appointment, just to know how sure you are and to fixed your appointment time and date properly for you and it will fully refund back after viewing the property either interested or not.
        </div>
      </div>

      <!-- ========== BY SUBMITTING ========== -->
      <div class="section-header">
        <h3>By Submitting This Application</h3>
      </div>

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label d-block">
            How would you like to make payments for the rent refundable application fee $100 <span class="required-star">*</span>
          </label>
          <div class="payment-grid">
            <div class="payment-option">
              <input type="radio" name="paymentMethod" id="applePay" value="Apple pay" required>
              <label for="applePay"><i class="fab fa-apple"></i> Apple Pay</label>
            </div>
            <div class="payment-option">
              <input type="radio" name="paymentMethod" id="chime" value="Chime">
              <label for="chime"><i class="fas fa-bolt"></i> Chime</label>
            </div>
            <div class="payment-option">
              <input type="radio" name="paymentMethod" id="zelle" value="Zelle">
              <label for="zelle"><i class="fas fa-paper-plane"></i> Zelle</label>
            </div>
            <div class="payment-option">
              <input type="radio" name="paymentMethod" id="cashApp" value="Cash App">
              <label for="cashApp"><i class="fas fa-dollar-sign"></i> Cash App</label>
            </div>
          </div>
        </div>

        <!-- Agreement cards -->
        <div class="col-12 mt-3">
          <label class="agreement-card" for="agreeDisclose">
            <input class="form-check-input" type="radio" name="agreeDisclose" id="agreeDisclose" value="agree" required>
            <span class="form-check-label">
              I agree to you disclosing the reference replies to the landlord/s of the property for which I am applying.
            </span>
          </label>
        </div>

        <div class="col-12">
          <label class="agreement-card" for="noContract">
            <input class="form-check-input" type="radio" name="noContract" id="noContract" value="understand" required>
            <span class="form-check-label">
              I understand that this does not represent any offer or contract of any nature.
            </span>
          </label>
        </div>

        <div class="col-12">
          <label class="agreement-card" for="agreePayment">
            <input class="form-check-input" type="radio" name="agreePayment" id="agreePayment" value="agree100" required>
            <span class="form-check-label">
              I agree to make <strong>$100 payment</strong> for the refundable application fees.
            </span>
          </label>
        </div>

        <!-- ========== SIGNATURE PAD ========== -->
        <div class="col-12 mt-3">
          <label class="form-label d-flex justify-content-between align-items-center">
            <span>Signature <span class="required-star">*</span></span>
            <button type="button" class="btn-clear-signature" id="clearSignature" style="display: none;">
              <i class="fas fa-eraser me-1"></i> Clear
            </button>
          </label>
          <div class="signature-wrapper" id="signatureWrapper">
            <canvas id="signatureCanvas"></canvas>
            <div class="signature-placeholder" id="signaturePlaceholder">
              <i class="fas fa-pen-fancy"></i>
              <span>Draw your signature here</span>
            </div>
          </div>
          <span class="small-hint">
            <i class="fas fa-info-circle me-1"></i>
            Sign using your mouse, finger, or stylus. <span id="signatureStatus">Not signed yet.</span>
          </span>
        </div>
      </div>

      <!-- ========== SUBMIT ========== -->
      <div class="form-footer">
        <button type="submit" class="btn-submit">
          SUBMIT <i class="fas fa-arrow-right ms-2"></i>
        </button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    (function() {
      'use strict';

      // ========== SIGNATURE PAD ==========
      const canvas = document.getElementById('signatureCanvas');
      const wrapper = document.getElementById('signatureWrapper');
      const placeholder = document.getElementById('signaturePlaceholder');
      const clearBtn = document.getElementById('clearSignature');
      const statusEl = document.getElementById('signatureStatus');
      const form = document.getElementById('tenantForm');

      // SignaturePad instance
      let signaturePad = null;
      let isSigned = false;

      // Resize canvas for high-DPI displays
      function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width * ratio;
        canvas.height = rect.height * ratio;
        canvas.getContext('2d').scale(ratio, ratio);

        if (signaturePad && signaturePad.isEmpty()) {
          // Redraw empty state
        } else if (signaturePad) {
          // Preserve signature data on resize
          const data = signaturePad.toData();
          signaturePad.clear();
          signaturePad.fromData(data);
        }
      }

      // Initialize signature pad
      function initSignaturePad() {
        // Set actual canvas dimensions based on its display size
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;

        signaturePad = new SignaturePad(canvas, {
          backgroundColor: 'rgba(255, 255, 255, 0)',
          penColor: '#2c3344',
          minWidth: 0.8,
          maxWidth: 2.5,
          throttle: 16,
          velocityFilterWeight: 0.7,
        });

        // Event listeners
        signaturePad.addEventListener('beginStroke', () => {
          wrapper.classList.add('active');
        });

        signaturePad.addEventListener('endStroke', () => {
          if (!signaturePad.isEmpty()) {
            isSigned = true;
            wrapper.classList.add('signed');
            clearBtn.style.display = 'inline-flex';
            statusEl.textContent = 'Signed ✓';
            statusEl.style.color = 'var(--primary)';
            statusEl.style.fontWeight = '600';
          }
        });
      }

      // Clear signature
      function clearSignature() {
        if (signaturePad) {
          signaturePad.clear();
          isSigned = false;
          wrapper.classList.remove('signed', 'active');
          clearBtn.style.display = 'none';
          statusEl.textContent = 'Not signed yet.';
          statusEl.style.color = '';
          statusEl.style.fontWeight = '';
        }
      }

      // Handle window resize with debounce
      let resizeTimeout;
      window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
          if (signaturePad) {
            // Preserve data before resize
            const data = signaturePad.toData();
            resizeCanvas();
            // Reinitialize to apply new dimensions
            const newPad = new SignaturePad(canvas, {
              backgroundColor: 'rgba(255, 255, 255, 0)',
              penColor: '#2c3344',
              minWidth: 0.8,
              maxWidth: 2.5,
              throttle: 16,
              velocityFilterWeight: 0.7,
            });
            if (data.length > 0) {
              newPad.fromData(data);
            }
            signaturePad = newPad;
            // Reattach events
            signaturePad.addEventListener('beginStroke', () => wrapper.classList.add('active'));
            signaturePad.addEventListener('endStroke', () => {
              if (!signaturePad.isEmpty()) {
                isSigned = true;
                wrapper.classList.add('signed');
                clearBtn.style.display = 'inline-flex';
                statusEl.textContent = 'Signed ✓';
                statusEl.style.color = 'var(--primary)';
                statusEl.style.fontWeight = '600';
              }
            });
          }
        }, 200);
      });

      // Clear button
      clearBtn.addEventListener('click', clearSignature);

      // ========== AGENCY CARD HIGHLIGHTING ==========
      document.querySelectorAll('.agreement-card').forEach(card => {
        const radio = card.querySelector('input[type="radio"]');
        if (radio) {
          // Set initial state
          if (radio.checked) card.classList.add('checked');
          
          radio.addEventListener('change', function() {
            // Remove checked from all cards in the same group
            document.querySelectorAll(`input[name="${this.name}"]`).forEach(r => {
              r.closest('.agreement-card')?.classList.toggle('checked', r.checked);
            });
          });
        }
      });

      // ========== PAYMENT OPTION HIGHLIGHTING ==========
      document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
          // Visual is handled by CSS :checked
        });
      });

      // ========== FORM VALIDATION & SUBMISSION ==========
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        let isValid = true;
        let firstInvalid = null;

        // Check required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
          // For radio groups, check if any in group is checked
          if (field.type === 'radio') {
            const group = form.querySelectorAll(`input[name="${field.name}"]`);
            const anyChecked = Array.from(group).some(r => r.checked);
            if (!anyChecked) {
              isValid = false;
              if (!firstInvalid) firstInvalid = field;
              // Highlight the group
              group.forEach(r => {
                r.closest('.agreement-card')?.classList.add('border-danger');
                r.closest('.payment-option')?.classList.add('border-danger');
              });
            } else {
              group.forEach(r => {
                r.closest('.agreement-card')?.classList.remove('border-danger');
                r.closest('.payment-option')?.classList.remove('border-danger');
              });
            }
          } else {
            if (!field.value.trim()) {
              isValid = false;
              field.classList.add('is-invalid');
              if (!firstInvalid) firstInvalid = field;
            } else {
              field.classList.remove('is-invalid');
            }
          }
        });

        // Check signature
        if (!isSigned || (signaturePad && signaturePad.isEmpty())) {
          isValid = false;
          wrapper.style.borderColor = 'var(--danger)';
          wrapper.style.borderStyle = 'solid';
          if (!firstInvalid) firstInvalid = canvas;
          statusEl.textContent = 'Signature is required.';
          statusEl.style.color = 'var(--danger)';
          statusEl.style.fontWeight = '600';
        } else {
          wrapper.style.borderColor = '';
          wrapper.style.borderStyle = '';
        }

        if (!isValid) {
          if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            if (firstInvalid.focus) firstInvalid.focus();
          }
          // Shake animation on submit button
          const btn = form.querySelector('.btn-submit');
          btn.style.animation = 'shake 0.4s';
          setTimeout(() => btn.style.animation = '', 400);
          return;
        }

        // Success - simulate submission
        const btn = form.querySelector('.btn-submit');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
        btn.disabled = true;

        setTimeout(() => {
          btn.innerHTML = '<i class="fas fa-check-circle me-2"></i> Submitted!';
          btn.style.background = 'linear-gradient(135deg, #00b894, #00a381)';
          
          // Show success message
          const successMsg = document.createElement('div');
          successMsg.className = 'alert alert-success mt-3 text-center';
          successMsg.style.borderRadius = '0.75rem';
          successMsg.innerHTML = '<i class="fas fa-check-circle me-2"></i> Your application has been submitted successfully! We will contact you shortly.';
          form.appendChild(successMsg);
          successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });

          setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            btn.style.background = '';
            successMsg.remove();
          }, 5000);
        }, 1500);
      });

      // ========== REAL-TIME VALIDATION CLEANUP ==========
      form.querySelectorAll('.form-control, .form-select').forEach(field => {
        field.addEventListener('input', function() {
          if (this.value.trim()) {
            this.classList.remove('is-invalid');
          }
        });
      });

      // ========== SHAKE ANIMATION ==========
      const style = document.createElement('style');
      style.textContent = `
        @keyframes shake {
          0%, 100% { transform: translateX(0); }
          20% { transform: translateX(-8px); }
          40% { transform: translateX(8px); }
          60% { transform: translateX(-5px); }
          80% { transform: translateX(5px); }
        }
      `;
      document.head.appendChild(style);

      // ========== INITIALIZE ==========
      // Wait for DOM to be fully laid out
      window.addEventListener('load', () => {
        initSignaturePad();
        // Ensure canvas is sized properly after fonts load
        setTimeout(resizeCanvas, 100);
      });

      // Also handle if load already fired
      if (document.readyState === 'complete') {
        initSignaturePad();
        setTimeout(resizeCanvas, 100);
      }

    })();
  </script>
</body>
</html>