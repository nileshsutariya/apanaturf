<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);
        
        .set-password-container, .forgot-password-container, .reset-password-container {
            display: none;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-size: 16px
        }

        input::placeholder {
            font-size: 16px;
        }

        .login-container,
        .otp-container,
        .set-password-container,
        .forgot-password-container, 
        .reset-password-container {
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
    <div class="login-container">
        <h1 class="logo">Logo</h1>
        <form id="loginForm" action="{{route('vendor.logincheck')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="1234567890" style="border: 2px solid #4B5768;">
            </div>
            <div class="position-relative mb-3" id="passwordDiv">
                <label for="password" class="form-label d-flex">
                    Password
                    <small style="margin-left: auto;">
                        <a href="#" id="forgotPasswordLink" style="color: #299D91; text-decoration: none; ">Forgot Password?</a>
                    </small>
                </label>
                <img src="{{ asset('assets/image/users/eye.svg') }}" class="input-icon" id="togglePassword">
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-check mb-3" id="remembermeDiv">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label for="rememberMe" class="form-check-label">Keep me signed in</label>
            </div>
            <button type="button" class="btn btn-custom next-btn w-100" id="loginBtn">Login</button>
        </form>
    </div>

    <div class="otp-container">
        <form id="otpForm" action="{{route('vendor.otp.verify')}}" method="POST">
            @csrf
            <input type="hidden" id="otpPhone" name="phone">
            <div class="mb-3">
                <label for="otp" class="form-label">Enter OTP</label>
                <input type="text" class="form-control" id="otp" name="otp" style="border: 2px solid #D0D5DD;">
            </div>
            <button type="submit" class="btn btn-custom login-btn w-100">Verify OTP</button>
        </form>
    </div>

    <div class="set-password-container">
        <form id="setForm" action="{{ route('vendor.set.password') }}" method="POST">
            @csrf
            <input type="hidden" id="setPhone" name="phone">
            <div class="mb-3">
                <label for="oldpassword" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="oldpassword" id="oldpassword">
            </div>
            <div class="mb-3">
                <label for="newpassword" class="form-label">New Password</label>
                <input type="password" class="form-control" name="newpassword" id="newpassword">
            </div>
            <button type="submit" class="btn btn-custom login-btn w-100">Save</button>
        </form>
    </div>
    <div class="forgot-password-container">
        <form id="forgotPasswordForm" action="{{ route('vendor.forgot.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vendorid" class="form-label">Phone/VendorID</label>
                <input type="text" class="form-control" name="vendorid" id="vendorid">
            </div>
            <button type="submit" class="btn btn-custom next-btn w-100" id="submit">Submit</button>
        </form>
    </div>
    <div class="reset-password-container">
        <form id="resetForm" action="{{ route('vendor.reset.password') }}" method="POST">
            @csrf
            <input type="hidden" id="resetPhone" name="phone">
            <div class="mb-3">
                <label for="newpass" class="form-label">New Password</label>
                <input type="password" class="form-control" name="newpass" id="newpass">
            </div>
            <div class="mb-3">
                <label for="newpass_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="newpass_confirmation" id="newpass_confirmation">
            </div>
            <button type="submit" class="btn btn-custom next-btn w-100" id="reset-pass">Save</button>
        </form>
    </div>


    <script>
        // document.getElementById("forgotPasswordLink").addEventListener("click", function (event) {
        //     event.preventDefault(); 
        //     document.getElementById("passwordDiv").remove(); 
        //     document.getElementById("remembermeDiv").remove();  
        //     document.body.style.height = "105vh";

        //     var nextButton = document.querySelector(".next-btn");
        //     var loginButton = document.querySelector(".login-btn");

        //     loginButton.style.display = "none";
        //     nextButton.style.display = "inline-block";

        // });
        document.getElementById("next-btn").addEventListener("click", function (event) {
            document.body.style.height = "105vh";
            var login = document.querySelector(".login-container");
            login.remove();
            var otp = document.querySelector(".otp-container"); 
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

    <script>
        const loginBtn = document.getElementById("loginBtn");
        const otpForm = document.getElementById("otpForm");
        const forgotLink = document.getElementById("forgotPasswordLink");

        document.getElementById("togglePassword").addEventListener("click", function () {
            const pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        });

        loginBtn.addEventListener("click", function (e) {
    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    // Send login data to the backend
    fetch("{{ route('vendor.logincheck') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify({ phone, password })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            if (data.password_updated === false) {
                // Password not updated, show OTP container
                document.getElementById("otpPhone").value = phone;
                document.querySelector(".login-container").style.display = "none";
                document.querySelector(".otp-container").style.display = "block";
            } else {
                // Password updated, redirect to dashboard
                window.location.href = data.redirect; // Redirect to the dashboard route
            }
        } else {
            alert(data.message || "Invalid credentials.");
        }
    })
    .catch(err => {
        alert("Something went wrong.");
    });
});

        otpForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const phone = document.getElementById("otpPhone").value;
            const otp = document.getElementById("otp").value;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            fetch("{{ route('vendor.otp.verify') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify({ phone, otp })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(".otp-container").style.display = "none";
                    document.querySelector(".set-password-container").style.display = "block";
                    document.getElementById("setPhone").value = phone; 
                } else {
                    alert(data.message || "Invalid OTP.");
                }
            })
            .catch(err => {
                alert("Something went wrong.");
            });
        });
    </script>
    <script>
        document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
            e.preventDefault(); 

            document.querySelector('.login-container').style.display = 'none';
            document.querySelector('.forgot-password-container').style.display = 'block';
        });
    </script>

    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const vendorid = document.getElementById('vendorid').value.trim();
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!vendorid) {
                alert('Please enter your Phone, Email, or VendorID.');
                return;
            }

            fetch("{{ route('vendor.forgot.password') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify({ vendorid })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.forgot-password-container').style.display = 'none';
                    document.querySelector('.reset-password-container').style.display = 'block';

                    document.getElementById('resetPhone').value = data.vendorId; 
                } else {
                    alert(data.message || "No Record found.");
                }
            })
            .catch(err => {
                alert("Something went wrong.");
            });
        });

    </script>
    <script>
    document.getElementById('resetForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const phone = document.getElementById('resetPhone').value;
        const newpass = document.getElementById('newpass').value;
        const confirmpass = document.getElementById('confirmpassword').value;
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        if (!newpass || !confirmpass) {
            alert("Please fill in both password fields.");
            return;
        }

        fetch("{{ route('vendor.reset.password') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf
            },
            body: JSON.stringify({
                phone: phone,
                newpass: newpass,
                newpass_confirmation: newpass_confirmation
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                window.location.href = data.redirect;
            } else {
                alert(data.message || "Password update failed.");
            }
        })
        .catch(error => {
            console.error(error);
            alert("Something went wrong.");
        });
    });
</script>

</body>
</html>


