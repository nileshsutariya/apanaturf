<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/venton/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Apr 2025 10:32:15 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard | Venton - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico')}}">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('asset/css/vendor.min.css')}}" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('asset/css/app.min.css')}}" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('asset/js/config.js')}}"></script>

</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->
          <header class="topbar">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <div class="d-flex align-items-center">
                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <button type="button" class="button-toggle-menu me-2">
                                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle">
                                        </iconify-icon>
                                   </button>
                              </div>

                              <!-- App Search-->
                              <!-- <form class="app-search d-none d-md-block ms-2">
                                   <div class="position-relative">
                                        <input type="search" class="form-control" placeholder="Search..." autocomplete="off" value="">
                                        <iconify-icon icon="solar:magnifer-linear" class="search-widget-icon"></iconify-icon>
                                   </div>
                              </form> -->
                         </div>

                         <div class="d-flex align-items-center gap-1">
                              <div class="dropdown topbar-item">
                                   <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">
                                             <img class="rounded-circle" width="32"
                                                  src="{{ asset('asset/images/users/avatar-1.jpg') }}" alt="avatar-3">
                                        </span>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-end">
                                        <h6 class="dropdown-header">Welcome Gaston!</h6>
                                        <a class="dropdown-item" href="pages-profile.html">
                                             <i class="bx bx-user-circle text-muted fs-18 align-middle me-1"></i><span
                                                  class="align-middle">Profile</span>
                                        </a>
                                        <div class="dropdown-divider my-1"></div>
                                        <a class="dropdown-item text-danger" href="{{ route('logout')}}">
                                             <i class="bx bx-log-out fs-18 align-middle me-1"></i><span
                                                  class="align-middle">Logout</span>
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </header>

          <!-- ========== Topbar End ========== -->

          <!-- ========== App Menu Start ========== -->
          <div class="main-nav">
               <!-- Sidebar Logo -->
               <div class="logo-box">
                    <a href="index.html" class="logo-dark">
                         <img src="{{ asset('asset/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('asset/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="index.html" class="logo-light">
                         <img src="{{ asset('asset/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('asset/images/logo-light.png') }}" class="logo-lg" alt="logo light">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <i class='bx bx-menu button-sm-hover-icon'></i>
               </button>

               <div class="scrollbar" data-simplebar>
                    <ul class="navbar-nav" id="navbar-nav">

                         <li class="menu-title">General</li>

                         <li class="nav-item">
                              <a class="nav-link" href="#">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:widget-5-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Dashboard </span>
                              </a>
                         </li>



                         <li class="menu-title mt-2">Users</li>
                         <!-- <li class="nav-item">
                              <a class="nav-link" href="pages-permissions.html">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:checklist-minimalistic-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Permissions </span>
                              </a>
                         </li> -->
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('customer.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Customer </span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('users.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Users </span>
                              </a>
                         </li>

                         <li class="menu-title mt-2">Other</li>
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('coupons.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:leaf-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Coupons</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('banners.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:widget-5-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Banner</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarConfiguration" data-bs-toggle="collapse"
                                   role="button" aria-expanded="false" aria-controls="sidebarConfiguration">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:leaf-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Configurations </span>
                              </a>
                              <div class="collapse" id="sidebarConfiguration">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('sports.index')}}">Sports</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('amenities.index')}}">Amenities</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarlocation" data-bs-toggle="collapse"
                                   role="button" aria-expanded="false" aria-controls="sidebarlocation">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:streets-map-point-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Location </span>
                              </a>
                              <div class="collapse" id="sidebarlocation">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('area.index')}}">Area</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                    </ul>
               </div>
          </div>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">



               <!-- ========== Footer Start ========== -->