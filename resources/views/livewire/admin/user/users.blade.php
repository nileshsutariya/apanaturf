<div>

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
        /* Ensure modal is properly styled */
        .modal-demo {
            width: 400px !important;
            height: auto;
            padding: 20px;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            background: white;
            display: none;
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
            /* position: sticky;
            bottom: 0;
            z-index: 2; */
    
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
            max-height: 400px; 
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
        .app-search .form-control {
            padding-left: 15px !important;
        }
    </style>
    
                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>User</strong></h2>
                        </div>
                        <a href="#add" wire:click="addUser" class="add-transaction waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                            <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Users</h2>
                        </a>
    
                        {{-- <button wire:click="addUser" class="btn btn-success" style="border-radius: 40px;">+ Add Users</button> --}}

                        <!-- Custom Theme Modal for Add Transaction -->
                        <div id="add" class="modal-demo" style="width: 380px !important; height: 650px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                            <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                <h4 class="add-title">
                                    Add User
                                </h4>
                                {{-- <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                    <span class="sr-only">Close</span>
                                </button> --}}
                                <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>

                            </div>
                            <div class="add-text ml-2" style="font-size: small;">
                                <div class="container-fluid">
                                    <!-- Date Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Name</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" wire:model="name" class="form-control text-muted mt-2" placeholder="Name">
                                                {{-- <input type="text" wire:model="name" placeholder="Name"> --}}

                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Amount Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Email</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="email" wire:model="email" class="form-control text-muted mt-2" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Mobile No.</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" wire:model="phone" class="form-control text-muted mt-2" placeholder="Mobile No.">
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Transaction Type Section -->
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Type</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select wire:model="type" class="form-control select2" class="form-control text-muted mt-2" data-toggle="select2" name="type" id="type">
                                                    <option value="User">User</option>
                                                    <option value="Vender">Vender</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Balance</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" wire:model="balance" class="form-control text-muted mt-2" name="balance" placeholder="400">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                <!-- Footer with Save Button -->
                                <div class="modal-footer justify-content-start mb-3" style="border: none;">
                                    <button wire:click="addUser" class="btn btn-success close-modal col-5">Save</button>
                                </div>
                            </div>
    
                        </div>
    
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">    
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2" style="overflow: hidden;">
                                    
                                    <div class="table-container table-responsive" style="max-height: 350px; overflow-y: auto;">
                                        <table id="responsive-datatable" id="walletTable"  class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th class="text-start">Mobile No.</th>
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
                                                                        <input type="text" wire:model="searchName" id="nameSearch" class="form-control" placeholder="Name" style="border-radius: 10px;">
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
                                                                        <input type="text" wire:model="searchEmail" id="emailSearch" class="form-control" placeholder="Email" style="border-radius: 10px;">
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
                                                                        <input type="text" wire:model="searchMobile" id="mobileSearch" class="form-control" placeholder="Mob. No." style="border-radius: 10px;">
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
                                                                        <input type="text" wire:model="searchType" id="typeSearch" class="form-control" placeholder="Type" style="border-radius: 10px;">
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
                                                                        <input type="text" wire:model="searchBalance" id="balanceSearch" class="form-control" placeholder="Balance" style="border-radius: 10px;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($users as $row)
                                                    <tr>
                                                        <td> {{$row->name}} </td>
                                                        <td>{{$row->email}}</td>
                                                        <td class="text-start">{{$row->phone}}</td>
                                                        <td><h4><span class="badge badge-soft-info pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">User</span></h4></td>
                                                        <td style="color: green;">₹400</td>
            
                                                        <td>
                                                            <a href="#walletModal" wire:click="walletUser ({{ $row->id }})" class="open-wallet waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                                <img src="{{asset('assets/image/empty-wallet.svg')}}" alt="dashboard"  style="cursor: pointer;">
                                                            </a>
                                                            
                                                            <!-- Theme Modal for Wallet -->
                                                            <div id="walletModal" class="modal-demo modal-lg" style="width: 400px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px; display: none;">
                                                                <!-- Modal Header -->
                                                                <div class="d-flex p-3 align-items-center justify-content-between">
                                                                    <h4 class="fw-bold">Wallet</h4>
                                                                    <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                        <span class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                            
                                                                <!-- Available Balance -->
                                                                <div class="text-muted px-3 pb-3 mb-2" style="font-size: 12px;">Available Balance: <span class="fw-bold">₹1000</span></div>
                                                            
                                                                <!-- Transaction History Table -->
                                                                <div class="modal-body">
                                                                    <table class="table table-borderless text-center">
                                                                        <thead>
                                                                            <tr style="font-weight: 400; font-size: 13px; color: #9da7b1;">
                                                                                <th class="text-start">User Name</th>
                                                                                <th>Booking Date</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="transactionTable" style="color: grey; font-weight: 400; font-size: 10px;">
                                                                            {{-- <input type="text" value="{{$row->id}}"> --}}
                                                                            
                                                                            <!-- Data will be inserted dynamically here -->
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            
                                                                <!-- Pagination -->
                                                                <div class="modal-footer border-0 justify-content-center">
                                                                    <nav>
                                                                        <ul class="pagination pagination-sm" id="pagination">
                                                                            <!-- Dynamic Pagination Buttons Here -->
                                                                        </ul>
                                                                    </nav>
                                                                </div>
                                                            </div>
                                                            
                                                            | 
                                                            <!-- Button to Open Modal -->
                                                            <button class="open-modal" wire:click="editUser ({{ $row->id }})" data-id="1" style="border: none; background: none;">
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
                                                                z-index: 10`00;
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
                                                                        <input type="text" wire:model="name" class="form-control" placeholder="Abhishek Guleria">
                                                                    </div>
                                                                
                                                                    <div style="margin-bottom: 12px;">
                                                                        <label style="display: block;">Mob. No.</label>
                                                                        <input type="text" class="form-control" wire:model="phone" placeholder="9876543210">
                                                                    </div>
                                                                
                                                                    <div style="margin-bottom: 12px;">
                                                                        <label style="display: block;">Email</label>
                                                                        <input type="email" class="form-control" wire:model="email" placeholder="abhiguleria1599@gmail.com">
                                                                    </div>
                                                                
                                                                    <div style="margin-bottom: 12px;">
                                                                        <label style="display: block;">Role</label>
                                                                        <select wire:model="role" id="userRole" class="form-control select2">
                                                                            <option value="user" selected>User</option>
                                                                            <option value="admin">Admin</option>
                                                                        </select>
                                                                    </div>
                                                                
                                                                    <div style="margin-bottom: 12px;">
                                                                        <label style="display: block;">Balance</label>
                                                                        <input type="text" class="form-control" wire:model="balance" placeholder="N/A">
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer justify-content-start mt-4" style="margin-top: 10px; text-align: center;">
                                                                    <button wire:click="saveUser" class="btn btn-success close-modal col-5">Save</button>
                                                                </div>
                                                            </div>                                  
                                                    
                                                            | <img wire:click="deleteUser ({{ $row->id }})" src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        {{-- <div>
                                            {{ $users->links() }}
                                        </div> --}}
                                    </div>
                                </div>
                    
                                <div class="pagination-container">
                                    <nav>
                                        <ul class="pagination custom-pagination mb-0">
                                            <!-- Pagination will be dynamically inserted -->
                                        </ul>
                                    </nav>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>
            {{-- </div>
        </div>
    </div> --}}
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
    
        $(document).ready(function () {
            var table = $('#responsive-datatable').DataTable({
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": false,
                "pageLength": 10,
                "lengthChange": false,
                "dom": 'rt'
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
    
            $('#emailSearch').on('keyup', function () {
                table.column(1).search(this.value).draw();
            });
    
            $('#mobileSearch').on('keyup', function () {
                table.column(2).search(this.value).draw();
            });
    
            $('#typeSearch').on('keyup', function () {
                table.column(3).search(this.value).draw();
            });
    
            $('#balanceSearch').on('keyup', function () {
                table.column(4).search(this.value).draw();
            });
    
            $('#nameSearch, #emailSearch, #mobileSearch, #typeSearch, #balanceSearch').on('keyup', function () {
                table.draw();
                createCustomPagination(); 
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
    
            let rowsPerPage = 5;  // Number of rows per page
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
                        dropdownParent: $('#editModal') // Fix Select 2 inside modal
                    });
                }, 100);
            });
        });
    
    
    
        $(document).ready(function () {
            $(document).on("click", ".open-wallet", function (e) {
                e.preventDefault();
    
                // Check if screen width is less than 768px (mobile devices)
                if ($(window).width() < 900) {
                    // Open Modal using Custombox
                    new Custombox.modal({
                        content: {
                            effect: "blur",
                            target: "#walletModal"
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
    
            $(document).on("click", ".close-modal", function () {
                Custombox.modal.close();
            });
        });
    
        $(document).ready(function() {
            $(document).on('click', '[data-plugin="custommodal"]', function() {
                setTimeout(function() {
                    $('#type').select2({
                        placeholder: "Select Type",
                        allowClear: true,
                        dropdownParent: $('#add')
                    });
                }, 100);
            });
        });
    </script>
    
</div>
