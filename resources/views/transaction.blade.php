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
            margin-top: 7px;
            height: 35px !important; /* Match input field height */
            display: flex !important;
            align-items: center !important; /* Align vertically */
            border: 1px solid #ced4da !important; /* Match input border */
            padding: 6px 12px !important; /* Match input padding */
            border-radius: 5px !important; /* Match input border radius */
        }

        .select2-container .select2-selection__arrow {
            height: 38px !important;
            top: 60% !important;
            transform: translateY(-50%) !important; /* Center the arrow */
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 30px !important; /* Adjust clear (×) icon */
            top: 60% !important;
            transform: translateY(-50%) !important; /* Center the clear icon */
        }

        .app-topbar .topbar-menu {
            background-color: #F5F5F5;   
        }
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
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
                            <h2 class="ml-3"><strong>Transaction</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                            <!-- Add Transaction Button with Custom Modal Trigger -->
                            <a href="#addTransaction" class="add-transaction waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Transaction</h2>
                            </a>

                            <!-- Custom Theme Modal for Add Transaction -->
                            <div id="addTransaction" class="modal-demo" style="width: 380px !important; height: 650px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                                <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                    <h4 class="add-title">
                                        Add Transaction
                                    </h4>
                                    <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="add-text ml-2" style="font-size: small;">
                                    <div class="container-fluid">
                                        <!-- Date Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Date:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="date" class="form-control text-muted mt-2" name="date" placeholder="Date">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Amount Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Amount:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-muted mt-2" name="amount" placeholder="0000">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Transaction Type Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Type:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control select2" data-toggle="select2" name="type" id="type">
                                                        <option value="Deposit">Deposit</option>
                                                        <option value="Withdrawal">Withdrawal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Method Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Method:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control select2" data-toggle="select2" name="method" id="method">
                                                        <option value="UPI">UPI</option>
                                                        <option value="Net Banking">Net Banking</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Status:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-md-12"> -->
                                                    <div class="col-md-4">
                                                        <h4><span class="badge badge-soft-info pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Successful</span></h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4><span class="badge badge-soft-danger pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Canceled</span></h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4><span class="badge badge-soft-warning pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Pending</span></h4>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Footer with Save Button -->
                                    <div class="modal-footer justify-content-start mb-3" style="border: none;">
                                        <button type="button" class="btn btn-success col-md-5 ml-3">Save</button>
                                    </div>
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
                                        <table id="responsive-datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>Transaction ID</th>
                                                    <th>Transaction Date</th>
                                                    <th>Transaction By</th>
                                                    <th>Transaction Type</th>
                                                    <th>Method</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-none d-sm-flex">
                                                            <form class="app-search">
                                                                <div class="app-search-box">
                                                                    <div class="input-group">
                                                                        <input type="text" id="transactionidSearch" class="form-control" placeholder="ID" style="border-radius: 10px;">
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
                                                                        <input type="text" id="transactiondateSearch" class="form-control" placeholder="Date" style="border-radius: 10px;">
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
                                                                        <input type="text" id="transactionbySearch" class="form-control" placeholder="Role" style="border-radius: 10px;">
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
                                                                        <input type="text" id="transactiontypeSearch" class="form-control" placeholder="Type" style="border-radius: 10px;">
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
                                                                        <input type="text" id="methodSearch" class="form-control" placeholder="Method" style="border-radius: 10px;">
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
                                                                        <input type="text" id="amountSearch" class="form-control" placeholder="Amount" style="border-radius: 10px;">
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
                                                    <td>23 Dec.2024</td>
                                                    <td>Vender</td>
                                                    <td>Withdrawal</td>
                                                    <td>Net Banking</td>
                                                    <td>400</td>
                                                    
                                                    <td>
                                                        <button class="open-modal" data-id="1" style="border: none; background: none;">
                                                            <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
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
                                                                <h4 style="font-weight: bold; margin: 12px;">Transaction Details</h4>
                                                                <button type="button" class="btn-close close-modal"></button>
                                                            </div>
                                                        
                                                            <!-- Modal Body -->
                                                            <div class="modal-body ml-4" style="margin-top: 23px; ">
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Transaction ID: </strong>
                                                                        <div class="text-muted ml-3">#000001</div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Date: </strong>
                                                                        <div class="text-muted ml-3">23 Dec.2024</div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Transaction By: </strong>
                                                                        <div class="text-muted ml-3">Vender</div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Type: </strong>
                                                                        <div class="text-muted ml-3">Withdrawal</div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Method: </strong>
                                                                        <div class="text-muted ml-3">Net Banking</div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 12px;">
                                                                    <div>
                                                                        <strong>Total Amount: </strong>
                                                                        <div class="text-muted ml-3">400</div>
                                                                    </div>
                                                                </div>
                                                        
                                                            </div>
                                                        
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> #000002 </td>
                                                    <td>4 Feb. 2025</td>
                                                    <td>User</td>
                                                    <td>Booking</td>
                                                    <td>UPI</td>
                                                    <td>600</td>
                                                    
                                                    <td>
                                                        <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#infoModal"></i>
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
        //     columnSearch('#transactionidSearch', 0);
        //     columnSearch('#transactiondateSearch', 1);
        //     columnSearch('#transactionbySearch', 2);
        //     columnSearch('#transactiontypeSearch', 3);
        //     columnSearch('#methodSearch', 4);
        //     columnSearch('#amountSearch', 5);

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



        $('#transactionidSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });

        $('#transactiondateSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#transactionbySearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#transactiontypeSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });
        $('#methodSearch').on('keyup', function () {
            table.column(4).search(this.value).draw();
        });
        $('#amountSearch').on('keyup', function () {
            table.column(5).search(this.value).draw();
        });





        $(document).ready(function() {
           // Initialize Select2 when modal opens
           $(document).on('click', '[data-plugin="custommodal"]', function() {
               setTimeout(function() {
                   $('#type').select2({
                       placeholder: "Select Role",
                       allowClear: true,
                       dropdownParent: $('#addTransaction') // Fix Select2 inside modal
                   });
                }, 100);
            });
        });

        $(document).ready(function() {
           // Initialize Select2 when modal opens
           $(document).on('click', '[data-plugin="custommodal"]', function() {
               setTimeout(function() {
                   $('#method').select2({
                       placeholder: "Select Role",
                       allowClear: true,
                       dropdownParent: $('#addTransaction') // Fix Select2 inside modal
                   });
                }, 100);
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