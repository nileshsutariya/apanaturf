@include('users.layouts.userheader')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<style>
    body {
        background: #f4f4f4;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    .review-section {
        padding: 50px 0;
    }

    .review-section h2 span {
        color: green;
    }

    .swiper {
        width: 80%;
        margin: auto;
        overflow: hidden;
        padding: 20px;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        transition: transform 0.3s ease-in-out;
        height: auto;
    }

    .swiper-slide img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }
    .swiper-slide-prev img,
    .swiper-slide-next img {
        width: 90px;
        height: 90px;
    }

    /* Centered Image (Active) */
    .swiper-slide-active img {
        width: 120px;
        height: 120px;
        border: 3px solid green;
        transform: scale(1.2);
    }

    .swiper-slide-prev-prev img,
    .swiper-slide-next-next img {
        width: 70px;
        height: 70px;
    }

    /* Navigation Buttons */
    .swiper-button-prev,
    .swiper-button-next {
        background: green;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        color: white;
        font-size: 16px;
    }
    .swiper-button-prev::after, .swiper-button-next::after {
        color: green;
        font-size: 16px;
    }
    @media (max-width: 534px) {
        
        .searching {
            display: none !important;
        }
    }
    @media (max-width: 767px) {
        .sport-image {
            display: none;
        }
        .title {
            font-size: 40px !important;
        }
        .subtitle {
            font-size: 40px !important;
            margin-right: 17px;
        }
        .sport-section {
            margin-right: 90px;
        }
        .circle-logo {
            display: none;
        }
        .loader {
            display: none;
        }
        .abc {
            display: none;
        }
        .xyz {
            display: none;
        }
        .text-section {
            margin-left: 48px !important;
        }
    }
