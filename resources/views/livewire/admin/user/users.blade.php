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

    @if (session()->has('message'))
        <div wire:poll.0.2m class="mt-2">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <style>
        /* html{
            overflow-y: hidden;
        } */
        .table .header2 {
            border-top: 2px solid rgb(233, 230, 230);
            border-bottom: 2px solid rgb(233, 230, 230) !important;
        }
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
            display: flex !important;
            align-items: center !important;
            border: 1px solid #ced4da !important;
            padding: 6px 12px !important;
            border-radius: 5px !important;
        }

        .select2-container .select2-selection__arrow {
            height: 38px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 30px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
        }

        .modal-demo {
            width: auto !important;
            max-height: 90vh;
            border-radius: 15px;
            padding: 20px;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .modal-demo::-webkit-scrollbar {
            display: none;
        }

        body {
            font-weight: 400 !important;
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
            max-height: 67vh;
            overflow-y: auto;
            scrollbar-width: none;
            position: relative;
        }
        @media(max-height:600px) {
            .table-container {
                max-height: 63vh;
            }
        }

        @media(min-height:640px) and (max-height:695px) {
            .table-container {
                max-height: 57vh;
            }
        }
        @media(min-height:696px) and (max-height:741px) {
            .table-container {
                max-height: 69vh;
            }
        }

        @media(min-height:742px) and (max-height:800px) {
            .table-container {
                max-height: 70vh;
            }
        }

        @media(min-height:810px) and (max-height:940px) {
            .table-container {
                max-height: 72vh;
            }
        }

        @media(min-height:950px) and (max-height:1024px) {
            .table-container {
                max-height: 77vh;
            }
        }

        @media(min-height:1025px) and (max-height:1200px) {
            .table-container {
                max-height: 110vh;
            }
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

        body.modal-open {
            overflow: hidden;
        }
        @media (max-width: 851px) {
            .search {
                display: none !important;
            }
        }
    </style>

    <div class="page-title-box" style="margin: 0px !important; padding: 0px !important;">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3"><strong>User</strong></h2>
            </div>

            <div class="d-none d-md-flex">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..."  style="border-radius: 10px;">
                            <div class="input-group-append"
                                style="box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);">
                                {{-- <button class="btn btn-icon" type="submit">
                                    <i class="fas fa-search"></i>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <button type="button" class="add-transaction waves-effect waves-light" wire:click="openModal"
                style="border: none; background-color: #F5F5F5;">
                <h2 class="btn btn-success mt-2" style="border-radius: 10px; padding: 6px 12px 6px 12px;">+</h2>
            </button>
        </div>
        <div class="table-container table-responsive" style="overflow-y: auto;">
            <table id="responsive-datatable" class="table dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                <thead class="header2">
                    <tr class="text-uppercase">
                        <th>Name
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" wire:model.live="searchName" id="nameSearch"
                                                class="form-control" placeholder="Name" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                        <th>Email
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" wire:model.live="searchEmail" id="nameSearch"
                                                class="form-control" placeholder="Email" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                        <th class="text-start">Mobile No.
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" wire:model.live="searchMobile" id="nameSearch"
                                                class="form-control" placeholder="Mobile" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                        <th>Type
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" wire:model.live="searchType" id="nameSearch"
                                                class="form-control" placeholder="Type" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                        <th>Balance
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" id="nameSearch" class="form-control"
                                                placeholder="Balance" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                        <th>Action
                            {{-- <div class="d-none d-sm-flex mt-1 search">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" id="nameSearch" class="form-control"
                                                style="border: none; background-color: #F5F5F5;" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </th>
                    </tr>
                    {{-- <tr>
                        <th>
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
                        </th>
                        <th>
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
                        </th>
                        <th>
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
                        </th>
                        <th>
                            <div class="d-none d-sm-flex">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" wire:model.live="searchType" id="typeSearch" class="form-control"
                                                placeholder="Type"a style="border-radius: 10px;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </th>
                        <th>
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
                        </th>
                        <th></th>
                    </tr> --}}
                </thead>
                <tbody>
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

                                <div id="walletModal" class="modal-demo modal-lg"
                                    style="width: 400px !important; height: auto; padding: 20px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); border-radius: 12px; display: none;">
                                    <div class="d-flex p-3 align-items-center justify-content-between">
                                        <h4 class="fw-bold">Wallet</h4>
                                        <button type="button" class="btn-close btn-close-white"
                                            onclick="Custombox.modal.close();">
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>

                                    <div class="text-muted px-3 pb-3 mb-2" style="font-size: 12px;">Available Balance:
                                        <span class="fw-bold">₹1000</span>
                                    </div>

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

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="modal-footer border-0 justify-content-center">
                                        <nav>
                                            <ul class="pagination pagination-sm" id="pagination">

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

                                | <img wire:click="deleteUser ({{ $row->id }})"
                                    src="{{ asset('assets/image/trash.svg') }}" alt="dashboard">
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
                        {{ $users->links('livewire.admin.component.pagination') }}
                    </div>
                </ul>
            </nav>
        </div>
    </div>

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
                <div class="d-flex p-4 align-items-center justify-content-between">
                    <h4 class="add-title mt-2">{{ $isEditMode ? 'Edit User' : 'Add User' }}</h4>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

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
                                        <select wire:model.live="role_id" class="form-control text-muted mt-2 select2"
                                            data-toggle="select2" id="type">
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <script>
        function initSelect2() {
            $('#type').select2({
                dropdownParent: $('#userModal'),
                width: '100%'
            });
    
            $('#type').on('change', function (e) {
                @this.set('role_id', $(this).val());
            });
        }
    </script>
    
    <script>
        function initDataTable() {
            const table = $('#responsive-datatable');
    
            // if (table.length) {
            //     // const existingTable = $(table).DataTable();

            //     if ($.fn.DataTable.isDataTable(table)) {
            //         console.log('DataTable destroyed');
            //         $('#responsive-datatable').destroy();
            //     }
                
                table.DataTable({
                    responsive: true,
                    ordering: false,
                    paging: true,
                    searching: true,
                    info: false,
                    pageLength: 10,
                    lengthChange: false,
                    dom: 'rt'
                });
                console.log('DataTable reinitialized');
            // } else {
            //     console.log('Table not found');
            // }
        }
    
        // document.addEventListener('DOMContentLoaded', function () {
        //     initDataTable();
        // });
        
        // document.addEventListener('DOMContentLoaded', function () {
        //     console.log('DOMContentLoaded fired');
        //     initDataTable();
        // });

        // document.addEventListener('livewire:navigated', () => {
        //     console.log('Livewire navigated');
        //     setTimeout(initDataTable, 200);
        // });
       
        document.addEventListener('livewire:updated', () => {
            console.log('Livewire updated');
            setTimeout(initDataTable, 200);
        });

        document.addEventListener('livewire:updated', () => {
            console.log('Livewire select2');
            setTimeout(() => {
                // initDataTable();
                initSelect2(); 
            }, 200);
        });
    </script>  
    
    <script>
        window.addEventListener('open-modal', () => {
            document.body.classList.add('modal-open');
        });

        window.addEventListener('close-modal', () => {
            document.body.classList.remove('modal-open');
        });
    </script>

</div>
