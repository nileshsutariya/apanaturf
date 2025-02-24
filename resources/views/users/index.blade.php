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

</style>
<section class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 text-section text-center text-md-left mb-4 mb-md-0 mt-5">
                <h1 class="title">MY GROUND</h1>
                <h2 class="subtitle" style="color: #279B5A;">MY GAME</h2>
            </div>
            <div class="col-12 col-md-6 text-section text-center position-relative">
                <h1 class="sport text-outline-success ml-5">SPORT</h1>
                <img src="{{asset('assets/image/users/mockuuups-female-hand.svg')}}" 
                     class="position-absolute" 
                     style="top: -0px; 
                     /* right: 100px; */
                     margin-top: 30px;
                     width: 350px;
                     " 
                     alt="Mobile Mockup">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card ml-3" style="background-color: transparent; border: solid black 1px; border-radius: 11px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{asset('assets/image/users/Group.svg')}}" class="d-inline-block align-top" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <span class="" style="font-size: 13px;">Location</span>
                                            <div class="text-muted" style="font-size: 12px;">Ankleshwar, Gujarat</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{asset('assets/image/users/calendar.svg')}}" class="d-inline-block align-top" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <span class="" style="font-size: 13px;">Date</span>
                                            <div class="text-muted" style="font-size: 12px;">01-01-2003</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-success pt-2 pb-2 pl-3 pr-3" type="submit" style=" background-color: #000; border: none;">
                                        <i class="bi bi-search" style="color: #fff; font-size: 25px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3 mr-5" style="font-size: 12px; line-height: 25px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos corporis assumenda dolor in consequatur hic molestias delectus sapiente incidunt culpa!
                    </div>
                    <div class="ml-3 mt-4 mr-5" style="font-size: 12px; line-height: 25px;">
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
                    <div class="card-body" style="font-size: 13px; padding: 2px; padding-left: 7px;">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita nam tempore iste, aspernatur ad ab.
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
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
                        <div style="display: flex; gap: 20px; justify-content: center; align-items: center;">
                            <div class="mr-3" style="width: 250px; height: auto; padding: 15px; border-radius: 17px; background: #dfdddd; text-align: center; position: relative;">
                                <h3 class="mt-2" style="margin-right: 75px; font-size: 25px; font-family: 'NATS', sans-serif !important; ">For iOS</h3>
                                <p style="margin-right: 110px; font-size: 13px; color: #666; font-family: 'NATS', sans-serif !important;">iOS +15</p>
                                <button class="shadow mb-2" style="background: #279B5A; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer; font-size: 12px; margin-right: 60px; ">Download App</button>
                                <div class="card p-1" style="width: 110px; border-radius: 15px; margin-left: 25px; ">
                                    <img src="{{asset('assets/image/users/qrcode.svg')}}" class="d-inline-block align-top" alt="" height="100px" width="100px">
                                </div>
                                {{-- <div style="margin-top: 10px;"><img src="qr-ios.png" alt="QR Code for iOS" style="width: 80px; height: 80px;"></div> --}}
                                <div style="position: absolute; bottom: -10px; right: -10px; background: white; border-radius: 50%; padding: 10px; background-color: #F5F5F5; ">
                                    <img src="{{asset('assets/image/users/AppleLogo.svg')}}" class="d-inline-block align-top p-2" alt="" height="70px">
                                </div>
                            </div>
                            <div style="width: 250px; height: auto; padding: 15px; border-radius: 17px; background: #dfdddd; text-align: center; position: relative;">
                                <h3 class="mt-2" style="margin-right: 40px; font-size: 25px; font-family: 'NATS', sans-serif !important; ">For Android</h3>
                                <p style="margin-right: 90px; font-size: 13px; color: #666; font-family: 'NATS', sans-serif !important;">Android 9.0+</p>
                                <button class="shadow mb-2" style="background: #279B5A; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer; font-size: 12px; margin-right: 60px; ">Download App</button>
                                <div class="card p-1" style="width: 110px; border-radius: 15px; margin-left: 25px; ">
                                    <img src="{{asset('assets/image/users/qrcode.svg')}}" class="d-inline-block align-top" alt="" height="100px" width="100px">
                                </div>
                                {{-- <div style="margin-top: 10px;"><img src="qr-ios.png" alt="QR Code for iOS" style="width: 80px; height: 80px;"></div> --}}
                                <div style="position: absolute; bottom: -10px; right: -10px; background: white; border-radius: 50%; padding: 10px; background-color: #F5F5F5; ">
                                    <img src="{{asset('assets/image/users/Android.svg')}}" class="d-inline-block align-top p-2" alt="" height="70px">
                                </div>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="content" style="background-color: #2b2a2a; padding-bottom: 160px;">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-1 mt-4">
                <img class="" src="{{asset('assets/image/users/animation1.svg')}}" alt="user" height="120px">
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
                <button class="p-3 bg-white" style="border-radius: 50%;">
                    <img class="" src="{{asset('assets/image/users/tyrflogo5.svg')}}" alt="user" height="70px">
                </button>
            </div>
        </div>
        <div class="row mt-5">
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
    </div>
