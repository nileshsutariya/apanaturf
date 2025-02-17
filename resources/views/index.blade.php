<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" data-layout="topnav"> -->


<!-- Mirrored from coderthemes.com/uplon/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jan 2025 10:56:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Uplon - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Vendor css -->
    <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-content {
            overflow: hidden;
            white-space: nowrap; 
        }
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-dot {
            overflow: hidden;
        }

        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .side-nav .side-nav-item .side-nav-link {
            -webkit-transition: none !important;
            transition: none !important;
            border-radius: 0 !important;
            padding: 7px !important;
            background-color: rgb(24, 24, 24);
        }
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 500 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
        }
        .sidebar-footer {
            position: sticky;
            bottom: 0;
            background: rgb(24, 24, 24);
            color: white;
            text-align: center;
            padding: 1px;
            width: 100%;
            z-index: 10; 
        }

        .content {
            margin-left: 0;
            transition: 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }
        .app-topbar .topbar-menu {
            background-color: #F5F5F5;   
        }
        .side-nav{
            height: 30px;
            padding-top: 70px;
        }
        .side-nav .side-nav-item .side-nav-link {
            font-size: 12px; 
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            color: rgb(197, 193, 193);
            letter-spacing: 0.9px;
            padding: 7px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-icon {
            height: 20px;
            width: 20px;
            font-size: 10px;
            padding-left: 30px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-text {
            padding-left: 20px;
        }
        .app-topbar .app-search .form-control {
            height: 35px;
            /* width: 200px; */
            border-radius: 10px 0 0 10px;
            background-color: white;
            box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);
        }
        .app-topbar .app-search .btn-icon {
            height: 35px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 0 10px 10px 0;
            background-color: white;
        }
        .notification-icon {
            height: 20px;
        }
        .page-title-box {
            background-color: #F5F5F5;
        }
        .page-title-box {
            padding: 20px 24px;
            margin: 0 -24px 24px -24px;
            /* background-color: var(--bs-secondary-bg); */
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: rgb(0, 128, 117);
            border-color: rgb(0, 128, 117);
        }

        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .side-nav .side-nav-item .side-nav-link {
            -webkit-transition: none !important;
            transition: none !important;
            border-radius: 0 !important;
            padding: 7px !important;
        }
        .hr {
            border-color: grey;
        }
        .chart-container {
            width: 96%;
            max-width: 900px;
            background: white;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 50px;
            padding-bottom: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>
</head>
       
<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu" id="sidebar" style="background-color: rgb(24, 24, 24);">
            <div data-simplebar>

                <!--- Sidenav Menu -->
                <ul class="side-nav">
                    <!-- <li cla'ss="side-nav-title">Navigation</li> -->

                    <li class="side-nav-item">
                        <a href="index.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/element-3.svg')}}" alt="dashboard"></span>
                            <span class="menu-text mt-2"> Dashboard </span>
                            <!-- <span class="badge bg-success rounded-pill">5</span> -->
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="users.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/profile.svg')}}" alt="user"></span>
                            <span class="menu-text mt-2"> User </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="venues.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/bank.svg')}}" alt="venues"></span>
                            <span class="menu-text mt-2"> Venues </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="bookings.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/shopping-cart.svg')}}" alt="bookings"></span>
                            <span class="menu-text mt-2"> Bookings </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="freeze.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/sun.svg')}}" alt="freeze"></span>
                            <span class="menu-text mt-2"> Freeze </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="transaction.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/Transaction.svg')}}" alt="transaction"></span>
                            <span class="menu-text mt-2"> Transactions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#sidebarPagesAuth" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                            <span class="menu-icon">
                                <img src="{{asset('assets/image/clipboard-tick.svg')}}" alt="configuration">
                            </span>
                            <span class="menu-text mt-2"> Configurations </span>
                            <img src="{{asset('assets/image/Polygon 1.svg')}}" alt="" class="dropdown-icon">
                        </a>
                        <div class="collapse" id="sidebarPagesAuth">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="sports.html" class="side-nav-link">
                                        <span class="menu-text"> Sports </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="amenities.html" class="side-nav-link">
                                        <span class="menu-text"> Amenities </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="financialyear.html" class="side-nav-link">
                                        <span class="menu-text"> Financial Year </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="side-nav-item">
                        <a href="couponscode.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/ticket.svg')}}" alt="coupons"></span>
                            <span class="menu-text mt-2"> Coupons Code </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="banner.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/money-4.svg')}}" alt="money"></span>
                            <span class="menu-text mt-2"> Banners </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="subscribers.html" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/sms.svg')}}" alt="sms"></span>
                            <span class="menu-text mt-2"> Subscribers </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="enquiries.html" class="side-nav-link">
                            <span class="menu-icon"><i class="bi bi-info-circle"></i></span>
                            <span class="menu-text mt-2"> Enquiries </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link mt-5 mb-5">
                            <span class="menu-icon"><img src="{{asset('assets/image/Logout.svg')}}" alt="logout"></span>
                            <span class="menu-text"> Logout </span>
                        </a>
                    </li>
                    
                </ul>
                
                
                <div class="clearfix"></div>
                
            </div>
            <!-- <div class="sidebar"> -->
                <div class="sidebar-footer p-3">
                    <hr class="hr">
                    <div class="side-nav-item d-flex align-items-center justify-content-between">
                        <!-- Left: Profile Image -->
                        <div class="d-flex align-items-center">
                            <span class="menu-icon me-2">
                                <img src="{{asset('assets/image/Image.svg')}}" alt="profile" class="rounded-circle" style="width: 35px; height: 35px; border: 2px solid #ccc;">
                            </span>
                        </div>
                
                        <!-- Right: Name, Profile Link, and Dots -->
                        <div class="footer-content d-flex flex-column flex-grow-1">
                            <span class="menu-text text-white" style="font-size: 14px;">Abhishek Guleria</span>
                            <a href="profile.html" class="text-muted" style="font-size: 11px;">View Profile</a>
                        </div>
                        <div class="footer-dot text-white" style="font-size: 20px;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                
                    </div>
                </div>
                
            <!-- </div>  -->
        </div>
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="topbar-menu">
                <div class="d-flex align-items-center gap-2">

                    <!-- Brand Logo -->
                    <!-- <a href="index.html" class="logo">
                        <span class="logo-light">
                            <span class="logo-lg"><img src="assets/images/logo-light.png" alt="logo"></span>
                            <span class="logo-sm"><img src="assets/images/logo-sm-light.png" alt="small logo"></span>
                        </span>

                        <span class="logo-dark">
                            <span class="logo-lg"><img src="assets/images/logo-dark.png" alt="dark logo"></span>
                            <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                        </span>
                    </a> -->


                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2" id="toggleBtn">
                        <i class="mdi mdi-menu font-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <!-- <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="mdi mdi-menu font-22"></i>
                    </button> -->


                    <h5 class="m-3">Hello, Abhi</h5>
                        <img src="{{asset('assets/image/chevrons-right.svg')}}" alt="image" >
                    <h6 class="mt-2" style="color: #99a1a8;"> Feb 01, 2025</h6>
                    <!-- Mega Menu Dropdown -->
                    <div class="topbar-item d-none d-md-flex">
                        <div class="dropdown">
                            <!-- <a href="#" class="topbar-link btn btn-link px-2 dropdown-toggle drop-arrow-none fw-medium" data-bs-toggle="dropdown" data-bs-offset="0,17" aria-haspopup="false" aria-expanded="false">
                                Pages <i class="mdi mdi-chevron-down ms-1"></i>
                            </a> -->

                            <!-- .dropdown-menu-->
                        </div> <!-- .dropdown-->
                    </div> <!-- end topbar-item -->
                </div>

                <div class="d-flex align-items-center gap-2">
                    <!-- Light/Dark Toggle Button  -->
                    
                    <!-- Language Dropdown -->
                    

                    <!-- Notification Dropdown -->
                    <div class="topbar-item">
                        <div class="dropdown position-relative">
                            <button class="topbar-link dropdown-toggle drop-arrow-none notification" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/image/Group 2.svg')}}" alt="dashboard" class="notification-icon">
                                <!-- <span class="noti-icon-badge"></span> -->
                            </button>

                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">

                                <div class="position-relative z-2" style="max-height: 300px;" data-simplebar>

                
                                    <!-- item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap mb-5" id="notification-5">
                                        <span class="d-flex align-items-center">
                                            <span class="me-3 position-relative flex-shrink-0">
                                                <div class="avatar avatar-md">
                                                    <span class="avatar-title bg-info rounded-circle">
                                                        <i class="mdi mdi-bell-outline font-20"></i>
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="flex-grow-1 text-muted">
                                                <p class="fw-medium mb-0 text-dark">Updates</p>
                                                <span class="font-12">There are 2 new updates available</span>
                                            </span>
                                            <span class="notification-item-close">
                                                <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                                    <i class="mdi mdi-close font-16"></i>
                                                </button>
                                            </span>
                                        </span>
                                    </div>
                                </div>


                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notification-item position-fixed z-2 bottom-0 text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Email Dropdown -->
                    
                    <div class="d-none d-md-flex">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append" style="box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);">
                                        <button class="btn btn-icon" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <!-- <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h6 class="my-0">Alex M.</h6>
                                </span>
                                <i class="mdi mdi-chevron-down d-none d-lg-block align-middle ms-2"></i>
                            </a> -->
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-header bg-primary mt-n3 rounded-top-2">
                                    <h6 class="text-overflow text-white m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-cog"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Button Trigger Customizer Offcanvas -->
                    <!-- <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                            <i class="mdi mdi-cog-outline font-22"></i>
                        </button>
                    </div> -->
                </div>
            </div>
        </header>
        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <div class="page-container" style="background-color: transparent;">

                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3 mb-4"><strong>Dashboard</strong></h2>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted mt-0" style="font-size: 11px;">Total Users</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group1.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted mt-0" style="font-size: 11px;">Total Vender</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group2.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted mt-0" style="font-size: 11px;">Total Turf</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group3.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted mt-0" style="font-size: 11px;">Total Venue</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group4.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted mt-0" style="font-size: 11px;">Total Spot</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group5.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="text-muted m-0" style="font-size: 11px;">Total Balance</h6>
                                            <h3 data-plugin="counterup" style="font-size: 20px;">200</h3>
                                        </div>
                                        <div class="col-3">
                                            <img src="{{asset('assets/image/Group6.svg')}}" alt="dashboard" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="chart-container">
                                <div class="mb-4" style="font-size: 13px; font-weight: 500;">Total Users</div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 pl-4">
                            <h5 class="mt-3 ml-3">Top Vender</h5>
                            <table class="table" style="border-color: black; width: 80%;">
                                <thead>
                                    <!-- <tr style="font-size: 12px;">
                                        <th class="text-muted" scope="col">#1</th>
                                        <th scope="col">Name1</th>
                                        <th class="text-muted" scope="col">₹100110</th>
                                    </tr> -->
                                </thead>
                                <tbody>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td class="text-muted" scope="row">#1</td>
                                        <td>Name1</td>
                                        <td class="text-muted">₹100110</td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

    <script>
        
        $(document).ready(function () {
            // Get the current page URL (excluding query params)
            var currentUrl = window.location.pathname.split("/").pop();
    
            // Loop through sidebar links
            $(".side-nav-link").each(function () {
                var linkUrl = $(this).attr("href");
    
                // If the href matches the current page, add 'active' class
                if (linkUrl === currentUrl) {
                    $(this).addClass("active");
    
                    // Optional: Add active class to the parent <li> for better styling
                    $(this).closest(".side-nav-item").addClass("active");
                }
            });
        });

        // $(document).ready(function() {
        //     $(".side-nav-link").click(function(e) {
        //         e.preventDefault();
        //         var target = $(this).attr("href");
                
        //         if ($(target).hasClass("show")) {
        //             $(target).removeClass("show"); // Close if open
        //         } else {
        //             $(".collapse").removeClass("show"); // Close all dropdowns
        //             $(target).addClass("show"); // Open the clicked dropdown
        //         }
        //     });
        // });

        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('myChart').getContext('2d');
    
            // Create a gradient for the chart background
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, "rgba(66, 135, 245, 0.2)"); // Softer blue
            gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
            
            const labels = ["20", "21", "22", "23", "24", "25", "26", "27", "28", "29"];
            const bookedData = [100, 120, 115, 110, 105, 100, 95, 110, 130, 125];
            const availableData = [80, 70, 65, 75, 85, 90, 95, 85, 70, 75];
    
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Users',
                        data: bookedData,
                        borderColor: '#f5b400',
                        backgroundColor: gradient,
                        borderWidth: 2,
                        pointBackgroundColor: '#f5f5f5',
                        pointRadius: 4,
                        tension: 0.4,  // Smooth curves
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            backgroundColor: '#333',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            displayColors: false,
                            callbacks: {
                                label: function (tooltipItem) {
                                    const index = tooltipItem.dataIndex;
                                    return `Booked: ${bookedData[index]} \nAvailable: ${availableData[index]}`;
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: true,  // Show vertical grid lines
                                color: "rgba(200, 200, 200, 0.5)",  // Light vertical grid lines
                            }
                        },
                        y: {
                            grid: {
                                display: false  // Hide horizontal grid lines
                            },
                            min: 0,
                            max: 200
                        }
                    }
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="{{asset('assets/js/pages/dashboard-sales.js')}}"></script>

    <script src="{{asset('assets/libs/datatables.net/js/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>

    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>

    <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>

    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>

    <script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Datatables init -->
    <script src="{{asset('assets/js/pages/table-datatable.js')}}"></script>


</body>
<!-- Mirrored from coderthemes.com/uplon/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jan 2025 10:56:29 GMT -->
</html>