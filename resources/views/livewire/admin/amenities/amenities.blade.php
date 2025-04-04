<div>

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
    </style>


    <div class="page-title-box">

        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3"><strong>Amenities</strong></h2>
            </div>
            <div class="float-end mr-3">
                <a href="#add" class="add-amenities waves-effect waves-light" data-animation="blur"
                    data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                    <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Amenities</h2>
                </a>

                <div id="add" class="modal-demo"
                    style="width: 380px !important; padding: 20px; border-radius: 12px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                    <div class="d-flex p-3 align-items-center justify-content-between" style="width: 100%;">
                        <h4 class="add-title">Add Amenities</h4>
                        <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data">
                    <div class="d-flex mt-3 mb-4" style="margin-left: 120px;">
                        <label for="uploadInput"
                            style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('assets/image/gallery-add.svg') }}" alt="dashboard"
                                data-bs-toggle="modal" data-bs-target="#editModal"
                                style="cursor: pointer; height: 25px; width: 25px;">
                            <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload
                                image</span>
                            <input type="file" id="uploadInput" style="display: none;" wire:model="icon">
                        </label>
                    </div>
                    <div class="modal-body p-3" style="font-size: small;">
                        <label for="date" class="mb-2">Name of the Amenities</label>
                        <input type="text" class="form-control text-muted mb-2" name="amenities" placeholder="Name" wire:model="name">
                    </div>
                    </form>
                    <div class="modal-footer justify-content-end mb-3" style="margin-top: 90px; border: none;">
                        <button type="button" class="btn btn-success col-md-5"> Add </button>
                    </div>
                </div>

            </div>
        </div>
        <h4 class="m-3">
            <div class="d-inline-flex align-items-center px-3 py-2 rounded-pill" style="background-color: #cce8e6;">
                <img class="m-1 me-3" src="{{ asset('assets/image/Vector.svg') }}" alt="football" style="height: 15px;">
                <span class="text-success" style="font-weight: 500; font-size: medium;">Wi-fi</span>
                <button type="button" class="btn-close ms-3" aria-label="Close" style="font-size: small;"></button>
            </div>
        </h4>
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

    @include('admin.layouts.footer')
</div>