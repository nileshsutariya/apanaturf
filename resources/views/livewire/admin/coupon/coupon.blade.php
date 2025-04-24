<div>
    <div wire:poll.10s>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <style>
        body {
            display: flex;
            /* justify-content: center;
            align-items: center; */
            flex-wrap: wrap;
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .coupon-container {
            position: relative;
            width: 85%;
            margin-left: 21px;
            max-width: 400px;
            display: inline-block;
            /* margin: 3px; */
            /* line-height: 16px !important; */
        }
        .coupon-img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }
        .close-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        .coupon-content {
            line-height: 20px;
            position: absolute;
            top: 17%;
            left: 10%;
            width: 82%;
            color: white;
        }
        .d-flex {
            display: flex;
        }
        .space-between {
            justify-content: space-between;
        }
        .coupon-discount {
            /* margin-top: 3px; */
            font-size: 18px;
            font-weight: 600;
        }
        .coupon-code {
            /* margin-top: 4px; */
            font-size: 18px;
            color: #29c26c;
            text-align: right;
            margin-right: 10px;
        }
        .small-text {
            font-size: 9px;
            color: gray;
            width: 50%;
            margin-right: 10px;
            /* margin-top: 3px; */
        }
        .coupon-title {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
            width: 100%;
        }
        @media (max-width: 768px) {
            .coupon-container {
                width: 90%;
            }
            .coupon-content {
                top: 15%;
                left: 5%;
                width: 90%;
            }
            .coupon-discount, .coupon-code {
                font-size: 20px;
            }
            .small-text {
                font-size: 10px;
            }
            .coupon-title {
                font-size: 16px;
            }
            .close-icon {
                width: 20px;
                height: 20px;
            }
        }
        
        body.modal-open .page-title-box {
            filter: blur(4px);
            transition: filter 0.3s ease-in-out;
        }

        body.modal-open {
            overflow: hidden;
        }
    </style>
    <style>
        @media (min-width: 576px) {
            .banner-container {
                width: 90% !important; /* Makes it take 90% of the available space on medium screens */
            }
        }

        @media (min-width: 992px) {
            .banner-container {
                width: 400px !important; /* Fixed width for larger screens */
            }
        }

        body{
            /* font-size: 15px;
            font-family: 'Inter', sans-serif; */
            font-weight: 400 !important;
            /* letter-spacing: 0.9px;
            background-color: #F5F5F5; */
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
            padding: 6px 12px;
            border-radius: 5px;
            color: #6c757d;
        }

        .pagination .page-item {
            margin: 0 2px;
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

    </style>

    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3"><strong>Coupons & Offers</strong></h2>
            </div>
            <div class="float-end mr-3">
                <!-- Button to trigger modal -->
                <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal"
                    style="border: none; background-color: #F5F5F5;">
                    <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Coupons</h2>
                </button>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: transparent; box-shadow: none;">
                    <div class="card-body pt-2" style="overflow: hidden;">
                        <div class="table-container" style="max-height: 380px; overflow-y: auto;">
                            <table id="responsive-datatable" id="coupontable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>Coupon Code</th>
                                        <th>Created Date</th>
                                        <th>Created By</th>
                                        <th>Name</th>
                                        <th>Validity</th>
                                        <th>Discount(₹/%)</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-none d-sm-flex">
                                                <form class="app-search">
                                                    <div class="app-search-box">
                                                        <div class="input-group">
                                                            <input type="text" wire:model.live="codeSearch" class="form-control" placeholder="Code" style="border-radius: 10px;">
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
                                                            <input type="text" wire:model.live="createdateSearch" class="form-control" placeholder="date" style="border-radius: 10px;">
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
                                                            <input type="text" wire:model.live="createdbySearch" class="form-control" placeholder="Role" style="border-radius: 10px;">
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
                                                            <input type="text" wire:model.live="nameSearch" class="form-control" placeholder="Name" style="border-radius: 10px;">
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
                                                            <input type="text" wire:model.live="validitySearch" class="form-control" placeholder="Date" style="border-radius: 10px;">
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
                                                            <input type="text" wire:model.live="discountSearch" class="form-control" placeholder="Discount" style="border-radius: 10px;">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $value)
                                    <tr>
                                        <td> {{$value->coupons_code}} </td>
                                        {{-- <td>{{ $value->created_at->format('Y-m-d') }}</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d. M Y') }}</td>
                                        <td>{{ $value->creaters->name ?? 'N/A' }}</td>
                                        <td>{{$value->coupons_name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->start_date)->format('d/m') }}-{{ \Carbon\Carbon::parse($value->end_date)->format('d/m') }}</td>
                                        <td>{{$value->discount_in_ruppee}}</td>
                                        <td>
                                            <!-- Trigger Button -->
                                            <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openinfoModal({{ $value->id }})"
                                                style="border: none; background-color: #F5F5F5;">
                                                <i class="bi bi-info-circle" style="font-size: 19px; color: blue; cursor: pointer;" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" href="#infoModal"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="pagination-container">
                            <nav>
                                <ul class="pagination custom-pagination mb-0">
                                    <div>
                                        {{ $coupons->links('livewire.admin.component.pagination') }}
                                    </div>
                                </ul>
                            </nav>
                        </div>
                    </div>
        
                </div>
            </div>
        </div> 
    </div>

    @if ($showModal)
    <div class="modal fade @if ($showModal) show @endif" id="userModal" tabindex="-1"
        @if ($showModal) style="display: block;" @else style="display: none;" @endif
        style="margin: 20px !important;">
        <div 
            class="modal-backdrop fade show"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;" 
            wire:click="closeModal">
        </div>
        <div class="modal-dialog">
            <div class="modal-content"
                style="
                            padding: 8px 15px;
                            position: fixed;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            width: 400px;
                            background: #fff;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                            border-radius: 13px;
                            z-index: 1000;
                            font-size: 13px;
                            height: 530px;
                            overflow-y: scroll;
                            scrollbar-width: none;
                            ">
                <!-- Modal Header -->
                <div class="d-flex px-4 pt-4 align-items-center justify-content-between">
                    <h4 class="add-title mt-2">Create Coupons</h4>
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
                            {{-- <div class="coupon-container">
                                <img src="{{ asset('assets/image/users/couponscard.svg') }}" class="coupon-img" alt="Coupon Card">
                                <img src="{{ asset('assets/image/users/close-circle.svg') }}" class="close-icon" alt="Close Button">
                                <div class="coupon-content">
                                    <div class="d-flex space-between">
                                        <span class="coupon-discount">20% OFF</span>
                                        <span class="coupon-code">END02</span>
                                    </div>
                                    <div class="d-flex space-between">
                                        <span class="small-text">MAX ₹500</span>
                                        <span class="small-text" style="text-align: right;">Coupon&nbsp;Expires&nbsp;01/03</span>
                                    </div>
                                    <span class="coupon-title mt-3">End Of New Year</span>
                                </div>
                            </div> --}}
                            <div class="coupon-container">
                                <img src="{{ asset('assets/image/users/couponscard.svg') }}" class="coupon-img" alt="Coupon Card">
                                <img src="{{ asset('assets/image/users/close-circle.svg') }}" class="close-icon" alt="Close Button">
                                <div class="coupon-content">
                                    <div class="d-flex space-between">
                                        <span class="coupon-discount">
                                            @if ($discount_in_per)
                                                {{ $discount_in_per }}% OFF
                                            {{-- @elseif ($discount_in_ruppee)
                                                ₹{{ $discount_in_ruppee }} OFF --}}
                                            @else
                                                20% OFF
                                            @endif
                                        </span>
                                        <span class="coupon-code">{{ $coupons_code ?? 'END02' }}</span>
                                    </div>
                                    <div class="d-flex space-between">
                                        <span class="small-text">
                                            @if ($discount_in_ruppee)
                                                MAX ₹{{ $discount_in_ruppee }}
                                            @else   
                                                MAX ₹500
                                            @endif
                                        </span>
                                        <span class="small-text" style="text-align: right;">
                                            @if ($end_date && \Carbon\Carbon::hasFormat($end_date, 'd/m/Y'))
                                                Coupon&nbsp;Expires&nbsp;{{ \Carbon\Carbon::createFromFormat('d/m/Y', $end_date)->format('d/m') }}
                                            @else
                                                Coupon&nbsp;Expires&nbsp;01/03
                                            @endif
                                        </span>
                                        
                                    </div>
                                    <span class="coupon-title mt-3">
                                        {{ $coupons_name ?: 'End Of New Year' }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="add-text" style="font-size: 12px; letter-spacing: 0.9px; line-height: normal;">
                                <div class="container-fluid">
                                    
                                    <div class="mb-4 mt-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Coupons Name</strong>
                                                <input type="text" wire:model.live="coupons_name" class="form-control" placeholder="End of Year" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Valid Date</strong>
                                                <input type="text" wire:model.live="start_date" class="form-control" placeholder="dd/mm/yyyy" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">

                                            </div>
                                            <div class="col-md-6">
                                                <strong>Expire Date</strong>
                                                <input type="text" wire:model.live="end_date" class="form-control" placeholder="dd/mm/yyyy" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 ml-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Discount *(%)</strong>
                                                <input type="text" wire:model.live="discount_in_per" class="form-control" placeholder="20%" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Discount(₹)</strong>
                                                <input type="text" wire:model.live="discount_in_ruppee" class="form-control" placeholder="100 ₹" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Min. Order</strong>
                                                <input type="text" wire:model.live="min_order" class="form-control" placeholder="500 ₹" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="modal-footer" style="border: none;">
                                <button type="button" class="btn btn-success col-5" wire:click="couponsadd">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if ($showinfoModal)
    <div class="modal fade @if ($showinfoModal) show @endif" id="userModal" tabindex="-1"
        @if ($showinfoModal) style="display: block;" @else style="display: none;" @endif
        style="margin: 20px !important;">
        
        <div 
            class="modal-backdrop fade show"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;" 
            wire:click="closeModal">
        </div>
        <div class="modal-dialog">
            <div class="modal-content"
                style="
                            padding: 8px 15px;
                            position: fixed;
                            top: 43%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            width: 400px;
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
                <div class="d-flex px-4 pt-4 align-items-center justify-content-between">
                    <h4 class="add-title mt-2">View Coupons</h4>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

                <!-- Modal Body -->
                
                <div class="modal-body">
                    
                    <div class="add-text ml-2" style="font-size: small !important; height: auto !important;">
                        <form>
                            <input type="hidden" value="{{ $selectedCoupon->id ?? '' }}" readonly>
                            <div class="coupon-container">
                                <img src="{{ asset('assets/image/users/couponscard.svg') }}" class="coupon-img" alt="Coupon Card">
                                <img src="{{ asset('assets/image/users/close-circle.svg') }}" class="close-icon" alt="Close Button">
                                <div class="coupon-content">
                                    <div class="d-flex space-between">
                                        <span class="coupon-discount">{{$selectedCoupon->discount_in_per}}% OFF</span>
                                        <span class="coupon-code">{{$selectedCoupon->coupons_code}}</span>
                                    </div>
                                    <div class="d-flex space-between">
                                        <span class="small-text">MAX ₹{{(int)$selectedCoupon->discount_in_ruppee}}</span>
                                        <span class="small-text" style="text-align: right;">Coupon&nbsp;Expires&nbsp;{{\Carbon\Carbon::parse($selectedCoupon->end_date)->format('m/d') }}</span>
                                    </div>
                                    <span class="coupon-title mt-3">{{$selectedCoupon->coupons_name}}</span>
                                </div>
                            </div>
                            <div class="add-text" style="font-size: 12px; letter-spacing: 0.9px; line-height: normal;">

                                <div class="container-fluid">
                                    <div class="mb-4 mt-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Created By : </strong><span class="text-muted">{{$selectedCoupon->creaters->name ?? ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Turf ID : </strong><span class="text-muted">784412</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Created On : </strong><span class="text-muted">{{ \Carbon\Carbon::parse($selectedCoupon->created_at)->format('d. M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Valid Date : </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 ml-3">
                                        <div class="row">
                                            <div class="col-md-12 ml-4">
                                                <strong>Start Date : </strong><span class="text-muted"> {{$selectedCoupon->start_date}} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12 ml-4">
                                                <strong>End Date : </strong><span class="text-muted"> {{$selectedCoupon->end_date}} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Min. Order : </strong><span class="text-muted"> {{(int)$selectedCoupon->min_order}} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 ml-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Discount : </strong><span class="text-muted"> {{(int)$selectedCoupon->discount_in_ruppee}} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal-footer" style="border: none;">
                                <button type="button" class="btn btn-success col-5" wire:click="save">
                                    Create
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

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
