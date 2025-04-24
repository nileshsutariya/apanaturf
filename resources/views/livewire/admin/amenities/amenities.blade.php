<div>
    @if (session()->has('message'))
        <div wire:poll.10s class="mt-2">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <style>
     
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
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
        body.modal-open .page-title-box {
            filter: blur(4px);
            transition: filter 0.3s ease-in-out;
        }

        body.modal-open {
            overflow: hidden;
        }
    </style>
       <div class="page-title-box">
                    
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3"><strong>Amenities</strong></h2>
            </div>

            <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal"
                style="border: none; background-color: #F5F5F5;">
                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Amenities</h2>
            </button>
            {{-- <div class="float-end mr-3">
                <a href="#add" class="add-amenities waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                    <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Amenities</h2>
                </a>

                <!-- Custom theme modal -->
                <div id="add" class="modal-demo" style="width: 380px !important; padding: 20px; border-radius: 12px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                    <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%;">
                        <h4 class="add-title">Add Amenities</h4>
                        <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="d-flex mt-3 mb-4" style="margin-left: 120px;">
                        <label for="uploadInput" style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('assets/image/gallery-add.svg') }}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                            <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload image</span>
                            <input type="file" id="uploadInput" style="display: none;">
                        </label>
                    </div>
                    <div class="modal-body p-3" style="font-size: small;">
                        <label for="date" class="mb-2">Name of the Amenities</label>
                        <input type="text" class="form-control text-muted mb-2" name="amenities" placeholder="Name">
                    </div>
                    
                    <div class="modal-footer justify-content-end mb-3" style="margin-top: 90px; border: none;">
                        <button type="button" class="btn btn-success col-md-5"> Add </button>
                    </div>
                </div>

            </div> --}}

        </div>
        <h4 class="m-3">
            @foreach($amenities as $value)
                <div class="d-inline-flex align-items-center px-3 py-2 rounded-pill m-1" style="background-color: #cce8e6;">
                    <img src="{{ url('/storage/admin_image/' . $value->image_name) }}"
                    alt="{{ $value->name }}"
                    class="m-1 me-2"
                    style="height: 25px;">
                    <span class="text-success" style="font-weight: 500; font-size: medium;">{{ $value->name }}</span>
                    <button type="button" wire:click="removeamenity({{ $value->id }})" class="btn-close ms-3" aria-label="Close" style="font-size: small;"></button>
                </div>
            @endforeach
        </h4>

    </div>
    {{-- modal --}}
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
                            width: 380px;
                            background: #fff;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                            border-radius: 13px;
                            z-index: 1000;
                            font-size: 13px;
                            height: 500px;
                            overflow-y: scroll;
                            scrollbar-width: none;
                            ">
                <!-- Modal Header -->
                <div class="d-flex p-4 align-items-center justify-content-between">
                    <h4 class="add-title mt-2">Add Amenities</h4>
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
                        <form enctype="multipart/form-data">
                            
                            <div class="d-flex mt-2 justify-content-center">
                                <label for="uploadInput" style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                    <img src="{{ asset('assets/image/gallery-add.svg') }}" alt="Upload" style="height: 25px; width: 25px;">
                                    <span style="font-size: 10px; color: #cac9c9; margin-top: 7px;">Upload image</span>
                                    <input type="file" id="uploadInput" wire:model.live="image_id" style="display: none;" accept="image/*">
                                </label>
                            </div>
                            @if ($image_id)
                                <div class="d-flex mb-3 mt-2 justify-content-center">
                                    {{-- <img src="{{ $image_id ->temporaryUrl() }}" style="height: 60px; width: 60px; object-fit: contain;" alt="Preview"> --}}
                                    <p class="mb-3" style="font-size: 12px; color: #555; text-align: center;">
                                        {{ $image_id->getClientOriginalName() }}
                                    </p>
                                </div>
                            @endif
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2 mt-5"><strong>Name of the Amenities</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control text-muted mt-2" placeholder="Name"
                                            wire:model.live="name">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer" style="border: none;">
                    <button type="button" class="btn btn-success col-5" wire:click="save">
                        Add
                    </button>
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