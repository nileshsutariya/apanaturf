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
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&display=swap" rel="stylesheet">

    <style>
        html {
            overflow: auto;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            font-weight: 500 !important;
            letter-spacing: 0.9px;
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
                /* z-index: 10; */
                position: absolute;
                z-index: 10;
            }

            #sidebar.active {
                width: 200px;
                /* z-index: 10; */
            }

        }

        @media (max-width: 768px) {
            .profilename {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .bd-highlight {
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

            margin-top: 80px;
        }

        @media (max-width: 540px) {
            .navbar-toggler {
                margin-left: 65px;
            }

            .navbar-brand {
                display: block;
            }
        }

        ol,
        ul {
            padding-left: 0px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px;
            /* border-radius: 5px; */
            text-decoration: none;
            transition: all 0.3s ease;
            color: #000;
        }

        .nav-link img {
            width: 20px;
            height: 20px;
            transition: filter 0.3s ease;
        }

        .nav-link.active {
            background-color: #079666 !important;
            color: white !important;
        }

        .nav-link.active img {
            filter: brightness(0) invert(1);
        }

        .nav-link:hover {
            background-color: rgba(29, 185, 84, 0.1);
            color: #079666;
        }

        @media (max-width: 768px) {
            .nav-btn {
                margin: 0px !important;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        {{-- <nav class="d-flex navbar navbar-expand-lg navbar-light">
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
        </nav> --}}


        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid d-flex align-items-center">

                <!-- Logo -->
                <a class="navbar-brand logo me-auto" href="#">
                    <img src="{{asset('assets/image/users/logo2.svg')}}" class="d-inline-block align-top m-3 logo-img"
                        alt="logo" style="max-height: 50px;">
                </a>

                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler nav-btn mx-5" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Profile (Always on Right) -->
                <div class="d-flex align-items-center order-lg-2 mx-4">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle"
                        style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <span class="profilename ms-2"
                        style="color:#10998B; font-size: 15px; font-weight:500;">Abhishek</span>
                </div>


                <!-- Navbar Items -->
                <div class="collapse navbar-collapse justify-content-center order-lg-1" id="navbarNav">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Turf</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Terms & Conditions</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    </ul>
                </div>

            </div>
        </nav>


        <div class="line">
            <div class="row" style="height: 60px;">
                <div class="col-md-12" style="justify-items: baseline;">
                    <div class="d-flex flex-row bd-highlight">
                        <button class="btn mt-2 ml-2 d-block d-md-none" id="toggleSidebar" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseCard">
                            <i class="bi bi-list menu" style="color: #000; font-size: 25px;"></i>
                        </button>

                        <a class="nav-link mr-3 ml-3" href="#"
                            style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Home <span
                                class="sr-only">(current)</span></a>
                        <img class="mr-3" src="{{asset('assets/image/users/arrow.svg')}}" alt="profile">
                        <a class="nav-link" href="#"
                            style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Terms & Conditions
                            <span class="sr-only">(current)</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">

            <div class="sidenav-menu sidebar" id="sidebar" style="height: auto;">
                <div data-simplebar class="flex-grow-1">
                    <ul class="side-nav" style="padding-bottom: 200px;" id="ul">
                        <a href="{{ route('users.dashboard')}}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/element-3.svg')}}" class="nav-icon ml-4" alt="user">
                            <span class="menu-text ml-1">Dashboard</span>
                        </a>
                        <a href="{{ route('users.booking') }}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/calendar.svg')}}" class="nav-icon ml-4" alt="user">
                            <span class="menu-text ml-1">Booking</span>
                        </a>
                        {{-- <li class="side-nav-item"> --}}
                            <a href="{{route('users.matches')}}" class="pb-3 nav-link">
                                <img src="{{asset('assets/image/users/bell.svg')}}" class="nav-icon ml-4" alt="user">
                                <span class="menu-text ml-1">My Matches</span>
                            </a>
                            {{--
                        </li> --}}

                        <a href="{{route('users.wallet')}}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/wallet-remove.svg')}}" class="nav-icon ml-4"
                                alt="user">
                            <span class="menu-text ml-1">Wallet</span>
                        </a>
                        <a href="{{ route('users.split') }}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/Setting.svg')}}" class="nav-icon ml-4" alt="user">
                            <span class="menu-text ml-1">Split & Pay</span>
                        </a>
                        <a href="{{ route('users.setting') }}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/Setting2.svg')}}" class="nav-icon ml-4" alt="user">
                            <span class="menu-text ml-1">Settings</span>
                        </a>
                        <a href="{{route('users.refer')}}" class="pb-3 nav-link">
                            <img src="{{asset('assets/image/users/Setting1.svg')}}" class="nav-icon ml-4" alt="user">
                            <span class="menu-text ml-1">Refer & Earn</span>
                        </a>
                    </ul>
                </div>

                <div class="sidebar-footer p-3" style="">
                    {{--
                    <hr class="hr"> --}}
                    <div class="side-nav-item d-flex align-items-center justify-content-between">
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

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let links = document.querySelectorAll(".nav-link");

                    links.forEach(link => {
                        link.addEventListener("click", function () {
                            links.forEach(l => l.classList.remove("active"));
                            this.classList.add("active");

                            // Change icons when active
                            links.forEach(l => {
                                let img = l.querySelector(".nav-icon");
                                if (l.classList.contains("active")) {
                                    img.src = img.src.replace(".svg", "-active.svg"); // Use different icons
                                } else {
                                    img.src = img.src.replace("-active.svg", ".svg");
                                }
                            });
                        });
                    });
                });

            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $(function () {
                    var current = location.pathname;

                    $('.side-nav a').each(function () {
                        var a = $(this);
                        if (a.attr('href').indexOf(current) !== -1) {
                            a.addClass('active');
                        }
                    })
                })

            </script>