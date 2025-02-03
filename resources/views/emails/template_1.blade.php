<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }
        .content {
            padding: 20px 0;
        }
        .content h2 {
            font-size: 20px;
            color: #333333;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }
        .product-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .product-details h3 {
            font-size: 18px;
            color: #333333;
            margin-bottom: 10px;
        }
        .product-details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            font-size: 14px;
            color: #777777;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Enquiry</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello ##company_name##,</h2>
            <h4>An enquiry has been made by the below user:</h4>

            <p><strong>Name:</strong> ##User Name##</p>
            <p><strong>Email:</strong> ##User Email##</p>
            <p><strong>Phone:</strong> ##User Phone##</p>
            <p><strong>Message:</strong> ##User Message##</p>
            <p><strong>Location:</strong> ##User Location##</p>

            <p>You have an enquiry regarding the below products:</p>

            
            <div class="product-details">
                <h3>Product Information</h3>
                ##product_details##
            </div>

            <p>This is an automated email and should not be replied.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Best regards,</p>
            <p><strong>##company_name##</strong></p>
            <p><a href="##website_url##">##company_name##</a></p>
        </div>
    </div>
</body>
</html>