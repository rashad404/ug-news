<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation - Wisher.az</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #331E6D;
        }
        .email-header img {
            max-width: 150px;
        }
        .email-body {
            padding: 20px 0;
        }
        .email-body h1 {
            color: #331E6D;
            font-size: 24px;
        }
        .email-body p {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }
        .email-body a {
            color: #1a73e8;
            text-decoration: none;
        }
        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            font-size: 14px;
            color: #999999;
        }
        .email-footer a {
            color: #1a73e8;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://wisher.az/images/logo.png" alt="Wisher.az Logo">
        </div>
        <div class="email-body">
            <h1>Thank You for Subscribing!</h1>
            <p>Hi there,</p>
            <p>Welcome to the Wisher.az community! We're thrilled to have you on board. Get ready to receive the latest updates, articles, and personalized gift recommendations straight to your inbox.</p>
            <p>If you ever change your mind and no longer wish to receive these emails, you can <a href="{{ $unsubscribeUrl }}">unsubscribe here</a>.</p>
            <p>We're here to help you make every occasion special.</p>
            <p>Best wishes,<br>The Wisher.az Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; <?php echo date("Y"); ?> Wisher.az | <a href="https://wisher.az/privacy-policy">Privacy Policy</a> | <a href="https://wisher.az/terms">Terms of Service</a></p>
        </div>
    </div>
</body>
</html>
