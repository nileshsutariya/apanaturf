@include('admin.layouts.header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>
    #modalImage {
        height: 300px;
        width: 400px;
    }
    .swal2-title {
        font-size: 14px !important;
        font-weight: 500;
    }

    #example {
        width: 100%;
    }

    #example th,
    #example td {
        padding: 20px;
        text-align: left;
    }

    #example td {
        font-weight: 500;
    }

    #example thead {
        background-color: #f8f9fa;
    }

    #example tbody {
        overflow-y: scroll !important;
        scrollbar-width: none;
    }

    .modal-dialog-scrollable .modal-body {
        scrollbar-width: none !important;
    }

    .search {
        justify-items: end;
    }

    #search {
        width: 20%;
    }
    .choices__inner {
        min-height: auto !important;
    }
    .choices {
        margin-bottom: 0px !important;
    }
    .choices__list {
        padding-left: 10px;
    }

    .choices__list--dropdown {
        height: 160px;
    }

    .choices__list--dropdown div[role="listbox"] {
        height: 100px;
    }

    @media (max-width:700px) {
        #search {
            width: 100%;
        }

        .search {
            justify-items: start;
        }
    }

    .dz-success-mark {
        display: none;
    }

    .dz-error-mark,
    .dz-progress,
    .dz-error-message {
        display: none;
    }

    .dz-remove {
        margin-top: 10px;
        color: red;
    }

    .dz-image-preview {
        justify-items: center;
    }

    .dz-image {
        margin-top: 10px;
    }

    .dz-details {
        margin-bottom: 10px;
        text-align: center;
    }

    @media (max-width: 520px) {
        .topinfo {
            display: block !important;
            margin-bottom: 10px;
        }
    }

    @media (max-width:420px) {
        .addvenues {
            margin-top: 20px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Vendor List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
                    <li class="breadcrumb-item active">Vendor List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card" id="vendorTableWrapper">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Vendor List</h4>
            <a class="btn btn-sm btn-primary addvenues" data-bs-target="#venues">
                Add vendor
            </a>
        </div>
        <div class="card-body pt-0">
            <div class="search">
                <input class="form-control ml-auto" type="search" id="search" name="search" placeholder="Search"><br>
            </div>
            <div>
                <table id="example" class="display responsive nowrap 2" style="width:100%">
                    <thead class="p-2">
                        @php
                            $users = Auth::user()->role_id;
                        @endphp
                        <tr>
                            <th class="gridjs-th">Name</th>
                            <th class="gridjs-th">City</th>
                            <th class="gridjs-th">Place</th>
                            <th class="gridjs-th">Mobile No.</th>
                            <th class="gridjs-th">Type</th>
                            @if ($users != 3)
                            <th class="gridjs-th">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="venuesdata">
                        @if(isset($venues))
                            @foreach ($venues as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->owner_name }}
                                    </td>
                                    <td>
                                        {{ $value->city_name }}
                                    </td>
                                    <td>
                                        {{ $value->area_name }}
                                    </td>
                                    <td>
                                        {{ $value->owner_phone }}
                                    </td>
                                    <td>
                                        <h4>
                                            @if ($value->status == 1)
                                                <span class="badge badge-soft-warning pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Pending</span>
                                            @elseif ($value->status == 2)
                                                <span class="badge badge-soft-info pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Active</span>
                                            @else
                                                <span class="badge badge-soft-danger pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Deactive</span>
                                            @endif
                                        </h4>
                                    </td>
                                    @if ($users != 3)
                                    <td>
                                        <div class="d-flex gap-2">
                                            @php
                                                $turfImagesJson = htmlspecialchars(json_encode($value->turf_image), ENT_QUOTES, 'UTF-8');
                                            @endphp
                                            <a class="btn btn-soft-secondary btn-sm viewVendor" href="{{route('vendor.view', encrypt($value->id))}}">
                                                <i class="bi bi-eye-fill" style="font-size: medium"></i> 
                                            </a>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            
            <div id="venuesWrapper">
                <div class="mt-2">
                    {{ $venues->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="venues" tabindex="-1" aria-labelledby="venuesTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4 " id="venuesTitle">Add New Venues</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="horizontalwizard" style="padding-left: 1.5rem;padding-right: 1.5rem;" class="mt-1">
                    <ul class="nav nav-pills nav-justified icon-wizard form-wizard-header bg-light p-1" role="tablist">
                        <li class="nav-item" role="presentation" class="tab1">
                            <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"
                                class="nav-link rounded-0 py-2 active" aria-selected="true" role="tab">
                                <iconify-icon icon="iconamoon:profile-circle-duotone" class="fs-26"></iconify-icon>
                                Venues
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" class="tab2">
                            <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2"
                                aria-selected="false" role="tab" tabindex="-1">
                                <iconify-icon icon="iconamoon:profile-duotone" class="fs-26"></iconify-icon>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="formErrors" class="alert alert-danger d-none m-3">
                    <ul class="mb-0"></ul>
                </div>
                <div class="modal-body pt-0">
                    <div id="formErrors" class="alert alert-danger d-none m-3">
                        <ul class="mb-0"></ul>
                    </div>
                    <form id="venuesForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="id" readonly>
                        <div id="error-container"></div>

                        <div>
                            <div class="tab-content mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="d-flex topinfo">
                                        <div>
                                            <h4 class="fs-16 fw-semibold mb-1">Venues Information</h4>
                                            <p class="text-muted">Setup your Venues information</p>
                                        </div>
                                        <div style="margin-left: auto;">
                                            <p class="text-right " style="font-size: 18px;">Venues ID : <span
                                                    class="vendor_id_show" style="font-weight: 600;"></span> </p>
                                            <input id="basicUser" type="hidden" class="form-control "
                                                placeholder="Enter location in text" name="vendor_id">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <label>City</label>
                                                <select class="form-control cityselect" data-choices name="city"
                                                    id="choices-single-default">
                                                    <option value="">Select City</option>
                                                    @if (isset($city))
                                                        @foreach ($city as $c)
                                                            <option value="{{ $c->id }}">
                                                                {{ $c->city_name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="text-danger error-city"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 arealist">
                                            <div class="mt-3">
                                                <label>Area</label>
                                                <select class="form-control areaselect" data-choices name="area"
                                                    id="choices-single-default">
                                                    <option value="">Select Area</option>
                                                    @if (isset($area))
                                                        @foreach ($area as $a)
                                                            <option value="{{ $a->id }}">
                                                                {{ $a->area }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="text-danger error-area"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <label for="basicUser" class="form-label">Location text</label>
                                                <input id="basicUser" type="text" class="form-control"
                                                    placeholder="Enter location in text" name="location_text">
                                                <div class="text-danger error-location_text"></div>                                            
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <label for="basicUser" class="form-label me-2">Map Location</label>
                                                <div class="input-group">
                                                    <input id="clipboard_example" type="text" class="form-control copy"
                                                        name="location_link"
                                                        placeholder="Enter location link"
                                                        style="height: 47.5px;" />
                                                    <button type="button" class="btn btn-light btn-copy-clipboard"
                                                        onclick="copylink()"
                                                        style="border: none; font-size: 20px; padding-bottom: 0px; padding-top: 0px; z-index: auto;"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"
                                                        data-clipboard-target="#clipboard_example"> <i
                                                            class="bi bi-link-45deg"></i>
                                                    </button>
                                                </div>
                                                <div class="text-danger error-location_link"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2 col-md-12 col-sm-12 text-center mt-3" style="justify-items: center;">
                                            <span style="font-weight: 500;">Turf Image</span><br>
                                            <div id="turf-dropzone" class="dropzone p-0 mt-1">
                                                <div class="fallback">
                                                    <input type="file" name="turf_image[]" class="form-control" multiple>
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <i class="h1 bx bx-cloud-upload"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="text-muted fs-13">
                                                        ( Kindly upload proper image formats such as .png, .jpg, .jpeg,
                                                        .webp, or .svg.)
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-danger error-turf_image"></div>
                                        <span id="turf-previews" class="d-flex flex-wrap gap-2 mt-2"></span>
                                    </div>
                                </div>
                                <div class="tab-pane " id="basictab2" role="tabpanel">
                                    <div class="d-flex topinfo">
                                        <div>
                                            <h4 class="fs-16 fw-semibold mb-1">Profile Information</h4>
                                            <p class="text-muted">Setup your profile information</p>
                                        </div>
                                        <div style="margin-left: auto;">
                                            <div class="form-check form-switch">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Account
                                                    Activate</label>
                                                <input class="form-check-input" name="status" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="basicFname">Name</label>
                                                <input type="text" id="turfname" name="name" class="form-control"
                                                    placeholder="Enter Your Name">
                                                    <div class="text-danger error-name"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicEmail" class="form-label">Email</label>
                                                <input id="basicEmail" name="email" type="email" class="form-control"
                                                    placeholder="Enter your email">
                                                <div class="text-danger error-email"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label class="form-label" for="basicLname">Moblie Number</label>
                                                <input type="text" id="basicLname" name="mobileno" class="form-control"
                                                    placeholder="Enter Moblie No."
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                <div class="text-danger error-mobileno"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uploadfiles">
                                        <hr>
                                        <p style="text-align:center; font-size: larger;">
                                            <strong> Upload Documents </strong>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="row uploadfiles mt-3 text-center">
                                        <div class="col-lg-4 col-md-12 col-sm-12" style="justify-items: center;">
                                            <span style="font-weight: 500;">Profile Image</span><br>
                                            <div id="your-dropzone" class="dropzone p-0 mt-1">
                                                <div class="fallback">
                                                    <input type="file" name="profile_image" class="form-control">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <i class="h1 bx bx-cloud-upload"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="text-muted fs-13">
                                                        ( Kindly upload proper image formats such as .png, .jpg, .jpeg,
                                                        .webp, or .svg.)
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 " style="justify-items: center;">
                                            <span style="font-weight: 500;">Pancard Card Image</span><br>
                                            <div id="pancard-dropzone" class="dropzone p-0 mt-1">
                                                <div class="fallback">
                                                    <input type="file" name="pancard_image" class="form-control">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <i class="h1 bx bx-cloud-upload"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="text-muted fs-13">
                                                        ( Kindly upload proper image formats such as .png, .jpg, .jpeg,
                                                        .webp, or .svg.)
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-danger error-pancard_image"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12" style="justify-items: center;">
                                            <span style="font-weight: 500;">Aadhaar Card Image</span><br>
                                            <div id="aadhaar-dropzone" class="dropzone p-0 mt-1">
                                                <div class="fallback">
                                                    <input type="file" name="aadhaar_image" class="form-control">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <i class="h1 bx bx-cloud-upload"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="text-muted fs-13">
                                                        ( Kindly upload proper image formats such as .png, .jpg, .jpeg,
                                                        .webp, or .svg.)
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-danger error-aadhaar_image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="model-footer p-2">
                    <div class="d-flex flex-wrap align-items-center wizard justify-content-between gap-3">
                        <div class="back" id="back">
                            <a href="javascript:void(0);" class="btn btn-soft-primary">
                                Back
                            </a>
                        </div>
                        <div class="last" id="next" style="margin-left:auto;">
                            <a href="javascript:void(0);" class="btn btn-soft-primary">
                                Next
                            </a>
                        </div>
                        <div class="last" id="finish">
                            <button class="btn btn-soft-primary savevenues">
                                Finish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    let turfDZ, imageDZ, pancardDZ, aadhaarDZ;

    document.addEventListener("DOMContentLoaded", function () {
        Dropzone.autoDiscover = false;
        Dropzone.instances.forEach(dz => dz.destroy());

        turfDZ = new Dropzone("#turf-dropzone", {
            url: "{{route('vendor.store')}}",  
            paramName: "turf_image[]",
            autoProcessQueue: false,
            clickable: true,
            uploadMultiple: false, 
            parallelUploads: 10,
            maxFiles: 10,
            acceptedFiles: "image/*",
            addRemoveLinks: false,     
            previewsContainer: false  
        });

        turfDZ.on("addedfile", function(file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let previewHtml = `
                    <div class="position-relative uploaded-image-box" style="height: 100px; width: 176px;">
                        <img src="${e.target.result}" class="rounded border" style="width: 100%; height: 100%; object-fit: cover;">
                        <button type="button" class="position-absolute top-0 end-0 remove-preview-btn" title="Remove" 
                                style="font-size: 20px;
                                padding: 0px 10px 0px 0px;
                                background: transparent;
                                border: none;
                                color: #d1cdcd;"
                            >&times;
                        </button>
                    </div>
                `;
                $('#turf-previews').append(previewHtml);
            };
            reader.readAsDataURL(file);
        });

        $(document).on('click', '.remove-preview-btn', function() {
            let index = $(this).closest('.uploaded-image-box').index();
            turfDZ.removeFile(turfDZ.files[index]);  
            $(this).closest('.uploaded-image-box').remove(); 
        });

        imageDZ = new Dropzone("#your-dropzone", {
            url: "#",
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*"
        });

        pancardDZ = new Dropzone("#pancard-dropzone", {
            url: "#",
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*"
        });

        aadhaarDZ = new Dropzone("#aadhaar-dropzone", {
            url: "#",
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*"
        });

        $('#venues').on('show.bs.modal', function () {
            $('#venuesForm input[type="file"]').val(null);
            imageDZ.removeAllFiles(true);
            turfDZ.removeAllFiles(true);
            pancardDZ.removeAllFiles(true);
            aadhaarDZ.removeAllFiles(true);
        });
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.approveVendor', function () {
            // console.log("dcfvgbhnj");

            var vendorId = $(this).val();

            $.ajax({
                url: '{{ route("vendor.approve") }}',
                method: 'POST',
                data: { id: vendorId },
                success: function (response) {
                    alert(response.message);
                    location.reload(); 
                },
                error: function (xhr) {
                    alert(xhr.responseJSON?.message || 'An error occurred.');
                }
            });
        });
    });
    $(document).on('click', '.disapproveVendor', function () {
        var vendorId = $(this).data('id');
        console.log("Disapprove clicked:", vendorId);

        if (!vendorId) {
            alert("Vendor ID not found.");
            return;
        }

        $.ajax({
            url: '{{ route("vendor.disapprove") }}',
            method: 'POST',
            data: {
                id: vendorId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr) {
                alert(xhr.responseJSON?.message || 'An error occurred.');
            }
        });
    });

</script>

<script>
    $(document).on('click', '.addvenues', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('vendor.store'));
        if (hasPermission) {
            $('#venuesForm')[0].reset();
            $('#formErrors').addClass('d-none').find('ul').html('');
            turfDZ.removeAllFiles(true); 
            $('#turf-previews').html('');   
            $('#horizontalwizard a[href="#basictab1"]').tab('show');
            $('input[name="vendor_id"]').val('APN' + Math.floor(100000 + Math.random() * 900000));
            $('.vendor_id_show').text('APN' + Math.floor(100000 + Math.random() * 900000));
            $('.uploadfiles').removeClass('d-none');
            const filteredAreas = allAreas;
            areaChoices.clearStore();
            areaChoices.setChoices(
                filteredAreas.map(area => ({
                    value: area.id,
                    label: area.area
                })),
                'value',
                'label',
                true
            );
            updateWizardButtons(0);
            $('#venues').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to add venues.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });


    $(document).ready(function () {
        initDataTable();

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route(name: "vendor.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#venuesWrapper').html($(data).find('#venuesWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });

        $(document).on('click', '.savevenues', function (e) {
            e.preventDefault();
            
            let form = $('#venuesForm')[0];
            let formData = new FormData(form);

            turfDZ.getAcceptedFiles().forEach((file, index) => {
                formData.append('turf_image[]', file);
            });
            imageDZ.getAcceptedFiles().forEach((file) => {
                formData.append('profile_image', file);
            });
            pancardDZ.getAcceptedFiles().forEach((file) => {
                formData.append('pancard_image', file);
            });
            aadhaarDZ.getAcceptedFiles().forEach((file) => {
                formData.append('aadhaar_image', file);
            });

            let venuesId = $('#venuesForm input[name="id"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("vendor.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#venuesWrapper').html(html.find('#venuesWrapper').html());
                    initDataTable();
                    $('#venues').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: venuesId ? 'Vendor Updated Successfully!' : 'Vendor Saved Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }, error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $('.text-danger').html('');
                        
                        $.each(errors, function (key, value) {
                            $('.error-' + key).html(value[0]);
                        });
                    } else {
                        // $('#error-container').html(`
                        //     <div class="alert alert-danger">
                        //         ${xhr.responseJSON?.error || 'An unexpected error occurred.'}
                        //     </div>
                        // `);
                    }
                }

            });
        });
        $(document).ready(function () {
            $('#venuesForm').on('input change', 'input, select, textarea', function () {
                const fieldName = $(this).attr('name');
                if (fieldName) {
                    $('.error-' + fieldName).html('');
                    $(this).removeClass('is-invalid');
                }
            });
        });

        $(document).on("input", "#search", function () {
            var search = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('vendor.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#venuesWrapper').html($(data).find('#venuesWrapper').html());
                }
            });
        });

        $(document).on('click', '#deletevenues', function (e) {
            e.preventDefault();
            var id = $(this).val();
            // console.log(id);
            var search = $('#search').val();
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('vendor.delete'));

            if (!hasPermission) {
                Swal.fire({
                    title: "403 Unauthorized",
                    text: "You do not have permission to delete a venues.",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true,
                    confirmButtonText: "Close"
                });
                return;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{  route('vendor.delete') }}',
                type: 'POST',
                data: {
                    id: id,
                    search: search
                }, success: function (response) {
                    $('#example').html($(response).find('#example').html());
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'venues Deleted Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        console('all done')
                    } else {
                        // alert("Something went wrong.");
                    }
                }
            });
        });
    });
