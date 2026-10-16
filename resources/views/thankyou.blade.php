<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .thank-you-card {
            max-width: 520px;
            background: #fff;
            border-radius: 1.25rem;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }
        .check-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00b894, #00a381);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: #fff;
            font-size: 2rem;
            animation: pop 0.4s ease-out;
        }
        @keyframes pop {
            0% { transform: scale(0); }
            70% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2c3344;
            margin-bottom: 0.75rem;
        }
        p {
            color: #6b7280;
            margin-bottom: 2rem;
        }
        .btn-home {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s ease;
        }
        .btn-home:hover {
            transform: translateY(-2px);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="thank-you-card">
        <div class="check-icon">
            <i class="fas fa-check"></i>
        </div>
        <h1>Application Submitted!</h1>
        <p>Thank you for your submission. We've received your tenant application and will contact you shortly regarding your viewing appointment.</p>
        <a href="{{ url('/') }}" class="btn-home">
            <i class="fas fa-home me-2"></i> Back to Home
        </a>
    </div>
</body>
</html>