@include('users.layouts.header2')
<link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/app2.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
<style>
    .body {
        font-family: 'poppins', sans-serif !important;
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
            margin-right: 7px;
            width: 20%;
        }
    }

    @media (max-width: 450px) {
        .booking-time {
            margin-right: 13px;
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

    @media(min-width:415px)and (max-width:435px) {
        .half-payment {
            margin-right: 170px;
        }

        #full-payment {
            margin-left: 0px !important;
        }
    }

    @media (max-width:410px) {
        #full-payment {
            margin-left: 0px !important;
        }
    }

    @media (min-width: 391px) and (max-width: 415px) {
        .half-payment {
            margin-right: 150px;
        }

        #full-payment {
            margin-left: 0px !important;
        }

    }

    @media (min-width: 375px) and (max-width: 391px) {
        .half-payment {
            margin-right: 120px;
        }
    }

    @media(min-width: 361px) and (max-width: 375px) {
        .half-payment {
            margin-right: 110px;
        }
    }

    @media (max-width: 360px) {
        .half-payment {
            margin-right: 100px;
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


    /* Hide default radio button */
    input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 15px;
        height: 15px;
        border: 2px solid black;
        /* Black border */
        border-radius: 50%;
        outline: none;
        cursor: pointer;
        position: relative;
    }

    /* Add black dot when checked */
    input[type="radio"]:checked::before {
        content: "";
        width: 8.5px;
        height: 8.5px;
        background-color: black;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
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
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        color: #000000;
        font-weight: 400;
        font-size: 15px;
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

    @media (max-width:650px) {

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
                    data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
                    style="text-decoration: none;">
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
                <div class="col-lg-2 col-md-2 col-sm-2 pl-0 booking-icon">
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

                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-11 pl-0">
                        <div class="mb-3 ml-0">Time Frame
                        </div>
                        <div class="row ml-0">
                            <div class="col-sm-2 booking-time" style="background-color:#279B5A;color:#FFFFFF;">
                                09:00 pm <br> to <br> 10:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm <br> to <br> 10:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm <br> to <br> 10:00 pm
                            </div>
                            <div class="col-sm-2 booking-time">
                                09:00 pm <br> to <br> 10:00 pm
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




<div id="addBanner" class="modal-demo">

    <div style="display: flex; justify-content: space-between; align-items: center; mb-5">
        <h6 style="font-weight: 400; margin: 0; font-size:24px;">Order Confirmation</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>

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
        <div class="mt-3 container mb-2">
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
    function generateCurrentWeek() {
        const dateSelection = document.getElementById("dateSelection");
        dateSelection.innerHTML = "";

        let today = new Date();
        let dayOfWeek = today.getDay();
        let startOfWeek = new Date(today);
        startOfWeek.setDate(today.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1));

        for (let i = 0; i < 8; i++) {
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
    function closeModal() {
        document.getElementById('addBanner').style.display = 'none';
    }

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

        // function displayWeek() {
        //     const weekDates = getNext7Days();
        //     const today = new Date().getDate();

        //     weekContainer.innerHTML = weekDates.map(date =>
        // `<div class="week-day">
        //     <strong class="${date.dayNumber === today ? 'highlight' : ''}" style="font-size: 18px;">${date.dayNumber}</strong>
        //     <div style="font-size: 12px; font-weight: bold;">${date.dayName}</div>
        // </div>`
        //         `
        //     ).join('');
        // }

        const days = getNext7Days().map(date => `${date.dayName} ${date.dayNumber}`);
        const times = ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"];

        function populateSelectors() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            for (let i = 0; i < 12; i++) {
                let option = document.createElement("option");
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/custombox@4.0.3/dist/custombox.min.js"></script>

<script src="https://unpkg.com/lucide@latest"></script>

<!-- App js -->
<script src="{{asset('assets/js/app2.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@include('users.layouts.userfooter')