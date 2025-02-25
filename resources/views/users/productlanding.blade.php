@include('users.layouts.userheader')
<style>
    .body{
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
    }

    /* .booknow:hover {
        background: #279B5A;
        color: white;
    } */

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
    }

    .swiper {
        width: 100%;
        overflow: hidden;
    }

    .swiper-wrapper {
        display: flex;
        transition-timing-function: linear !important;
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


    .bid-container {
        border: 1px solid #0b7a32;
        border-radius: 26px;
        padding: 20px 40px;
        display: flex;
        align-items: center;
        background-color: #FFFFFF;
        justify-content: space-between;
        /* margin: auto; */
    }

    .bid {
        border: 1px solid #0b7a32;
        border-radius: 14px;
        padding: 10px 10px;
        display: flex;
        text-align: center;

        background-color: #FFFFFF;
        justify-content: center;
        margin: auto;
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

    .note-box {
        background-color: #FF424214;
        border-radius: 22px;
        margin-left: 150px;
        margin-right: 0px;
        padding: 25px;
        font-size: 18px;
        width: 500px;
    }

    .address-turf,
    .bid-turf {
        display: none;
    }
    .details-turf,
    .booking-date-container,
    .booknow-turf {
        display: block;
    }

    @media (max-width: 1000px) {
        .booknow {
            padding: 15px 240px;
        }

        .booknow img {
            margin-left: 10px;
        }
    }

    @media (max-width: 768px) {
        .imagecol {
            display: contents;
        }

        .img {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .content {
            margin: 10px;
        }
    }

    @media (max-width: 520px) {
        .imagecol {
            display: contents;
        }

        .img {
            margin-left: 10px;
        }

        .content {
            margin: 10px;
        }
    }

    @media (max-width: 980px) {
        .booking-time {
            margin-right: 35px;
        }
    }

    @media (min-width: 990px) and (max-width: 1220px) {
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
            margin-right: 40px;
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
    @media (min-width: 1260px) and (max-width: 1500px) {
        .note-box{
            margin-left: 90px;
        }
    }
    @media (min-width: 985px) and (max-width: 1260px) {
        .note-box{
            margin-left: 35px;
            width: 400px;
        }
    }
    @media (max-width: 985px) {
        .note-box{
            margin-left: 100px;
        }
    }
    @media (max-width: 740px) {
        .note-box{
            margin-left: 0px;
            width: 350px;
        }
    }
</style>
<section class="content pt-0">
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
        <!-- <div class="col-md-1"></div> -->

        <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12  p-3 mt-3 details-turf">
            <h2>Name of the Turf</h2>
            <div class="star-rating ">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="half-star ">★</span>
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
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 align-items-center justify-content-center booknow-turf ">
            <div class="booknow"><img src="{{ asset('assets/image/users/Groupb.svg') }}">
                <p class="mb-0">Book <br>
                    Now</p>
            </div>
        </div>


        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12  p-3 mt-3 address-turf">
            <h2>Address of the Turf</h2>
            <div class="row d-flex mt-3">
                <div class="col-sm-5 text-left" style="font-size: 16px; font-weight: 500; color: #929292;">23 March 2024 | Saturday | 24:00</div>
                <div class="col-sm-3 text-center" style="font-size: 14px; color: #7C8082;">Starting Bid <br>₹400
                </div>
                <div class="col-sm-4 text-right" style="font-size: 14px; color: #7C8082;">End in 
                <span style="font-weight: bold; color: #000000;">
                    00:00:00
                </span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left mt-4" style="font-size: 20px; font-weight: 400;">
                Bidding
                </div>
            </div>

        </div>











    </div>

    <div class="container mt-4 bid-turf mb-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="bid-container ml-auto">
                    <div class="profile" style="font-size: 18px;">
                    <span class="p-3">#</span>
                        <img src="{{ asset(path: 'assets/image/users/Ellipse 4.svg') }}" alt="Profile">
                        <span> Devon Lane</span>
                    </div>
                    <input type="text" class="form-control w-25 text-center"
                        style="border-radius: 26px; background-color: #E7F0E3;">
                </div>

                <div class="d-flex mt-4 row">
                    <div class="bid col-5">
                        <button class="btn text-center">Cancel</button>
                    </div>
                    <div class="col-1"></div>
                    <div class="bid col-5">
                        <button class="btn text-center ">Bid</button>
                    </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                </div>
            </div>
            <div class="col-md-6 mr-0">
                <div class="note-box">
                    <strong style="font-size: 21px; color: #000000;">NOTE:</strong>
                    <p style="font-size: 15px; letter-spacing: 0px; color: #848484; margin-top: 10px;">"Welcome
                        to our turf booking app's bidding system! Now, users can bid on available slots,
                        ensuring fair access and competitive pricing. Enjoy the flexibility to choose the best
                        offers
                        while engaging in friendly competition. Bid smartly, play heartily, and make the most of
                        your
                        turf experience with us!"</p>
                </div>
            </div>

        </div>
        <div class="col-lg-1 mr-0"></div>
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
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-sm-1 booking-date active">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                    <div class="col-sm-1 booking-date">
                        <span style="font-weight: 500;">Sat</span><br><span style="font-weight:600;">23</span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10 pl-0">
                    <div class="mb-3 ml-0">Time Frame
                    </div>
                    <div class="row ml-0">
                        <div class="col-sm-3 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time"
                            style="background-color:#3F61DB;color:#FFFFFF; border: #3F61DB;">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                        <div class="col-sm-3 booking-time">
                            09:00 pm
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid ml-0" style="background-color:#FFFFFF ;">
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                        <img src="{{ asset(path: 'assets/image/users/Star 10.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2" style="font-size: 13px;color:#3C4242; padding:;10px; line-height:25px;">
                                “Wow... I am very happy to use this VPN, it turned
                                out to be
                                more than my expectations and so far there have been no problems. LaslesVPN always the
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
        spaceBetween: 0, // No gaps between slides
        loop: true,
        centeredSlides: true, // Start animation from center
        initialSlide: Math.floor(document.querySelectorAll('.swiper-slide').length / 2), // Start from center
        speed: 5000, // Smooth continuous effect
        autoplay: {
            delay: 0, // No delay, constant motion
            disableOnInteraction: false,
        },
        allowTouchMove: false, // Disable manual swipe for perfect flow
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const bookNow = document.querySelector(".booknow");
        const detailsTurf = document.querySelector(".details-turf");
        const booknowTurf = document.querySelector(".booknow-turf");
        const booking = document.querySelector(".booking-date-container");
        const bidding = document.querySelector(".bid-turf");
        const addressTurf = document.querySelector(".address-turf");

        bookNow.addEventListener("click", function () {
            detailsTurf.style.display = "none";
            booknowTurf.style.display = "none";
            booking.style.display = "none";
            addressTurf.style.display = "block";
            bidding.style.display = "block";
        });

        // Initially hide address-turf
        // addressTurf.style.display = "none";
    });
</script>

@include('users.layouts.userfooter')