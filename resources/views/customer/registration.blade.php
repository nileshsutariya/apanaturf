<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Login</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 55vh;
            font-size: 16px
        }

        input::placeholder {
            font-size: 16px;
        }

        .register-container,
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


        .input-with-icon {
            padding-right: 35px;
            style="border: 2px solid #D0D5DD;"
        }

        .input-icon {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            width: 23px;
            height: 23px;

        }

        .form-control {
            border: 2px solid #4B5768;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <form action="{{route('customer.add')}}" method="POST"  id="registerForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="johndoe@email.com" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone">
            </div>
            <div class="position-relative mb-3" id="passwordDiv">
                <label for="password" class="form-label d-flex">Password</label>
                <img src="{{ asset('assets/image/users/eye.svg') }}" alt="Icon" class="input-icon" id="input-icon"
                    data-target="password">
                <input type="password" class="form-control input-with-icon" id="password" name="password"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div class="position-relative mb-3" id="confirmpasswordDiv">
                <label for="confirmpassword" class="form-label d-flex">Confirm Password </label>
                <img src="{{ asset('assets/image/users/eye.svg') }}" alt="Icon" class="input-icon" id="input-icon"
                    data-target="confirmpassword">
                <input type="password" class="form-control input-with-icon" id="confirmpassword"
                    style="border: 2px solid #D0D5DD;">
            </div>

            <button type="submit" class="btn next-btn w-100">Registration</button>
        </form>
    </div>

    <div class="otp-container">
        <form action="{{route('customer.otp.verify')}}" method="POST" id="otpForm">
            <div class="mb-3">
                <input type="text" name="phone" id="otpPhone">
                <label for="otp" class="form-label">OTP</label>
                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter the Otp here"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <button type="submit" class="btn login-btn w-100">Save</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("customer.add") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('.register-container').hide();

                        $('.otp-container').show();
                        $('#otpPhone').val($('#phone').val());

                        alert('Registration successful! Please enter the OTP.');
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
                if (data.success) {
                    document.querySelector(".otp-container").style.display = "none";
                    // if (data.redirect) {
                    //     window.location.href = data.redirect;
                    // } else {
                        showSuccessMessages([data.message || "OTP Verified."]);
                    // }                
                }
                else {
                    showErrorMessages([data.message || "No Record found."]);
                }
            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>