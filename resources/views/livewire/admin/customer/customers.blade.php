<div>
    <!-- Custombox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/custombox@4.0.3/dist/custombox.min.css">

    <!-- Custombox JS -->

    <style>
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
            height: 35px !important;
            /* Match input field height */
            display: flex !important;
            align-items: center !important;
            /* Align vertically */
            border: 1px solid #ced4da !important;
            /* Match input border */
            padding: 6px 12px !important;
            /* Match input padding */
            border-radius: 5px !important;
            /* Match input border radius */
        }

        .select2-container .select2-selection__arrow {
            height: 38px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            /* Center the arrow */
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 30px !important;
            /* Adjust clear (×) icon */
            top: 50% !important;
            transform: translateY(-50%) !important;
            /* Center the clear icon */
        }

        .modal-demo {
            width: auto !important;
            max-height: 90vh;
            /* Ensures it doesn't exceed viewport height */
            border-radius: 15px;
            padding: 20px;
            overflow-y: auto;
            scrollbar-width: none;
            /* For Firefox */
            -ms-overflow-style: none;
            /* For Internet Explorer/Edge */
        }

        /* Hide scrollbar for WebKit browsers (Chrome, Safari) */
        .modal-demo::-webkit-scrollbar {
            display: none;
        }

        .app-topbar .topbar-menu {
            background-color: #F5F5F5;
        }

        body {
            /* font-size: 15px;
            font-family: 'Inter', sans-serif; */
            font-weight: 400 !important;
            /* letter-spacing: 0.9px;
            background-color: #F5F5F5; */
        }

        .side-nav {
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
            flex-wrap: nowrap;
            /* Prevents vertical stacking */
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            /* overflow-x: auto;  Enables horizontal scrolling if needed */
            white-space: nowrap;
            /* Keeps buttons in one row */
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
                flex-wrap: nowrap;
                /* Prevents stacking */
                overflow-x: auto;
                /* Adds horizontal scrolling if needed */
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
            /* Adjust as needed */
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

        body.modal-open .page-title-box {
            filter: blur(4px);
            transition: filter 0.3s ease-in-out;
        }

        /* Optional: Prevent scrolling when modal is open */
        body.modal-open {
            overflow: hidden;
        }
    </style>

    <div class="page-title-box">

        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3"><strong>Customer</strong></h2>
            </div>
            <!-- Add Customer Button -->
            <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal" style="border: none; background-color: #F5F5F5;">
                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Customer</h2>
            </button>
        </div>
        <!-- Livewire Controlled Modal -->


        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: transparent; box-shadow: none;">
                    <div class="card-body pt-2" style="overflow: hidden;">

                        <div class="table-container table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table id="responsive-datatable" id="walletTable" class="table dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
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
                                                            <input type="text" id="mobileSearch" class="form-control"
                                                                placeholder="Mob. No." style="border-radius: 10px;">
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
                                                            <input type="text" id="typeSearch" class="form-control"
                                                                placeholder="Type" style="border-radius: 10px;">
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
                                                            <input type="text" id="balanceSearch" class="form-control"
                                                                placeholder="Balance" style="border-radius: 10px;">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($customers))
                                        @foreach ($customers as $row)

                                            <tr>
                                                <td>
                                                    {{ $row->name }}
                                                </td>
                                                <td>
                                                    {{ $row->email }}
                                                </td>
                                                <td class="text-start">
                                                    {{ $row->phone }}
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-soft-info pt-2"
                                                            style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">Customer</span>
                                                    </h4>
                                                </td>
                                                <td style="color: green;">₹
                                                    {{ $row->balance }}
                                                </td>

                                                <td>
                                                    <a href="#walletModal" class="open-wallet waves-effect waves-light"
                                                        data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                                        data-overlayColor="#36404a">
                                                        <img src="{{asset('assets/image/empty-wallet.svg')}}" alt="dashboard"
                                                            style="cursor: pointer;">
                                                    </a>
                                                    |
                                                    <!-- Button to Open Modal -->
                                                    <button class="open-modal" data-id="1"
                                                        style="border: none; background: none;">
                                                        <img src="{{asset('assets/image/edit.svg')}}" alt="dashboard"
                                                            style="cursor: pointer;">
                                                    </button>
                                                    | <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div>
                                {{ $customers->links('livewire.admin.component.pagination') }}
                            </div>
                        </div>
                    </div>

                    <div id="walletModal" class="modal-demo modal-lg"
                        style="width: 400px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px; display: none;">
                        <!-- Modal Header -->
                        <div class="d-flex p-3 align-items-center justify-content-between">
                            <h4 class="fw-bold">Wallet</h4>
                            <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                <span class="sr-only">Close</span>
                            </button>
                        </div>

                        <!-- Available Balance -->
                        <div class="text-muted px-3 pb-3 mb-2" style="font-size: 12px;">Available Balance: <span
                                class="fw-bold">₹1000</span></div>

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
                            <form>
                                <div class="modal-body" style="margin-top: 15px;">
                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">User Name</label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Abhishek Guleria">
                                    </div>

                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Mob. No.</label>
                                        <input type="text" class="form-control" name="mobileno"
                                            placeholder="9876543210">
                                    </div>

                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="abhiguleria1599@gmail.com">
                                    </div>

                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Role</label>
                                        <select id="userRole" class="form-control select2">
                                            <option value="user" selected>User</option>
                                            <option value="admin">vendor</option>
                                        </select>
                                    </div>

                                    <div style="margin-bottom: 12px;">
                                        <label style="display: block;">Balance</label>
                                        <input type="text" class="form-control" name="balance" placeholder="N/A">
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer justify-content-start mt-4"
                                    style="margin-top: 10px; text-align: center;">
                                    <button type="submit" class="btn btn-success close-modal col-5">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- Theme Modal for Wallet -->
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade @if($showModal) show @endif" id="add" tabindex="-1" aria-labelledby="addLabel"
        @if($showModal) style="display: block;" @else style="display: none;" @endif style="margin: 20px !important;">
        <div class="modal-dialog">
            <div class="modal-content" style="
                                                                        position: fixed;
                                                                        top: 50%;
                                                                        left: 50%;
                                                                        transform: translate(-50%, -50%);
                                                                        width: 350px;
                                                                        background: #fff;
                                                                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                                                                        border-radius: 13px;
                                                                        z-index: 1000;
                                                                        font-size: 13px;
                                                                        height: 550px;
                                                                        overflow-y: scroll;
                                                                        scrollbar-width: none;
                                                                        ">

                <!-- Modal Header -->
                <div class="d-flex p-4 align-items-center justify-content-between">
                    <h6 class="add-title" id="addLabel">Add New Customer</h6>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="add-text ml-2" style="font-size: small !important; height: auto !important;">
                        <form>
                            <div class="container-fluid p-0" style="font-size: 12px;">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2"><strong>Name</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <input type="text" class="form-control text-muted mt-2" placeholder="Name"
                                                wire:model="name">
                                        </div>
                                        @error('name') <span class="text-danger">
                                            {{ $message }}
                                        </span> @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2"><strong>Email</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <input type="email" class="form-control text-muted mt-2"
                                                placeholder="email2@mail.com" wire:model="email">
                                        </div>
                                        @error('email') <span class="text-danger">
                                            {{ $message }}
                                        </span> @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2"><strong>Mobile No.</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <input type="text" class="form-control text-muted mt-2"
                                                placeholder="1234567890" wire:model="phone">
                                        </div>
                                        @error('phone') <span class="text-danger">
                                            {{ $message }}
                                        </span> @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2"><strong>Balance</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <input type="text" class="form-control text-muted mt-2" placeholder="400"
                                                wire:model="balance">
                                        </div>
                                        @error('balance') <span class="text-danger">
                                            {{ $message }}
                                        </span> @enderror
                                    </div>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer justify-content-start mb-3 p-0" style="border: none;">
                        <button type="button" class="btn btn-success col-md-5 "
                            wire:click="storecustomerdata">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/custombox@4.0.3/dist/custombox.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('open-modal', () => {
                document.body.classList.add('modal-open');
            });

            window.addEventListener('close-modal', () => {
                document.body.classList.remove('modal-open');
            });
        });
    </script>
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
                $("#pagination").html("");

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

            // window.changePage = function (page) {
            //     if (page < 1 || page > Math.ceil(transactions.length / rowsPerPage)) return;
            //     currentPage = page;
            //     displayTransactions(currentPage);
            //     setupPagination();
            // };

            // Initialize the modal with the first page
            displayTransactions(currentPage);
            setupPagination();
        });




        $(document).ready(function () {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function () {
                setTimeout(function () {
                    $('#role').select2({
                        placeholder: "Select Role",
                        allowClear: true,
                        dropdownParent: $('#editModal') // Fix Select2 inside modal
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

            // Close Modal
            $(document).on("click", ".close-modal", function () {
                Custombox.modal.close();
            });
        });



        $(document).ready(function () {
            // Initialize Select2 when modal opens
            $(document).on('click', '[data-plugin="custommodal"]', function () {
                setTimeout(function () {
                    $('#type ').select2({
                        placeholder: "Select Type",
                        allowClear: true,
                        dropdownParent: $('#add') // Fix Select2 inside modal
                    });
                }, 100);
            });
        });


    </script>
</div>