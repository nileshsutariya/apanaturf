<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard | Venton - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico')}}">
     <link href="{{ asset('asset/css/vendor.min.css')}}" type="text/css" />
     <link href="{{ asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('asset/css/app.min.css')}}" rel="stylesheet" type="text/css" />
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
                              <div class="topbar-item">
                                   <button type="button" class="button-toggle-menu me-2">
                                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle">
                                        </iconify-icon>
                                   </button>
                              </div>
                         </div>
                         <div class="d-flex align-items-center gap-1">
                              <div class="dropdown topbar-item">
                                   <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">
                                             @php
                                                  $image = \App\Models\Images::find(Auth::user()->profile_image);
                                             @endphp

                                             @if ($image)
                                                  <img class="rounded-circle" width="35" height="35" src="{{ asset('storage/' . $image->image_path) }}" alt="avatar">
                                             @else
                                             {{-- {!! Avatar::create(Str::upper(Str::substr(Auth::user()->name, 0, 1)))->setDimension(35, 35)->setFontSize(15)->toSvg() !!} --}}
                                             <img class="rounded-circle" width="32"
                                             src="{{ asset('asset/images/users/avatar-1.jpg') }}" alt="avatar-3">
                                             @endif

                                        </span>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-end">
                                        <h6 class="dropdown-header">Welcome {{Auth::user()->name}}!</h6>
                                        <a class="dropdown-item" href="{{route('profile.index')}}">
                                             <i class="bx bx-user-circle text-muted fs-18 align-middle me-1"></i><span
                                             class="align-middle">Profile</span>
                                        </a>
                                        <div class="dropdown-divider my-1"></div>
                                        <a class="dropdown-item text-danger" href="{{ route('logout')}}">
                                             <i class="bx bx-log-out fs-18 align-middle me-1"></i>
                                             <span class="align-middle">Logout</span>
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
                    <a href="#" class="logo-dark">
                         <img src="{{ asset('asset/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('asset/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="#" class="logo-light">
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
                              <a class="nav-link" href="{{route('admin.dashboard')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:widget-5-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Dashboard </span>
                              </a>
                         </li>
                         <li class="menu-title mt-2">Users</li>

                         @if (Auth::user()->role_id == 1)
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('customer.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Customer </span>
                              </a>
                         </li>
                         @endif
                         {{-- @if (Auth::user()->role_id != 3) --}}
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('vendor.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:shop-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Vendor</span>
                              </a>
                         </li>
                         {{-- @endif --}}
                         {{-- @if (Auth::user()->role_id != 3) --}}
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('users.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Users </span>
                              </a>
                         </li>
                         {{-- @endif --}}
                         
                         @if (Auth::user()->role_id == 1)
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarpermission" data-bs-toggle="collapse"
                                   role="button" aria-expanded="false" aria-controls="sidebarpermission">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:checklist-minimalistic-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Permissions </span>
                              </a>
                              <div class="collapse" id="sidebarpermission">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('permissiongroup.index')}}">Permission Group</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('permission.index')}}">Users Permission</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         @endif

                         <li class="menu-title mt-2">Other</li>
                         @if (Auth::user()->role_id == 3)
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('turf.index')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:leaf-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Turf</span>
                              </a>
                         </li>
                         @endif
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
                                             <a class="sub-nav-link" href="{{ route('city.index')}}">City</a>
                                        </li>
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

          <!-- Start right Content here -->
          <div class="page-content">
               <!-- ========== Footer Start ========== -->