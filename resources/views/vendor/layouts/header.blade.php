<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Uplon - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.5/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/custombox/4.0.3/custombox.min.css" />

    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

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
            padding-top: 25px;
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
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);
        }

        /* .app-topbar .app-search .btn-icon {
            height: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: white;
        } */

        .notification-icon {
            height: 20px;
        }

        .page-title-box {
            background-color: #F5F5F5;
        }

        .custom-pagination {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            float: left;
            white-space: nowrap;
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

        @media (max-width: 480px) {
            .custom-pagination {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding: 5px 0;
            }

            .custom-pagination .page-link {
                padding: 4px 6px;
                font-size: 10px;
            }
        }

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
    <div class="wrapper">
        <div class="sidenav-menu" id="sidebar" style="background-color: rgb(24, 24, 24);">
            <div data-simplebar>
                <img src="{{asset('assets/image/logo/Apna-Turf.png')}}" height="60" class="d-inline-block align-top mt-3" style="margin-left: 90px;" alt="">

                <ul class="side-nav">
                    <li class="side-nav-item">
                        <a href="{{route('vendor.dashboard')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/element-3.svg')}}"
                                    alt="dashboard"></span>
                            <span class="menu-text mt-2"> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('booking.index')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/calendar.svg')}}"
                                    alt="bookings"></span>
                            <span class="menu-text mt-2"> Bookings </span>
                        </a>
                    </li>
                    
                    <li class="side-nav-item">
                        <a href="{{route('request.index')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/bell.svg')}}"
                            alt="transaction"></span>
                            <span class="menu-text mt-2"> Request </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/wallet-remove.svg')}}"
                            alt="transaction"></span>
                            <span class="menu-text mt-2"> Payment </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/Transaction.svg')}}"
                            alt="transaction"></span>
                            <span class="menu-text mt-2"> Transactions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('offers.index')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/ticket.svg')}}"
                                    alt="coupons"></span>
                            <span class="menu-text mt-2">Coupons & Offers</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('ground.index')}}" class="side-nav-link">
                            <span class="menu-icon"><img src="{{asset('assets/image/client/ticket.svg')}}"
                                    alt="coupons"></span>
                            <span class="menu-text mt-2">Ground</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <form action="{{ route('vendor.logout') }}" method="POST" id="logoutForm" style="display: inline;">
                            @csrf
                            <button type="submit" class="side-nav-link mb-5" style="margin-top: 70px; border: none; background: none; padding: 0; cursor: pointer; width: 100%; text-align: left;">
                                <span class="menu-icon">
                                    <img src="{{ asset('assets/image/client/Logout.svg') }}" alt="logout">
                                </span>
                                <span class="menu-text"> Logout </span>
                            </button>
                        </form>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>
            <div class="sidebar-footer p-3">
                <hr class="hr">
                <div class="side-nav-item d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <span class="menu-icon me-2">
                            <img src="{{asset('assets/image/client/Image.svg')}}" alt="profile" class="rounded-circle"
                                style="width: 35px; height: 35px; border: 2px solid #ccc;">
                        </span>
                    </div>

                    <div class="footer-content d-flex flex-column flex-grow-1 ml-2" style="text-align: left !important;">
                        <span class="menu-text text-white" style="font-size: 14px;">{{ ucfirst(auth('vendor')->user()->owner_name)}}</span>

                        <a href="{{route('profile.index.vendor')}}" class="text-muted" style="font-size: 11px;">View Profile</a>
                    </div>
                    <div class="footer-dot text-white" style="font-size: 20px;">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>

                </div>
            </div>
        </div>

        <header class="app-topbar">
            <div class="topbar-menu">
                <div class="d-flex align-items-center gap-2">

                    <button class="sidenav-toggle-button px-2" id="toggleBtn">
                        <i class="mdi mdi-menu font-24"></i>
                    </button>

                    <h5 class="m-3">Hello, {{ ucfirst(auth('vendor')->user()->owner_name) }}</h5>
                    <img src="{{ asset('assets/image/client/chevrons-right.svg') }}" alt="image">
                    <h6 id="currentDate" class="mt-2" style="color: #99a1a8;"></h6>
                    <div class="topbar-item d-none d-md-flex">
                        <div class="dropdown">
                    
                        </div> 
                    </div> 
                </div>

                <div class="d-flex align-items-center gap-2">
        
                    <div class="topbar-item">
                        <div class="dropdown position-relative">
                            <button class="topbar-link dropdown-toggle drop-arrow-none notification"
                                data-bs-toggle="dropdown" data-bs-offset="0,25" type="button"
                                data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/image/client/Group 2.svg')}}" alt="dashboard"
                                    class="notification-icon">
                            </button>

                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"
                                style="min-height: 300px;">

                                <div class="position-relative z-2" style="max-height: 300px;" data-simplebar>

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


                                <a href="javascript:void(0);"
                                    class="dropdown-item notification-item position-fixed z-2 bottom-0 text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-md-flex">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." style="border-radius: 10px !important; padding-right: 36px;">
                                </div>
                                <i class="fas fa-search" 
                                   style="margin-bottom: 5px !important; position: absolute; right: 11px; top: 27px; z-index: 10;">
                                </i>
                            </div>
                        </form>
                    </div>
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-header bg-primary mt-n3 rounded-top-2">
                                    <h6 class="text-overflow text-white m-0">Welcome !</h6>
                                </div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span>Profile</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-cog"></i>
                                    <span>Settings</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="page-content">

            <div class="page-container" style="background-color: transparent;">