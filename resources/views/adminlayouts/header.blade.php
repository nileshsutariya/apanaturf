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
    <link rel="stylesheet"
        href="{{asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}">

    <!-- App favicon -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        body {
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 500 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
        }
        .content {
            margin-left: 0;
            transition: 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-content {
            overflow: hidden;
            white-space: nowrap;
        }

        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-dot {
            overflow: hidden;
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

        .app-topbar .topbar-menu {
            background-color: #F5F5F5;
        }

        .side-nav {
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

        .custom-pagination {
            display: flex;
            flex-wrap: nowrap;
            /* Prevents vertical stacking */
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            float: left;

            /* overflow-x: auto;  Enables horizontal scrolling if needed */
            white-space: nowrap;
            /* Keeps buttons in one row */
        }

        .custom-pagination .page-item {
            display: inline-block;
        }

        .custom-pagination .page-link {
            padding: 6px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: rgb(0, 128, 96);
            color: white;
            font-weight: bold;
        }

        .custom-pagination .page-link:hover {
            background-color: #f8f9fa;
            border-color: #bbb;
        }

        /* POS Terminal & Small Mobile Screens (Fix Vertical Issue) */
        @media (max-width: 480px) {
            .custom-pagination {
                flex-wrap: nowrap;
                /* Prevents stacking */
                overflow-x: auto;
                /* Adds horizontal scrolling if needed */
                padding: 5px 0;
            }

            .custom-pagination .page-link {
                padding: 4px 6px;
                font-size: 10px;
            }
        }

        /* Mobile Phones (Fix Vertical Issue) */
        @media (max-width: 767px) {
            .custom-pagination {
                flex-wrap: nowrap;
                overflow-x: auto;
            }

            .custom-pagination .page-link {
                padding: 5px 8px;
                font-size: 12px;
            }
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
                        <a href="{{route('admin.index')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/element-3.svg')}}"
                                    alt="dashboard"></span>
                            <span class="menu-text mt-2"> Dashboard </span>
                            <!-- <span class="badge bg-success rounded-pill">5</span> -->
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('admin.users')}}" class="side-nav-link">
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
                            <span class="menu-icon"><img src="{{asset('assets/image/shopping-cart.svg')}}"
                                    alt="bookings"></span>
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
                            <span class="menu-icon"><img src="{{asset('assets/image/Transaction.svg')}}"
                                    alt="transaction"></span>
                            <span class="menu-text mt-2"> Transactions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#sidebarPagesAuth" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarPagesAuth" class="side-nav-link">
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
                            <span class="menu-icon"><img src="{{asset('assets/image/ticket.svg')}}"
                                    alt="coupons"></span>
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
                            <img src="{{asset('assets/image/Image.svg')}}" alt="profile" class="rounded-circle"
                                style="width: 35px; height: 35px; border: 2px solid #ccc;">
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
                    <img src="{{ asset('assets/image/chevrons-right.svg') }}" alt="image">
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
                            <button class="topbar-link dropdown-toggle drop-arrow-none notification"
                                data-bs-toggle="dropdown" data-bs-offset="0,25" type="button"
                                data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/image/Group 2.svg')}}" alt="dashboard"
                                    class="notification-icon">
                                <!-- <span class="noti-icon-badge"></span> -->
                            </button>

                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"
                                style="min-height: 300px;">

                                <div class="position-relative z-2" style="max-height: 300px;" data-simplebar>


                                    <!-- item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap mb-5"
                                        id="notification-5">
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
                                                <button type="button"
                                                    class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"
                                                    data-dismissible="#notification-1">
                                                    <i class="mdi mdi-close font-16"></i>
                                                </button>
                                            </span>
                                        </span>
                                    </div>
                                </div>


                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item notification-item position-fixed z-2 bottom-0 text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
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
                                    <div class="input-group-append"
                                        style="box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);">
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