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
            background-color: #279B5A;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .login-btn:hover,
        .next-btn:hover {
            background-color: #279B5A;
        }

        .form-check-input:checked {
            background-color: #279B5A;
            border-color: #279B5A;
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
    </style>
</head>

<body>
    <div class="login-container">
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="johndoe@email.com"
                    style="border: 2px solid #4B5768;">
            </div>
            <div class="position-relative mb-3" id="passwordDiv">
                <label for="password" class="form-label d-flex">Password <small style="margin-left: auto;"><a href="#"
                            class="text-success" id="forgotPasswordLink" style=" text-decoration: none;">Forgot
                            Password?</a></small></label>
                <img src="{{ asset('assets/image/users/eye.svg') }}" alt="Icon" class="input-icon" id="input-icon">
                <input type="password" class="form-control input-with-icon" id="password"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div class="mb-3 form-check" id="remembermeDiv">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Keep me signed in</label>
            </div>
            <button type="submit" class="btn login-btn w-100">Login</button>
            <button type="submit" class="btn next-btn w-100" id="next-btn">Next</button>
        </form>
    </div>


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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("forgotPasswordLink").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            document.getElementById("passwordDiv").remove(); // Remove the entire div
            document.getElementById("remembermeDiv").remove(); // Remove the entire 
            document.body.style.height = "105vh";

            var nextButton = document.querySelector(".next-btn");
            var loginButton = document.querySelector(".login-btn");

            loginButton.style.display = "none";
            nextButton.style.display = "inline-block";

        });

        document.getElementById("next-btn").addEventListener("click", function (event) {
            document.body.style.height = "105vh";
            var login = document.querySelector(".login-container");
            login.remove();// Remove the entire div
            var otp = document.querySelector(".otp-container"); // Remove the entire div
            otp.style.display = "inline-block";

        });

        document.getElementById("input-icon").addEventListener("click", function () {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });

    </script>
</body>

</html>