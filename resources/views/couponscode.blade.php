@include('adminlayouts.header')
    <style>
    
        @media (min-width: 576px) {
            .banner-container {
                width: 90% !important; /* Makes it take 90% of the available space on medium screens */
            }
        }

        @media (min-width: 992px) {
            .banner-container {
                width: 400px !important; /* Fixed width for larger screens */
            }
        }

        body{
            /* font-size: 15px;
            font-family: 'Inter', sans-serif; */
            font-weight: 400 !important;
            /* letter-spacing: 0.9px;
            background-color: #F5F5F5; */
        }
        
        .hr {
            border-color: grey;
        }
        
        .modal-content {
            border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                height: 50%;
                width: 80%;
                line-height: 0px;
        }

        .table tbody tr td {
            vertical-align: middle;
            font-size: 14px;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .pagination .page-item .page-link {
            border-radius: 5px;
            color: #6c757d;
        }

        .pagination .page-item.active .page-link {
            background-color: #198754;
            border-color: #198754;
            color: white;
        }
        thead {
            position: sticky;
            background: #F5F5F5;
            top: 0;
            z-index: 10;
        }
        .table-container {
            max-height: 400px; /* Adjust as needed */
            overflow-y: auto;
            scrollbar-width: none; 
            position: relative;
        }
        .pagination-container {
            position: sticky;
            bottom: 0;
            background-color: #F5F5F5;
            padding: 10px 0;
            z-index: 2;
            text-align: center;
            /* box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);  */
        }
        table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
            text-align: left;
        }
        .app-search .form-control {
            padding-left: 15px;
        }
    </style>

 
                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>Coupons & Offers</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                        <!-- Button to trigger modal -->
                        <a href="#add" class="add-coupon waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                            <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Coupons</h2>
                        </a>

                        <!-- Custom theme modal -->
                        <div id="add" class="modal-demo" style="width: 400px !important; padding: 20px; border-radius: 12px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                            <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%;">
                                <h4 class="add-title">Create Coupons</h4>
                                <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="add-text" style="font-size: 12px; letter-spacing: 0.9px; line-height: normal;">
                                <div class="container-fluid">
                                    <div class="mt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img class="justify-content-center ml-2" src="{{ asset('assets/image/coupon.svg') }}" alt="dashboard" style="height: 70px; width: 320px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Coupons Name</strong>
                                                <input type="text" class="form-control" placeholder="End of Year" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Valid Date</strong>
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">

                                            </div>
                                            <div class="col-md-6">
                                                <strong>Expire Date</strong>
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 ml-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Discount *(%)</strong>
                                                <input type="text" class="form-control" placeholder="20%" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Discount(₹)</strong>
                                                <input type="text" class="form-control" placeholder="100 ₹" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Min. Order</strong>
                                                <input type="text" class="form-control" placeholder="500 ₹" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer m-3 mr-2" style="border: none;">
                                <button type="button" class="btn btn-success px-5">CREATE</button>
                            </div>
                        </div>


                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2" style="overflow: hidden;">
                                    <div class="table-container" style="max-height: 400px; overflow-y: auto;">
                                        <table id="responsive-datatable" id="coupontable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>Coupon Code</th>
                                                    <th>Created Date</th>
                                                    <th>Created By</th>
                                                    <th>Name</th>
                                                    <th>Validity</th>
                                                    <th>Discount(₹/%)</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="codeSearch" class="form-control" placeholder="Code" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="createdateSearch" class="form-control" placeholder="date" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="createdbySearch" class="form-control" placeholder="Role" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="nameSearch" class="form-control" placeholder="Name" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="validitySearch" class="form-control" placeholder="Date" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="discountSearch" class="form-control" placeholder="Discount" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-info" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Full</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-info" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Online</span></h4></td>
                                                    <td>
                                                    <!-- Trigger Button -->
                                                    <a href="infoModal" class="coupon-detail waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" href="#infoModal"></i>
                                                    </a>
                                                        <!-- Custom Theme Modal -->
                                                        <div id="infoModal" class="modal-demo" style="width: 400px !important; padding: 20px; border-radius: 12px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                                                            <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%;">
                                                                <h4 class="modal-title">View Coupons</h4>
                                                                <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 12px; letter-spacing: 0.9px; line-height: normal;">
                                                                <div class="container-fluid">
                                                                    <div class="mt-0">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <img class="justify-content-center ml-2 " src="{{ asset('assets/image/coupon.svg')}}" alt="dashboard" style="height: 70px; width: 320px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 mt-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Created By : </strong><span class="text-muted">Mr. Abhishek</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Turf ID : </strong><span class="text-muted">784412</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Created On : </strong><span class="text-muted"> dd/mm/yyyy </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Valid Date : </strong><span class="text-muted"> 9876 </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12 ml-4">
                                                                                <strong>Start Date : </strong><span class="text-muted"> 9876 </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12 ml-4">
                                                                                <strong>End Date : </strong><span class="text-muted"> 9876 </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Min. Order : </strong><span class="text-muted"> 800 </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 ml-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <strong>Discount : </strong><span class="text-muted"> 500 </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer" style="border: none;">
                                                                <button type="button" class="btn btn-success px-5 mr-4 mb-4">Save</button>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567891</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000003 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567892</td>
                                                    <td><h4><span class="badge badge-soft-info" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Full</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Part</span></h4></td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Vender</span></h4></td>
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                    
                                <!-- Custom Pagination -->
                                <div class="pagination-container">
                                    <nav>
                                        <ul class="pagination custom-pagination mb-0">
                                            <!-- Custom pagination links will be inserted here by JS -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
       


    <script>
        // $(document).ready(function () {
        //     // Get the current page URL (excluding query params)
        //     var currentUrl = window.location.pathname.split("/").pop();

        //     // Loop through sidebar links
        //     $(".side-nav-link").each(function () {
        //         var linkUrl = $(this).attr("href");

        //         // If the href matches the current page, add 'active' class
        //         if (linkUrl === currentUrl) {
        //             $(this).addClass("active");

        //             // Optional: Add active class to the parent <li> for better styling
        //             $(this).closest(".side-nav-item").addClass("active");
        //         }
        //     });
        // });



        $(document).ready(function () {
            var table = $('#responsive-datatable').DataTable({
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": false,
                "pageLength": 10,  // Show 10 records per page
                "lengthChange": false,
                "dom": 'rt',
            });

            function createCustomPagination() {
                var pageInfo = table.page.info();
                var totalPages = pageInfo.pages;
                var currentPage = pageInfo.page;
                var pagination = $('.custom-pagination');
                pagination.empty();

                // Previous Button
                pagination.append('<li class="page-item ' + (currentPage === 0 ? 'disabled' : '') + '"><a class="page-link prev-page" href="javascript:void(0);">&lt;</a></li>');

                // First Page
                if (totalPages > 0) {
                    pagination.append('<li class="page-item ' + (currentPage === 0 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="0">1</a></li>');
                }

                // Show '...' before current range if needed
                if (currentPage > 2) {
                    pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                }

                // Show two pages around the current page
                for (var i = Math.max(1, currentPage - 1); i <= Math.min(totalPages - 2, currentPage + 1); i++) {
                    pagination.append('<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + i + '">' + (i + 1) + '</a></li>');
                }

                // Show '...' before last page if needed
                if (currentPage < totalPages - 3) {
                    pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                }

                // Last Page
                if (totalPages > 1) {
                    pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + (totalPages - 1) + '">' + totalPages + '</a></li>');
                }

                // Next Button
                pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'disabled' : '') + '"><a class="page-link next-page" href="javascript:void(0);">&gt;</a></li>');
            }

            // Pagination Click Events
            $(document).on('click', '.page-num', function () {
                var pageNum = $(this).data('page');
                table.page(pageNum).draw(false);
                createCustomPagination();
            });

            $(document).on('click', '.prev-page', function () {
                var currentPage = table.page.info().page;
                if (currentPage > 0) {
                    table.page(currentPage - 1).draw(false);
                    createCustomPagination();
                }
            });

            $(document).on('click', '.next-page', function () {
                var currentPage = table.page.info().page;
                var totalPages = table.page.info().pages;
                if (currentPage < totalPages - 1) {
                    table.page(currentPage + 1).draw(false);
                    createCustomPagination();
                }
            });

            // Initialize Pagination
            createCustomPagination();


            $('#codeSearch').on('keyup', function () {
                table.column(0).search(this.value).draw();
            });
            
            $('#createdateSearch').on('keyup', function () {
                table.column(1).search(this.value).draw();
            });
    
            $('#createdbySearch').on('keyup', function () {
                table.column(2).search(this.value).draw();
            });
    
            $('#nameSearch').on('keyup', function () {
                table.column(3).search(this.value).draw();
            });
    
            $('#validitySearch').on('keyup', function () {
                table.column(4).search(this.value).draw();
            });
    
            $('#discountSearch').on('keyup', function () {
                table.column(5).search(this.value).draw();
            });
    

            $('#codeSearch, #createdateSearch, #createdbySearch, #nameSearch, #validitySearch, #discountSearch').on('keyup', function () {
                table.draw();
                createCustomPagination(); // Update pagination based on filtered results
            });


        });






        


        $(document).ready(function () {
            $(document).on("click", ".coupon-detail", function (e) {
                e.preventDefault();

                // Check if screen width is less than 768px (mobile devices)
                if ($(window).width() < 846) {
                    // Open Modal using Custombox
                    new Custombox.modal({
                        content: {
                            effect: "blur",
                            target: "#infoModal"
                        }
                    }).open();
                }
            });

            // Close Modal
            $(document).on("click", ".btn-close", function () {
                Custombox.modal.close();
            });
        });

    </script>
@include('adminlayouts.footer')


        