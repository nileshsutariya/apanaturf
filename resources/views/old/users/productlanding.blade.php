@include('users.layouts.userheader')
<link href="https://fonts.googleapis.com/css2?family=NATS&display=swap" rel="stylesheet">

<style>
    @font-face {
        font-family: 'NATS'; 
        src: url("{{ asset('assets/fonts/NATS-Regular.woff') }}") format('woff');
        font-weight: normal;
        font-style: normal;
    }
    .product {
        font-family: 'NATS', sans-serif !important;
    }

    .img {
        height: 100px;
        width: 100px;
        border-radius: 13px;
    }


    .page-content {
        background-color: #FFFFFF;

    }

    .img:hover {
        border: 4px solid #279B5A;
    }

    .imagecol {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: right;
        align-items: flex-end;
        padding-right: 30px;
        padding-top: 0px;
    }

    .booknow {
        border: 2px solid #279B5A;
        border-radius: 10px;
        padding: 240px 15px;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
        color: #279B5A;
        justify-content: center;
        align-items: center;
        width: 117px;
        margin-top: 20px;
        font-family: 'poppins', sans-serif !important;

    }

    .booknow:hover {
        background: #279B5A;
        color: white;
    }

    .amemity {
        display: flex;
        gap: 10px;
        padding: 15px;
        border: 2px solid #D0D5DD;
        border-radius: 100px;
        text-align: center;
        margin-bottom: 20px;
        margin-right: 10px;
        width: 130px
    }

    .star-rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .star {
        color: #279B5A;
        font-size: 20px;
    }

    .half-star {
        position: relative;
        display: inline-block;
        width: 10px;
        overflow: hidden;
        color: #279B5A;
    }

    .turfbtn {
        font-size: 14px;
        width: 35%;
        padding: 12px 25px 12px 20px;
        border-radius: 10px;
        border: #E0F1E8;
        background-color: #E0F1E8;
        font-family: 'poppins', sans-serif !important;
    }

    .turfbtn:hover {
        border: #279B5A;
        background-color: #279B5A;
        color: white;
    }



    .bigimage {
        width: -webkit-fill-available;
    }

    .imgsport {
        background-color: #E0F1E8;
        padding: 15px 18px;
        border-radius: 12px;
        margin-right: 20px;
    }

    .imgsport.active {
        background-color: #279B5A;
    }

    .booking-date {
        padding: 18px 0;
        height: 80px;
        width: 80px;
        border: 2px solid #BEBCBD;
        text-align: center;
        border-radius: 8px;
        margin-top: 2px;
        margin-left: 15px;
        font-size: 15px;
        font-family: 'poppins', sans-serif !important;

    }

    .booking-date.active,
    .booking-date:hover {
        color: #FFFFFF;
        background-color: #279B5A;
        border: 2px solid #279B5A;
    }

    .booking-icon {
        padding: 20px;
        border-top: 1px solid #BEBCBD;
        border-bottom: 1px solid #BEBCBD;
        border-right: 1px solid #BEBCBD;
        text-align: right;
        border-bottom-right-radius: 8px;
        border-top-right-radius: 8px;
        margin: 1px;
        background-color: #292D32;
        height: 81px;
        width: 200px;
    }

    .booking-time {
        border: 2px solid #279B5A;
        padding: 10px;
        border-radius: 27px;
        text-align: center;
        width: 20%;
        margin-right: 60px;
        margin-bottom: 25px;
        font-weight: 600;
        font-family: 'poppins', sans-serif !important;
    }

    .swiper {
        width: 100%;
        overflow: hidden;
    }

    .swiper-wrapper {
        display: flex;
        /* transition-timing-function: linear !important; */
    }

    .swiper-slide {
        flex-shrink: 0;
        width: 400px;
        align-items: center;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #E7F0E3;
        margin: 10px;
    }

    .review-card {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 10px;
        max-width: 400px;
        width: 100%;
        gap: 15px;
    }

    .user-info {
        flex-grow: 1;
    }

    .user-name {
        font-size: 18px;
        font-weight: 600;
        color: #3C4242;
        margin: 0;
    }

    .user-role {
        font-size: 14px;
        color: #5F5F5F;
        font-weight: 400;
    }

    .rating {
        text-align: right;
    }

    .stars {
        padding-bottom: 9px;
        padding-top: 0px;
        margin-top: 0px;
    }

    .rating-score {
        font-size: 15px;
        font-weight: 400;
        color: #737373;
        margin: 0;
        padding-bottom: 0px;
    }

    .user-img {
        border: 1px solid #333;
        border-radius: 100px;
        height: 60px;
        width: 60px;
        padding: 5px;
    }

    .user-img img {
        height: 48px;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .profile img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    @media (min-width:800px) and (max-width:992px) {
        .page-container {
            margin-left: 30px;
        }
    }

    @media (max-width: 992px) {
        .booknow img {
            margin-left: 10px;
        }

        .booknow {
            padding: 15px 420px;
        }
    }

    @media (max-width:892px) {
        .booknow {
            padding: 15px 370px;
        }
    }

    @media (max-width: 768px) {
        .imagecol {
            display: contents;
        }

        .img {
            margin-left: auto;
            margin-right: auto;
            /* margin-top: 10px;
            margin-bottom: 30px; */
            margin-bottom: 20px;
        }

        .content {
            margin: 10px;
        }

        .timeframe {
            padding-left: 10px !important;
        }

        .booknow {
            padding: 15px 320px;
        }
    }

    @media (max-width:692px) {
        .booknow {
            padding: 15px 220px;
        }
    }

    @media (max-width: 520px) {
        .imagecol {
            display: contents;
        }

        .booknow {
            padding: 15px 150px 15px 120px;
        }

        .img {
            margin-left: 12px;
        }

        .content {
            margin: 10px;
        }

        .swiper-slide {
            width: 200px;
        }

        .review-card {
            display: block;
        }

        .rating {
            text-align: left;
        }
    }

    @media (max-width: 980px) {
        .booking-time {
            margin-right: 26px;
        }
    }

    @media (max-width: 630px) {
        .booking-time {
            margin-right: 18px;
        }
    }

    @media (max-width: 450px) {
        .booking-time {
            margin-right: 20px;
            width: 25%;
        }

        .booking-date-container {
            margin-left: 15px !important;
        }
    }

    @media (min-width: 980px) and (max-width: 1220px) {
        .imagecol {
            justify-content: start;
            padding: 20px;
        }

        .amemity {
            width: 46px;
        }

        .turfbtn {
            width: 46%;
        }

        .booking-date {
            width: 50px;
        }

        .booking-time {
            margin-right: 36px;
        }
    }

    @media (min-width: 1220px) and (max-width: 1500px) {
        .imagecol {
            justify-content: start;
            padding: 20px;
        }

        .amemity {
            width: 86px;
        }

        .turfbtn {
            width: 45%;
        }

        .bigimage {
            height: 510px !important;
        }

        .booking-date {
            width: 67px;
        }

        .booking-time {
            width: 18%
        }
    }

    .booking-time.selected {
        background-color: #3F61DB !important;
        color: white !important;
        border-color: #3F61DB !important;
    }

    .booking-date.selected {
        background-color: #3F61DB !important;
        color: white !important;
        border-color: #3F61DB !important;
    }


    .calendar-container {
        background: white;
        border-radius: 51px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .calendar-header {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        color: #2d472c;
    }

    .calendar-header i {
        margin-right: 10px;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        /* gap: 5px; */
        margin-top: 10px;
    }

    .calendar-day {
        padding: 12px;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        color: #000000;
        font-weight: 400;
    }

    .calendar-day:hover {
        background-color: #e9ecef;
    }

    .calendar-today {
        background-color: #2d472c;
        color: white;
    }

    .calendar-selected {
        border: 1px solid #2d472c;
        color: #000000;
        font-weight: 700;
    }

    .month-year {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 0px;
    }

    .dropdown {
        display: inline-block;
    }

    select {
        border: none;
        font-size: 18px;
        font-weight: bold;
        background: none;
        color: #234723;
        cursor: pointer;
        outline: none;
        overflow-y: hidden !important;
    }

    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: bold;
        margin-top: 25px;
        color: #234723;
    }

    .highlight {
        background-color: #191919;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        padding: 3px;
    }

    .date-picker {
        display: none;
    }

    @media (max-width:991px) {
        .rowdate,
        .booking-icon {
            display: none;
        }

        .date-picker {
            display: block;
        }
    }

    @media (max-width:450px) {
        .date-picker {
            padding-left: 0px;
        }

        .calendar-container {
            margin-right: 20px !important;
        }
    }

    @media (max-width:360px) {
        .calendar-day {
            padding: 9px;
        }
    }
        
    .booknow:hover img {
        filter: brightness(0) invert(1);
    }
</style>
<section class="content pt-0 product">
    <div class="row">
        <div class="col-md-2 imagecol">
            <img src="{{ asset('assets/image/users/booking1.svg') }}" class="img" alt="Turf"><br>
            <img src="{{ asset('assets/image/users/booking2.svg') }}" class="img" alt="Turf"><br>
            <img src="{{ asset('assets/image/users/booking3.svg') }}" class="img" alt="Turf"><br>
            <img src="{{ asset('assets/image/users/booking1.svg') }}" class="img" alt="Turf"><br>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-7 col-sm-12">
            <img src="{{ asset('assets/image/users/Group 95.svg') }}" alt="Turf" class="bigimage"><br>
        </div>

        <!--<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>  -->

        <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 p-3 mt-3 details-turf">
            <h2>Name of the Turf</h2>
            <div class="star-rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="half-star">★</span>
                <span style="font-size:13px; color: #9F9F9F; border-left: 1px solid #9F9F9F;" class="p-2">5 Customer
                    Review</span>
            </div>
            <p style="color: #3F4646;" class="mt-2"><strong>Rs. 2,000</strong></p>
            <p style="font-size: 13px; color: #807D7E;">Setting the bar as one of the loudest speakers in its class, the
                Kilburn is a
                compact,
                stout-hearted hero with a well-balanced audio.</p>
            <h6>Size</h6>
            <div class="d-flex gap-3">
                <button class="turfbtn"><b>Turf A : </b>600x600</button>
                <button class="turfbtn"><b>Turf B : </b> 600x600</button>
            </div>
            <h6 class="mt-3">Amenities</h6>
            <div class="row" style="margin-left: 2px;">
                <div class="amemity"></div>
                <div class="amemity"></div>
                <div class="amemity"></div>
                <div class="amemity"></div>
            </div>
            <h6 class="mt-3">Select Sports</h6>
            <div class="sports d-flex">
                <div class="imgsport"><img src="{{ asset('assets/image/users/img 7.svg') }}"></div>
                <div class="imgsport active"><img src="{{ asset('assets/image/users/cricket-bat.svg') }}"></div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 align-items-center justify-items-center booknow-turf ">
            <div class="booknow"><img src="{{ asset('assets/image/users/Groupb.svg') }}">
                <p class="mb-0">Book <br>
                    Now</p>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid ml-0 pl-0 mt-3 booking-date-container">
        <div class="row mb-3" style="font-size: 22px; font-weight: 400;">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                Booking
            </div>
        </div>
        <div class="row ml-0" style="margin-left:0px ;">
            <div class="col-lg-2 pl-0 booking-icon">
                <img src="{{ asset('assets/image/users/Group 1272628533.svg') }}" class="ml-auto">
            </div>
            <div class="col-md-9 col-lg-9 col-sm-9  rowdate">
                <div class="row date-selection" id="dateSelection">
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 date-picker">
                <div class="calendar-container" id="calendar"
                    style="font-size: 12px !important;  box-shadow: 0px 25px 30px #00000040;">
                    <div class="calendar-header">
                        <img class="mr-2" src="{{ asset('assets/image/client/calendargreen.svg') }}" alt="dashboard"
                            height="">
                        <div class="month-year">
                            <!-- <select id="monthSelector" onchange="updateCalendar()"></select>
                        <select id="yearSelector" onchange="updateCalendar()"></select> -->
                            <select id="monthSelector"></select>
                            <select id="yearSelector"></select>
                        </div>
                    </div>
                    <div class="weekdays">
                        <div>Su</div>
                        <div>Mo</div>
                        <div>Tu</div>
                        <div>We</div>
                        <div>Th</div>
                        <div>Fr</div>
                        <div>Sa</div>
                    </div>
                    <div class="calendar-grid" id="calendarDays"></div>
                </div>
            </div>

            <div class="row mt-4 ">
                <div class="col-md-1"></div>
                <div class="col-md-10 pl-0 timeframe">
                    <div class="mb-3 ml-0">Time Frame
                    </div>
                    <div class="row ml-0">
                        <div class="col-sm-3 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                            09:00 am
                        </div>
                        <div class="col-sm-3 booking-time"
                            style="background-color:#3F61DB;color:#FFFFFF; border: #3F61DB;">
                            10:00 am
                        </div>
                        <div class="col-sm-3 booking-time">
                            11:00 am
                        </div>
                        <div class="col-sm-3 booking-time">
                            12:00 am
                        </div>
                        <div class="col-sm-3 booking-time">
                            01:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            02:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            03:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            04:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            11:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            08:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            12:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            07:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            05:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            06:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            07:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            08:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            10:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            11:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            12:00 pm
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid ml-0 mt-4" style="background-color:#FFFFFF ;">
        <div class="row ml-0">
            <div class="col-lg-12 ml-0">
                <h5 style="text-align: center;">— Reviews</h5>
                <div class="swiper mySwiper mt-4 mb-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="user-img">
                                    <img src="{{ asset('assets/image/users/Ellipse 2519.svg') }}">
                                </div>
                                <div class="user-info">
                                    <h3 class="user-name">Viezh Robert</h3>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="rating">
                                    <span class="rating-score">4.5</span>
                                    <div class="stars">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset('assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN
                                always the
                                best”.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 0,
        loop: true,
        centeredSlides: true,
        initialSlide: Math.floor(document.querySelectorAll('.swiper-slide').length / 2), // Start from center
        speed: 5000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        allowTouchMove: false,
    });
