@include('adminlayouts.header')   
 <style>
       
        .modal-demo {
            width: auto !important;
            max-height: 90vh; /* Ensures it doesn't exceed viewport height */
            border-radius: 15px;
            padding: 20px;
            overflow-y: auto;
            scrollbar-width: none; /* For Firefox */
            -ms-overflow-style: none; /* For Internet Explorer/Edge */
        }

        /* Hide scrollbar for WebKit browsers (Chrome, Safari) */
        .modal-demo::-webkit-scrollbar {
            display: none;
        }
    
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
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
    
    </style>

                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>Bookings</strong></h2>
                        </div>
                        <div class="float-end mr-3">

                            <button class="open-modal" data-id="1" style="border: none; background: none;">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Bookings</h2>
                            </button>
                            
                            <!-- Custom Modal -->
                            <div id="customModal" style="
                                    display: none;
                                    position: fixed;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    width: 400px;
                                    height: 600px; 
                                    overflow-y: auto;
                                    scrollbar-width: none; 
                                    background: #fff;
                                    padding: 25px;
                                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                                    border-radius: 13px;
                                    z-index: 1000;
                                    font-size: 13px;
                                    padding: 40px;
                                ">
                                <!-- Modal Header -->
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h4 style="font-weight: bold; margin: 0;">Add Booking</h4>
                                    <button type="button" class="btn-close close-modal"></button>
                                </div>
                            
                                <!-- Modal Body -->
                                <div class="modal-body" style="margin-top: 15px;">
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Abhishek Guleria">
                                    </div>
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="">
                                    </div>
                            
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Mob. No.</label>
                                        <input type="text" class="form-control" name="mobileno" placeholder="9876543210">
                                    </div>
                            
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Paid</label>
                                        <select id="paid" class="form-control select2">
                                            <option value="full" selected>Full</option>
                                            <option value="part">Part</option>
                                        </select>
                                    </div>
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Booked By</label>
                                        <select id="bookedby" class="form-control select2">
                                            <option value="online" selected>Online</option>
                                            <option value="vender">Vender</option>
                                        </select>
                                    </div>
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Status</label>
                                        <select id="status" class="form-control select2">
                                            <option value="done" selected>Done</option>
                                            <option value="canceled">Canceled</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                            
                                </div>
                            
                                <!-- Modal Footer -->
                                <div class="modal-footer justify-content-start mt-4" style="margin-top: 10px; text-align: center;">
                                    <button class="btn btn-success close-modal col-5">Save</button>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2">
                                    <table id="responsive-datatable" id="bookingtable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>Name</th>
                                                <th>date</th>
                                                <th>customer</th>
                                                <th>Mobile No.</th>
                                                <th>paid</th>
                                                <th>booked by</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
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
                                                                    <input type="text" id="dateSearch" class="form-control" placeholder="Date" style="border-radius: 10px;">
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
                                                                    <input type="text" id="customerSearch" class="form-control" placeholder="Customer" style="border-radius: 10px;">
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
                                                                    <input type="text" id="mobileSearch" class="form-control" placeholder="Mob. No." style="border-radius: 10px;">
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
                                                                    <input type="text" id="paidSearch" class="form-control" placeholder="Status" style="border-radius: 10px;">
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
                                                                    <input type="text" id="typeSearch" class="form-control" placeholder="Type" style="border-radius: 10px;">
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
                                                                    <input type="text" id="statusSearch" class="form-control" placeholder="Status" style="border-radius: 10px;">
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
                                                <td><h4><span class="badge badge-soft-info" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Done</span></h4></td>
                                                <td>
                                                   <!-- Add Banners Button -->
                                                    <a href="#infoModal" class="booking-details waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;"></i>
                                                    </a>

                                                    <!-- Theme Modal for Booking Details -->
                                                    <div id="infoModal" class="modal-demo modal-lg" style="width: 900px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                                                        <!-- Modal Header -->
                                                        <div class="d-flex p-3 align-items-center justify-content-between">
                                                            <h4 class="add-title">Booking Details</h4>
                                                            <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body" style="padding: 10px; font-size: 12px; letter-spacing: 0.9px;">
                                                            <div class="container-fluid">
                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>Booking On: </strong><span class="text-muted">Date</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Venue: </strong><span class="text-muted">Name</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Sports: </strong><span class="text-muted">Cricket</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>Booking By: </strong><span class="text-muted">Abhishek Guleria</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Mobile No.: </strong><span class="text-muted">1234567890</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Email: </strong><span class="text-muted">abishekguleria1555@gmail.com</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>Coupons: </strong><span class="text-muted">-</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Settlement: </strong><span class="text-muted">Name</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Canceled On: </strong><span class="text-muted">-</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>User Id: </strong><span class="text-muted">9876</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Trans Id: </strong><span class="text-muted">8899975</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Booked ON: </strong><span class="text-muted">Vendor</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>Total Amount: </strong><span class="text-muted">800</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Discount: </strong><span class="text-muted">-</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Tax: </strong><span class="text-muted">-</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <strong>Paid: </strong><span class="text-muted">500</span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <strong>Remaining: </strong><span class="text-muted">300</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            Booking:
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <strong>Spot:</strong>
                                                                            <div class="text-muted mb-3">Turf - A</div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <strong>Time:</strong>
                                                                            <div class="text-muted mb-3">00:00 PM - 00:00 PM</div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <strong>In:</strong>
                                                                            <div class="text-muted mb-3">00:00 AM</div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <strong>Out:</strong>
                                                                            <div class="text-muted mb-3">   -   </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Canceled</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
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
                                                <td><h4><span class="badge badge-soft-warning" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4></td>
                                                <td>
                                                    <i class="bi bi-info-circle" style="font-size: 19px; color: blue"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                    
                                <!-- Custom Pagination -->
                                <nav>
                                    <ul class="pagination custom-pagination mb-0" style="margin-left: 340px;">
                                        <!-- Custom pagination links will be inserted here by JS -->
                                    </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div> 
                </div>
            


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 

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



        // $(document).ready(function () {
        //     var table = $('#responsive-datatable').DataTable({
        //         "ordering": false,
        //         "paging": true,
        //         "searching": true,
        //         "info": false,
        //         "pageLength": 10,  // Show 10 records per page
        //         "lengthChange": false,
        //         "dom": 'rt',
        //     });

        //     function columnSearch(inputSelector, columnIndex) {
        //         $(inputSelector).on('keyup', function () {
        //             table.column(columnIndex).search(this.value).draw();
        //         });
        //     }

        //     // Attach search functionality to respective input fields
        //     columnSearch('#nameSearch', 0);
        //     columnSearch('#dateSearch', 1);
        //     columnSearch('#customerSearch', 2);
        //     columnSearch('#mobileSearch', 3);
        //     columnSearch('#paidSearch', 4);
        //     columnSearch('#typeSearch', 5);
        //     columnSearch('#statusSearch', 6);

        //     // Function to create custom pagination
        //     function createCustomPagination() {
        //         var totalPages = table.page.info().pages;  // Get total number of pages
        //         var currentPage = table.page.info().page; // Get current page (zero-based index)
        //         var pagination = $('.custom-pagination');
        //         pagination.empty();  // Clear existing pagination

        //         // Create previous button (disable if on first page)
        //         var prevDisabled = (currentPage === 0) ? 'disabled' : '';
        //         pagination.append('<li class="page-item ' + prevDisabled + '"><a class="page-link" href="javascript:void(0);" id="prevPage">&lt;</a></li>');

        //         // Create page numbers
        //         for (var i = 0; i < totalPages; i++) {
        //             var activeClass = (i === currentPage) ? 'active success' : '';
        //             pagination.append('<li class="page-item ' + activeClass + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + i + '">' + (i + 1) + '</a></li>');
        //         }

        //         // Create next button (disable if on last page)
        //         var nextDisabled = (currentPage === totalPages - 1) ? 'disabled' : '';
        //         pagination.append('<li class="page-item ' + nextDisabled + '"><a class="page-link" href="javascript:void(0);" id="nextPage">&gt;</a></li>');
        //     }

        //     // Custom pagination button click handlers
        //     $(document).on('click', '.page-num', function () {
        //         var pageNum = $(this).data('page');  // Get page number from `data-page` attribute
        //         table.page(pageNum).draw(false);
        //         createCustomPagination();  // Update pagination
        //     });

        //     $(document).on('click', '#prevPage', function () {
        //         if (!$(this).parent().hasClass('disabled')) {
        //             table.page('previous').draw(false);
        //             createCustomPagination();
        //         }
        //     });

        //     $(document).on('click', '#nextPage', function () {
        //         if (!$(this).parent().hasClass('disabled')) {
        //             table.page('next').draw(false);
        //             createCustomPagination();
        //         }
        //     });

        //     // Initialize the custom pagination
        //     createCustomPagination();
        // });



        $('#nameSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });
        
        $('#dateSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#customerSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#mobileSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });

        $('#paidSearch').on('keyup', function () {
            table.column(4).search(this.value).draw();
        });

        $('#typeSearch').on('keyup', function () {
            table.column(5).search(this.value).draw();
        });

        $('#statusSearch').on('keyup', function () {
            table.column(6).search(this.value).draw();
        });



      



        // $(document).ready(function () {
        //     // Handle Modal Click
        //     $(document).on("click", ".booking-details", function (e) {
        //         e.preventDefault();

        //         // Open Modal using Custombox
        //         new Custombox.modal({
        //             content: {
        //                 effect: "blur",
        //                 target: "#infoModal"
        //             }
        //         }).open();
        //     });

        //     // Close Modal
        //     $(document).on("click", ".btn-close", function () {
        //         Custombox.modal.close();
        //     });
        // });

        $(document).ready(function () {
            $(document).on("click", ".booking-details", function (e) {
                e.preventDefault();

                // Check if screen width is less than 768px (mobile devices)
                if ($(window).width() < 768) {
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





        $(document).ready(function () {
            // Initialize Select2
            $(".select2").select2({
                dropdownParent: $("#customModal") // Fix for dropdown behind modal
            });

            // Open Custombox Modal
            $(document).on("click", ".open-modal", function () {
                var userRole = $(this).data("role");
                $("#userRole").val(userRole).trigger("change"); // Set selected role
                
                new Custombox.modal({
                    content: {
                        effect: "blur",
                        target: "#customModal"
                    }
                }).open();
            });

            // Close Modal
            $(document).on("click", ".close-modal", function () {
                Custombox.modal.close();
            });
        });


    
    </script>
@include('adminlayouts.footer')