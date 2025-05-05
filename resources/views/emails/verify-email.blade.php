<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Verify Your Email</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f7f7f7;
                padding: 20px;
            }

            .email-container {
                background: white;
                padding: 20px;
                max-width: 600px;
                margin: auto;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .button {
                display: inline-block;
                background-color: #3490dc;
                color: white;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 20px;
            }

            .footer {
                margin-top: 30px;
                font-size: 0.9em;
                color: #888;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <h2>Verify Your Email Address</h2>
            <p>Thanks for signing up! Please click the button below to verify your email address:</p>

            <a href="{{ $url }}" class="button">Verify Email</a>

            <p class="footer">If you did not create an account, you can safely ignore this email.</p>
        </div>
    </body>

</html>
