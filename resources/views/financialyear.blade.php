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
            background-color: #1b9c87;
            border-color: #1b9c87;
            color: white;
        }
        /* Change checkbox background color when checked */
        .form-check-input:checked {
            background-color: #2a9d8f !important; /* Green color */
            border-color: #2a9d8f !important;
        }
    </style>

                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>Financial Year</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                            <!-- Add Year Button with Custom Modal Trigger -->
                            <a href="#addYear" class="add-year waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Year</h2>
                            </a>

                                <!-- Custom Theme Modal for Add Year -->
                                <div id="addYear" class="modal-demo" style="width: 400px !important; height: 550px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                                    <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                        <h4 class="add-title">
                                            Add Financial Year
                                        </h4>
                                        <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                    <div class="add-text ml-2" style="font-size: small;">
                                        <div class="container-fluid">
                                            <!-- Financial Year Section -->
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>Financial Year:</strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control text-muted mt-2" name="date" placeholder="yyyy-yyyy">

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Starting Date Section -->
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>Starting Date:</strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control text-muted mt-2" name="startdate">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Ending Date Section -->
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>Ending Date:</strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control text-muted mt-2" name="enddate">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Ending Year Section -->
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>Ending Year:</strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control text-muted mt-2" name="date" placeholder="yyyy">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Is Current Checkbox -->
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center ml-4">
                                                    <input class="form-check-input me-2" type="checkbox" id="isCurrent" checked style="width: 18px; height: 18px; border-radius: 4px;">
                                                    <span for="isCurrent" class="mt-1 ml-2" style="font-size: 14px; font-weight: 500; color: #4a4a4a;">Is Current?</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer with Add Button -->
                                    <div class="modal-footer justify-content-end mb-3" style="border: none;">
                                        <button type="button" class="btn btn-success col-md-5">Add</button>
                                    </div>
                                </div>


                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2">
                                    <table id="responsive-datatable" id="yeartable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>Financial Year</th>
                                                <th>Starting Date</th>
                                                <th>Ending Date</th>
                                                <th>Year</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-none d-sm-flex">
                                                        <form class="app-search">
                                                            <div class="app-search-box">
                                                                <div class="input-group">
                                                                    <input type="text" id="financialSearch" class="form-control" placeholder="Year" style="border-radius: 10px;">
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
                                                                    <input type="text" id="startSearch" class="form-control" placeholder="Start Date" style="border-radius: 10px;">
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
                                                                    <input type="text" id="endSearch" class="form-control" placeholder="End Date" style="border-radius: 10px;">
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
                                                                    <input type="text" id="yearSearch" class="form-control" placeholder="Year" style="border-radius: 10px;">
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
                                                <td> 2022-2023 </td>
                                                <td>dd/mm/yyyy</td>
                                                <td>dd/mm/yyyy</td>
                                                <td>yyyy</td>
                                                <td><h4><span class="badge badge-soft-info pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Active</span></h4></td>

                                                <td>
                                                   <!-- Edit Button with Custom Modal Trigger -->
                                                    <a href="#editYear" class="edit-year waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard" style="cursor: pointer;">
                                                    </a>

                                                    <!-- Custom Theme Modal for Edit Year -->
                                                    <div id="editYear" class="modal-demo" style="width: 400px !important; height: 550px; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px;">
                                                        <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%; height: auto;">
                                                            <h4 class="add-title">
                                                                Edit Financial Year
                                                            </h4>
                                                            <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                        <div class="add-text ml-2" style="font-size: small;">
                                                            <div class="container-fluid">
                                                                <!-- Financial Year Section -->
                                                                <div class="mb-4">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <strong>Financial Year:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control text-muted mt-2" name="date" placeholder="yyyy-yyyy">

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Starting Date Section -->
                                                                <div class="mb-4">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <strong>Starting Date:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="date" class="form-control text-muted mt-2" name="startdate">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Ending Date Section -->
                                                                <div class="mb-4">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <strong>Ending Date:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="date" class="form-control text-muted mt-2" name="enddate">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Ending Year Section -->
                                                                <div class="mb-4">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <strong>Ending Year:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control text-muted mt-2" name="date" placeholder="yyyy">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Is Current Checkbox -->
                                                                <div class="mb-4">
                                                                    <div class="d-flex align-items-center ml-4">
                                                                        <input class="form-check-input me-2" type="checkbox" id="isCurrent" checked style="width: 18px; height: 18px; border-radius: 4px;">
                                                                        <span for="isCurrent" class="mt-1 ml-2" style="font-size: 14px; font-weight: 500; color: #4a4a4a;">Is Current?</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Footer with Save Button -->
                                                        <div class="modal-footer justify-content-end mb-3" style="border: none;">
                                                            <button type="button" class="btn btn-success col-md-5">Save</button>
                                                        </div>
                                                    </div>


                                                    <!-- Include Bootstrap JS (if not already included) -->
                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                                                     | <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 2022-2023 </td>
                                                <td>dd/mm/yyyy</td>
                                                <td>dd/mm/yyyy</td>
                                                <td>yyyy</td>
                                                <td><h4><span class="badge badge-soft-danger pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>

                                                <td>
                                                    <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer;">

                                                     | <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td> 2022-2023 </td>
                                                <td>dd/mm/yyyy</td>
                                                <td>dd/mm/yyyy</td>
                                                <td>yyyy</td>
                                                <td><h4><span class="badge badge-soft-danger pt-2" style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Unactive</span></h4></td>

                                                <td>
                                                    <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer;">

                                                     | <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
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
        //     columnSearch('#financialSearch', 0);
        //     columnSearch('#startSearch', 1);
        //     columnSearch('#endSearch', 2);
        //     columnSearch('#yearSearch', 3);
        //     columnSearch('#statusSearch', 4);

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



        $('#financialSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });

        $('#startSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#endSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#yearSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });

        $('#statusSearch').on('keyup', function () {
            table.column(4).search(this.value).draw();
        });




       

        $(document).ready(function () {
            $(document).on("click", ".edit-year", function (e) {
                e.preventDefault();

                // Check if screen width is less than 768px (mobile devices)
                if ($(window).width() < 768) {
                    // Open Modal using Custombox
                    new Custombox.modal({
                        content: {
                            effect: "blur",
                            target: "#editYear"
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