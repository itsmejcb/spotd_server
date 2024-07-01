<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
    <style>
        /* Email styling can go here */
        body {
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .otp-code {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .instructions {
            font-size: 16px;
            color: #666;
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2 style="text-align: center;">Password Reset OTP</h2>
        <p class="otp-code">{{ $otp }}</p>
        <p class="instructions">Use the above OTP to reset your password.</p>
        <p class="footer">This email was sent automatically. Please do not reply.</p>
    </div>
</body>
</html>
