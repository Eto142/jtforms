<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Login UI Demo</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Roboto', Arial, sans-serif;
            color: #232a31;
            background:
                linear-gradient(
                    90deg,
                    rgba(10, 16, 32, 0.30),
                    rgba(10, 16, 32, 0.08)
                ),
                url("{{ asset('images/bg.jpg') }}") center / cover no-repeat;
            background-attachment: fixed;
        }

        .layout {
            min-height: 100vh;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 45px 8%;
        }

        .page {
            width: 100%;
            max-width: 420px;
            padding: 38px 32px;
            background: rgba(255, 255, 255, 0.97);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 16px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.20);
            backdrop-filter: blur(12px);
        }

        .logo {
            text-align: center;
            font-size: 38px;
            font-weight: 700;
            letter-spacing: -2px;
            color: #6001d2;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 26px;
            text-align: center;
            margin: 0 0 10px;
            font-weight: 500;
        }

        .subtitle {
            text-align: center;
            color: #525c66;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .demo-label {
            display: block;
            width: fit-content;
            margin: 0 auto 18px;
            padding: 6px 10px;
            border-radius: 5px;
            background: #f1e8ff;
            color: #6001d2;
            font-size: 12px;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form label {
            font-size: 14px;
            font-weight: 500;
        }

        .form input {
            width: 100%;
            padding: 14px;
            border: 1px solid #c8cdd2;
            border-radius: 6px;
            font-size: 16px;
            outline: none;
        }

        .form input:focus {
            border: 2px solid #6001d2;
            padding: 13px;
        }

        .link {
            color: #6001d2;
            font-size: 14px;
            text-decoration: none;
            width: fit-content;
        }

        .link:hover {
            text-decoration: underline;
        }

        .button {
            width: 100%;
            border: none;
            border-radius: 24px;
            padding: 14px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .primary {
            color: white;
            background: #6001d2;
        }

        .primary:hover {
            background: #4d00aa;
        }

        .secondary {
            color: #6001d2;
            background: white;
            border: 1px solid #6001d2;
            margin-top: 12px;
        }

        .secondary:hover {
            background: #f7f2ff;
        }

        /* --- NEW GOOGLE BUTTON STYLES --- */
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
            background: white;
            color: #3c4043;
            border: 1px solid #dadce0;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            cursor: pointer;
            transition: background 0.2s ease, box-shadow 0.2s ease;
            margin-top: 8px;
        }

        .google-btn:hover {
            background: #f8f9fa;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .google-btn svg {
            width: 18px;
            height: 18px;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #68727d;
            font-size: 12px;
            margin: 10px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dadce0;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }
        /* -------------------------------- */

        .note {
            margin-top: 24px;
            text-align: center;
            font-size: 12px;
            line-height: 1.7;
            color: #68727d;
        }

        .demo-screen {
            display: none;
            text-align: center;
        }

        .spinner {
            width: 32px;
            height: 32px;
            margin: 24px auto;
            border: 3px solid #e8e0f6;
            border-top-color: #6001d2;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            body {
                background-attachment: scroll;
                background-position: center;
            }

            .layout {
                justify-content: center;
                padding: 25px 16px;
            }

            .page {
                max-width: 420px;
                padding: 30px 24px;
            }
        }

        @media (max-width: 480px) {
            .layout {
                padding: 15px;
            }

            .page {
                padding: 26px 18px;
                border-radius: 12px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <main class="page">

            <section id="loginScreen">
                <div class="logo">Mail</div>
        
                <h1>Sign in to yahoo mail</h1>

                <form class="form" id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">Username, email or phone number</label>

                    <input
                        id="email"
                        type="text"
                        placeholder="Email or username or phone number"
                        autocomplete="off"
                        required
                    >

                    <a class="link" href="#" id="helpLink">
                        Need help?
                    </a>

                    <button class="button primary" type="submit">
                        Continue
                    </button>

                    <!-- Divider -->
                    <div class="divider">or</div>

                    <!-- NEW GOOGLE BUTTON -->
                    <button class="google-btn" type="button" id="googleSignInBtn">
                        <svg viewBox="0 0 48 48">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                        </svg>
                        Sign in with Google
                    </button>

                </form>

                <p class="note">
                    create account
                </p>
            </section>

            <section class="demo-screen" id="demoScreen">
                <div class="logo">Mail</div>
                <span class="demo-label">Demo complete</span>

                <h1>Continue</h1>

                <p class="subtitle" id="message">
                    This is a demonstration page.
                </p>

                <div class="spinner"></div>

                <button class="button secondary" id="returnButton" type="button">
                    Return to login
                </button>
            </section>

        </main>
    </div>

    <script>
        const loginScreen = document.getElementById("loginScreen");
        const demoScreen = document.getElementById("demoScreen");
        const loginForm = document.getElementById("loginForm");
        const emailInput = document.getElementById("email");

        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            if (!emailInput.value.trim()) {
                emailInput.focus();
                return;
            }

            loginScreen.style.display = "none";
            demoScreen.style.display = "block";

            document.getElementById("message").textContent =
                "Demo complete. No account information was sent.";
        });

        document.getElementById("returnButton").addEventListener(
            "click",
            function () {
                demoScreen.style.display = "none";
                loginScreen.style.display = "block";
                emailInput.value = "";
                emailInput.focus();
            }
        );

        document.getElementById("backButton")?.addEventListener(
            "click",
            function () {
                emailInput.value = "";
                emailInput.focus();
            }
        );

        document.getElementById("helpLink").addEventListener(
            "click",
            function (event) {
                event.preventDefault();
                alert("This is an educational email UI demonstration.");
            }
        );

        // NEW: Google Sign-in button click handler
        document.getElementById("googleSignInBtn").addEventListener(
            "click",
            function () {
                alert("Google Sign-in clicked. This is a demo.");
            }
        );
    </script>
</body>
</html>