/* Default styles */
    .download-container {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; 
    }

    .download-box {
        width: 250px;
        height: auto;
        padding: 20px 30px;
        border-radius: 17px;
        background: #dfdddd;
        /* text-align: center; */
        position: relative;
    }

    .download-box h3,
    .download-box p,
    .download-box button {
        font-family: 'NATS', sans-serif !important;
    }

    .download-box h3 {
        font-size: 25px;
    }

    .download-box p {
        font-size: 13px;
        color: #666;
    }

    .download-btn {
        background: #279B5A;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 12px;
        margin-top: 5px;
    }

    .qr-card {
        width: 110px;
        border-radius: 15px;
        margin: 0;
    }

    .logo-icon {
        position: absolute;
        bottom: -10px;
        right: -10px;
        background: white;
        border-radius: 50%;
        padding: 10px;
        background-color: #F5F5F5;
    }

    /* Media Query for Smaller Screens (max-width: 576px) */
    @media (max-width: 576px) {
        .download-container {
            flex-direction: column; /* Stacks elements vertically */
            gap: 15px;
        }

        .download-box {
            width: 90%; /* Takes full width with some margin */
            margin: 0 auto;
        }

        .download-box h3 {
            font-size: 22px;
        }

        .download-box p {
            font-size: 12px;
        }

        .download-btn {
            padding: 6px 12px;
            font-size: 11px;
        }
    }
    .frame {
        max-height: 400px;
        width: auto;
    }

    /* Responsive Fix */
    @media (max-width: 767px) { 
        .frame {
            top: 100px !important;
        }
    }
    @media (max-width: 768px) {
        .desktop {
            display: none;
        }
        .mobile {
            display: flex !important;
        }
        .jquery-hover {
            padding-bottom: 0px !important;
        }
        .frame {
            max-height: 350px !important;
        }
        .label {
            font-size: 22px !important;
        }
        .front-line {
            font-size: 12px !important;
        }
        .appstore {
            max-width: 170px !important;
        }
    }

    @media (max-width: 576px) {
        .frame {
            max-height: 200px; 
        }
    }

    .mobile {
        display: none;
    }

    .desktop {
        /* display: flex; */
    }

    @media (max-width: 991px) {
        /* .desktop {
            display: none;
        }
        .mobile {
            display: flex;
        }
        .jquery-hover {
            padding-bottom: 0px !important;
        } */
        .frame {
            max-height: 300px !important;
        }
        .img-loader {
            margin-top: 200px !important;
        }
    }
    @media (max-width: 1024px) {
    /* .card {
        padding: 30px; 
        border-radius: 20px;
        top: 400px;
    } */
    .frametwo {
        padding: 30px !important; 
        border-radius: 20px;
        position: relative;
        top: 80px !important;
        max-width: 90% !important;
    }

    .label {
        font-size: 1.8rem;
    }

    .front-line {
        font-size: 12px; /* Adjust text size */
    }

    .appstore {
        max-width: 200px; /* Reduce image size */
    }
    .img-loader {
        min-height: 70vh !important;
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
        /* @media (min-width: 1025px) and (max-width: 1199px) {
            .frametwo {
                top: 100px !important;
                max-width: 75% !important;
            }
        }
        @media (min-width: 1200px) and (max-width: 1400px) {
            .frametwo {
                top: 150px !important;
                max-width: 75% !important;
            }
        }
        @media (min-width: 1401px) and (max-width: 2100px) {
            .frametwo {
                top: 250px !important;
                max-width: 75% !important;
            }
        } */


</style>
<section class="content">
    <div class="container-fluid">
        <div class="row align-items-center sport-section">
            <div class="col-md-4 col-sm-12 text-section text-center mb-4 mb-md-0 mt-4">
                <h1 class="title">MY GROUND</h1>
                <h2 class="subtitle" style="color: #279B5A;">MY GAME</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-section text-center position-relative sport-image">
                <h1 class="sport text-outline-success ml-5">SPORT</h1>
                <img src="{{asset('assets/image/users/mockuuups-female-hand.svg')}}" 
                     class="position-absolute" 
                     style="top: -0px; 
                     /* right: 100px; */
                     margin-top: 30px;
                     margin-left: 40px;
                     width: 381px;
                     " 
                     alt="Mobile Mockup">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="card mx-3 mt-3" style="background-color: transparent; border: solid black 1px; border-radius: 11px;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-sm-5 col-auto mb-2">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/image/users/Group.svg')}}" class="d-flex-block align-top" alt="">
                                        </div>
                                        <div class="col-auto">
                                            <span style="font-size: 13px;">Location</span>
                                            <div class="text-muted" style="font-size: 12px;">Ankleshwar, Gujarat</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-auto mb-2">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/image/users/calendar.svg')}}" class="d-inline-block align-top" alt="">
                                        </div>
                                        <div class="col-auto">
                                            <span style="font-size: 13px;">Date</span>
                                            <div class="text-muted" style="font-size: 12px;">01-01-2003</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-auto d-flex justify-content-center" id="searching">
                                    <button class="btn btn-outline-dark d-flex align-items-center justify-content-center" type="submit" style="background-color: #000; border: none; width: 48px; height: 47px; padding: 30px; margin-right: 20px;">
                                        <i class="bi bi-search" style="color: #fff; font-size: 25px;"></i>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="mx-3 mt-3" style="font-size: 12px; line-height: 25px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos corporis assumenda dolor in consequatur hic molestias delectus sapiente incidunt culpa!
                    </div>
                    <div class="mx-3 mt-4 text-center text-md-left" style="font-size: 12px; line-height: 25px;">
                        <img src="{{asset('assets/image/users/appstore.svg')}}" class="d-inline-block align-top" alt="" style="width: 250px;">
                    </div>
                </div>
                {{-- <div class="col-sm-4">
                    <img src="{{asset('assets/image/users/mockuuups-female-hand.svg')}}" 
                     class="position-absolute" 
                     style="top: -50px; right: 100px; width: 250px;" 
                     alt="Mobile Mockup">    
                </div> --}}
            </div>
            {{-- <hr> --}}
        </div>
    </div>
</section>

<hr style="margin-top: 37px;">

<section class="content" style="background-color: #e9eaeb;">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6">
                <span style="color: #279B5A; font-size: 45px; font-family: 'Lato', sans-serif !important;">Exclusive Benefits</span> <span style="font-size: 45px; font-family: 'Lato', sans-serif;">of SportsAstra</span> 
            </div>
            <div class="col-md-6">
                <div class="card" style="margin-top: 50px; background-color: transparent; border: none; border-left: solid #279B5A 3px; border-radius: 0px;">
                    <div class="card-body" style="font-size: 15px; padding: 2px; padding-left: 10px;">
                        Subscribe to our email newsletter now and stay informed about the latest updates.                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/Clockindex.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            Fast Booking
                        </div>
                        <div class="text-muted" style="font-size: 11px; line-height: 25px;">
                            Subscribe to our email newsletter now and stay informed about the latest updates  more informations.                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/CardWallet.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            Secure Payment
                        </div>
                        <div class="text-muted" style="font-size: 11px; line-height: 25px;">
                            Subscribe to our email newsletter now and stay informed about the latest updates  more informations.   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/24Hours.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            24x7 Support
                        </div>
                        <div class="text-muted" style="font-size: 11px; line-height: 25px;">
                            Subscribe to our email newsletter now and stay informed about the latest updates  more informations.  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="content pt-5 pb-5">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-5">
                <span style="font-size: 40px; font-family: 'Lato', sans-serif !important;">Download </span> <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif;">SportsAstra</span> 
                <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif !important;">App </span> <span style="font-size: 40px; font-family: 'Lato', sans-serif;">Today</span> 
            
                <div class="mt-4 fw-bold" style="font-size: 12px; line-height: 25px;">
                    5 bank accounts, 5 apps? Not anymore. Connect your other bank account.
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div style="color: #279B5A; font-size: 27px;">
                            20 Million+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            Active Users
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="color: #279B5A; font-size: 27px;">
                            20+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            States
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="color: #279B5A; font-size: 27px;">
                            700+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            Venders
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-7">
                <div class="card mt-4" style="background-color: transparent; border: none;">
                    <div class="card-body">
                        <div class="download-container">
                            <div class="download-box">
                                <h3 class="mt-2">For iOS</h3>
                                <p>iOS +15</p>
                                <button class="shadow mb-2 download-btn">Download App</button>
                                <div class="card p-1 qr-card">
                                    <img src="{{asset('assets/image/users/qrcode.svg')}}" alt="" height="100px" width="100px">
                                </div>
                                <div class="logo-icon">
                                    <img src="{{asset('assets/image/users/AppleLogo.svg')}}" class="p-2" alt="" height="70px">
                                </div>
                            </div>
                            <div class="download-box">
                                <h3 class="mt-2">For Android</h3>
                                <p>Android 9.0+</p>
                                <button class="shadow mb-2 download-btn">Download App</button>
                                <div class="card p-1 qr-card">
                                    <img src="{{asset('assets/image/users/qrcode.svg')}}" alt="" height="100px" width="100px">
                                </div>
                                <div class="logo-icon">
                                    <img src="{{asset('assets/image/users/Android.svg')}}" class="p-2" alt="" height="70px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="content jquery-hover" style="background-color: #2b2a2a; padding-bottom: 160px;">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-1 mt-4">
                <img class="loader" src="{{asset('assets/image/users/animation1.svg')}}" alt="user" height="120px">
            </div>
            <div class="col-md-5">
                <div class="text-white mb-2 mt-3" style="font-size: 13px;">
                    - Best Features
                </div>
                <span class="text-white" style="font-size: 40px; font-family: 'Lato', sans-serif !important;">Key Features of </span>
                <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif !important;">SportsAstra </span> <span class="text-white" style="font-size: 40px; font-family: 'Lato', sans-serif;">App</span> 
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-md-1">
                <button class="p-3 bg-white circle-logo" style="border-radius: 50%;">
                    <img class="" src="{{asset('assets/image/users/tyrflogo5.svg')}}" alt="user" height="70px">
                </button>
            </div>
        </div>
        <div class="row mt-5 desktop">
            <div class="col-md-4">
                <img src="{{asset('assets/image/users/Frame1.svg')}}" 
                                    class="position-absolute frame" 
                                    style="top: -0px;" 
                                    alt="frame" height="400px">    
            </div>
            <div class="col-md-4">
                <img src="{{asset('assets/image/users/Frame2.svg')}}"
                                class="position-absolute frame" 
                                style="top: -0px;" 
                                alt="frame" height="400px">
            </div>
            <div class="col-md-4">
                <img src="{{asset('assets/image/users/Frame3.svg')}}" 
                                class="position-absolute frame" 
                                style="top: -0px;" 
                                alt="frame" height="400px">
            </div>
        </div>

        <div class="row mt-5 mobile">
            
            <div class="col-12 col-sm-4 d-flex justify-content-center">
                <img src="{{asset('assets/image/users/Frame1.svg')}}" class="frame img-fluid" alt="frame">
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center">
                <img src="{{asset('assets/image/users/Frame2.svg')}}" class="frame img-fluid" alt="frame">
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center">
                <img src="{{asset('assets/image/users/Frame3.svg')}}" class="frame img-fluid" alt="frame">
            </div>
        </div>
        
    </div>
</section>

<section class="content img-loader justify-content-center align-items-center" style="margin-top: 300px; min-height: 100vh;">
    <div class="row">
        <div class="col-md-12 text-center">
            {{-- <img src="{{asset('assets/image/users/Line23.svg')}}" class="d-inline-block align-top" alt=""> --}}

            <div class="review" style="font-weight: 600;"><h6>— Reviews</h6></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <span style="font-size: 40px; font-family: 'Lato', sans-serif !important;">Our Customer  </span>
            <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif !important;">Reviews  </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="review-section">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
            
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg1.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg2.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg3.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg4.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg5.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg1.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg2.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg3.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg4.svg')}}" alt="user">
                            </div>
                            <div class="swiper-slide">                    
                                <img class="mr-2" src="{{asset('assets/image/users/sliderimg5.svg')}}" alt="user">
                            </div>
                        </div>
            
                        <!-- Navigation Buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mt-3 text-center">
            <img style="margin-left: 50px;" class="loader" src="{{asset('assets/image/users/animation2.svg')}}" alt="user" height="120px">
        </div>
        <div class="col-md-6 text-center">
            <img class="abc" src="{{asset('assets/image/users/abc.svg')}}" alt="user" height="120px" style="position: absolute; margin-left: -382px; margin-top: 34px;">
            <div class="fw-bold" style="font-size: 25px;">Danial Smith</div>
            <div>
                <img src="{{asset('assets/image/users/rating.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 220px;">
            </div>
            <div class="mt-3" style="font-size: 25px; font-weight: 500 !important; font-size: 25px; font-family: 'NATS', sans-serif !important;">Satisfied App User</div>
            <div class="mt-3" style="font-size: 25px; font-weight: 500 !important; font-size: 14px; line-height: 30px; letter-spacing: 2px; color: gray;">
                Subscribe to our email newsletter now and stay informed about the latest updates Subscribe to our email newsletter now and stay informed about the latest updates
            </div>
            <img class="xyz" src="{{asset('assets/image/users/xyz.svg')}}" alt="user" height="120px" style="position: absolute; margin-left: 252px; top: 173px;">
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-12">
                {{-- class="position-absolute frame" 
                                    style="top: -0px;"  --}}
                <div class="card frametwo position-relative mx-auto text-center text-white" style="top: 100px; z-index:10; background-color: #0B7C3C; border-radius: 25px; max-width: 75%; padding: 45px;">
                    <div class="mt-2 front-line" style="font-size: 14px;">
                        Find and Enjoy Your Perfect Ground for Your Game
                    </div>
                    <div class="mt-3 label" style="font-size: 40px; font-weight: bold;">
                        Download the App Now!
                    </div>
                    <div class="mt-3 front-line" style="font-size: 14px;">
                        Subscribe to our email newsletter now and stay informed about the latest updates
                    </div>
        
                    <div class="mt-4">
                        <img src="{{asset('assets/image/users/appstore.svg')}}" class="img-fluid appstore" alt="App Store" style="max-width: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            loop: true,
            slidesPerView: "5",
            centeredSlides: true,
            spaceBetween: -20, 
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },  
            breakpoints: {
                1024: { slidesPerView: 5, spaceBetween: 10 },  // Medium screens
                970: { slidesPerView: 5, spaceBetween: 10 },  // Medium screens
                768: { slidesPerView: 3, spaceBetween: 10 },  // Tablets
                576: { slidesPerView: 1, spaceBetween: 5 },   // Mobile devices
                375: { slidesPerView: 1, spaceBetween: 0 },   // Small screens
                344: { slidesPerView: 1, spaceBetween: 0 }    // Small screens
            },
            on: {
                slideChangeTransitionEnd: function () {
                    document.querySelectorAll('.swiper-slide').forEach((slide, index) => {
                        slide.classList.remove('swiper-slide-prev-prev', 'swiper-slide-next-next');
                    });
        
                    let prevPrevSlide = this.slides[this.activeIndex - 2];
                    let nextNextSlide = this.slides[this.activeIndex + 2];
        
                    if (prevPrevSlide) prevPrevSlide.classList.add('swiper-slide-prev-prev');
                    if (nextNextSlide) nextNextSlide.classList.add('swiper-slide-next-next');
                }
            }
        });
    
    </script>


