<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Unauthorized</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 96px;
            font-weight: 500;
            color: #ff6a00;
            margin-bottom: 0;
        }

        h3 {
            font-size: 24px;
            margin: 10px 0;
            color: #2e2e2e;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        a.btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #1a73e8;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        a.btn:hover {
            background-color: #155ab6;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>403</h1>
        <h3>You are not authorized to access this page.</h3>
        <p>Please contact the administrator if you believe this is an error.</p>
        <a href="{{ route('admin.dashboard') }}" class="btn">Go to Dashboard</a>
    </div>

</body>
</html>
