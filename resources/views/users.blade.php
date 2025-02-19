@include('adminlayouts.header')

    <style>
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
        /* Ensure modal is properly styled */
        .modal-demo {
            width: 400px !important;
            height: auto;
            padding: 20px;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            background: white;
            display: none;
        }
        .select2-container .select2-selection--single {
            height: 35px !important; /* Match input field height */
            display: flex !important;
            align-items: center !important; /* Align vertically */
            border: 1px solid #ced4da !important; /* Match input border */
            padding: 6px 12px !important; /* Match input padding */
            border-radius: 5px !important; /* Match input border radius */
        }

        .select2-container .select2-selection__arrow {
            height: 38px !important;
            top: 50% !important;
            transform: translateY(-50%) !important; /* Center the arrow */
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 30px !important; /* Adjust clear (×) icon */
            top: 50% !important;
            transform: translateY(-50%) !important; /* Center the clear icon */
        }

        .modal-demo {
            width: auto !important;
            max-height: 90vh; /* Ensures it doesn't exceed viewport height */
            border-radius: 15px;
            padding: 20px;
            overflow-y: auto;
            scrollbar-width: none; /* For Firefox */
            -ms-overflow-style: none; /* For Internet Explorer/Edge */
        }

        /* Hide scrollbar for WebKit browsers (Chrome, Safari) */
        .modal-demo::-webkit-scrollbar {
            display: none;
        }

        .app-topbar .topbar-menu {
            background-color: #F5F5F5;   
        }
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
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
        .hr {
            border-color: grey;
        }
        .custom-pagination {
            display: flex;
            flex-wrap: nowrap;  /* Prevents vertical stacking */
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            /* overflow-x: auto;  Enables horizontal scrolling if needed */
            white-space: nowrap;  /* Keeps buttons in one row */
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
                flex-wrap: nowrap;  /* Prevents stacking */
                overflow-x: auto;  /* Adds horizontal scrolling if needed */
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
        
        .modal-content {
            border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                height: 50%;
                width: 80%;
                line-height: 0px;
        }

        .table tbody tr td {
            vertical-align: middle;
            font-size: 14px;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .pagination .page-item .page-link {
            border-radius: 5px;
            color: #6c757d;
        }

        .pagination .page-item.active .page-link {
            background-color: #198754;
            border-color: #198754;
            color: white;
        }

    </style>

</head>
       
<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu" style="background-color: rgb(24, 24, 24);">
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
                            <span class="menu-icon"><img src="../../assets/image/bank.svg" alt="venues"></span>
                            <span class="menu-text mt-2"> Venues </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="bookings.html" class="side-nav-link">
                            <span class="menu-icon"><img src="../../assets/image/shopping-cart.svg" alt="bookings"></span>
                            <span class="menu-text mt-2"> Bookings </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="freeze.html" class="side-nav-link">
                            <span class="menu-icon"><img src="../../assets/image/sun.svg" alt="freeze"></span>
                            <span class="menu-text mt-2"> Freeze </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="transaction.html" class="side-nav-link">
                            <span class="menu-icon"><img src="../../assets/image/Transaction.svg" alt="transaction"></span>
                            <span class="menu-text mt-2"> Transactions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#sidebarPagesAuth" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                            <span class="menu-icon">
                                <img src="../../assets/image/clipboard-tick.svg" alt="configuration">
                            </span>
                            <span class="menu-text mt-2"> Configurations </span>
                            <img src="../../assets/image/Polygon 1.svg" alt="" class="dropdown-icon">
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
                            <span class="menu-icon"><img src="../../assets/image/ticket.svg" alt="coupons"></span>
                            <span class="menu-text mt-2"> Coupons Code </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="banner.html" class="side-nav-link">
                            <span class="menu-icon"><img src="../../assets/image/money-4.svg" alt="money"></span>
                            <span class="menu-text mt-2"> Banners </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="subscribers.html" class="side-nav-link">
                            <span class="menu-icon"><img src="../../assets/image/sms.svg" alt="sms"></span>
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
                            <span class="menu-icon"><img src="../../assets/image/Logout.svg" alt="logout"></span>
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
                                <img src="../../assets/image/Image.svg" alt="profile" class="rounded-circle" style="width: 35px; height: 35px; border: 2px solid #ccc;">
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
                    <button class="sidenav-toggle-button px-2" id="toggleSidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <!-- <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="mdi mdi-menu font-22"></i>
                    </button> -->


                    <h5 class="m-3">Hello, Abhi</h5>
                        <img src="../../assets/image/chevrons-right.svg" alt="image" >
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
                                <img src="../../assets/image/Group 2.svg" alt="dashboard" class="notification-icon">
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
        <!-- Topbar End -->
        <div class="page-content">
    
            <div class="page-container" style="background-color: transparent;">
    
                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>User</strong></h2>
                        </div>
                        <a href="#add" class="add-transaction waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                            <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Users</h2>
                        </a>

                        <!-- Custom Theme Modal for Add Transaction -->
                        <div id="add" class="modal-demo" style="width: 380px !important; height: 650px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                            <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                <h4 class="add-title">
                                    Add User
                                </h4>
                                <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="add-text ml-2" style="font-size: small;">
                                <div class="container-fluid">
                                    <!-- Date Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Name</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-muted mt-2" name="name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Amount Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Email</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="email" class="form-control text-muted mt-2" name="email" placeholder="email2@mail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Mobile No.</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-muted mt-2" name="mobileno" placeholder="1234567890">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Transaction Type Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Type</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control select2" data-toggle="select2" name="type" id="type">
                                                    <option value="User">User</option>
                                                    <option value="Vender">Vender</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Balance</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-muted mt-2" name="balance" placeholder="400">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Footer with Save Button -->
                                <div class="modal-footer justify-content-start mb-3" style="border: none;">
                                    <button type="button" class="btn btn-success col-md-5 ml-3">Save</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2">
                                    <table id="responsive-datatable" id="walletTable"  class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-start">Mobile No.</th>
                                                <th>Type</th>
                                                <th>Balance</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="nameSearch" class="form-control" placeholder="Name" style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="emailSearch" class="form-control" placeholder="Email" style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="mobileSearch" class="form-control" placeholder="Mob. No." style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="typeSearch" class="form-control" placeholder="Type" style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="balanceSearch" class="form-control" placeholder="Balance" style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-info" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">User</span></h4></td>
                                                <td style="color: green;">₹400</td>
    
                                                <td>
                                                    <a href="#walletModal" class="open-wallet waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                        <img src="../../assets/image/empty-wallet.svg" alt="dashboard"  style="cursor: pointer;">
                                                    </a>
                                                    
                                                    <!-- Theme Modal for Wallet -->
                                                    <div id="walletModal" class="modal-demo modal-lg" style="width: 400px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px; display: none;">
                                                         <!-- Modal Header -->
                                                        <div class="d-flex p-3 align-items-center justify-content-between">
                                                            <h4 class="fw-bold">Wallet</h4>
                                                            <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                    
                                                        <!-- Available Balance -->
                                                        <div class="text-muted px-3 pb-3 mb-2" style="font-size: 12px;">Available Balance: <span class="fw-bold">₹1000</span></div>
                                                    
                                                        <!-- Transaction History Table -->
                                                        <div class="modal-body">
                                                            <table class="table table-borderless text-center">
                                                                <thead>
                                                                    <tr style="font-weight: 400; font-size: 13px; color: #9da7b1;">
                                                                        <th class="text-start">User Name</th>
                                                                        <th>Booking Date</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="transactionTable" style="color: grey; font-weight: 400; font-size: 10px;">
                                                                    <!-- Data will be inserted dynamically here -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    
                                                        <!-- Pagination -->
                                                        <div class="modal-footer border-0 justify-content-center">
                                                            <nav>
                                                                <ul class="pagination pagination-sm" id="pagination">
                                                                    <!-- Dynamic Pagination Buttons Here -->
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                    
                                                     | 
                                                    <!-- Button to Open Modal -->
                                                    <button class="open-modal" data-id="1" style="border: none; background: none;">
                                                        <img src="../../assets/image/edit.svg" alt="dashboard" style="cursor: pointer;">
                                                    </button>
                                                    
                                                    <!-- Custom Modal -->
                                                    <div id="customModal" style="
                                                    display: none;
                                                    position: fixed;
                                                    top: 50%;
                                                    left: 50%;
                                                    transform: translate(-50%, -50%);
                                                    width: 400px;
                                                    background: #fff;
                                                    padding: 25px;
                                                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                                                    border-radius: 13px;
                                                    z-index: 1000;
                                                    font-size: 13px;
                                                    padding: 40px;
                                                    ">
                                                    <!-- Modal Header -->
                                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                                        <h4 style="font-weight: bold; margin: 0;">Edit</h4>
                                                        <button type="button" class="btn-close close-modal"></button>
                                                    </div>
                                                    
                                                    <!-- Modal Body -->
                                                    <div class="modal-body" style="margin-top: 15px;">
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">User Name</label>
                                                            <input type="text" class="form-control" name="username" placeholder="Abhishek Guleria">
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Mob. No.</label>
                                                            <input type="text" class="form-control" name="mobileno" placeholder="9876543210">
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Email</label>
                                                            <input type="email" class="form-control" name="email" placeholder="abhiguleria1599@gmail.com">
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Role</label>
                                                            <select id="userRole" class="form-control select2">
                                                                <option value="user" selected>User</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Balance</label>
                                                            <input type="text" class="form-control" name="balance" placeholder="N/A">
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer justify-content-start mt-4" style="margin-top: 10px; text-align: center;">
                                                        <button class="btn btn-success close-modal col-5">Save</button>
                                                    </div>
                                                    </div>                                  
                                             
                                                     | <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000002 </td>
                                                <td>abhishguleri15@gmail.com</td>
                                                <td class="text-start">1234567891</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000003 </td>
                                                <td>abhiguleri1@gmail.com</td>
                                                <td class="text-start">1234567892</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>abhishguleri1555@gmail.com</td>
                                                <td class="text-start">1234567890</td>
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                <td style="color: green;">₹400</td>
                                                <td>
                                                    <img src="../../assets/image/empty-wallet.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/edit.svg" alt="dashboard"> |
                                                    <img src="../../assets/image/trash.svg" alt="dashboard">
                                                </td>
                                            </tr>
                                        </tbody>
    
                                    </table>
                                </div>
                    
                                <!-- Custom Pagination -->
                                <nav>
                                    <ul class="pagination custom-pagination mb-0">
                                        <!-- Custom pagination links will be inserted here by JS -->
                                    </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

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




        $(document).ready(function () {
            var table = $('#responsive-datatable').DataTable({
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": false,
                "pageLength": 10,
                "lengthChange": false,
                "dom": 'rt',
            });

            function createCustomPagination() {
                var totalPages = table.page.info().pages;
                var currentPage = table.page.info().page;
                var pagination = $('.custom-pagination');
                pagination.empty();

                // Previous Button
                pagination.append('<li class="page-item ' + (currentPage === 0 ? 'disabled' : '') + '"><a class="page-link prev-page" href="javascript:void(0);">&lt;</a></li>');

                // Always Show First Page
                pagination.append('<li class="page-item ' + (currentPage === 0 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="0">1</a></li>');

                if (totalPages > 3) {
                    if (currentPage > 1) {
                        pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                    }

                    // Show two pages around the current page
                    for (var i = Math.max(1, currentPage - 1); i <= Math.min(totalPages - 2, currentPage + 1); i++) {
                        pagination.append('<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + i + '">' + (i + 1) + '</a></li>');
                    }

                    if (currentPage < totalPages - 2) {
                        pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                    }
                }

                // Always Show Last Page
                pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + (totalPages - 1) + '">' + totalPages + '</a></li>');

                // Next Button
                pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'disabled' : '') + '"><a class="page-link next-page" href="javascript:void(0);">&gt;</a></li>');
            }

            // Pagination Click Events
            $(document).on('click', '.page-num', function () {
                var pageNum = $(this).data('page');
                table.page(pageNum).draw(false);
                createCustomPagination();
            });

            $(document).on('click', '.prev-page', function () {
                var currentPage = table.page.info().page;
                if (currentPage > 0) {
                    table.page(currentPage - 1).draw(false);
                    createCustomPagination();
                }
            });

            $(document).on('click', '.next-page', function () {
                var currentPage = table.page.info().page;
                var totalPages = table.page.info().pages;
                if (currentPage < totalPages - 1) {
                    table.page(currentPage + 1).draw(false);
                    createCustomPagination();
                }
            });

            // Initialize Pagination
            createCustomPagination();
        });

        $('#nameSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });

        $('#emailSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#mobileSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#typeSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });

        $('#balanceSearch').on('keyup', function () {
            table.column(4).search(this.value).draw();
        });
        
        


        $(document).ready(function () {
            // Sample transaction data (Can be fetched from an API)
            let transactions = [
                { id: "#000001", date: "23 Dec. 2023", amount: "+400", type: "success" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" }
            ];
    
            let rowsPerPage = 5;  // Number of rows per page
            let currentPage = 1;   // Current page number
    
            function displayTransactions(page) {
                let start = (page - 1) * rowsPerPage;
                let end = start + rowsPerPage;
                let paginatedItems = transactions.slice(start, end);
    
                $("#transactionTable").html(""); // Clear previous data
                $.each(paginatedItems, function (index, transaction) {
                    $("#transactionTable").append(`
                        <tr>
                            <td class="text-start">${transaction.id}</td>
                            <td>${transaction.date}</td>
                            <td class="text-${transaction.type} fw-bold">${transaction.amount}</td>
                        </tr>
                    `);
                });
            }
    
            function setupPagination() {
                let totalPages = Math.ceil(transactions.length / rowsPerPage);
                $("#pagination").html(""); // Clear previous pagination
    
                // Previous Button
                $("#pagination").append(`
                    <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">‹</a>
                    </li>
                `);
    
                // Page Numbers
                for (let i = 1; i <= totalPages; i++) {
                    $("#pagination").append(`
                        <li class="page-item ${i === currentPage ? "active" : ""}">
                            <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                        </li>
                    `);
                }
    
                // Next Button
                $("#pagination").append(`
                    <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">›</a>
                    </li>
                `);
            }
    
            window.changePage = function (page) {
                if (page < 1 || page > Math.ceil(transactions.length / rowsPerPage)) return;
                currentPage = page;
                displayTransactions(currentPage);
                setupPagination();
            };
    
            // Initialize the modal with the first page
            displayTransactions(currentPage);
            setupPagination();
        });




        $(document).ready(function() {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function() {
                setTimeout(function() {
                    $('#role').select2({
                        placeholder: "Select Role",
                        allowClear: true,
                        dropdownParent: $('#editModal') // Fix Select2 inside modal
                    });
                }, 100);
            });
        });



        $(document).ready(function () {
            $(document).on("click", ".open-wallet", function (e) {
                e.preventDefault();

                // Check if screen width is less than 768px (mobile devices)
                if ($(window).width() < 768) {
                    // Open Modal using Custombox
                    new Custombox.modal({
                        content: {
                            effect: "blur",
                            target: "#walletModal"
                        }
                    }).open();
                }
            });

            // Close Modal
            $(document).on("click", ".btn-close", function () {
                Custombox.modal.close();
            });
        });

        
        // $(document).ready(function () {
        //     // Handle Modal Click
        //     $(document).on("click", ".edit-users", function (e) {
        //         e.preventDefault();

        //         // Open Modal using Custombox
        //         new Custombox.modal({
        //             content: {
        //                 effect: "blur",
        //                 target: "#editModal"
        //             }
        //         }).open();
        //     });

        //     // Close Modal
        //     $(document).on("click", ".btn-close", function () {
        //         Custombox.modal.close();
        //     });
        // });


        $(document).ready(function () {
            // Initialize Select2
            $(".select2").select2({
                dropdownParent: $("#customModal") // Fix for dropdown behind modal
            });

            // Open Custombox Modal
            $(document).on("click", ".open-modal", function () {
                var userRole = $(this).data("role");
                $("#userRole").val(userRole).trigger("change"); // Set selected role
                
                new Custombox.modal({
                    content: {
                        effect: "blur",
                        target: "#customModal"
                    }
                }).open();
            });

            // Close Modal
            $(document).on("click", ".close-modal", function () {
                Custombox.modal.close();
            });
        });



        $(document).ready(function() {
           // Initialize Select2 when modal opens
           $(document).on('click', '[data-plugin="custommodal"]', function() {
               setTimeout(function() {
                   $('#type ').select2({
                       placeholder: "Select Type",
                       allowClear: true,
                       dropdownParent: $('#add') // Fix Select2 inside modal
                   });
                }, 100);
            });
        });


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris.js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="assets/js/pages/dashboard-sales.js"></script>

    <script src="assets/libs/datatables.net/js/dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatables init -->
    <script src="assets/js/pages/table-datatable.js"></script>


</body>
<!-- Mirrored from coderthemes.com/uplon/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jan 2025 10:56:29 GMT -->
</html>