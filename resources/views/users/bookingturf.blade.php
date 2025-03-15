@include('users.layouts.userheader')
<link href="https://fonts.googleapis.com/css2?family=Monda:wght@400..700&display=swap" rel="stylesheet">

<style>
    body {
        background-color: #FFFFFF;
        font-size: 15px;
        font-family: 'NATS', sans-serif !important;
    }

    .filter-box {
        background: white;
        padding-top: 20px;
        padding-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #BEBCBD;
        border-bottom: 1px solid #BEBCBD;
        border-bottom-right-radius: 10px;
    }

    .card-img-top {
        padding: 1px;
    }

    .filter-box h6 {
        color: #2ea44f;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .filter-box label {
        font-weight: 400;
        color: #279B5A;
    }

    .imagebox .active {
        color: #8A33FD;
    }
.imagebox{
    color:#3F4646;
}
    .form-control {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        font-size: 14px;
    }

    .form-control::placeholder {
        color: #ccc;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #2ea44f;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card img {
        height: 200px;
        object-fit: cover;
    }

    .favorite {
        position: absolute;
        top: 20px;
        right: 20px;
        background: white;
        border-radius: 50%;
        /* padding: 5px; */
    }

    .favorite img {
        height: 40px;
        weight: 10px;
    }

    .card-img-top {
        border-radius: 17px;

    }

    .filter {
        padding-left: 30px;
        padding-right: 20px;
    }

    .card {
        margin-right: 20px;
        padding: 2px;
        border-radius: 17px;
    }



    .content {
        padding-top: 0px;
    }

    .imgcontent {
        font-size: 13.27px;
        align-self: center;
        color: #807D7E;
        font-family: "Monda", serif !important;
    }

    .imgprice {
        background-color: #F6F6F6;
        font-weight: 600;
        padding: 10px;
        display: inline-block;
        border-radius: 10px;
        color: #3E3C37;
    }

    .imgrate {
        background-color: #E0F1E8;
        font-size: 10px;
        font-weight: 600;
        padding: 10px;
        margin-left: auto;
        border-radius: 10px;
        color: #63615D;
    }

    .input-with-icon {
        padding-left: 35px;
    }

    .input-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
    }

    .search-with-icon {
        padding-right: 35px;
        font-size: 16px;
        border-radius: 12px;
        border: none;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        /* Adds a shadow */

    }

    .search-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
    }

    .imgdetails {
        display: flex;
    }

    .input-with-icon::placeholder {
        font-size: 14px;
        letter-spacing: 1px;
        color: #DDDDDD;
        padding: 5px;
    }

    @media (min-width: 575px) and (max-width: 1441px) {
        .imgdetails {
            display: block;
        }

        .imgcontent {
            padding-bottom: 5px;
        }

        .imgprice {
            margin-top: 5px;
        }
    }

    .header-2 {
        display: none;
    }

    @media (max-width: 390px) {
        .imgdetails {
            display: block;
        }

        .imgcontent {
            padding-bottom: 5px;
        }

        .imgprice {
            margin-top: 5px;
        }

    }

    @media (max-width: 575px) {
        .imagebox {
            padding: 40px;
        }

        .header-1 {
            display: none;
        }

        .header-2 {
            display: flex;
        }

    }
    @media (min-width:576px) and (max-width:768px) {
        .imagebox {
            padding-left: 70px;
        }
        .filter-box{
            width:200px;
        }
        .header-1 {
            display: none;
        }

        .header-2 {
            display: flex;
        }
    }
    @media (min-width:992px) and (max-width:1400px) {
        .imagebox {
            padding-left: 110px;
        }
        .filter-box{
            width:250px;
        }
    }
    .imagname{
        font-weight: 400px;
        font-size:22px;
        color: #3E3C37;
    }
    .header-1,.header-2{
        font-size: 22px;
        font-weight: 400;
    }
    
