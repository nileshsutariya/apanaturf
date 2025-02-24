@include('adminlayouts.header')
<style>
    body {
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
            <h2 class="ml-3"><strong>Enquiries</strong></h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: transparent; box-shadow: none;">
                <div class="card-body pt-2">
                    <table id="responsive-datatable" id="inquiriestable" class="table dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-none d-sm-flex">
                                        <form class="app-search">
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <input type="text" id="nameSearch" class="form-control"
                                                        placeholder="Name" style="border-radius: 10px;">
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
                                                    <input type="text" id="emailSearch" class="form-control"
                                                        placeholder="Email" style="border-radius: 10px;">
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
                                                    <input type="text" id="subjectSearch" class="form-control"
                                                        placeholder="Place" style="border-radius: 10px;">
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
                                                    <input type="text" id="dateSearch" class="form-control"
                                                        placeholder="Mobile" style="border-radius: 10px;">
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
                                    <!-- <a href="#add" class="btn btn-primary waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Blur</a>
                
                                                    <div id="add" class="modal-demo">
                                                        <div class="d-flex h-80 w-100 p-3 align-items-center justify-content-between">
                                                            <h4 class="add-title">Modal title</h4>
                                                            <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                        <div class="add-text text-muted">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero unde repellendus quidem dolorem minus, ipsum, quisquam veritatis harum ducimus repudiandae debitis, maiores autem voluptates. Saepe eum similique est vel maiores consectetur illo, vero eaque explicabo rem laudantium, vitae, error eveniet delectus quis nam iste. At, minus amet alias illum dignissimos dicta pariatur magni praesentium distinctio harum iste fugiat eos quam adipisci perspiciatis exercitationem quidem. Esse, autem. Molestiae tempore perferendis quisquam.
                                                        </div>
                                                    </div> -->

                                    <a href="#add" class="enquiries-details waves-effect waves-light"
                                        data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                        data-overlayColor="#36404a">
                                        <i class="bi bi-info-circle mt-4" style="font-size: 19px; color: blue;"></i>
                                    </a>

                                    <div id="add" class="modal-demo" style="width: 380px !important;
                                                                                            height: 500px;
                                                                                            padding: 20px;
                                                                                            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
                                                                                            border-radius: 12px;
                                                                                            ">

                                        <div class="d-flex p-3 align-items-center justify-content-between"
                                            style="max-width: 700px; width: 100%; height: auto;">
                                            <h4 class="add-title">
                                                View Enquiries
                                            </h4>
                                            <button type="button" class="btn-close btn-close-white"
                                                onclick="Custombox.modal.close();">
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <div class="add-text ml-2" style="font-size: small;">
                                            <div class="container-fluid">
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>Name :</strong></div>
                                                        <div class="col-md-4">
                                                            <div class="text-muted">Abhishek</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>ID :</strong></div>
                                                        <div class="col-md-4">
                                                            <div class="text-muted">000000</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>Date :</strong></div>
                                                        <div class="col-md-4">
                                                            <div class="text-muted">dd/mm/yyyy</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>Subject :</strong></div>
                                                        <div class="col-md-4">
                                                            <div class="text-muted">Box Cricket</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>Description</strong></div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="text-muted ml-3" style="word-wrap: break-word;">
                                                                Lorem ipsum dolor sit amet consectetur, adipisicing
                                                                elit.
                                                                Magni fugit beatae maxime rem accusamus ipsum!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <img class="mb-4" src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
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
    //     columnSearch('#emailSearch', 1);
    //     columnSearch('#subjectSearch', 2);
    //     columnSearch('#dateSearch', 3);

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

    $('#subjectSearch').on('keyup', function () {
        table.column(2).search(this.value).draw();
    });

    $('#dateSearch').on('keyup', function () {
        table.column(3).search(this.value).draw();
    });







    $(document).ready(function () {
        $(document).on("click", ".enquiries-details", function (e) {
            e.preventDefault();

            // Check if screen width is less than 768px (mobile devices)
            if ($(window).width() < 768) {
                // Open Modal using Custombox
                new Custombox.modal({
                    content: {
                        effect: "blur",
                        target: "#add"
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
