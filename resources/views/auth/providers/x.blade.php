<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Sign-in Placeholder</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 24px;
            color: #20262e;
            background: #f3f5f7;
            font-family: Arial, sans-serif;
        }
        main {
            width: min(100%, 460px);
            padding: 32px;
            background: #fff;
            border: 1px solid #dfe4e8;
            border-radius: 8px;
            text-align: center;
        }
        h1 { margin: 0 0 12px; font-size: 24px; }
        p { margin: 0; color: #58636d; line-height: 1.5; }
        .notice { margin-top: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <main>
        <h1>X sign-in placeholder</h1>
        <p>Provider sign-in has not been configured.</p>
        <p class="notice">This demo page does not collect credentials. Add an official OAuth flow to enable sign-in.</p>
    </main>
</body>
</html>