</style>
<section class="content">   
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3">
            <div class="filter-box">
                <div class="filter">
                    <h6>Filter<img src="{{ asset('assets/image/users/filter.svg') }}"></h6>
                </div>
                <hr>
                <div class="filter">
                    <label>Date</label>
                    <div class="position-relative mb-2">
                        <img src="{{ asset('assets/image/users/note.svg') }}" alt="Icon" class="input-icon">
                        <input type="text" class="form-control input-with-icon" placeholder="DD/MM/YYYY" id="dateInput">
                    </div>
                    <div class="text-center" style="font-size: 12px;">to</div>
                    <div class="position-relative mb-2">
                        <img src="{{ asset('assets/image/users/note.svg') }}" alt="Icon" class="input-icon">
                        <input type="text" class="form-control input-with-icon" placeholder="DD/MM/YYYY" id="todateInput">
                    </div>
                </div>
                <hr>
                <div class="filter">
                    <label>Time Available</label>
                    <div class="position-relative mb-2">
                        <img src="{{ asset('assets/image/users/Vector.svg') }}" alt="Icon" class="input-icon">
                        <input type="text" class="form-control input-with-icon" placeholder="09:00 pm" id="timeInput">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-9 col-sm-9 imagebox mt-1">
            <div class="row mt-3 mb-3 pl-2">
                <div class="col-lg-5 col-md-4 col-sm-6">
                    <h6 class="pt-1" style="font-size: 22px;"><strong> Turf Booking</strong> </h6>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <form class="app-search">
                        <div class="position-relative mb-2">
                            <input type="text" class="form-control search-with-icon" placeholder="Search Here">
                            <img src="{{ asset('assets/image/users/Search.svg') }}" alt="Icon" class="search-icon">
                        </div>
                    </form>
                </div>
                <div class="col-sm-1 active pl-3 pt-1 header-1" style="align-self:center;">
                    <span>New</span>
                </div>
                <div class="col-sm-2 pl-4 pt-1 header-1" style="align-self:center;">
                    <span class="ml-auto"> Recommended</span>
                </div>
                <div class="header-2 ">
                    <div class="col-sm-6 active pl-3 pt-1" style="align-self:center;">
                        <span>New</span>
                    </div>
                    <div class="col-sm-6 pl-4 pt-1 text-right" style="align-self:center;">
                        <span class="ml-auto"> Recommended</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('assets/image/users/booking1.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12 ">
                                    <img src="{{ asset('assets/image/users/booking2.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12 ">
                                    <img src="{{ asset('assets/image/users/booking3.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('assets/image/users/booking3.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12 ">
                                    <img src="{{ asset('assets/image/users/booking1.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card position-relative">
                        <div class="m-1 box-image">
                            <div class="row">
                                <div class="col-12 ">
                                    <img src="{{ asset('assets/image/users/booking2.svg') }}" class="card-img-top"
                                        style="height: 100%;width: 100%;" alt="Turf">
                                </div>
                            </div>
                        </div>
                        <div class="favorite">
                            <i class="fa fa-heart"></i>
                            <img src="{{ asset('assets/image/users/frame 50.svg') }}">
                        </div>
                        <div class="card-body boxcontent ">
                            <h6 class="m-0 imagname">Venue name</h6>
                            <div class="imgdetails">
                                <div class="d-flex p-0 mt-1">
                                    <img src="{{ asset('assets/image/users/location.svg') }}"
                                        style="height: 19.22px; width: 16.31px;   align-self:center;">
                                    <p class="imgcontent mb-0 ml-1 "> Vaghodia rd, Vadodara </p>
                                </div>
                                <p class="imgrate mb-0">⭐ 4.5 (200)</p>
                            </div>
                            <p class="fw-bold imgprice">$200.00/Hrs.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
</div>
</div>
<script>
    document.getElementById('dateInput').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        let formattedValue = '';

        if (value.length > 0) {
            formattedValue += value.substring(0, 2);
        }
        if (value.length > 2) {
            formattedValue += '/' + value.substring(2, 4);
        }
        if (value.length > 4) {
            formattedValue += '/' + value.substring(4, 8);
        }

        e.target.value = formattedValue;
    });
    document.getElementById('todateInput').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        let formattedValue = '';

        if (value.length > 0) {
            formattedValue += value.substring(0, 2);
        }
        if (value.length > 2) {
            formattedValue += '/' + value.substring(2, 4);
        }
        if (value.length > 4) {
            formattedValue += '/' + value.substring(4, 8);
        }

        e.target.value = formattedValue;
    });


    document.getElementById('timeInput').addEventListener('blur', function (e) {
        let value = e.target.value;
        let match = value.match(/^(\d{1,2}):(\d{2})$/);
        
        if (match) {
            let hours = parseInt(match[1], 10);
            let minutes = match[2];

            if (hours > 12) {
                hours = hours - 12;
                e.target.value = (hours < 10 ? '0' : '') + hours + ':' + minutes + ' PM';
            } else if (hours === 0) {
                e.target.value = '12:' + minutes + ' AM';
            } else if (hours === 12) {
                e.target.value = '12:' + minutes + ' PM';
            } else {
                e.target.value = (hours < 10 ? '0' : '') + hours + ':' + minutes + ' AM';
            }
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>