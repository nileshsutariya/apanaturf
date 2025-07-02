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
        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #15857e;
            margin-bottom: 30px;
            text-align: center;
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

        .form-control {
            padding-right: 2.5rem; 
        }
        
    </style>

</head>

<body>  
    <div class="login-container">
        <h1 class="logo">ApnaTurf</h1>
        <form id="loginForm" action="{{route('vendor.logincheck')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">Phone No./ Vendor Id</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No. / Vendor ID" style="border: 2px solid #4B5768;">
            </div>
            <div class="position-relative" id="passwordDiv">
                <label for="password" class="form-label d-flex">
                    Password
                    <small style="margin-left: auto;">
                        <a href="#" id="forgotPasswordLink" style="color: #299D91; text-decoration: none; ">Forgot Password?</a>
                    </small>
                </label>
                <div class="input-wrapper">
                    
                    <i class="bi bi-eye-slash" id="toggle"></i>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="form-check mb-3" id="remembermeDiv">
                <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                <label for="rememberMe" class="form-check-label">Keep me signed in</label>
            </div>
            {{-- <small style="float: right; margin-bottom: 20px;">
                <a href="#" id="forgotPasswordLink" style="color: #299D91; text-decoration: none; ">Forgot Password?</a>
            </small> --}}
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
            <input type="hidden" id="resetPhone" name="vendorid">
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

        let otpContext = 'login';
        const loginBtn = document.getElementById("loginBtn");
        const otpForm = document.getElementById("otpForm");
        const forgotLink = document.getElementById("forgotPasswordLink");
        
        loginBtn.addEventListener("click", function (e) {
            const phone = document.getElementById("phone").value;
            const password = document.getElementById("password").value;
            const remember = document.getElementById("rememberMe").checked;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!phone && !password) {
                showErrorMessages(["Phone Number and Password fields are required."]);
            } else {
                if (!phone) 
                    showErrorMessages(["Phone Number field is required."]);
                if (!password) {
                    showErrorMessages(["Password field is required."]);
                } else if (password.length < 8) {
                    showErrorMessages(["Password must be at least 8 characters."]);
                }
            }   

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
                        
                        showSuccessMessages([data.message || "Sign in Successfully! Set a New Password."]);

                        document.getElementById("otpPhone").value = phone;
                        document.querySelector(".login-container").style.display = "none";
                        document.querySelector(".otp-container").style.display = "block";
                    } else {
                        showSuccessMessages([data.message || "Sign in Successfully!"]);

                        setTimeout(function() {
                            window.location.href = data.redirect; 
                        }, 3000);

                    }
                } else {
                    showErrorMessages(["Invalid Credentials."]);
                }
            })
        });
 
        document.getElementById("setForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const phone = document.getElementById("setPhone").value;
            const oldpassword = document.getElementById("oldpassword").value;
            const newpassword = document.getElementById("newpassword").value;
            const csrf = document.querySelector('meta[name="csrf-token"]').content;
            
            if (!oldpassword || !newpassword) {
                showErrorMessages(["Old Password and New Password fields are required."]);
            } 
            fetch("{{ route('vendor.set.password') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify({
                    phone,
                    oldpassword,
                    newpassword
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessages(["Password updated successfully."]);

                    setTimeout(function() {
                        window.location.href = "{{ route('vendor.login') }}";
                    }, 3000);
                } else {
                    showErrorMessages([data.message || "Old Password is Incorrect."]);
                }
            })
        });
    
        document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
            e.preventDefault(); 

            document.querySelector('.login-container').style.display = 'none';
            document.querySelector('.forgot-password-container').style.display = 'block';
        });
  
        document.getElementById('forgotPasswordForm').addEventListener('submit', function (e) {
            e.preventDefault();
            otpContext = 'forgot';

            const vendorid = document.getElementById('vendorid').value.trim();
            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            if (!vendorid) {
                showErrorMessages(["Please enter your Phone or VendorID."]);
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
                    document.querySelector('.otp-container').style.display = 'block';

                    document.getElementById('otpPhone').value = vendorid; 
                } else {
                    showErrorMessages([data.message || "No Record found."]);
                }
            })
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
                    showSuccessMessages([ data.message || "OTP Verified."]);
                    if (otpContext === 'login') {
                        document.querySelector(".set-password-container").style.display = "block";
                        document.getElementById("setPhone").value = phone;
                    } else if (otpContext === 'forgot') {
                        document.querySelector(".reset-password-container").style.display = "block";
                        document.getElementById("resetPhone").value = phone;
                    }
                }
                else {
                    showErrorMessages([data.message || "No Record found."]);
                }
            })
        });

        document.getElementById('resetForm').addEventListener('submit', function (e) {
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
            fetch("{{ route('vendor.reset.password') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify({
                    vendorid: phone,
                    newpass: newpass,
                    newpass_confirmation: newpass_confirmation 
                })

            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessages([data.message || "Reset Password Successfully!"]);
                    setTimeout(function() {
                        window.location.href = data.redirect;
                    }, 3000);
                } else {
                    showErrorMessages([data.message || "Password update failed."]);
                }
            })
        });
    </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
        const toggle = document.getElementById("toggle");
        const password = document.getElementById("password");

        toggle.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye-slash");
            this.classList.toggle("bi-eye");
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                phoneInput.focus();
            }
        });
    </script>

</body>
</html>


