@include('admin.layouts.header')
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
                            <h2 class="ml-3"><strong>Sports</strong></h2>
                        </div>
                        <div class="float-end mr-3">
                           
                            <a href="#add" class="add-sports waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Sports</h2>
                            </a>
    
                            <!-- Custom theme modal -->
                            <div id="add" class="modal-demo" style="width: 380px !important; padding: 20px; border-radius: 12px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                                <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%;">
                                    <h4 class="add-title">Add Sports</h4>
                                    <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="d-flex mt-3 mb-4" style="margin-left: 120px;">
                                    <label for="uploadInput" style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                        <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                                        <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload image</span>
                                        <input type="file" id="uploadInput" style="display: none;">
                                    </label>
                                </div>
                                <div class="modal-body p-3" style="font-size: small;">
                                    <label for="date" class="mb-2">Name of the Sports</label>
                                    <input type="text" class="form-control text-muted mb-2" name="sport" placeholder="Name">
                                </div>
                                
                                <div class="modal-footer justify-content-end mb-3" style="margin-top: 90px; border: none;">
                                    <button type="button" class="btn btn-success col-md-5"> Add </button>
                                </div>
                                    <!-- </div> -->
                            </div>

                        </div>
                    </div>
                    <h4 class="m-3">
                        <div class="d-inline-flex align-items-center px-3 py-1 rounded-pill" style="background-color: #cce8e6;">
                            <img class="m-1 me-3" src="{{asset('assets/image/img 7.svg')}}" alt="football" style="height: 30px;">
                            <span class="text-success" style="font-weight: 500; font-size: medium;">Football</span>
                            <button type="button" class="btn-close ms-3" aria-label="Close" style="font-size: small;"></button>
                        </div>
                    </h4>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Get the current page URL (excluding query params)
            var currentUrl = window.location.pathname.split("/").pop();

            // Loop through sidebar links
            $(".side-nav-link").each(function () {
                var linkUrl = $(this).attr("href");

                // If the href matches the current page, add 'active' class
                if (linkUrl === currentUrl) {
                    $(this).addClass("active");

                    // Optional: Add active class to the parent <li> for better styling
                    $(this).closest(".side-nav-item").addClass("active");
                }
            });
        });



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



        // $('#venueSearch').on('keyup', function () {
        //     table.column(0).search(this.value).draw();
        // });

        // $('#dateSearch').on('keyup', function () {
        //     table.column(1).search(this.value).draw();
        // });

        // $('#spotSearch').on('keyup', function () {
        //     table.column(2).search(this.value).draw();
        // });

        // $('#timingSearch').on('keyup', function () {
        //     table.column(3).search(this.value).draw();
        // });



        // $(document).ready(function () {
        //     // Sample transaction data (Can be fetched from an API)
        //     let transactions = [
        //         { id: "#000001", date: "23 Dec. 2023", amount: "+400", type: "success" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" },
        //         { id: "#000001", date: "23 Dec. 2023", amount: "-400", type: "danger" }
        //     ];
    
        //     let rowsPerPage = 10;  // Number of rows per page
        //     let currentPage = 1;   // Current page number
    
        //     function displayTransactions(page) {
        //         let start = (page - 1) * rowsPerPage;
        //         let end = start + rowsPerPage;
        //         let paginatedItems = transactions.slice(start, end);
    
        //         $("#transactionTable").html(""); // Clear previous data
        //         $.each(paginatedItems, function (index, transaction) {
        //             $("#transactionTable").append(`
        //                 <tr>
        //                     <td class="text-start">${transaction.id}</td>
        //                     <td>${transaction.date}</td>
        //                     <td class="text-${transaction.type} fw-bold">${transaction.amount}</td>
        //                 </tr>
        //             `);
        //         });
        //     }
    
        //     function setupPagination() {
        //         let totalPages = Math.ceil(transactions.length / rowsPerPage);
        //         $("#pagination").html(""); // Clear previous pagination
    
        //         // Previous Button
        //         $("#pagination").append(`
        //             <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
        //                 <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">‹</a>
        //             </li>
        //         `);
    
        //         // Page Numbers
        //         for (let i = 1; i <= totalPages; i++) {
        //             $("#pagination").append(`
        //                 <li class="page-item ${i === currentPage ? "active" : ""}">
        //                     <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
        //                 </li>
        //             `);
        //         }
    
        //         // Next Button
        //         $("#pagination").append(`
        //             <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
        //                 <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">›</a>
        //             </li>
        //         `);
        //     }
    
        //     window.changePage = function (page) {
        //         if (page < 1 || page > Math.ceil(transactions.length / rowsPerPage)) return;
        //         currentPage = page;
        //         displayTransactions(currentPage);
        //         setupPagination();
        //     };
    
        //     // Initialize the modal with the first page
        //     displayTransactions(currentPage);
        //     setupPagination();
        // });


    </script>
    
  @include('admin.layouts.footer')