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
<link href="https://fonts.googleapis.com/css2?family=Monda:wght@400..700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
      @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

      html,
      body {
          height: 100%; /* Ensure the page takes full height */
          margin: 0; /* Remove default margins */
         
      }
      .wrapper {
    height: 100vh;
    overflow: scroll; /* Enable scrolling for the wrapper */
}

      body{
        display: flex;
        flex-direction: column;
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
        padding-left: 600px;
      }
      .navbar-nav .nav-link {
          font-size: 12px;
          font-weight: 500;
          color: black;
          margin: 0 15px;
          position: relative;
          align-items: end;
      }
      .navbar-nav .nav-item.active {
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
        margin-left: 30px;
        font-size: 12px;
        margin-right: 2px;
      }
      .book-now:hover {
          background-color: #145e33;
          color: white;
      }
      @media (max-width: 992px) {
          .navbar-nav {
              text-align: center;
          }
          
          .book-now {
              display: block;
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
          padding: 50px 0;
          position: relative;
          text-align: left;
          flex-grow: 1; 
      }
      .row{
             --bs-gutter-x: 0rem;
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active  ">
              <a class="nav-link" href="#">Turf <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Terms & Conditions <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
            </li>

            <button type="button" class="btn book-now">
              Book Now
            </button>
          </ul>
        </div>
      </nav>
      <div class="page-content">

<div class="page-container" style="background-color: transparent;">


  