<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            padding: 60px 20px;
        }
        img {
            max-width: 300px;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Use your own image or a CDN link --}}
        <img src="https://i.imgur.com/qIufhof.png" alt="404 Illustration">
        <h1>Oops! Page not found.</h1>
        <p>The page you're looking for doesn’t exist or has been moved.</p>
        <a href="{{ url('/') }}">Go Back Home</a>
    </div>
</body>
</html>
