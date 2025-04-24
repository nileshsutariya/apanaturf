<div>
    <style>
        body {
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
        }

        .custom-pagination {
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
                <h2 class="ml-3"><strong>Sports</strong></h2>
            </div>
            <div class="float-end mr-3">
                <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal"
                    style="border: none; background-color: #F5F5F5;" data-animation="blur" data-overlaySpeed="100">
                    <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Sports</h2>
                </button>
            </div>
        </div>
        <h4 class="m-3">
            @foreach ($sports as $row)
                <div class="d-inline-flex align-items-center px-3 py-1 mb-3 mr-2 rounded-pill"
                    style="background-color: #cce8e6;">
                    <img class="m-1 me-3" src="{{asset('storage/' . $row->image_path)}}" alt="football"
                        style="height: 20px;">
                    <span class="text-success" style="font-weight: 500; font-size: medium;">
                        {{ $row->name }}
                    </span>
                    <button type="button" wire:click="sportdelete({{ $row->id }})" class="btn-close ms-3"
                        aria-label="Close" style="font-size: small;"></button>
                </div>
            @endforeach
        </h4>
    </div>



    <div class="modal fade @if($showModal) show @endif" id="add" tabindex="-1" aria-labelledby="addLabel"
        @if($showModal) style="display: block;" @else style="display: none;" @endif style="margin: 20px !important;">
        <div class="modal-backdrop fade show"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"
            wire:click="closeModal">
        </div>

        <div class="modal-dialog">
            <div class="modal-content"
                style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 350px; background: #fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); border-radius: 13px; z-index: 1000; font-size: 13px; height: 450px; overflow-y: scroll; scrollbar-width: none;">
                <!-- Modal Header -->
                <div class="d-flex pl-4 pr-4 pt-4 pb-1 align-items-center justify-content-between">
                    <h4 class="add-title">Add Sports</h4>
                    <button type="button" class="btn-close btn-close-gray" wire:click="closeModal">
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger pb-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="line-height: 17px!important;">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="add-text ml-2" style="font-size: small !important; height: auto !important;">
                        <form enctype="multipart/form-data">
                            <div class="d-flex mt-3 mb-4" style="margin-left: 100px;">
                                <label for="uploadInput"
                                    style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                    <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        style="cursor: pointer; height: 25px; width: 25px;">
                                    <span
                                        style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload
                                        image</span>
                                    <input type="file" id="uploadInput" style="display: none;" wire:model="image_id">
                                </label>
                            </div>
                            @if ($image_id)
                                <div class="d-flex mb-3 mt-2 justify-content-center">
                                    {{-- <img src="{{ $image_id ->temporaryUrl() }}"
                                        style="height: 60px; width: 60px; object-fit: contain;" alt="Preview"> --}}
                                    <p class="mb-3" style="font-size: 12px; color: #555; text-align: center;">
                                        {{ $image_id->getClientOriginalName() }}
                                    </p>
                                </div>
                            @endif
                            <div>
                                <label for="date" class="mb-3">Name of the Sports</label>
                                <input type="text" class="form-control text-muted mb-2" placeholder="Name"
                                    wire:model="name">
                            </div>
                            <!-- Modal Footer -->
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-start mb-3 p-0" style="border: none;">
                    <button type="button" class="btn btn-success col-md-5 ml-4" wire:click="addsport"> Add </button>
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