</script>

<script>

    $(document).on('click', '.editvenues', function () {

        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('venues.edit'));

        if (hasPermission) {
            let venues = $(this).data('venues');
            let city = venues.city_id;
            const filteredAreas = allAreas.filter(area => area.city_id == venues.city_id);
            areaChoices.clearChoices();
            areaChoices.setChoices(
                filteredAreas.map(area => ({
                    value: area.id,
                    label: area.area,
                    selected: area.id == venues.area_id
                })),
                'value',
                'label',
                true
            );
            $('#venuesTitle').text('Edit Venues');
            $('#horizontalwizard a[href="#basictab1"]').tab('show');
            $('#venuesForm input[name="id"]').val(venues.id);
            $('#venuesForm input[name="vendor_id"]').val(venues.vendor_ID);
            $('.vendor_id_show').text(venues.vendor_ID);
            $('#venuesForm input[name="name"]').val(venues.owner_name);
            $('#venuesForm input[name="email"]').val(venues.owner_email);
            $('#venuesForm input[name="mobileno"]').val(venues.owner_phone);
            $('#venuesForm input[name="location_text"]').val(venues.location_text);
            $('#venuesForm input[name="location_link"]').val(venues.location_link);
            cityChoices.setChoiceByValue(venues.city_id.toString());
            $('#formErrors ul').html('');
            $('#formErrors').addClass('d-none');
            $('.uploadfiles').addClass('d-none');
            updateWizardButtons(0);
            $('#venues').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit a venues.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const $tabs = document.querySelectorAll('.nav-pills .nav-link');
        const backBtn = document.getElementById("back");
        const nextBtn = document.getElementById("next");
        const finishBtn = document.getElementById("finish");

        window.updateWizardButtons = function (activeIndex) {
            backBtn.style.display = activeIndex === 0 ? 'none' : 'inline-block';
            nextBtn.style.display = activeIndex === $tabs.length - 1 ? 'none' : 'inline-block';
            finishBtn.style.display = activeIndex === $tabs.length - 1 ? 'inline-block' : 'none';
        };

        function getActiveTabIndex() {
            return Array.from($tabs).findIndex(tab => tab.classList.contains('active'));
        }

        nextBtn.addEventListener("click", function () {
            let currentIndex = getActiveTabIndex();
            if (currentIndex < $tabs.length - 1) {
                $tabs[currentIndex + 1].click();
            }
        });

        backBtn.addEventListener("click", function () {
            let currentIndex = getActiveTabIndex();
            if (currentIndex > 0) {
                $tabs[currentIndex - 1].click();
            }
        });

        $tabs.forEach((tab, index) => {
            tab.addEventListener("click", function () {
                $('.tab-pane').removeClass('active show');
                const targetId = this.getAttribute('href');
                $(targetId).addClass('active show');

                updateWizardButtons(index);
            });
        });

        updateWizardButtons(getActiveTabIndex());
    });
</script>

<script>
    $('.cityselect').on('change', function () {
        var selectedCityId = $(this).val();
        const filteredAreas = allAreas.filter(area => area.city_id == selectedCityId);

        areaChoices.clearStore();
        areaChoices.setChoices(
            filteredAreas.map(area => ({
                value: area.id,
                label: area.area
            })),
            'value',
            'label',
            true
        );
    });
</script>


<script>
    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }
</script>

<script>
    function initChoices(selector) {
        const element = document.querySelector(selector);

        if (!element) return null;
        if (!element.classList.contains('choices__input')) {
            return new Choices(selector, {
                placeholder: true,
                shouldSort: false,
                allowHTML: false,
            });
        } else {
            return Choices.instances.find(
                (instance) => instance.config?.callbackOnInit?.element?.id == 'choices-single-default'
            );
        }
    }
    const cityChoices = initChoices('.cityselect');
    const areaChoices = initChoices('.areaselect');
    const allAreas = @json($area);

</script>

<script>
    Dropzone.autoDiscover = false;
</script>

<script>
    function copylink() {
        var copyText = document.querySelector(".copy");
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }
</script>

@include('admin.layouts.footer')