<footer class="footer"> 
    <div class="container text-center text-md-start mt-5" style="padding-top: 80px;">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-4 mx-auto mb-4">
                <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle" style="width: 50px; height: 50px; border: 2px solid #ccc;">
                <span class="ml-2" style="
                        font-weight: 600 !important; 
                        letter-spacing: 2px;
                        font-family: 'Monda', sans-serif;
                        font-style: normal;
                        font-optical-sizing: auto;
                    ">SportsAstra</span>
                
                <p class="mt-3" style="font-size: 11px; color: #e0e0e0;">
                    Subscribe to our email newsletter now and stay informed about the latest updates
                </p>
                <div class="">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                    <img src="{{asset('assets/image/users/Image.svg')}}" alt="profile" class="rounded-circle m-1" style="width: 40px; height: 40px; border: 2px solid #ccc;">
                </div>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="mb-4">Company</h6>
                <div style="font-size: 11px;">
                    <p>
                        <a href="index.php" class="text-decoration-none" style="color: #e0e0e0;">Home</a>
                    </p>
                    <p>
                        <a href="about.html" class="text-decoration-none" style="color: #e0e0e0;">Features</a>
                    </p>
                    <p>
                        <a href="packages.html" class="text-decoration-none" style="color: #e0e0e0;">Reviews</a>
                    </p>
                    <p>
                        <a href="booking.php" class="text-decoration-none" style="color: #e0e0e0;">About us</a>
                    </p>
                    <p>
                        <a href="booking.php" class="text-decoration-none" style="color: #e0e0e0;">Contact us</a>
                    </p>
                </div>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="mb-4">Contact</h6>
                <div style="font-size: 11px;">
                    <p>
                        <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  00000000000  </a>
                    </p>
                    <p>
                        <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  Features@gmail.com  </a>
                    </p>
                    <p>
                        <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  abhiguleria@gmail.com  </a>
                    </p>
                    <p style="margin-bottom: 2px !important;">
                        <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  Address1  </a>
                    </p>
                    <p>
                        <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  Address2  </a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mb-md-0 mb-4">
                <h6 class="mb-4">Get the Latest Information</h6>
            
                <p>
                    <form class="form-inline d-flex flex-nowrap">
                        <input class="form-control flex-grow-1" type="search" aria-label="Search" style="width: 100% !important; opacity: 0.4; border-top-left-radius: 7px; border-bottom-left-radius: 7px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <button class="btn btn-outline-success my-2 my-sm-0 p-4 d-flex align-items-center justify-content-center" type="submit" style="background-color: #fff; border: none; border-radius: 9px;"></button>
                    </form>                    
                </p>
            </div>
        </div>
        <hr>
        <div  style="font-size: 12px;">
            <div class="row">
                <div class="col-6 ml-auto text-right">
                    User
                    <a href="#" class="text-decoration-none " style="color: #e0e0e0;">   Terms&nbsp;&&nbsp;Conditions |  </a>
                    <a href="#" class="text-decoration-none" style="color: #e0e0e0;">  Privacy&nbsp;Policy  </a>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- </div> --}}
   
<!-- Vendor js -->

<!-- App js -->
{{-- <script src="{{asset('assets/js/app.js')}}"></script> --}}

<!--Morris Chart-->
{{-- <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>  --}}
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- </div> --}}
</body>
</html>


<style>
    .frame {
        transition: all 0.3s;
    }
    .frame:hover{
        transform: translateY(-9px) scale(1.005) translateZ(0); 
    }
</style>