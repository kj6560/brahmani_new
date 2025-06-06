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
        <img src="{{asset('brahmani_frontend_assets')}}/images/errors/500.jpg" alt="500 Illustration">
        <h1>Oops! This is an unexpected server behaviour.</h1>
        <p>This needs some fixation. Plz visit later</p>
        <a href="{{ url('/') }}">Go Back Home</a>
    </div>
</body>
</html>