</section>
<section class="content justify-content-center align-items-center" style="margin-top: 300px; min-height: 100vh;">
    <div class="row">
        <div class="col-md-12 text-center">
            {{-- <img src="{{asset('assets/image/users/Line23.svg')}}" class="d-inline-block align-top" alt=""> --}}

            <div style="font-weight: 600;"><h6>— Reviews</h6></div>
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
            <img style="margin-left: 50px;" class="" src="{{asset('assets/image/users/animation2.svg')}}" alt="user" height="120px">
        </div>
        <div class="col-md-6 text-center">
            <div class="fw-bold" style="font-size: 25px;">Danial Smith</div>
            <div>
                <img src="{{asset('assets/image/users/rating.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 220px;">
            </div>
            <div class="mt-3" style="font-size: 25px; font-weight: 500 !important; font-size: 25px; font-family: 'NATS', sans-serif !important;">Satisfied App User</div>
            <div class="mt-3" style="font-size: 25px; font-weight: 500 !important; font-size: 14px; line-height: 30px; letter-spacing: 2px; color: gray; margin-bottom: 300px;">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum, earum ea cumque fuga, nisi fugiat deleniti accusamus perspiciatis consequuntur iusto veniam officia sed placeat rem?

            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                {{-- class="position-absolute frame" 
                                    style="top: -0px;"  --}}
                <div class="card position-absolute" style="top: -300px; z-index:10; background-color: #0B7C3C; border-radius: 25px; margin:100px 200px 0px 200px; padding: 40px 200px 40px 200px;">
                    <div class="mt-3 text-center text-white" style="font-size: 14px;">
                        Find and Enjoy Your Perfect Ground for Your Game
                    </div>
                    <div class="mt-3 text-center text-white" style="font-size: 40px;">
                        Download the App Now!
                    </div>
                    <div class="mt-3 text-center text-white" style="font-size: 14px;">
                        Subscribe to our email newsletter now and stay informed about the latest updates
                    </div>
                    <div class="ml-5 mt-4 mr-5 text-center" style="font-size: 12px; line-height: 25px;">
                        <img src="{{asset('assets/image/users/appstore.svg')}}" class="d-inline-block align-top" alt="" style="width: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
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
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, expedita?
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
                        <a href="#" class="fa fa-facebook text-decoration-none" style="color: #e0e0e0;">  00000000000  </a>
                    </p>
                    <p>
                        <a href="#" class="fa fa-twitter text-decoration-none" style="color: #e0e0e0;">  Features@gmail.com  </a>
                    </p>
                    <p>
                        <a href="#" class="fa fa-instagram text-decoration-none" style="color: #e0e0e0;">  abhiguleria@gmail.com  </a>
                    </p>
                    <p>
                        <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Address1  </a>
                        <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Address2  </a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mb-md-0 mb-4">
                <h6 class="mb-4">Get the Latest Information</h6>
            
                <p>
                    <form class="form-inline d-flex flex-nowrap w-100">
                        <input class="form-control flex-grow-1" type="search" aria-label="Search" style="opacity: 0.4; border-top-left-radius: 7px; border-bottom-left-radius: 7px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <button class="btn btn-outline-success my-2 my-sm-0 p-4 d-flex align-items-center justify-content-center" type="submit" style="background-color: #fff; border: none; border-radius: 9px;"></button>
                    </form>                    
                </p>
            </div>
        </div>
        <hr>
        <div  style="font-size: 12px;">
        <div class="row">
            <div class="col-6 ml-auto text-right">

                <a href="#" class="fa fa-linkedin text-decoration-none " style="color: #e0e0e0;">  User Terms & Conditions |  </a>
                <a href="#" class="fa fa-linkedin text-decoration-none" style="color: #e0e0e0;">  Privacy Policy  </a>
            </div>
        </div>
    </div>
    </div>
</footer>
{{-- </div> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<!--Morris Chart-->
<!-- <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script> -->
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