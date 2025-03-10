@include('adminlayouts.header')
    <style>
        
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-content {
            overflow: hidden;
            white-space: nowrap; 
        }
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-dot {
            overflow: hidden;
        }
        .sidebar-footer {
            position: sticky;
            bottom: 0;
            background: rgb(24, 24, 24);
            color: white;
            text-align: center;
            padding: 1px;
            width: 100%;
            z-index: 10; 
        }
        .select2-container .select2-selection--single {
            height: 35px !important; /* Match input field height */
            display: flex !important;
            align-items: center !important; /* Align vertically */
            border: 1px solid #ced4da !important; /* Match input border */
            padding: 6px 12px !important; /* Match input padding */
            border-radius: 5px !important; /* Match input border radius */
        }

        .select2-container .select2-selection__arrow {
            height: 38px !important;
            top: 50% !important;
            transform: translateY(-50%) !important; /* Center the arrow */
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 30px !important; /* Adjust clear (×) icon */
            top: 50% !important;
            transform: translateY(-50%) !important; /* Center the clear icon */
        }

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

        .app-topbar .topbar-menu {
            background-color: #F5F5F5;   
        }
        body{
            /* font-size: 15px;
            font-family: 'Inter', sans-serif; */
            font-weight: 400 !important;
            /* letter-spacing: 0.9px;
            background-color: #F5F5F5; */
        }
        .side-nav{
            height: 30px;
            padding-top: 70px;
        }
        .side-nav .side-nav-item .side-nav-link {
            font-size: 12px; 
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            color: rgb(197, 193, 193);
            letter-spacing: 0.9px;
            padding: 7px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-icon {
           height: 20px;
           width: 20px;
           font-size: 10px;
           padding-left: 30px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-text {
           padding-left: 20px;
        }
        .app-topbar .app-search .form-control {
            height: 35px;
            /* width: 200px; */
            border-radius: 10px 0 0 10px;
            background-color: white;
            box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);
        }
        .app-topbar .app-search .btn-icon {
            height: 35px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 0 10px 10px 0;
            background-color: white;
        }
        .notification-icon {
            height: 20px;
        }
        .page-title-box {
            background-color: #F5F5F5;
        }
        .hr {
            border-color: grey;
        }
        .custom-pagination {
            display: flex;
            flex-wrap: nowrap;  /* Prevents vertical stacking */
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            /* overflow-x: auto;  Enables horizontal scrolling if needed */
            white-space: nowrap;  /* Keeps buttons in one row */
        }

        .custom-pagination .page-item {
            display: inline-block;
        }

        .custom-pagination .page-link {
            padding: 6px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: rgb(0, 128, 96);
            color: white;
            font-weight: bold;
        }

        .custom-pagination .page-link:hover {
            background-color: #f8f9fa;
            border-color: #bbb;
        }

        /* POS Terminal & Small Mobile Screens (Fix Vertical Issue) */
        @media (max-width: 480px) {
            .custom-pagination {
                flex-wrap: nowrap;  /* Prevents stacking */
                overflow-x: auto;  /* Adds horizontal scrolling if needed */
                padding: 5px 0;
            }

            .custom-pagination .page-link {
                padding: 4px 6px;
                font-size: 10px;
            }
        }

        /* Mobile Phones (Fix Vertical Issue) */
        @media (max-width: 767px) {
            .custom-pagination {
                flex-wrap: nowrap;
                overflow-x: auto;
            }

            .custom-pagination .page-link {
                padding: 5px 8px;
                font-size: 12px;
            }
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
                            <h2 class="ml-3"><strong>Venues</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                            <a href="#addModal" class="add-venue waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Venues</h2>
                            </a>
                            <div class="modal-demo" id="addModal" style="width: auto !important;
                                                                        height: auto !important;
                                                                        border-radius: 15px;
                                                                        padding: 20px;
                                                                        overflow-y: auto;
                                                                        border-radius: 15px; padding: 20px;
                                                                        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                                <!-- <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> -->
                                    <!-- <div class="modal-content p-3"> -->
                                        <div class="modal-header" style="border: none;">
                                            <div class="col-md-5">
                                                <div class="text-success" style="font-size: 11px; font-weight: 400;">Account</div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-5" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" class="form-control text-muted" value="Abhishek Guleria" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Turf Name</label>
                                                            <input type="text" class="form-control" placeholder="Name of the turf" style="letter-spacing: 0.7px; font-size: 12px; border: none;">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Vender ID</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                        <div class="">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control text-muted" value="1234567890" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                        <div class="d-flex align-items-end mb-3">
                                                            <label class="me-5 mt-0">Request Booking</label>
                                                            <div class="form-check form-switch">    
                                                                <input class="form-check-input" type="checkbox" id="requestBooking" checked
                                                                    style="width: 2.5rem; height: 1.3rem; background-color: #000; border-radius: 50px; border: none; transition: background-color 0.3s ease-in-out;"
                                                                    oninput="this.style.backgroundColor = this.checked ? '#1d3819' : '#ddd'">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label style="font-size: 11px; font-weight: 400;">Your Profile Picture</label>
                                                        <div class="d-flex flex-column justify-content-left align-items-left">
                                                            <label for="uploadInput" style="width: 90px; height: 80px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                                                <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                                                                <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload image</span>
                                                                <input type="file" id="uploadInput" style="display: none;">
                                                            </label>
                                                            <label class="mt-4 mb-3" style="font-size: 11px; font-weight: 400;">Your Turf Image</label>
                                                            <div class="d-flex flex-column justify-content-left align-items-left">
                                                                <label for="uploadInput" style="width: 90px; height: 80px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                                                    <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                                                                    <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload image</span>
                                                                    <input type="file" id="uploadInput" style="display: none;">
                                                                </label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label mt-3" style="font-size: 11px; font-weight: 400;">Price of Booking: <span class="text-muted">400₹</span></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3" style="font-size: 11px;">
                                                        <div class="d-flex align-items-end mb-3">
                                                            <label class="me-1">Account Activate</label>
                                                            <div class="form-check form-switch">    
                                                                <input class="form-check-input" type="checkbox" id="requestBooking" checked
                                                                    style="width: 2rem; height: 1.1rem; background-color: #000; border-radius: 50px; border: none; transition: background-color 0.3s ease-in-out;"
                                                                    oninput="this.style.backgroundColor = this.checked ? '#1d3819' : '#ddd'">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mt-3">
                                                    <div class="col-md-4 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">City</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">Area</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">Pincode</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="row">
                                                    <div class="col-md-4 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">Timing</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label">Prize/hour</label>
                                                            <input type="text" class="form-control text-muted" value="0123456" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="row">
                                                    <div class="col-md-12 col-12" style="font-size: 12px;">
                                                        <div class="mb-3">
                                                            <label class="form-label me-3">Map Location </label>
                                                            <img src="{{asset('assets/image/link-2.svg')}}" alt="map" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer;">
                                                            <input type="text" class="form-control text-muted" value="https://www.google.com/maps/@21.2108425,72.8727263,17z/data=!5m1!1e2?entry" style="font-size: 12px; letter-spacing: 0.7px; border: none; background-color: transparent;" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="border: none;">
                                            <button type="button" class="btn btn-success px-5">Save</button>
                                        </div>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                            

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2" style="overflow: hidden;">
                                    <div class="table-container" style="max-height: 400px; overflow-y: auto;">
                                        <table id="responsive-datatable" id="venuetable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>Name</th>
                                                    <th>city</th>
                                                    <th>place</th>
                                                    <th>Mobile No.</th>
                                                    <th>Type</th>
                                                    <th>Balance</th>
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
                                                                        <input type="text" id="citySearch" class="form-control" placeholder="City" style="border-radius: 10px;">
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
                                                                        <input type="text" id="placeSearch" class="form-control" placeholder="Place" style="border-radius: 10px;">
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
                                                                        <input type="text" id="balanceSearch" class="form-control" placeholder="Balance" style="border-radius: 10px;">
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
                                                    <td><h4><span class="badge badge-soft-success" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Active</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <button class="open-modal" data-id="1" style="border: none; background: none;">
                                                            <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard" style="cursor: pointer;">
                                                        </button>
                                                        
                                                        <!-- Custom Modal -->
                                                        <div id="customModal" style="
                                                                display: none;
                                                                position: fixed;
                                                                top: 50%;
                                                                left: 50%;
                                                                transform: translate(-50%, -50%);
                                                                width: 400px;
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
                                                                <h4 style="font-weight: bold; margin: 0;">Edit</h4>
                                                                <button type="button" class="btn-close close-modal"></button>
                                                            </div>
                                                        
                                                            <!-- Modal Body -->
                                                            <div class="modal-body" style="margin-top: 15px;">
                                                                <div style="margin-bottom: 12px;">
                                                                    <label style="display: block;">User Name</label>
                                                                    <input type="text" class="form-control" name="username" placeholder="Abhishek Guleria">
                                                                </div>
                                                        
                                                                <div style="margin-bottom: 12px;">
                                                                    <label style="display: block;">Mob. No.</label>
                                                                    <input type="text" class="form-control" name="mobileno" placeholder="9876543210">
                                                                </div>
                                                        
                                                                <div style="margin-bottom: 12px;">
                                                                    <label style="display: block;">Email</label>
                                                                    <input type="email" class="form-control" name="email" placeholder="abhiguleria1599@gmail.com">
                                                                </div>
                                                        
                                                                <div style="margin-bottom: 12px;">
                                                                    <label style="display: block;">Role</label>
                                                                    <select id="userRole" class="form-control select2">
                                                                        <option value="user" selected>User</option>
                                                                        <option value="admin">Admin</option>
                                                                    </select>
                                                                </div>
                                                        
                                                                <div style="margin-bottom: 12px;">
                                                                    <label style="display: block;">Balance</label>
                                                                    <input type="text" class="form-control" name="balance" placeholder="N/A">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer justify-content-start mt-4" style="margin-top: 10px; text-align: center;">
                                                                <button class="btn btn-success close-modal col-5">Save</button>
                                                            </div>
                                                        </div>
                                                                
                                                        

                                                            <!-- Include Bootstrap JS (if not already included) -->
                                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                                            
                                                        | <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567891</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000003 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567892</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000001 </td>
                                                    <td>#000001</td>
                                                    <td>#000001</td>
                                                    <td>1234567890</td>
                                                    <td><h4><span class="badge badge-soft-danger" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>
                                                    <td style="color: green;">₹400</td>
                                                    <td>
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"> |
                                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
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
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

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

        $('#nameSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });

        $('#citySearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#placeSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#mobileSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });

        $('#typeSearch').on('keyup', function () {
            table.column(4).search(this.value).draw();
        });

        $('#balanceSearch').on('keyup', function () {
            table.column(5).search(this.value).draw();
        });

        $('#nameSearch, #citySearch, #placeSearch, #mobileSearch, #typeSearch, #balanceSearch').on('keyup', function () {
            table.draw();
            createCustomPagination(); // Update pagination based on filtered results
        });
    });


        $(document).ready(function () {
            // Sample transaction data (Can be fetched from an API)
            let transactions = [
                { id: "#000001", date: "23 Dec. 2023", amount: "+400", type: "success" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
                { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" }
            ];
    
            let rowsPerPage = 10;  // Number of rows per page
            let currentPage = 1;   // Current page number
    
            function displayTransactions(page) {
                let start = (page - 1) * rowsPerPage;
                let end = start + rowsPerPage;
                let paginatedItems = transactions.slice(start, end);
    
                $("#transactionTable").html(""); // Clear previous data
                $.each(paginatedItems, function (index, transaction) {
                    $("#transactionTable").append(`
                        <tr>
                            <td class="text-start">${transaction.id}</td>
                            <td>${transaction.date}</td>
                            <td class="text-${transaction.type} fw-bold">${transaction.amount}</td>
                        </tr>
                    `);
                });
            }
    
            function setupPagination() {
                let totalPages = Math.ceil(transactions.length / rowsPerPage);
                $("#pagination").html(""); // Clear previous pagination
    
                // Previous Button
                $("#pagination").append(`
                    <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">‹</a>
                    </li>
                `);
    
                // Page Numbers
                for (let i = 1; i <= totalPages; i++) {
                    $("#pagination").append(`
                        <li class="page-item ${i === currentPage ? "active" : ""}">
                            <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                        </li>
                    `);
                }
    
                // Next Button
                $("#pagination").append(`
                    <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">›</a>
                    </li>
                `);
            }
    
            window.changePage = function (page) {
                if (page < 1 || page > Math.ceil(transactions.length / rowsPerPage)) return;
                currentPage = page;
                displayTransactions(currentPage);
                setupPagination();
            };
    
            // Initialize the modal with the first page
            displayTransactions(currentPage);
            setupPagination();
        });


        $(document).ready(function() {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function() {
                setTimeout(function() {
                    $('#role').select2({
                        placeholder: "Select Role",
                        allowClear: true,
                        dropdownParent: $('#editModal') // Fix Select2 inside modal
                    });
                }, 100);
            });
        });



        // $(document).ready(function () {
        //     // Handle Modal Click
        //     $(document).on("click", ".add-venue", function (e) {
        //         e.preventDefault();

        //         // Open Modal using Custombox
        //         new Custombox.modal({
        //             content: {
        //                 effect: "blur",
        //                 target: "#addModal"
        //             }
        //         }).open();
        //     });

        //     // Close Modal
        //     $(document).on("click", ".btn-close", function () {
        //         Custombox.modal.close();
        //     });
        // });




        $(document).ready(function () {
            // Handle Modal Click
            $(document).on("click", ".edit-venues", function (e) {
                e.preventDefault();

                // Open Modal using Custombox
                new Custombox.modal({
                    content: {
                        effect: "blur",
                        target: "#editModal"
                    }
                }).open();
            });

            // Close Modal
            $(document).on("click", ".btn-close", function () {
                Custombox.modal.close();
            });
        });




        // $(document).ready(function () {
        //     // Initialize DataTable with Responsive Plugin
        //     $("#venuetable").DataTable({
        //         responsive: true
        //     });

        //     // Handle Modal Click
        //     $(document).on("click", ".add-venue", function (e) {
        //         e.preventDefault();
        //         var modal = $("#addModal");

        //         // Check if in Mobile View (<=768px)
        //         if ($(window).width() <= 768) {
        //             // Move Modal Outside Table for Mobile View
        //             if (!modal.parent().is("body")) {
        //                 $("body").append(modal);
        //             }

        //             // Open Modal using Custombox
        //             new Custombox.modal({
        //                 content: {
        //                     effect: "blur",
        //                     target: "#addModal"
        //                 }
        //             }).open();
        //         }
        //     });

        //     // Close Modal
        //     $(document).on("click", ".close-wallet", function () {
        //         Custombox.modal.close();
        //     });
        // });




        $(document).ready(function () {
            // Initialize DataTable with Responsive Plugin
            $("#venuetable").DataTable({
                responsive: true
            });

            // Handle Modal Click
            $(document).on("click", ".edit-venues", function (e) {
                e.preventDefault();
                var modal = $("#editModal");

                // Check if in Mobile View (<=768px)
                if ($(window).width() <= 768) {
                    // Move Modal Outside Table for Mobile View
                    if (!modal.parent().is("body")) {
                        $("body").append(modal);
                    }

                    // Open Modal using Custombox
                    new Custombox.modal({
                        content: {
                            effect: "blur",
                            target: "#editModal"
                        }
                    }).open();
                }
            });

            // Close Modal
            $(document).on("click", ".close-wallet", function () {
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
