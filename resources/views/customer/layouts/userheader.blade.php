<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <title>Turf</title>

    <style>
      html,
      body {
          height: 100%;
          margin: 0;
          overflow-x: hidden;
      }
      .wrapper {
          height: 100vh;
          overflow: scroll;
      }

      body{
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.9px;
        background-color: #F5F5F5;
        font-weight: 400 !important;

      }
      .navbar {
        padding: 5px 0;
        border-bottom: solid #279B5A 23px;
      }

      .logo {
        margin-right: 10px;
      }

      .navbar-nav {
        padding-left: 0;
      }

      .navbar-nav .nav-link {
        font-size: 12px;
        font-weight: 500;
        color: black;
        margin: 0 15px;
        position: relative;
      }

      .navbar-nav .nav-item.active .nav-link {
        color: #1d7c46;
        font-weight: bold;
      }

      .navbar-nav .nav-item.active::after {
        content: "";
        display: block;
        width: 100%;
        height: 2px;
        background-color: #1d7c46;
        margin-top: 3px;
      }

      .book-now {
        background-color: #279B5A;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-size: 13px;
        margin-left: 15px;
        width: 100%;
      }

      .book-now:hover {
        background-color: #145e33;
        color: white;
      }

      @media (max-width: 992px) {
        .navbar-nav {
          text-align: center;
          width: 100%;
        }

        .navbar-collapse {
          text-align: center;
        }

        .book-now {
          display: block;
          width: 100%;
          max-width: 200px;
          margin: 10px auto;
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
          /* padding: 50px 0; */
          position: relative;
          text-align: left;
          flex-grow: 1; 
      }
      @font-face {
          font-family: 'NicoMoji';
          src: url('{{ asset('assets/fonts/nicomoji-plus_v2-5.ttf') }}') format('truetype');
          font-weight: normal;
          font-style: normal;
          font-display: swap;
      }
      .title {
          font-family: 'NicoMoji', sans-serif;
          font-size: 3rem;
      }

      .subtitle {
          font-family: 'NicoMoji', sans-serif;
          font-size: 3rem;
          float: right;
      }
      .sport {
        font-family: 'NicoMoji', sans-serif;
        font-size: 14rem;
        color: #F5F5F5;
        -webkit-text-stroke: 2px rgb(6, 179, 6);
      }
      @media (max-width: 768px) {
          .sport {
              font-size:10rem;
          }

          .title {
              font-size: 2rem; 
          }

          .subtitle {
              font-size: 1.5rem; 
          }
      }

      @media (max-width: 576px) {
          .sport {
              font-size: 6rem ;
          }

          .title {
              font-size: 1.5rem;
          }

          .subtitle {
              font-size: 1.2rem; 
          }
      }
      @media (min-width: 376px) and (max-width: 430px) {
        .jquery-hover {
          height: 770px !important;
        }
        .review {
          margin-top: 300px !important;
        }
      }
      @media (min-width: 344px) and (max-width: 361px) {
        .jquery-hover {
          height: 850px !important;
        }
        .review {
          margin-top: 300px !important;
        }
      }
      @media (min-width: 371px) and (max-width: 375px) {
        .jquery-hover {
          height: 800px !important;
        }
        .review {
          margin-top: 300px !important;
        }
      }
      @media (min-width: 539px) and (max-width: 541px) {
        .jquery-hover {
          height: 750px !important;
        }
        .review {
          margin-top: 300px !important;
        }
      }
      @media (min-width: 766px) and (max-width: 769px) {
        .jquery-hover {
          height: 500px !important;
        }
        .frame {
          position: relative;
          top: 10px !important;
        }
        .circle-logo {
          background-color: transparent !important;
          border: none !important;
        }
      }
      @media (max-width: 533px) {
        #searching {
          display: none !important;
        }
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F5F5F5;">
    <a class="navbar-brand logo" href="#">
      <img src="{{asset('assets/image/logo/Apna-Turf.png')}}" height="70" class="d-inline-block align-top" style="margin-left: 100px;" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center" id="navbarNav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('customerindex')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('bookingturf.index')}}">Turf</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('terms.index')}}">Terms & Conditions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('about.index')}}">About</a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn book-now">Book Now</button>
        </li>
        <li class="nav-item">
            <form action="{{ route('customer.logout') }}" method="POST" id="logoutForm" style="display: inline;">
                @csrf
                <button class="nav-link mt-2 me-0" type="submit" style="border: none; background: none; padding: 0; cursor: pointer; width: 100%;">
                    <span class="menu-text"> Logout </span>
                </button>
            </form>
        </li>
      </ul>
    
    </div>
  </nav>
  
      <div class="page-content">

        <div class="page-container" style="background-color: transparent;">
          
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
        <script>
            $(document).ready(function () {
                var currentUrl = window.location.href; 
            
                $(".navbar-nav .nav-item").each(function () {
                    var link = $(this).find("a"); 
                    var linkUrl = link.attr("href"); 
            
                    if (currentUrl.includes(linkUrl)) {
                        $(".navbar-nav .nav-item").removeClass("active"); 
                        $(this).addClass("active"); 
                    }
                });
            });
        </script>