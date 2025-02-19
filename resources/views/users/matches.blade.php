@include('users.layouts.header2')
<style>
    body {
        overflow-x: hidden;
    }
    .custom-card {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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
</style>
            <div class="col-md-9 mt-3 ml-4 p-3">
                <h4 class="mb-0" style=" font-family: 'Poppins', serif !important;">The Matches</h4>
                <div class="" style="font-size: 15px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important;">
                    Details of all matches
                </div>
                <div class="d-flex flex-row bd-highlight" style="margin-top: 20px;">
                    <a class="nav-link mr-5 text-muted" href="#" style="font-size: 15px; font-weight: 600 !important;">Complete <span class="sr-only">(current)</span></a>
                    <a class="nav-link mr-5 text-muted" href="#" style="font-size: 15px; font-weight: 600 !important;">Going ON <span class="sr-only">(current)</span></a>
                    <a class="nav-link mr-5 text-muted" href="#" style="font-size: 15px; font-weight: 600 !important;">Upcoming <span class="sr-only">(current)</span></a>
                    <a class="nav-link mr-5 text-muted" href="#" style="font-size: 15px; font-weight: 600 !important;">Bidding <span class="sr-only">(current)</span></a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="container mt-5">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1 pl-4" style="font-size: 20px;">Turf name</h6>
                                        <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: </span><span style="font-weight: 500 !important">IW3475453455</span>
                                            <span class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: </span><span style="font-weight: 500 !important">9:00 pm</span>
                                        </div>
                                        <p class="text-muted small">Total Amount: <strong>200</strong></p>
                                    </div>
                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <button class="btn btn-outline-success pl-5 pr-5">Details</button>
                                        <span class="text-success">Successfully completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6">
                        <div class="container mt-5">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1 pl-4" style="font-size: 20px;">Turf name</h6>
                                        <span class="small pl-4" style="color: rgb(184, 180, 180);">05-12-2019</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Tracking Id: </span><span style="font-weight: 500 !important">IW3475453455</span>
                                            <span class="mb-1 small pl-4" style="color: rgb(184, 180, 180);">Quantity: </span><span style="font-weight: 500 !important">9:00 pm</span>
                                        </div>
                                        <p class="text-muted small">Total Amount: <strong>200</strong></p>
                                    </div>
                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <button class="btn btn-outline-success pl-5 pr-5">Details</button>
                                        <span class="text-success">Successfully completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6">
                        {{-- jhgfd --}}
                    </div>
                </div>
            </div>
        </div>
    {{-- </section> --}}
@include('users.layouts.userfooter')