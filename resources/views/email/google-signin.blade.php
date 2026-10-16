<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in with Google - Yahoo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f0f4f9;
            font-family: 'Roboto', sans-serif;
            color: #202124;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Main Card Styling */
        .login-card {
            background-color: #fff;
            border-radius: 28px;
            padding: 36px 40px 36px 40px;
            max-width: 900px;
            width: 100%;
            margin: auto;
            border: 1px solid #dadce0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* Header Section */
        .card-header-custom {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            font-size: 14px;
            color: #202124;
            font-weight: 500;
        }

        .google-logo-svg {
            width: 24px;
            height: 24px;
            margin-right: 12px;
        }

        /* Yahoo Logo */
        .yahoo-logo {
            width: 48px;
            height: 48px;
            background-color: #5f01d1; /* Yahoo Purple */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            font-family: sans-serif;
            margin-bottom: 16px;
            border-radius: 2px;
        }

        /* Typography */
        h1 {
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 16px;
            color: #202124;
        }

        .subtitle {
            font-size: 16px;
            margin-bottom: 40px;
        }

        .subtitle a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }

        /* Input Styling */
        .form-floating > .form-control {
            border-radius: 4px;
            border: 1px solid #747775;
            height: 56px;
        }

        .form-floating > .form-control:focus {
            border: 2px solid #1a73e8;
            box-shadow: none;
        }

        .form-floating > label {
            color: #444746;
        }
        
        .form-floating > .form-control:focus ~ label {
            color: #1a73e8;
        }

        .forgot-link {
            text-decoration: none;
            color: #1a73e8;
            font-weight: 500;
            font-size: 14px;
            display: inline-block;
            margin-top: 8px;
        }

        /* Legal Text */
        .legal-text {
            font-size: 14px;
            color: #444746;
            margin-top: 40px;
            line-height: 1.5;
        }
        
        .legal-text a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }

        /* Footer Buttons */
        .card-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 32px;
            gap: 16px;
        }

        .btn-create {
            color: #1a73e8;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        
        .btn-create:hover {
            background-color: rgba(26, 115, 232, 0.04);
        }

        .btn-next {
            background-color: #1a73e8;
            color: white;
            border-radius: 100px;
            padding: 10px 24px;
            font-weight: 500;
            font-size: 14px;
            border: none;
        }

        .btn-next:hover {
            background-color: #1557b0;
            color: white;
        }

        /* Page Footer */
        .page-footer {
            font-size: 12px;
            color: #444746;
            padding: 24px 0;
            margin-top: auto;
            width: 100%;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-links a {
            color: #444746;
            text-decoration: none;
            margin-left: 32px;
        }

        /* Responsive Tweaks */
        @media (max-width: 768px) {
            .login-card {
                border-radius: 0;
                border: none;
                height: 100%;
                margin: 0;
                padding: 24px;
            }
            .page-footer {
                padding: 16px 24px;
            }
            .legal-text {
                margin-top: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center h-100">
        <!-- Main Login Card -->
        <div class="login-card">
            
            <!-- Card Header -->
            <div class="card-header-custom">
                <!-- Google G Logo SVG -->
                <svg class="google-logo-svg" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                </svg>
                <span>Sign in with Google</span>
            </div>

            <div class="row">
                <!-- Left Column: Branding -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="yahoo-logo">yahoo!</div>
                    <h1>Sign in</h1>
                    <p class="subtitle">to continue to <a href="#">Yahoo</a></p>
                </div>

                <!-- Right Column: Form -->
                <div class="col-md-6">
                    <form>
                        <!-- Floating Label Input -->
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com">
                            <label for="emailInput">Email or phone</label>
                        </div>
                        
                        <a href="#" class="forgot-link">Forgot email?</a>

                        <p class="legal-text">
                            Before using this app, you can review Yahoo’s <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>.
                        </p>

                        <!-- Action Buttons -->
                        <div class="card-actions">
                            <a href="#" class="btn-create">Create account</a>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer">
        <div class="dropdown">
            <button class="btn btn-link text-decoration-none text-dark dropdown-toggle p-0" type="button">
                English (United Kingdom)
            </button>
        </div>
        <div class="footer-links d-none d-sm-block">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>