</script>
<script>
    function generateCurrentWeek() {
        const dateSelection = document.getElementById("dateSelection");
        dateSelection.innerHTML = "";

        let today = new Date();
        let dayOfWeek = today.getDay();
        let startOfWeek = new Date(today);
        startOfWeek.setDate(today.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1));

        for (let i = 0; i < 10; i++) {
            let date = new Date(today);
            date.setDate(today.getDate() + i);

            let dayName = date.toLocaleDateString("en-US", { weekday: "short" });
            let dayNumber = date.getDate();

            let dateDiv = document.createElement("div");
            dateDiv.classList.add("col-sm-1", "booking-date");
            if (i == 0) dateDiv.classList.add("active");

            dateDiv.innerHTML = `<span style="font-weight: 500;">${dayName}</span><br>
                                 <span style="font-weight:600;">${dayNumber}</span>`;

            dateSelection.appendChild(dateDiv);
        }
    }
    generateCurrentWeek();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const bookingTimes = document.querySelectorAll(".booking-time");

        bookingTimes.forEach(time => {
            time.addEventListener("click", function () {
                this.classList.toggle("selected");
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        const bookingTimes = document.querySelectorAll(".booking-date");

        bookingTimes.forEach(time => {
            time.addEventListener("click", function () {
                this.classList.toggle("selected");
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const calendarDays = document.getElementById("calendarDays");
        const monthSelector = document.getElementById("monthSelector");
        const yearSelector = document.getElementById("yearSelector");

        let currentDate = new Date();
        let selectedDate = null;

        let selectedTimeSlot = null;
        let events = JSON.parse(localStorage.getItem("events")) || {};

        function getNext7Days() {
            var today = new Date();
            const next7Days = [];

            for (let i = 0; i < 7; i++) {
                const date = new Date();
                date.setDate(today.getDate() + i);
                const dayName = date.toLocaleString('en-US', {
                    weekday: 'short'
                });
                const dayNumber = date.getDate();
                next7Days.push({
                    dayName,
                    dayNumber
                });
            }
            return next7Days;
        }

        const days = getNext7Days().map(date => `${date.dayName} ${date.dayNumber}`);
        const times = ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"];

        function populateSelectors() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            for (let i = 0; i < 12; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.value = i;
                option.textContent = months[i];
                monthSelector.appendChild(option);
            }
            let currentYear = new Date().getFullYear();
            for (let i = currentYear - 0; i <= currentYear + 10; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                yearSelector.appendChild(option);
            }
            monthSelector.value = currentDate.getMonth();
            yearSelector.value = currentDate.getFullYear();
        }

        monthSelector.addEventListener("change", function () {
            currentDate.setMonth(parseInt(monthSelector.value));
            renderCalendars();
        });

        yearSelector.addEventListener("change", function () {
            currentDate.setFullYear(parseInt(yearSelector.value));
            renderCalendars();  
        });

        function renderCalendars() {
            calendarDays.innerHTML = "";
            let firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
            let lastDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

            let today = new Date();
            today.setHours(0, 0, 0, 0);

            for (let i = 0; i < firstDay; i++) {
                let emptyDiv = document.createElement("div");
                calendarDays.appendChild(emptyDiv);
            }
            for (let day = 1; day <= lastDate; day++) {
                let dayDiv = document.createElement("div");
                dayDiv.textContent = day;
                dayDiv.classList.add("calendar-day");

                let selectedDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                if (selectedDay < today) {
                    dayDiv.classList.add("disabled-date");
                }

                if (day === today.getDate() && currentDate.getMonth() === today.getMonth() && currentDate
                    .getFullYear() === today.getFullYear()) {
                    dayDiv.classList.add("calendar-today");
                }
                dayDiv.addEventListener("click", function () {
                    if (selectedDay < today) {
                        return;
                    }

                    if (selectedDate) {
                        selectedDate.classList.remove("calendar-selected");
                    }
                    selectedDate = dayDiv;
                    selectedDate.classList.add("calendar-selected");
                    updateWeekView(new Date(currentDate.getFullYear(), currentDate.getMonth(), day));
                });
                calendarDays.appendChild(dayDiv);
            }
        }

        function selectDate(element) {
            if (selectedDate) {
                selectedDate.classList.remove("calendar-selected");
            }

            selectedDate = element;
            selectedDate.classList.add("calendar-selected");

            let selectedDay = parseInt(selectedDate.getAttribute("data-day"));
            let selectedMonth = currentDate.getMonth();
            let selectedYear = currentDate.getFullYear();

            let fullDate = new Date(selectedYear, selectedMonth, selectedDay);
            updateWeekView(fullDate);
        }

        function updateWeekView(startDate) {
            let next7Days = [];

            for (let i = 0; i < 7; i++) {
                let date = new Date(startDate);
                date.setDate(startDate.getDate() + i);
                let dayName = date.toLocaleString("en-US", {
                    weekday: "short"
                });
                let dayNumber = date.getDate();
                next7Days.push({
                    dayName,
                    dayNumber
                });
            }
        }
        populateSelectors();
        renderCalendars();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const calendarDays = document.getElementById("calendarDays");

        calendarDays.addEventListener("click", function (event) {
            if (event.target.classList.contains("calendar-day")) {
                let element = document.querySelector(".calendar-day.calendar-selected");
            }
        });
    });
</script>

@include('users.layouts.userfooter')