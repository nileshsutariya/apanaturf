<div>
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
                <h6 id="currentDate" class="mt-2" style="color: #99a1a8;"></h6>
                <!-- Mega Menu Dropdown -->
                <div class="topbar-item d-none d-md-flex">
                    <div class="dropdown">
                        <!-- <a href="#" class="topbar-link btn btn-link px-2 dropdown-toggle drop-arrow-none fw-medium" data-bs-toggle="dropdown" data-bs-offset="0,17" aria-haspopup="false" aria-expanded="false">
                            Pages <i class="mdi mdi-chevron-down ms-1"></i>
                        </a> -->

                    </div>
                </div> 
            </div>

            <div class="d-flex align-items-center gap-2">
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
                                        </span> <
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
</div>