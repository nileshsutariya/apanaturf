<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

        /* html,
        body {
            height: 100%;
            margin: 0;
        } */

        .wrapper {
            height: 100vh;
            overflow: scroll;
        }

        body {
            display: flex;
            flex-direction: column;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.9px;
            font-weight: 400 !important;
        }

        .navbar {
            padding: 5px 0;
        }

        .line {
            background-color: #10998B29;
        }

        .logo {
            margin-right: 10px;
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

        @media (max-width: 1400px) {
            .navbar-nav {
                text-align: center;
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

        .content {
            padding: 50px 0;
            position: relative;
            text-align: left;
            flex-grow: 1;
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
        @media (max-width: 1100px) {
            .profilename {
                display: none;
            }
        }

        .sidebar {
            background: white;
            padding-top: 150px;
            /* padding-bottom: 400px; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #079646;
            border-bottom: 1px solid #079646;
            border-top: 1px solid #079646;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 220px;
        }

        .sidebar a {
            display: block;
            /* padding: 15px 10px 0px 50px; */
            color: #333;
            text-decoration: none;
            margin: 5px 0;
            font-size: 13px;
            font-weight: 500 !important;
            
        }

        .sidebar a.active {
            background-color: #10998B;
            color: white;
        }
        .sidebar-footer {
            position: sticky;
            background-color: white;
            bottom: 0;
            padding: 1px;
            z-index: 10;
            align-items: flex-end;
        }
        /* .active-link {
            background-color: green;
            color: white;
            font-weight: bold;
            border-left: 4px solid #28a745; 
            padding-left: 10px;
        } */
        @media (max-width: 965px) {
            
            .sidebar {
                width: 70px;
            }
            .logo {
                padding-left: 60px;
            }
                
            .sidebar .menu-text {
                display: none;
            }
            ol, ul {
                padding-left: 0.5rem;
            }
            .sidebar a {
                margin-right: 90px;
                /* padding-left: 0.5rem; */
                /* text-align: center; */
                width: 100%;
            }
            .sidenav-menu .sidebar-footer .footer-content {
                overflow: hidden;
                white-space: nowrap;
            }
        }
        @media (max-width: 430px) {
            #sidebar {
                transform: translateX(-100%);
            }
            #mainContent {
                margin-left: 0;
            }
        }
        .sidebar {
            
            background: #f8f9fa;
            /* position: fixed; */
            top: 0;
            left: 0;
            transform: translateX(0);
            transition: transform 0.3s ease-in-out;
        }

        /* Hide sidebar initially */
        .sidebar.hidden {
            transform: translateX(-100%);
            
        }

        /* Content area */
        .content {
            margin-left: 220px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Adjust content when sidebar is hidden */
        .sidebar.expanded  {
            margin-left: 0;
        }

        /* Hide sidebar in small screens */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width:0px;
            }

            .sidebar.show {
                transform: translateX(0);
            }
            
            .content {
                margin-left: 0;
            }
        }
        
       

    </style>
</head>

<body>
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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Turf <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Terms & Conditions <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
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
            {{-- <div class="col-md-1"> --}}
                {{-- <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle"
                    style="width: 40px; height: 40px; border: 2px solid #ccc;"> --}}
            {{-- </div> --}}
            <div class="col-md-12" style="justify-items: baseline;">
                
                <div class="d-flex flex-row bd-highlight">
                    <button class="btn mt-2 ml-2" id="toggleSidebar" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard">
                        <i class="bi bi-list menu" style="color: #000; font-size: 25px;"></i>
                    </button>
                    <a class="nav-link mr-3 ml-3" href="#" style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Home <span class="sr-only">(current)</span></a>
                    <img class="mr-3" src="{{asset('assets/image/users/arrow.svg')}}" alt="profile">
                    <a class="nav-link" href="#" style="align-self: center; color: rgb(148, 147, 147); font-size: 13px;">Terms & Conditions <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </div>  
    <div class="main-container">

        <div class="sidenav-menu sidebar d-flex flex-column" id="sidebar" style="height: auto;">
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
       
<!-- Add this before your script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            document.getElementById("toggleSidebar").addEventListener("click", function () {
                let sidebar = document.getElementById("sidebar");
                let content = document.getElementById("content");

                if (sidebar.classList.contains("hidden")) {
                    // Open sidebar
                    sidebar.classList.remove("hidden");
                    content.classList.remove("expanded");
                } else {
                    // Hide sidebar
                    sidebar.classList.add("hidden");
                    content.classList.add("expanded");
                }
            });
        </script>