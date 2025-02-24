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
            background-color: #198754;
            border-color: #198754;
            color: white;
        }

    </style>

                <div class="page-title-box">
                    
                    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                        <div class="flex-grow-1">
                            <h2 class="ml-3"><strong>Subscribers</strong></h2>
                        </div>
                        <!-- <div class="float-end mr-3">
                            <h2 class="btn btn-success" style="border-radius: 40px;" data-bs-toggle="modal" data-bs-target="#addModal" >+ Add Freeze</h2>
                            
                            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="padding-left: 32px; padding-right: 32px; font-size: smaller;">
                                    <div class="modal-header" style="border: none;">
                                        <h4 class="modal-title mt-2" id="addModalLabel">Freeze</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="date" class="mb-2">Date</label>
                                        <input type="date" class="form-control text-muted" name="date" placeholder="Abhishek Guleria">
                                    </div>
                                    <div class="modal-body">
                                        <label for="spot">Spot</label>
                                        <select class="form-select" name="spot" id="spot">
                                            <option value="TurfA">TurfA</option>
                                            <option value="TurfB">TurfB</option>
                                            <option value="TurfC">TurfC</option>
                                            <option value="TurfD">TurfD</option>
                                        </select>
                                    </div>
                                    <div class="modal-body">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="abhishguleri1555@gmail.com">
                                    </div>
                                    <div class="modal-body">
                                        <label for="turf">Turf</label>
                                        <select class="form-select" name="turf" id="turf">
                                            <option value="motavarachha">Mota Varachha</option>
                                            <option value="Jakatnaka">Jakatnaka</option>
                                        </select>
                                    </div>
                                    <div class="modal-body">
                                        <label for="timing">Timing</label>
                                        <input type="time" class="form-control" name="timing" placeholder="N/A">
                                    </div>
                                    <div class="modal-footer justify-content-start mb-3" style="border: none;">
                                        <button type="button" class="btn btn-success col-md-5"> Save </button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: transparent; box-shadow: none;">
                                <div class="card-body pt-2">
                                    <table id="responsive-datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Place</th>
                                                <th>Mob.No.</th>
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
                                                                    <input type="text" id="emailSearch" class="form-control" placeholder="Email" style="border-radius: 10px;">
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
                                                                    <input type="text" id="mobileSearch" class="form-control" placeholder="Mobile" style="border-radius: 10px;">
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
        //  $(document).ready(function () {
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
        //     columnSearch('#emailSearch', 1);
        //     columnSearch('#placeSearch', 2);
        //     columnSearch('#mobileSearch', 3);

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

        $('#emailSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });

        $('#placeSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });

        $('#mobileSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });



        


    </script>


@include('adminlayouts.footer')