<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Collapse with Main Content Shift</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Inter", sans-serif;
            overflow-x: hidden;
            
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            /* height: 100vh; */
        }

        nav {
            background: #ffffff;
            padding: 10px;
            color: white;
            text-align: center;
        }
        .navbar {
            padding: 5px 0;
        }
        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }

        .navbar-nav .nav-link {
            font-size: 15px;
            font-weight: 600;
            color: #10998B;
            margin: 0 15px;
            position: relative;
            align-items: end;

        }

        .navbar-nav .nav-item.active {
            font-weight: bold;
        }

        .navbar-nav .nav-item.active::after {
            content: "";
            /* display: block; */
            width: 100%;
            height: 2px;
            background-color: #1d7c46;
            margin-top: 3px;
        }

        .navbar-expand-lg .navbar-collapse {
            justify-content: center;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #10998B;
        }

        .navbar-brand {
            display: flex;
            justify-content: center;
            width: 20%;
        }
        @media (max-width: 1400px) {
            .navbar-nav {
                text-align: center;
            }
        }

        /* header {
            background: #f8f9fa;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        } */

        .content-wrapper {
            display: flex;
            flex: 1;
            transition: margin-left 0.3s ease-in-out;
        }

        .sidebar {
            /* width: 250px; */
            /* background: #343a40; */
            /* color: white; */
            /* padding: 20px; */
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease-in-out;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: #f1f1f1;
            transition: margin-left 0.3s ease-in-out;
        }

        .toggle-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .sidebar.hidden {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        .main-content.expanded {
            margin-left: 0px;
        }
        .line {
            background-color: #10998B29;
        }
        .logo {
            margin-right: 10px;
        }
        .sidebar {
            background-color: white;
            padding-top: 150px;
            border-right: 1px solid #079646;
            border-bottom: 1px solid #079646;
            border-top: 1px solid #079646;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
        .sidebar a {
            display: block;
            color: #333;
            text-decoration: none;
            margin: 5px 0;
            font-size: 13px;
            font-weight: 500 !important;
        }
        .sidebar-footer {
            position: sticky;
            background-color: white;
            bottom: 0;
            padding: 1px;
            z-index: 10;
            align-items: flex-end;
        }
      
        /* Sidebar transition effect */
        #sidebar {
            width: 220px;
            transition: width 0.3s ease;
            overflow: hidden;
            white-space: nowrap;
        }

        #sidebar.collapsed {
            width: 0;
        }

        #mainContent {
            transition: margin-left 0.3s ease;
            /* margin-left: 250px; */
        }

        #mainContent.expanded {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            #sidebar {
                width: 0;
                transition: width 0.3s ease;
                position: absolute;
                z-index: 10;
            }

            #sidebar.active {
                width: 200px; 
                /* z-index: 10; */
            }
            #mainContent {
                height: 800px;
            }
            
        }
        @media (min-width: 768px) {
            .bd-highlight{
                margin-top: 13px;
            }
        }
        .footer {
            background-color: #212529;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="#">
                <img src="{{asset('assets/image/users/logo2.svg')}}" class="d-inline-block align-top m-3" alt="logo"
                    class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-5 pr-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Turf <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Terms & Conditions <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            <div class="mr-4">
                <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle"
                    style="width: 40px; height: 40px; border: 2px solid #ccc;">

                <span class=" profilename ml-2" style="color:#10998B; font-size: 15px; font-weight:500;">Abhishek</span>

            </div>
        </nav>    
        
        <div class="line">
            <div class="row" style="height: 60px;">
                
                <div class="col-md-12" style="justify-items: baseline;">
                    
                    <div class="d-flex flex-row bd-highlight">
                        <button class="btn mt-2 ml-2 d-block d-md-none" id="toggleSidebar" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard">
                            <i class="bi bi-list menu" style="color: #000; font-size: 25px;"></i>
                        </button>
                        
                        <a class="nav-link mr-3 ml-3" href="#" style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Home <span class="sr-only">(current)</span></a>
                        <img class="mr-3" src="{{asset('assets/image/users/arrow.svg')}}" alt="profile">
                        <a class="nav-link" href="#" style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Terms & Conditions <span class="sr-only">(current)</span></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-wrapper">
            
            <div class="sidenav-menu sidebar" id="sidebar" style="height: auto;">
                <div data-simplebar class="flex-grow-1">
                    <ul class="side-nav" style="padding-bottom: 200px;">
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/element-3.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Dashboard</span>
                        </a>
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/calendar.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Booking</span>
                        </a>
                        <a href="{{route('users.matches')}}" class="pb-3 ml-3 active-link">
                            <img src="{{asset('assets/image/users/clock.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">My Matches</span>
                        </a>
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/wallet-remove.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Wallet</span>
                        </a>
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/Setting.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Split & Pay</span>
                        </a>
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/Setting2.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Settings</span>
                        </a>
                        <a href="#" class="pb-3 ml-3">
                            <img src="{{asset('assets/image/users/Setting1.svg')}}" alt="user">
                            <span class="menu-text text-dark ml-1">Refer & Earn</span>
                        </a>
                    </ul>
                </div>
                        
                <div class="sidebar-footer p-3" style="">
                    {{-- <hr class="hr"> --}}
                    <div class="side-nav-item d-flex align-items-center justify-content-between" >
                        <!-- Left: Profile Image -->
                        <div class="d-flex align-items-center">
                            <span class="menu-icon me-3">
                                <img src="{{asset('assets/image/Image.svg')}}" alt="profile" class="rounded-circle"
                                    style="width: 40px; height:40px; border: 2px solid #ccc;">
                            </span>
                        </div>

                        <!-- Right: Name, Profile Link, and Dots -->
                        <div class="footer-content d-flex flex-column flex-grow-1">
                            <span class="menu-text" style="font-size: 12px;">Abhishek Guleria</span>
                            <a href="" class="text-muted" style="font-size: 11px;">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content" id="mainContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            sdfghj
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            sdfghj
                        </div>
                        <div class="col-md-2">
                            sdfghj
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <footer class="footer" style="background-color: #333;">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-4 mx-auto mb-4">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle" style="width: 50px; height: 50px; border: 2px solid #ccc;">

                <span class="ml-2 text-white" style="
                        font-weight: 600 !important; 
                        letter-spacing: 2px;
                        font-family: 'Monda', sans-serif;
                        font-style: normal;
                        font-optical-sizing: auto;
                    ">SportsAstra</span>
                
                <p class="mt-3" style="font-size: 11px; color: #e0e0e0;">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, expedita?
                </p>
                <div class="">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">

                </div>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-white">
                    <h6 class="mb-4">Company</h6>
                    <div style="font-size: 11px;">
                        <p>
                            <a href="index.php" class="text-decoration-none" style="color: #e0e0e0;">Home</a>
                        </p>
                        <p>
                            <a href="about.html" class="text-decoration-none" style="color: #e0e0e0;">Features</a>
                        </p>
                        <p>
                            <a href="packages.html" class="text-decoration-none" style="color: #e0e0e0;">Reviews</a>
                        </p>
                        <p>
                            <a href="booking.php" class="text-decoration-none" style="color: #e0e0e0;">About us</a>
                        </p>
                        <p>
                            <a href="booking.php" class="text-decoration-none" style="color: #e0e0e0;">Contact us</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-white">
                    <h6 class="mb-4">Contact</h6>
                    <div style="font-size: 11px;">
                        <p>
                            <a href="#" class="fa fa-facebook text-decoration-none" style="color: #e0e0e0;">  00000000000  </a>
                        </p>
                        <p>
                            <a href="#" class="fa fa-twitter text-decoration-none" style="color: #e0e0e0;">  Features@gmail.com  </a>
                        </p>
                        <p>
                            <a href="#" class="fa fa-instagram text-decoration-none" style="color: #e0e0e0;">  abhiguleria@gmail.com  </a>
                        </p>
                        <p>
                            <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Address1  </a>
                            <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Address2  </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mb-md-0 mb-4 text-white">
                    <h6 class="mb-4">Get the Latest Information</h6>
                
                    <p>
                        <form class="form-inline d-flex flex-nowrap w-100">
                            <input class="form-control flex-grow-1" type="search" aria-label="Search" style="opacity: 0.4; border-top-left-radius: 7px; border-bottom-left-radius: 7px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                            <button class="btn btn-outline-success my-2 my-sm-0 p-4 d-flex align-items-center justify-content-center" type="submit" style="background-color: #fff; border: none; border-radius: 9px;"></button>
                        </form>                    
                    </p>
                </div>
            </div>
            <hr>
            <div  style="font-size: 12px;">
            <div class="row">
                <div class="col-6 ml-auto text-right">

                    <a href="#" class="fa fa-linkedin text-decoration-none " style="color: #e0e0e0;">  User Terms & Conditions |  </a>
                    <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Privacy Policy  </a>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("mainContent");
           
            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("expanded");
        });

    </script>
    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
    
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle("active"); // Expand sidebar on small screens
            } else {
                sidebar.classList.toggle("collapsed"); // Normal toggle for large screens
            }
        });
    </script>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</body>
</html>
