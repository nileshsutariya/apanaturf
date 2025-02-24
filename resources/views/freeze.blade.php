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
            margin-top: 5px;
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
    
    </style>

                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>Freeze</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                            
                            <a href="#addFreezeModal" class="add-freeze waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Freeze</h2>
                            </a>
                            
                            <div id="addFreezeModal" class="modal-demo" style="width: 380px !important; height: 650px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                                <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                    <h4 class="add-title">Freeze</h4>
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
                                                    <input type="date" class="form-control text-muted mt-2" name="date">
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Spot Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Spot:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control select2 mt-2" data-toggle="select2" name="spot" id="spot">
                                                        <option value="TurfA">TurfA</option>
                                                        <option value="TurfB">TurfB</option>
                                                        <option value="TurfC">TurfC</option>
                                                        <option value="TurfD">TurfD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Email Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Email:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control mt-2" name="email" placeholder="example@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Turf Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Turf:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control select2 mt-2" data-toggle="select2" name="turf" id="turf">
                                                        <option value="motavarachha">Mota Varachha</option>
                                                        <option value="Jakatnaka">Jakatnaka</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Timing Section -->
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Timing:</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="time" class="form-control mt-2" name="timing">
                                                </div>
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
                                <div class="card-body pt-2">
                                    <table id="responsive-datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>venue</th>
                                                <th>date</th>
                                                <th>spot</th>
                                                <th>timing</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="venueSearch" class="form-control" placeholder="Venue" style="border-radius: 10px;">
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
                                                                    <input type="text" id="spotSearch" class="form-control" placeholder="Spot" style="border-radius: 10px;">
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
                                                                    <input type="text" id="timingSearch" class="form-control" placeholder="Timing" style="border-radius: 10px;">
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
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> #000001 </td>
                                                <td>#000001</td>
                                                <td>#000001</td>
                                                <td>1234567890</td>
                                                
                                                <td>
                                                    <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
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
        //     columnSearch('#venueSearch', 0);
        //     columnSearch('#dateSearch', 1);
        //     columnSearch('#spotSearch', 2);
        //     columnSearch('#timingSearch', 3);

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



        $('#venueSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });

        $('#dateSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#spotSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#timingSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });



        


        $(document).ready(function() {
            $('.select2').select2({
                width: '100%', // Match input width
                theme: 'bootstrap-5', // Ensure it looks modern
                placeholder: "Select an option", // Placeholder for consistency
                allowClear: true // Add 'x' to clear selection
            });
        });

        $(document).ready(function() {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function() {
                setTimeout(function() {
                    $('#spot').select2({
                        placeholder: "Select Role",
                        allowClear: true,
                        dropdownParent: $('#addFreezeModal') // Fix Select2 inside modal
                    });
                }, 100);
            });
        });

        $(document).ready(function() {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function() {
                setTimeout(function() {
                    $('#turf').select2({
                        placeholder: "Select Role",
                        allowClear: true,
                        dropdownParent: $('#addFreezeModal') // Fix Select2 inside modal
                    });
                }, 100);
            });
        });
    </script>

@include('adminlayouts.footer')
