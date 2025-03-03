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
    <link href="https://fonts.googleapis.com/css2?family=NATS&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=NATS&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <title>Document</title>
    <style>
      @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

      html,
      body {
          height: 100%; /* Ensure the page takes full height */
          margin: 0; /* Remove default margins */
          overflow-x: hidden;
      }
      .wrapper {
          height: 100vh;
          overflow: scroll; /* Enable scrolling for the wrapper */
      }

      body{
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif !important;
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
  padding-left: 0; /* Removed large left padding */
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
  padding: 8px 25px;
  border-radius: 25px;
  text-decoration: none;
  font-size: 12px;
  margin-top: 5px;
  width: 100%;
}

.book-now:hover {
  background-color: #145e33;
  color: white;
}

/* Responsive Styles */
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
        color: white;
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
      <img src="{{asset('assets/image/users/logo.svg')}}" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Turf</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Terms & Conditions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn book-now">Book Now</button>
        </li>
      </ul>
    </div>
  </nav>
  
      <div class="page-content">

        <div class="page-container" style="background-color: transparent;">


  