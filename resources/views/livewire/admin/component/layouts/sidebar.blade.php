<div>
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
                    <a href="{{route('admin.customer')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/profile.svg')}}" alt="user"></span>
                        <span class="menu-text mt-2"> Customer </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.venues')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/bank.svg')}}" alt="venues"></span>
                        <span class="menu-text mt-2"> Venues </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.enquiries')}}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-info-circle"></i></span>
                        <span class="menu-text mt-2"> Venues Approval</span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.bookings')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/shopping-cart.svg')}}"
                                alt="bookings"></span>
                        <span class="menu-text mt-2"> Bookings </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.freeze')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/sun.svg')}}" alt="freeze"></span>
                        <span class="menu-text mt-2"> Freeze </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.transaction')}}" class="side-nav-link">
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
                                <a href="{{route('admin.sports')}}" class="side-nav-link">
                                    <span class="menu-text"> Sports </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{route('admin.amenities')}}" class="side-nav-link">
                                    <span class="menu-text"> Amenities </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{route('admin.financialyear')}}" class="side-nav-link">
                                    <span class="menu-text"> Financial Year </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('admin.couponscode')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/ticket.svg')}}"
                                alt="coupons"></span>
                        <span class="menu-text mt-2"> Coupons Code </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.banner')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/money-4.svg')}}" alt="money"></span>
                        <span class="menu-text mt-2"> Banners </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.subscribers')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/sms.svg')}}" alt="sms"></span>
                        <span class="menu-text mt-2"> Subscribers </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.enquiries')}}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-info-circle"></i></span>
                        <span class="menu-text mt-2"> Enquiries </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('admin.users')}}" class="side-nav-link">
                        <span class="menu-icon"><img src="{{asset('assets/image/profile.svg')}}" alt="sms"></span>
                        <span class="menu-text mt-2"> Users</span>
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
                    <a href="{{route('admin.profile')}}" class="text-muted" style="font-size: 11px;">View Profile</a>
                </div>
                <div class="footer-dot text-white" style="font-size: 20px;">
                    <i class="bi bi-three-dots-vertical"></i>
                </div>

            </div>
        </div>

        <!-- </div>  -->
    </div>
    <!-- Sidenav Menu End -->
</div>