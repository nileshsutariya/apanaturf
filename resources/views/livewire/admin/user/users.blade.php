<div>
    {{-- @if (session()->has('message'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 5000)" 
            x-show="show" 
            class="alert alert-success"
        >
            {{ session('message') }}
        </div>
    @endif --}}
    <div wire:poll.10s class="mt-2">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>


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
            float: none;
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
            padding: 6px 12px;
            border-radius: 5px;
            color: #6c757d;
        }

        .pagination .page-item {
            margin: 0 2px;
        }

        .pagination .page-item.active .page-link {
            background-color: #229e75;
            border-color: #229e75;
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
            padding: 10px 0px;
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
                <h2 class="ml-3"><strong>User</strong></h2>
            </div>

            <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal"
                style="border: none; background-color: #F5F5F5;">
                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Users</h2>
            </button>
        </div>
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
                                            <input type="text" wire:model.live="searchName" id="nameSearch" class="form-control"
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
                                            <input type="text" wire:model.live="searchEmail" id="emailSearch" class="form-control"
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
                                            <input type="text" wire:model.live="searchMobile" id="mobileSearch" class="form-control"
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
                                            <input type="text" wire:model.live="searchType" id="typeSearch" class="form-control"
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
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($users as $row)
                        <tr>

                            <td> {{ $row->name }} </td>
                            <td>{{ $row->email }}</td>
                            <td class="text-start">{{ $row->phone }}</td>
                            <td>
                                <h4>
                                    <span class="badge badge-soft-info pt-2"
                                        style="border-radius: 30px; font-size: 14px; height: 30px; width: 100px;">
                                        {{ $row->role->name ?? 'N/A' }}
                                    </span>
                                </h4>
                            </td>
                            <td style="color: green;">₹400</td>

                            <td>
                                <a href="#walletModal" wire:click="walletUser ({{ $row->id }})"
                                    class="open-wallet waves-effect waves-light" data-animation="blur"
                                    data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                    <img src="{{ asset('assets/image/empty-wallet.svg') }}" alt="dashboard"
                                        style="cursor: pointer;">
                                </a>

                                <!-- Theme Modal for Wallet -->
                                <div id="walletModal" class="modal-demo modal-lg"
                                    style="width: 400px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px; display: none;">
                                    <!-- Modal Header -->
                                    <div class="d-flex p-3 align-items-center justify-content-between">
                                        <h4 class="fw-bold">Wallet</h4>
                                        <button type="button" class="btn-close btn-close-white"
                                            onclick="Custombox.modal.close();">
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>

                                    <!-- Available Balance -->
                                    <div class="text-muted px-3 pb-3 mb-2" style="font-size: 12px;">Available Balance:
                                        <span class="fw-bold">₹1000</span></div>

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
                                            <tbody id="transactionTable"
                                                style="color: grey; font-weight: 400; font-size: 10px;">
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
                                <button class="open-modal" wire:click="edit({{ $row->id }})"
                                    style="border: none; background: none;">
                                    <img src="{{ asset('assets/image/edit.svg') }}" alt="edit"
                                        style="cursor: pointer;">
                                </button>

                                {{-- <!-- Button to Open Modal -->
                                                
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
                                                            <input type="text" class="form-control" placeholder="Abhishek Guleria">
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Mob. No.</label>
                                                            <input type="text" class="form-control" placeholder="9876543210">
                                                        </div>
                                                    
                                                        <div style="margin-bottom: 12px;">
                                                            <label style="display: block;">Email</label>
                                                            <input type="email" class="form-control" placeholder="abhiguleria1599@gmail.com">
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
                                                            <input type="text" class="form-control" placeholder="N/A">
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer justify-content-start mt-4" style="margin-top: 10px; text-align: center;">
                                                        <button wire:click="saveUser" class="btn btn-success close-modal col-5">Save</button>
                                                    </div>
                                                </div>                                  
                                         --}}
                                | <img wire:click="deleteUser ({{ $row->id }})"
                                    src="{{ asset('assets/image/trash.svg') }}" alt="dashboard">
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- <div>
                                {{ $users->links('livewire.admin.component.pagination') }}
                            </div> --}}
        </div>

        <div class="pagination-container">
            <nav>
                <ul class="pagination custom-pagination mb-0">
                    <div>
                        {{ $users->links('livewire.admin.component.pagination') }}
                    </div>
                </ul>
            </nav>
        </div>

    </div>
    {{-- add --}}
    <!-- Modal -->
    <div class="modal fade @if ($showModal) show @endif" id="userModal" tabindex="-1"
        @if ($showModal) style="display: block;" @else style="display: none;" @endif
        style="margin: 20px !important;">
        <div class="modal-dialog">
            <div class="modal-content"
                style="
                            padding: 8px 15px;
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
                            height: 510px;
                            overflow-y: scroll;
                            scrollbar-width: none;
                            ">
                <!-- Modal Header -->
                <div class="d-flex p-4 align-items-center justify-content-between">
                    <h4 class="add-title mt-2">{{ $isEditMode ? 'Edit User' : 'Add User' }}</h4>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" style="">
                            <ul style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
                                @foreach ($errors->all() as $error)
                                    <li style="line-height: 17px !important;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="add-text ml-2" style="font-size: small !important; height: auto !important;">
                        <form>
                            <input type="hidden" wire:model="uid" class="mb-2">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2"><strong>Name</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control text-muted mt-2" placeholder="Name"
                                            wire:model.live="name">
                                    </div>
                                    {{-- @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2"><strong>Email</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input type="email" class="form-control text-muted mt-2"
                                            placeholder="email2@mail.com" wire:model.live="email">
                                    </div>
                                    {{-- @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2"><strong>Mobile No.</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control text-muted mt-2"
                                            placeholder="1234567890" wire:model.live="phone">
                                    </div>
                                    {{-- @error('phone')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <strong>Type</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <select wire:model.live="role_id" class="form-control select2"
                                            class="form-control text-muted mt-2" data-toggle="select2"
                                            id="type">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer" style="border: none;">
                    <button type="button" class="btn btn-success col-5" wire:click="save">
                        {{ $isEditMode ? 'Update' : 'Save' }}
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('open-modal', () => {
                document.body.classList.add('modal-open');
            });

            window.addEventListener('close-modal', () => {
                document.body.classList.remove('modal-open');
            });
        });
    </script>
    
</div>
