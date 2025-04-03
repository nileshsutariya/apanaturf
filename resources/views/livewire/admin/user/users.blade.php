<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

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
                        {{-- <a href="#add" wire:click="save" class="add-transaction waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                            <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Users</h2>
                        </a> --}}
                        <button class="btn btn-success open-modal" style="border-radius: 40px;">+ Add Users</button>

                        <div id="customModal" class="modal-demo" style="width: 380px !important; height: 650px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                            <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                <h4 class="add-title">
                                    Add User
                                </h4>
                                {{-- <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                    <span class="sr-only">Close</span>
                                </button> --}}
                                <button type="button" class="btn-close" wire:click="$emit('closeModal')"></button>

                            </div>
                            <form wire:submit.prevent="save">

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
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror

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
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror

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
                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                <!-- Footer with Save Button -->
                                <div class="modal-footer justify-content-start mb-3" style="border: none;">
                                    <button type="submit" class="btn btn-success close-modal col-5">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
    
                    </div>
                    <hr>
                </div>
            {{-- </div>
        </div>
    </div> --}}
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
    
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
    
        $(document).ready(function () {
            // Initialize Select2
            $(".select2").select2({
                dropdownParent: $("#customModal") // Fix for dropdown behind modal
            });
    
            // Open Custombox Modal
            $(document).on("click", ".open-add-modal", function () {
                // var userRole = $(this).data("role");
                // $("#userRole").val(userRole).trigger("change"); // Set selected role
                
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
