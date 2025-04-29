@include('admin.layouts.header')
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
</style>

<div class="page-title-box">

    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h2 class="ml-3"><strong>Banners</strong></h2>
        </div>

        <div class="float-end mr-3">

            <!-- Add Banners Button -->
            <a href="#addBanner" class="add-banner waves-effect waves-light" data-animation="blur"
                data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                <h2 class="btn btn-success" style="border-radius: 40px;">+ Add Banners</h2>
            </a>

            <!-- Theme Modal for Add Banners -->
            <div id="addBanner" class="modal-demo" style="width: 380px !important;
                                                                        height: 320px;
                                                                        padding: 20px;
                                                                        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
                                                                        border-radius: 12px;">

                <!-- Modal Header -->
                <div class="d-flex p-3 align-items-center justify-content-between">
                    <h4 class="add-title">Add Banners</h4>
                    <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Upload Image Section -->
                <div class="d-flex mt-3 mb-4 justify-content-center">
                    <label for="uploadInput" style="width: 100px; height: 90px; 
                                                                    border: 2px dashed #706d6d; 
                                                                    border-radius: 10px; 
                                                                    display: flex; flex-direction: column; 
                                                                    align-items: center; justify-content: center; 
                                                                    cursor: pointer;">
                        <img src="{{ asset('assets/image/gallery-add.svg') }}" alt="Upload"
                            style="cursor: pointer; height: 25px; width: 25px;">
                        <span class="text-center" style="font-size: 10px; color: #cac9c9; margin-top: 7px;">Upload
                            Image</span>
                        <input type="file" id="uploadInput" style="display: none;">
                    </label>
                </div>

                <!-- Modal Footer -->
                <div class="text-center">
                    <button type="button" class="btn btn-success col-md-5">Add</button>
                </div>

            </div>

        </div>
    </div>
    <div class="container" style="background-color: #f0f5f5;">
        <div class="banner-container mt-3" style="background-color: #d3d3d3;
                                                                    border-radius: 10px;
                                                                    position: relative;
                                                                    height: 190px; 
                                                                    padding: 10px;
                                                                    margin-left: 15px;
                                                                    width: 100%;
                                                                    max-width: 400px;">
            <!-- Close Icon -->
            <span class="close-icon" style="position: absolute;
                                                        top: 3px;
                                                        right: 10px;
                                                        font-size: 20px;
                                                        cursor: pointer;">&times;
            </span>
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
@include('admin.layouts.footer')
