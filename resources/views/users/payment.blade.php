@include('users.layouts.header2')
<link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/app2.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
<style>
    .body {
        font-family: 'NATS', sans-serif !important;
    }

    .img {
        height: 100px;
        width: 100px;
        border-radius: 13px;
    }


    .page-content {
        background-color: #FFFFFF;
        margin: 20px 0px;
    }

    .page-container {
        padding-left: 0px;
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
        width: 10%;
        margin: 10px
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


    @media (min-width: 990px) and (max-width: 1220px) {
        .imagecol {
            justify-content: start;
            padding: 20px;
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

    @media (min-width: 990px) and (max-width: 1199px) {
        .imagecol {
            margin-left: 110px;
        }

        .details-turf {
            margin-left: 70px;
        }

        .bigimage {
            width: 480px !important;
        }
    }

    @media (min-width: 768px) and (max-width: 990px) {
        .bigimage {
            width: 400px !important;
        }

        .imagecol {
            margin-left: 70px;
        }

        .details-turf,
        .booknow {
            margin-left: 20px;
        }

    }


    @media (min-width: 1200px) and (max-width: 1550px) {
        .imagecol {
            justify-content: start;
            padding: 20px;
        }

        .amemity {
            width: 100px;
        }

        .turfbtn {
            width: 45%;
        }

        .bigimage {
            height: 550px !important;
        }

        .booking-date {
            width: 67px;
        }

        .booking-time {
            margin-right: 35px;
            width: 35%;
        }
    }

    @media (max-width: 991px) {
        .booknow {
            padding: 15px 240px;
        }

        .booknow img {
            margin-left: 10px;
        }
    }

    @media (max-width: 767px) {
        .imagecol {
            display: contents;
        }

        .img {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .page-content {
            margin: 20px;
        }

    }

    @media (max-width: 520px) {
        .imagecol {
            display: contents;
        }

        .img {
            margin-left: 10px;
        }


    }

    @media (min-width: 580px) and (max-width: 980px) {
        .booking-time {
            margin-right: 30px;
        }
    }

    @media (max-width: 580px) {
        .booking-time {
            margin-right: 0px;
            width: 20%;
        }
    }

    @media (max-width: 450px) {
        .booking-time {
            margin-right: 15px;
            width: 25%;
        }

        .booking-date-container {
            margin-left: 20px !important;
        }

    }

    @media (min-width: 769px) {
        #sidebar {
            overflow: visible;
        }
    }

    @media (min-width: 380px) and (max-width: 550px) {
        .page-content {
            width: 390px;
        }
    }

    @media (max-width: 380px) {
        .page-content {
            width: 326px;
        }
    }

    @media (max-width: 500px) {
        .booknow {
            padding: 15px 150px;
        }
    }

    .imgcol {
        padding-bottom: 30px;
    }


    .modal-demo {
        width: 500px !important;
        max-height: 90vh;
        border-radius: 15px;
        padding: 30px;
        color: #001833;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        font-family: 'poppins', serif !important;

    }

    .modal-demo::-webkit-scrollbar {
        display: none;
    }

    h2 {
        font-size: 1.125rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .details {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .details img {
        width: 57px;
        height: 56px;
        border-radius: 50%;
        background-color: #e2e8f0;
    }

    .details div {
        margin-left: 1rem;
    }

    .details p {
        margin: 0;
    }

    .details p:first-child {
        font-weight: 600;
    }

    .payment-option {
        background-color: #F7F8FB;
        padding: 1rem;
        border-radius: 12px;
        /* display: flex; */
        align-items: center;
        margin-bottom: 10px;
    }

    .total {
        margin-top: 10px;
        font-size: 12px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total span {
        color: #4a5568;
    }

    .total-price {
        font-size: 22px;
        font-weight: bold;
        color: #1a202c;
    }

    .pay-button {
        margin-top: 15px;
        margin-left: auto;
        background-color: #10998B;
        color: white;
        padding: 10px 35px;
        border-radius: 30px;
        display: flex;
        font-size: 14px;
        font-weight: 500;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: none;
    }

    .pay-button i {
        margin-right: 0.5rem;
    }

    input[name="payment"],
    input[name="payment-method"] {
        transform: scale(1.5);
        color: #001833;
    }

    @media (max-width:410px) {
        #full-payment {
            margin-left: 0px !important;
        }
    }

    @media (min-width: 390px) and (max-width: 410px) {
        .half-payment {
            margin-right: 150px;
        }
    }

    @media (min-width: 375px) and (max-width: 390px) {
        .half-payment {
            margin-right: 135px;
        }
    }

    @media(min-width: 350px) and (max-width: 375px) {
        .half-payment {
            margin-right: 110px;
        }
    }
    @media (max-width: 350px) {
        .half-payment {
            margin-right: 100px;
        }
    }
</style>
</style>
<div class="page-content" id="mainContent">
    <div class="page-container" style="background-color: transparent;">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 imagecol mt-0">
                <img src="{{ asset('assets/image/users/booking1.svg') }}" class="img" alt="Turf"><br>
                <img src="{{ asset('assets/image/users/booking2.svg') }}" class="img" alt="Turf"><br>
                <img src="{{ asset('assets/image/users/booking3.svg') }}" class="img" alt="Turf"><br>
                <img src="{{ asset('assets/image/users/booking1.svg') }}" class="img" alt="Turf"><br>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 col-sm-12 ">
                <img src="{{ asset('assets/image/users/Group 95.svg') }}" alt="Turf" class="bigimage"><br>
            </div>
            <!-- <div class="col-md-1"></div> -->

            <div class="col-xl-4 col-lg-8 col-md-12 col-sm-12  p-3 mt-3 details-turf">
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
                <p style="font-size: 13px; color: #807D7E;">Setting the bar as one of the loudest speakers in its class,
                    the
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
                <a href="#addBanner" class="add-banner waves-effect waves-light" data-animation="blur"
                    data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" style="text-decoration: none;">
                    <div class="booknow">
                        <img src="{{ asset('assets/image/users/Groupb.svg') }}">
                        <p class="mb-0">Book <br>
                            Now</p>
                    </div>
                </a>

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
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-11 pl-0">
                        <div class="mb-3 ml-0">Time Frame
                        </div>
                        <div class="row ml-0">
                            <div class="col-sm-2 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time"
                                style="background-color:#3F61DB;color:#FFFFFF; border: #3F61DB;">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>

    </div>
</div>




<!-- Theme Modal for Add Banners -->
<div id="addBanner" class="modal-demo">

    <!-- Close Button (Bootstrap) -->
    <div style="display: flex; justify-content: space-between; align-items: center; mb-5">
        <h6 style="font-weight: 400; margin: 0; font-size:24px;">Order Confirmation</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>

    <!-- Modal Header -->
    <div class="container mt-2">
        <span style="font-size: 16px; font-weight: 500;">Details</span>
        <div class="details mt-2">
            <img src="https://storage.googleapis.com/a1aa/image/KRvt2aUnDbYrp0nea1foyzM0cEzudyRC3BzxJqBhEXU.jpg"
                alt="Placeholder image" style="border-radius: 12px;" />
            <div>
                <p style="font-size: 14px; font-weight: 500px;">Ground-1</p>
                <p style="font-size: 10px; font-weight: 300px;">3 Adderson Court<br>Chino Hills, H056824, United States
                </p>
            </div>
            <i class="fas fa-pen ml-auto"></i>
        </div>
        <div class="payment-option" style="font-size: 14px;">
            <div class="row">
                <div class="col-sm-1" style="align-self: center;">
                    <input checked type="radio" name="payment" id="upi" style="transform: scale(1.5);">
                </div>
                <div class="col-sm-4 col-xs-4 pl-1">
                    <span class="p-2">UPI</span>
                    <input class="mt-1" placeholder="@upi" type="text"
                        style="border-radius:11px ; border: 1px solid #CACACA;" />
                </div>
            </div>
        </div>
        <div class="payment-option" style="font-size: 14px;">
            <div class="row">
                <div class="col-sm-1" style="align-self: center;">
                    <input type="radio" name="payment" id="credit-card">
                </div>
                <div class="col-sm-4 pl-2">
                    <span>Credit Card</span>
                    <input class="mt-1" placeholder="2540 xxxx xxxx 2648" type="text"
                        style="border:none; background-color: #F7F8FB;" />

                </div>
                <div class="col-sm-4 d-flex ml-auto" style="padding-right: 7.5rem;">
                    <img src="{{ asset('assets/image/users/visa.svg') }}" alt="Visa logo" style="width:53px;" />
                    <img src="{{ asset('assets/image/users/Card.svg') }}" alt="Mastercard logo" />
                </div>
            </div>
        </div>
        <div class="payment-option" style="font-size: 11px; font-weight: 500; ">
            <input type="radio" name="payment-method" id="half-payment" class="mt-2">
            <label for="half-payment" class="half-payment ml-2">Half - Payment</label>
            <input type="radio" name="payment-method" id="full-payment" class="ml-5 mt-1">
            <label for="full-payment" class="ml-2 mt-0">Full - Payment</label>
        </div>
        <div class="mt-3 container">
            <div class="total">
                <span>Subtotal</span>
                <span>200.00</span>
            </div>
            <div class="total">
                <span>Tax (10%)</span>
                <span>00.00</span>
            </div>
            <div class="total">
                <span>Delivery fee</span>
                <span>200.00</span>
            </div>
            <div class="d-flex">
                <div class="total d-block">
                    <span style="color:#00183338; font-size: ;">Total Price</span><br>
                    <span class="total-price">200</span>
                </div>
                <button class="pay-button">
                    <img src="{{ asset('assets/image/users/rec.svg') }}" />
                    <span class="ml-2">Pay Now</span>
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function closeModal() {
        document.getElementById('addBanner').style.display = 'none';
    }
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/custombox@4.0.3/dist/custombox.min.js"></script>

<script src="https://unpkg.com/lucide@latest"></script>

<!-- App js -->
<script src="{{asset('assets/js/app2.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@include('users.layouts.userfooter')