<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #279B5A;
            margin-bottom: 30px;
            text-align: center;
        }

        input::placeholder {
            font-size: 16px;
            /* Set the placeholder font size to 14px */
        }

        .login-container,
        .otp-container,
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
    </style>
</head>

<body>
    <div class="login-container">
        <h1 class="logo">ApnaTurf</h1>
        <form id="loginForm" action="{{route('customer.logincheck')}}" method="POST">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phone" placeholder="1234567890" name="phone"
                    style="border: 2px solid #4B5768;">
            </div>
            <div class="position-relative mb-3" id="passwordDiv">
                <label for="password" class="form-label d-flex">Password <small style="margin-left: auto;">
                    <a href="#"
                            class="text-success" id="forgotPasswordLink" style=" text-decoration: none;">Forgot
                            Password?</a></small></label>
                <img src="{{ asset('assets/image/users/eye.svg') }}" alt="Icon" class="input-icon" id="input-icon">
                <input type="password" class="form-control input-with-icon" id="password" name="password"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div class="mb-3 form-check" id="remembermeDiv">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Keep me signed in</label>
            </div>
            <button type="submit" class="btn login-btn w-100">Login</button>
        </form>
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
    <script>
        let otpMode = '';
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("customer.logincheck") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        if (response.password_updated === false) {
                            otpMode = 'login';
                            $('#otpPhone').val($('#phone').val());

                            $('#loginForm')[0].reset();

                            $('.login-container').hide();
                            $('.otp-container').show();

                            alert('OTP sent. Please enter OTP to proceed.');
                        } else {
                            window.location.href = response.redirect;
                        }
                    } else {
                        alert(response.message || "Login failed");
                    }
                },

                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    for (let field in errors) {
                        errorMsg += errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                }
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
                        alert(data.message || "OTP Verified. Please set your new password.");
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
                        
                        alert('OTP sent. Please enter OTP to proceed.');
                    } else {
                        alert(response.message || 'Something went wrong.');
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    for (let field in errors) {
                        errorMsg += errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                }
            });
        });
    </script>

    <script>
        $('#resetForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("customer.reset.password") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message || "Password has been reset successfully.");
                        window.location.href = response.redirect;
                    } else {
                        alert(response.message || "Something went wrong.");
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    for (let field in errors) {
                        errorMsg += errors[field][0] + '\n';
                    }
                    alert(errorMsg);
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>