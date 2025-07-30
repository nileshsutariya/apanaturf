<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            font-size: 16px
        }
        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #279B5A;
            margin-bottom: 30px;
            text-align: center;
        }

        input::placeholder {
            font-size: 16px;
        }

        .login-container,
        .otp-container,
        .forgot-password-container,
        .reset-password-container {
            background: white;
            padding: 30px;
            border-radius: 13px;
            width: 400px;
            height: 250px;
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

        .forgot-password-container {
            display: none;
        }
        
        .reset-password-container {
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
        .input-wrapper {
            position: relative;
        }

        .input-wrapper .bi {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
            color: #999;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1 class="logo">
            <img src="{{asset('assets/image/logo/Apna-Turf.png')}}" height="100" class="d-inline-block align-top ml-5 mt-3" alt="">
        </h1>
        <form id="loginForm" action="{{route('customer.logincheck')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phone" placeholder="1234567890" name="phone"
                    style="border: 2px solid #4B5768;">
            </div>
            <div class="position-relative mb-3" id="passwordDiv">
                <label for="password" class="form-label d-flex">Password <small style="margin-left: auto;">
                    <a href="#" class="text-success" id="forgotPasswordLink" style=" text-decoration: none;">
                        Forgot Password?</a></small></label>

                <div class="input-wrapper">
                    <i class="bi bi-eye-slash" id="toggle"></i>
                    <input type="password" class="form-control input-with-icon" id="password" name="password"
                        style="border: 2px solid #D0D5DD;">
                </div>
            </div>
            <div class="mb-3 form-check" id="remembermeDiv">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Keep me signed in</label>
            </div>
            <button type="submit" class="btn login-btn w-100" id="loginBtn">Login</button>
        </form>

        <div class="mt-3 text-center" style="font-size: 14px;">
            Don't Have an Account?
            <a href="{{route('customer.register')}}" class="text-success" style="text-decoration: none; font-weight: 600; color: ;"> 
                Sign up 
            </a>
        </div>
    </div>


    <div class="otp-container">
        <form action="{{route('customer.otp.verify')}}" method="POST" id="otpForm">
            <input type="hidden" id="otpPhone" name="phone">
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="text" class="form-control" id="otp" placeholder="Enter the Otp here" name="otp"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <button type="submit" class="btn login-btn w-100">Save</button>
        </form>
    </div>

    <div class="forgot-password-container">
        <form id="forgotPasswordForm" action="{{ route('customer.forgot.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customerid" class="form-label">Phone</label>
                <input type="text" class="form-control" name="customerid" id="customerid">
            </div>
            <button type="submit" class="btn btn-custom next-btn w-100" id="submit">Submit</button>
        </form>
    </div>

    <div class="reset-password-container">
        <form id="resetForm" action="{{ route('customer.reset.password') }}" method="POST">
            @csrf
            <input type="hidden" id="resetPhone" name="customerid">
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        function showSuccessMessages(success) {
            const successMessage = success.map(msg => `${msg}`).join("<br>");
            Toastify({
                text: successMessage,
                duration: 3000,
                gravity: "top",
                position: "center",
                escapeMarkup: false, 
                style: {
                    background: "rgba(40, 167, 69, 0.2)",
                    color: "#155724",
                    border: "1px solid rgba(40, 167, 69, 0.2)",
                    borderRadius: "5px",
                    minWidth: "350px",
                    maxWidth: "400px",
                    textAlign: "center",
                },
            }).showToast();
        }
        function showErrorMessages(errors) {
            const errorMessage = errors.map(msg => `${msg}`).join("<br>");
            Toastify({
                text: errorMessage,
                duration: 3000,
                gravity: "top",
                position: "center",
                escapeMarkup: false, 
                style: {
                    background: "rgba(220, 53, 69, 0.2)",
                    color: "#8a2e35",
                    border: "1px solid rgba(220, 53, 69, 0.2)",
                    borderRadius: "5px",
                    minWidth: "350px",
                    maxWidth: "400px",
                    textAlign: "center",
                },
            }).showToast();
        }
    </script>

    @if(session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "green",
            }).showToast();
        </script>
    @endif
    
    <script>
    
        const loginBtn = document.getElementById("loginBtn");
        const otpForm = document.getElementById("otpForm");
        const forgotLink = document.getElementById("forgotPasswordLink");

       loginBtn.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default form submission

    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    // Basic client-side validation
    const errors = [];
    if (!phone) errors.push("Phone Number field is required.");
    if (!password) {
        errors.push("Password field is required.");
    } else if (password.length < 6) {
        errors.push("Password must be at least 6 characters.");
    }

    if (errors.length > 0) {
        showErrorMessages(errors);
        return;
    }

    // Use fetch with session credentials
    fetch("{{ route('customer.logincheck') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf
        },
        credentials: "same-origin", // 🔑 Required for session login
        body: JSON.stringify({ phone, password })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            if (data.password_updated === false) {
                showSuccessMessages([data.message || "OTP verification required."]);
                document.getElementById("otpPhone").value = phone;
                document.querySelector(".login-container").style.display = "none";
                document.querySelector(".otp-container").style.display = "block";
            } else {
                showSuccessMessages([data.message || "Login successful!"]);
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1500);
            }
        } else {
            showErrorMessages([data.message || "Invalid credentials."]);
        }
    })
    .catch(err => {
        console.error("Login Error:", err);
        showErrorMessages(["Something went wrong. Please try again."]);
    });
});

        document.getElementById("otpForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const phone = document.getElementById("otpPhone").value;
            const otp = document.getElementById("otp").value;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!otp) {
                showErrorMessages(["OTP field is required."]);
                return;
            }

            fetch("{{ route('customer.otp.verify') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify({ phone, otp })
            })
            .then(res => res.json())
            .then(data => {
                console.log("OTP Response Data:", data); 
                if (data.success) {
                    if (otpMode === 'forgot') {
                        document.querySelector(".otp-container").style.display = "none";
                        document.querySelector(".reset-password-container").style.display = "block";
                        document.getElementById("resetPhone").value = phone;
                        showSuccessMessages([data.message || "OTP Verified. Please set your new password."]);
                    } else {
                        window.location.href = data.redirect;
                    }
                }
                else {
                    showErrorMessages([data.message || "No Record found."]);
                }
            })
        });
    </script>
    <script>
        $('#forgotPasswordLink').on('click', function (e) {
            e.preventDefault();
            $('.login-container').hide();
            $('.forgot-password-container').show();
        });
    </script>

    <script>
        $('#forgotPasswordForm').on('submit', function(e) {
            e.preventDefault();

            const customerid = document.getElementById("customerid").value;
            const otp = document.getElementById("otp").value;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!customerid) {
                showErrorMessages(["Phone Number field is required."]);
                return;
            }

            $.ajax({
                url: '{{ route("customer.forgot.password") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        otpMode = 'forgot';
                        $('#otpPhone').val($('#customerid').val()); 
                        $('#forgotPasswordForm')[0].reset();
                        
                        $('.forgot-password-container').hide();
                        $('.otp-container').show();
                        
                    } else {
                        showErrorMessages("Record Not Found!");
                    }
                }
            });
        });
    </script>

    <script>
        $('#resetForm').on('submit', function (e) {
            e.preventDefault();

            const phone = document.getElementById('resetPhone').value;
            const newpass = document.getElementById('newpass').value;
            const newpass_confirmation = document.getElementById('newpass_confirmation').value;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!newpass || !newpass_confirmation) {
                showErrorMessages(["New Password and Confirm Password fields are required."]);
            }
            if (newpass !== newpass_confirmation) {
                showErrorMessages(["Passwords do not match."]);
            }

            $.ajax({
                url: '{{ route("customer.reset.password") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        showSuccessMessages([response.message || "Password has been reset successfully."]);
                        window.location.href = response.redirect;
                    } else {
                        showErrorMessages([data.message || "Password update failed."]);
                    }
                }
            });
        });
    </script>
    <script>
        const toggle = document.getElementById("toggle");
        const password = document.getElementById("password");

        toggle.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye-slash");
            this.classList.toggle("bi-eye");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>