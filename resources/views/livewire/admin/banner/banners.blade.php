<div>
    <style>
        @media (min-width: 576px) {
            .banner-container {
                width: 90% !important;
                /* Makes it take 90% of the available space on medium screens */
            }
        }

        @media (min-width: 992px) {
            .banner-container {
                width: 400px !important;
                /* Fixed width for larger screens */
            }
        }

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
                <h2 class="ml-3"><strong>Banners</strong></h2>
            </div>

            <div class="float-end mr-3">
                <button type="button" class=" add-transaction waves-effect waves-light" wire:click="openModal"
                    style="border: none; background-color: #F5F5F5;" data-animation="blur" data-overlaySpeed="100">
                    <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Banners</h2>
                </button>
            </div>
        </div>
        <div class="container" style="background-color: #f5f5f5;">
            @foreach($banner as $row)
                <div class="d-inline-flex banner-container mt-3" style="background-color: #d3d3d3;
                                                                                    border-radius: 10px;
                                                                                    position: relative;
                                                                                    height: 190px; 
                                                                                    margin-left: 15px;
                                                                                    width: 100%;
                                                                                    max-width: 375px;">
                    <img src="{{asset('storage/' . $row->image_path)}}" style="border-radius:10px;" width="100%">
                    <span class="close-icon" style="position: absolute;
                                                                        top: 3px;
                                                                        right: 10px;
                                                                        font-size: 20px;
                                                                        cursor: pointer;" wire:click="bannerdelete({{ $row->id }}">&times;
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade @if($showModal) show @endif" id="add" tabindex="-1" aria-labelledby="addLabel"
        @if($showModal) style="display: block;" @else style="display: none;" @endif style="margin: 20px !important;">
        <div class="modal-backdrop fade show"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"
            wire:click="closeModal">
        </div>

        <div class="modal-dialog">
            <div class="modal-content"
                style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 350px; background: #fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); border-radius: 13px; z-index: 1000; font-size: 13px; height: 350px; overflow-y: scroll; scrollbar-width: none;">
                <!-- Modal Header -->
                <div class="d-flex pl-4 pr-4 pt-4 pb-1 align-items-center justify-content-between">
                <h4 class="add-title">Add Banners</h4>
                    <button type="button" class="btn-close btn-close-gray" wire:click="closeModal">
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body pb-0">
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
                            <div class="d-flex" style="margin-left: 100px;">
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
                                <div class="d-flex mt-2 justify-content-center">
                                    {{-- <img src="{{ $image_id ->temporaryUrl() }}"
                                        style="height: 60px; width: 60px; object-fit: contain;" alt="Preview"> --}}
                                    <p style="font-size: 12px; color: #555; text-align: center; line-height: 17px;">
                                        {{ $image_id->getClientOriginalName() }}
                                    </p>
                                </div>
                            @endif
                            <div>
                            </div>
                            <!-- Modal Footer -->
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center mb-3 p-0" style="border: none;">
                    <button type="button" class="btn btn-success col-md-5" wire:click="addbanner"> Add </button>
                </div>
            </div>
        </div>
    </div>
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