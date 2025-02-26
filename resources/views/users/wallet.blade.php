@include('users.layouts.header2')
<style>
    html, body {
        overflow-x: hidden;
        width: 100%;
    }
    .custom-card {
        /* border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.16);
        padding: 10px; */
        /* padding-left: 15px; */
        /* background: #fff;
        border: none; */
    }
    .main-container {
        display: flex;
    }

    .sidebar {
        flex-shrink: 0;
    }

    .page-content {
        flex-grow: 1;
        padding: 20px; /* Adjust spacing */
    }


</style>
    <div class="page-content" id="mainContent">
        <div class="page-container" style="background-color: transparent;">
            <div class="wallet-container" id="wallet-container">
                <div class="row">
                    <div class="col-8 col-md-10">
                        <h3 class="mb-0 ml-md-4" style=" font-family: 'Poppins', serif !important;">Wallet</h3>
                        <div class="ml-md-4" style="font-size: 15px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important;">
                            Details of the wallet and cashbacks
                        </div>
                    </div>
                    <div class="col-4 col-md-2 text-right">
                        <img style="margin-bottom: 3px; margin-right: 5px;" src="{{asset('assets/image/users/historyclock.svg')}}" class="img-fluid" alt="history">
                        <a href="" class="history-btn d-block d-md-inline" id="history-btn" style="text-decoration: none; color: red;">History</a>
                    </div>
                    <div class="d-flex flex-wrap bd-highlight ml-4" style=" margin-top: 20px;">
                        <button class="p-4 mr-4 buttons" style="border-radius: 34px; border: none; background-color: #e6e6e9;">
                            <span class="d-inline-flex align-items-center wallet" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: white; border-radius: 190px;">
                                <img style="margin-bottom: 3px; margin-right: 5px;" src="{{asset('assets/image/users/empty-wallet.svg')}}" alt="history">
                                Rs. 200.00
                            </span>
                            <span class="d-inline-flex align-items-center mr-3 ml-3 wallet" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: white; border-radius: 190px;">
                                <img style="margin-bottom: 3px; margin-right: 5px;" src="{{asset('assets/image/users/usd-coin-(usdc).svg')}}" alt="coin">
                                Rs. 200.00
                                <a class="btn btn-success ml-3" href="" style="padding-top: 2px; padding-bottom: 3px; padding-left: 15px; padding-right: 16px; margin-bottom: 3px; align-self: center; border-radius: 15px; font-size: 12px;">Shop</a>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="mb-0 mt-5" style="margin-left: 30px; font-family: 'Poppins', serif !important;">
                            Scratch Cards
                        </h5>
                    </div>
                </div>
                <div class="row" style="margin-left: 40px;">
                    <div class="col-md-12 d-flex flex-wrap">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Maskgroup.svg')}}" alt="card" height="150px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Maskgroup.svg')}}" alt="card" height="150px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Maskgroup.svg')}}" alt="card" height="150px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Maskgroup.svg')}}" alt="card" height="150px">
                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="mb-0 mt-5" style="margin-left: 30px; font-family: 'Poppins', serif !important;">
                            Products
                        </h5>
                    </div>
                    <div class="col-md-2 mt-5 pr-5">
                        <a class="" href="" style="text-decoration: none; font-size: 15px; float: right;">View all</a>
                    </div>
                </div>
                <div class="row" style="margin-left: 40px;">
                    <div class="col-md-12 d-flex flex-wrap ">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group11.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group12.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">

                        {{-- <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group12.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px"> --}}
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="mb-0 mt-5" style="margin-left: 30px; font-family: 'Poppins', serif !important;">
                            Products
                        </h5>
                    </div>
                    <div class="col-md-2 mt-5 pr-5">
                        <a class="" href="" style="text-decoration: none; font-size: 15px; float: right;">View all</a>
                    </div>
                </div>
                <div class="row" style="margin-left: 40px;">
                    <div class="col-md-12 d-flex flex-wrap">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group11.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group12.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">
                        <img class="img-fluid mt-4 mx-2" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="170px">

                        {{-- <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group12.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px">
                        <img class="mt-4" style="margin-left: 11px;" src="{{asset('assets/image/users/Group13.svg')}}" alt="card" height="220px"> --}}
                        
                    </div>
                </div>
            </div>

            <div class="history-container container-fluid" id="history-container">
                {{-- <button id="wallet-btn">Wallet</button> --}}

                <div class="row mb-4">
                    <div class="col-8 col-md-10">
                        <h3 class="mb-0 ml-md-4" style=" font-family: 'Poppins', serif !important;">History</h3>
                        <div class="ml-md-4" style="font-size: 15px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important;">
                            Update any changes
                        </div>
                    </div>
                    <div class="col-4 col-md-2 text-right">
                        <a href="" class="history-btn d-block d-md-inline" id="wallet-btn" style="text-decoration: none;">Wallet</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                        <div class="container" style="padding-left: 0px;">
                            <div class="card custom-card border-0" style="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Receive Points</span>
                                                <span class="text-success fw-bold">+20.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="font-size: 12px; color: #b3aeae;">
                                                <span class="mt-2">From Scratch Card</span>
                                                <span class="mt-2">Feb 21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                        <div class="container" style="padding-left: 0px;">
                            <div class="card custom-card border-0" style="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Receive Points</span>
                                                <span class="text-success fw-bold">+20.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="font-size: 12px; color: #b3aeae;">
                                                <span class="mt-2">From Scratch Card</span>
                                                <span class="mt-2">Feb 21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                        <div class="container" style="padding-left: 0px;">
                            <div class="card custom-card border-0" style="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Receive Points</span>
                                                <span class="text-success fw-bold">+20.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="font-size: 12px; color: #b3aeae;">
                                                <span class="mt-2">From Scratch Card</span>
                                                <span class="mt-2">Feb 21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                        <div class="container" style="padding-left: 0px;">
                            <div class="card custom-card border-0" style="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Receive Points</span>
                                                <span class="text-success fw-bold">+20.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="font-size: 12px; color: #b3aeae;">
                                                <span class="mt-2">From Scratch Card</span>
                                                <span class="mt-2">Feb 21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
                        <div class="container" style="padding-left: 0px;">
                            <div class="card custom-card border-0" style="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Receive Points</span>
                                                <span class="text-success fw-bold">+20.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="font-size: 12px; color: #b3aeae;">
                                                <span class="mt-2">From Scratch Card</span>
                                                <span class="mt-2">Feb 21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const walletContainer = document.getElementById("wallet-container");
        const historyContainer = document.getElementById("history-container");
        const historyBtn = document.getElementById("history-btn");
        const walletBtn = document.getElementById("wallet-btn");

        historyContainer.style.display = "none";

        historyBtn.addEventListener("click", function (event) {
            event.preventDefault();
            walletContainer.style.display = "none";
            historyContainer.style.display = "block";
        });

        walletBtn.addEventListener("click", function (event) {
            event.preventDefault();
            historyContainer.style.display = "none";
            walletContainer.style.display = "block";
        });
    });

</script>

@include('users.layouts.userfooter')