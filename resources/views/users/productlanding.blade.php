@include('users.layouts.userheader')
<style>
    .img {
        height: 100px;
        width: 100px;
        border-radius: 13px;
    }

    .img:hover {
        border: 4px solid #279B5A;
    }

    .imagecol {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Centers images from top to bottom */
        text-align: right;
        align-items: flex-end;
        padding-right: 30px;
        padding-top: 30px;

    }

    /* 
    .sidebar-images img {
        width: 100%;
        cursor: pointer;
        margin-bottom: 10px;
        border-radius: 10px;
    }

    .main-image img {
        width: 100%;
        border-radius: 10px;
    }

    .booking-dates .date-box {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        margin: 5px;
    }

    .date-box.active {
        background-color: #279B5A;
        color: white;
    } */

    .booknow {
        border: 2px solid #279B5A;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
        color: #279B5A;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        margin-top: 20px;
    }

    .booknow:hover {
        background: #279B5A;
        color: white;
    }

    .amenities,
    .sports {
        display: flex;
        gap: 10px;
    }

    .amenities div,
    .sports div {
        padding: 15px;
        border: 2px solid #D0D5DD;
        border-radius: 100px;
        min-width: 80px;
        text-align: center;
    }

    /* .sports div.active {
        background-color: #279B5A;
        color: white;
    } */

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

    .turfbtn:hover{
        border: #279B5A;
        background-color: #279B5A;
        color: white;
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
        <div class="col-md-4">
            <img src="{{ asset('assets/image/users/Group 95.svg') }}" alt="Turf" style=><br>
        </div>
        <div class="col-md-4 details p-3 mt-3">
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
            <p style="font-size: 13px; color: #807D7E;">Setting the bar as one of the loudest speakers in its class, the Kilburn is a
                compact,
                stout-hearted hero with a well-balanced audio.</p>

            <h6>Size</h6>
            <div class="d-flex gap-3">
                <button class="turfbtn"><b>Turf A : </b>600x600</button>
                <button class="turfbtn"><b>Turf B : </b> 600x600</button>
            </div>

            <h6 class="mt-3">Amenities</h6>
            <div class="amenities">
                <div class="amemity"></div>
                <div class="amemity"></div>
                <div class="amemity"></div>
                <div class="amemity"></div>
            </div>

            <h6 class="mt-3">Select Sports</h6>
            <div class="sports">
                <div class="active">⚽</div>
                <div>🏏</div>
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <div class="booknow">➤ Book Now</div>
        </div>
    </div>
</section>
@include('users.layouts.userfooter')