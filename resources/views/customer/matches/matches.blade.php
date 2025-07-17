@include('customer.layouts.header2')
<style>
    html, body {
        overflow-x: hidden;
        width: 100%;
    }

    /* body {
        overflow-x: hidden;
    } */
    .custom-card {
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.16);
        /* padding: 10px; */
        /* padding-left: 15px; */
        background: #fff;
        border: none;
    }
    .btn-outline-success {
        border-radius: 20px;
        padding: 5px 20px;
    }
    .text-success {
        font-weight: 600;
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
    @media (max-width: 768px) {
        .page-content{
            flex-grow:0;
        }
    }
    /* .row {
        --bs-gutter-x: 1.5rem;
    } */

</style>
    <div class="page-content" id="mainContent">
        <div class="page-container" style="background-color: transparent;">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0 ml-4" style=" font-family: 'Poppins', serif !important;">The Matches</h4>
                    <div class="ml-4" style="font-size: 15px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important;">
                        Details of all matches
                    </div>
                </div>
                <div class="d-flex flex-wrap bd-highlight ml-4" style="margin-top: 20px;">
                    <a class="nav-link mx-2 text-muted" data-filter="complete" href="#" style="font-size: 15px; font-weight: 600 !important;">Complete <span class="sr-only">(current)</span></a>
                    <a class="nav-link mx-2 text-muted" data-filter="going-on" href="#" style="font-size: 15px; font-weight: 600 !important;">Going ON <span class="sr-only">(current)</span></a>
                    <a class="nav-link mx-2 text-muted" data-filter="upcoming" href="#" style="font-size: 15px; font-weight: 600 !important;">Upcoming <span class="sr-only">(current)</span></a>
                    <a class="nav-link mx-2 text-muted" data-filter="bidding" href="#" style="font-size: 15px; font-weight: 600 !important;">Bidding <span class="sr-only">(current)</span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-12">
                    <div class="container mt-5">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1 pl-4" style="font-size: 18px;">Turf name</h6>
                                    <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: <strong style="font-weight: 500 !important; color: black;">IW3475453455</strong></p>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: <strong style="font-weight: 500 !important; color: black;">9:00 pm</strong></p>
                                    </div>
                                    <p class="text-muted small">Total Amount: <span>200</span></p>
                                </div>
                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-outline-success ml-3 pl-5 pr-5">Details</button>
                                    <span class="text-success" data-status="complete">Successfully completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-12">
                    <div class="container mt-5">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1 pl-4" style="font-size: 18px;">Turf name</h6>
                                    <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: <strong style="font-weight: 500 !important; color: black;">IW3475453455</strong></p>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: <strong style="font-weight: 500 !important; color: black;">9:00 pm</strong></p>
                                    </div>
                                    <p class="text-muted small">Total Amount: <span>200</span></p>
                                </div>
                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-outline-success ml-3 pl-5 pr-5">Details</button>
                                    <span class="text-success"><img class="mr-2" src="{{asset('assets/image/users/Ellipse767.svg')}}" alt="user">Live</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-12">
                    <div class="container mt-5">
                        <div class="card custom-card disabled" style="pointer-events: none; opacity: 0.6;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1 pl-4" style="font-size: 18px;">Turf name</h6>
                                    <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: <strong style="font-weight: 500 !important; color: black;">IW3475453455</strong></p>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: <strong style="font-weight: 500 !important; color: black;">9:00 pm</strong></p>
                                    </div>
                                    <p class="text-muted small">Total Amount: <span>200</span></p>
                                </div>
                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-outline-success ml-3 pl-5 pr-5">Details</button>
                                    <span class="text-warning">Up coming</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-12">
                    <div class="container mt-5">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1 pl-4" style="font-size: 18px;">Turf name</h6>
                                    <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: <strong style="font-weight: 500 !important; color: black;">IW3475453455</strong></p>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: <strong style="font-weight: 500 !important; color: black;">9:00 pm</strong></p>
                                    </div>
                                    <p class="text-muted small">Total Amount: <span>200</span></p>
                                </div>
                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-outline-success ml-3 pl-5 pr-5">Details</button>
                                    <span class="text-success"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-12">
                    <div class="container mt-5">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1 pl-4" style="font-size: 18px;">Turf name</h6>
                                    <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: <strong style="font-weight: 500 !important; color: black;">IW3475453455</strong></p>
                                        <p class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: <strong style="font-weight: 500 !important; color: black;">9:00 pm</strong></p>
                                    </div>
                                    <p class="text-muted small">Total Amount: <span>200</span></p>
                                </div>
                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-outline-success ml-3 pl-5 pr-5">Details</button>
                                    <span class="text-danger">Missed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
@include('customer.layouts.userfooter')