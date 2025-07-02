<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from techzaa.in/venton/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Apr 2025 10:33:09 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Sign In | Venton - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico')}}">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('asset/css/vendor.min.css" rel="stylesheet" type="text/css')}}" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('asset/css/app.min.css')}}" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('asset/js/config.js')}}"></script>
</head>

<body class="h-100 bg-auth" style="overflow-y: hidden;">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100 justify-content-center">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-6 py-lg-5">
                                   <div class="card mb-0 p-4 d-flex flex-column h-100 justify-content-center" style="max-width: 440px; margin: auto;">

                                        <h2 class="fw-bold fs-24">Sign In</h2>

                                        <p class="text-muted mt-1 mb-4">Enter your email address and password to access
                                             admin panel.</p>

                                        @if ($errors->any())
                                             <div class="alert alert-danger">
                                                  @foreach ($errors->all() as $error)
                                                       <div>
                                                            {{ $error }}
                                                       </div>
                                                  @endforeach
                                             </div>
                                        @endif

                                        <div class="mb-2">
                                             <form action="{{ route('logincheck') }}" class="authentication-form"
                                                  method="post">
                                                  @csrf
                                                  <div class="mb-3">
                                                       <label class="form-label" for="example-email">Email</label>
                                                       <input type="email" id="example-email" name="email"
                                                            class="form-control bg-" placeholder="Enter your email">
                                                  </div>
                                                  <div class="mb-3">
                                                       <label class="form-label" for="example-password">Password</label>
                                                       <input type="password" id="example-password" class="form-control"
                                                            name="password" placeholder="Enter your password">
                                                  </div>
                                                  <div class="mb-1 text-center d-grid">
                                                       <button class="btn btn-soft-primary" type="submit">Sign
                                                            In</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('asset/js/vendor.js')}}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('asset/js/app.js')}}"></script>

</body>


</html>