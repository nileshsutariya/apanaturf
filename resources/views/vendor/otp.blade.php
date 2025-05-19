<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-size: 16px
        }

        input::placeholder {
            font-size: 16px;
            /* Set the placeholder font size to 14px */
        }

        .login-container,
        .otp-container {
            background: white;
            padding: 30px;
            border-radius: 13px;
            width: 400px;
            height: 304px;
        }

        .login-btn,
        .next-btn {
            background-color: #299D91;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .login-btn:hover,
        .next-btn:hover {
            background-color: #299D91;
        }

        .form-check-input:checked {
            background-color: #299D91;
            border-color: #299D91;
        }

        #rememberMe {
            border-radius: 2px;
        }

        .form-label {
            font-weight: 500;
        }

        .otp-container {
            display: none;
        }

        .next-btn {
            display: none;
        }

        .input-with-icon {
            padding-right: 35px;
        }

        .input-icon {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            width: 23px;
            height: 23px;
        }

        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #15857e;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="otp-container">
        <form>
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="text" class="form-control" id="otp" placeholder="Enter the Otp here"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <button type="submit" class="btn login-btn w-100">Save</button>
        </form>
    </div>

</body>

</html>