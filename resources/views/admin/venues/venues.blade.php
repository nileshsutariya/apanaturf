@include('admin.layouts.header')


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<style>
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

    .choices__list {
        padding-left: 10px;
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
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Venues List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Venues</a></li>
                    <li class="breadcrumb-item active">Venues List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Venues List</h4>
            {{-- @if(Auth::user() && Auth::user()->hasPermissionTo('venues.store'))
            <!-- Check if user has permission --> --}}
            <a class="btn btn-sm btn-primary addvenues" data-bs-toggle="modal" data-bs-target="#venues">
                Add venues
            </a>
            {{-- @endif --}}
        </div>
        <div class="card-body pt-0">
            <!-- <p class="text-muted">The most basic list group is an unordered list with list items and
                the proper classes. Build upon it with the options that follow, or with your own CSS
                as needed.</p>
            <div class="py-3">
                <div id="table-fixed-header"></div>
            </div> -->
            <div class="search">
                <input class="form-control ml-auto" type="search" id="search" name="search" placeholder="Search"><br>
            </div>
            <div>
                <table id="example" class="display responsive nowrap 2" style="width:100%">
                    <thead class="p-2">
                        <tr>
                            <th class="gridjs-th">Name</th>
                            <th class="gridjs-th">Email</th>
                            <th class="gridjs-th">Phone</th>
                            <th class="gridjs-th">Type</th>
                            <th class="gridjs-th">Balance</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="venuesdata">
                        @if(isset($venues))
                            @foreach ($venues as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>
                                        {{ $value->email }}
                                    </td>
                                    <td>
                                        {{ $value->phone }}
                                    </td>
                                    <td>
                                        <h4><span class="badge badge-soft-info pt-1"
                                                style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">venues</span>
                                        </h4>
                                    </td>
                                    <td>
                                        {{ $value->balance }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-soft-primary btn-sm editvenues" data-bs-target="#venues"
                                                data-venues='@json($value)'>
                                                <i class='bx bxs-pencil bx-xs'></i>
                                            </a>
                                            <a href="#" class="btn btn-soft-danger btn-sm">
                                                <i class='bx bxs-trash bx-xs'></i>
                                            </a>
                                        </div>
                                    </td>
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
</div>
<div class="modal fade" id="venues" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4 " id="exampleModalXlLabel">Extra large modal</h5>
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
            <div class="modal-body pt-0">
                <form>
                    <div>
                        <div class="tab-content mb-0">
                            <div class="tab-pane  active show" id="basictab1" role="tabpanel">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="fs-16 fw-semibold mb-1">Venues Information</h4>
                                        <p class="text-muted">Setup your Venues information</p>
                                    </div>
                                    <div style="margin-left: auto;">
                                        <p class="text-right" style="font-size: 20px;">Venues ID : <span
                                                style="font-weight: 600;">APN504567</span> </p>
                                        <input id="basicUser" type="hidden" class="form-control"
                                            placeholder="Enter location in text" name="vendor_id">
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicFname">Venues ID</label>
                                            <input type="text" id="turfname" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-6 arealist">
                                        <div class="mb-3">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicUser" class="form-label">Location text</label>
                                            <input id="basicUser" type="text" class="form-control"
                                                placeholder="Enter location in text" name="location_text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicUser" class="form-label">Map Location</label>
                                            <input id="basicUser" type="text" class="form-control"
                                                placeholder="Enter map location" name="location_link">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end tab-pane -->

                            <div class="tab-pane" id="basictab2" role="tabpanel">
                                <h4 class="fs-16 fw-semibold mb-1">Profile Information</h4>
                                <p class="text-muted">Setup your profile information</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicFname">Name</label>
                                            <input type="text" id="turfname" class="form-control" placeholder="Chris">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicEmail" class="form-label">Email</label>
                                            <input id="basicEmail" type="email" class="form-control"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicLname">Moblie Number</label>
                                            <input type="text" id="basicLname" class="form-control"
                                                placeholder="Keller">
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr>
                                <p style="text-align:center; font-size: larger;"><strong> Upload Documents </strong></p>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 " style="justify-items: center;">
                                        <span style="font-weight: 500;">Profile Image</span><br>
                                        <div id="your-dropzone" class="dropzone p-0 mt-1">
                                            <div class="fallback">
                                                <input type="file" name="your_image" class="form-control">
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
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div><!-- end tab-pane -->
                </form>
            </div>
            <div class="model-footer p-2">
                <div class="d-flex flex-wrap align-items-center wizard justify-content-between gap-3">
                    <div class="back" id="back">
                        <a href="javascript:void(0);" class="btn btn-soft-primary">
                            Back
                        </a>
                    </div>
                    <div class="last" id="next" style="margin-left:auto;" >
                        <a href="javascript:void(0);" class="btn btn-soft-primary">
                           Next
                        </a>
                    </div>
                    <div class="last" id="finish">
                        <a href="javascript:void(0);" class="btn btn-soft-primary">
                           Finish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    $(document).ready(function () {
        initDataTable();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const $tabs = document.querySelectorAll('.nav-pills .nav-link');
        const backBtn = document.getElementById("back");
        const nextBtn = document.getElementById("next");
        const finishBtn = document.getElementById("finish");

        function updateButtons(activeIndex) {
            backBtn.style.display = activeIndex === 0 ? 'none' : 'inline-block';
            nextBtn.style.display = activeIndex === $tabs.length - 1 ? 'none' : 'inline-block';
            finishBtn.style.display = activeIndex === $tabs.length - 1 ? 'inline-block' : 'none';
        }

        function getActiveTabIndex() {
            return Array.from($tabs).findIndex(tab => tab.classList.contains('active'));
        }

        nextBtn.addEventListener("click", function () {
            let currentIndex = getActiveTabIndex();
            if (currentIndex < $tabs.length - 1) {
                $tabs[currentIndex + 1].click();
                updateButtons(currentIndex + 1);
            }
        });

        backBtn.addEventListener("click", function () {
            let currentIndex = getActiveTabIndex();
            if (currentIndex > 0) {
                $tabs[currentIndex - 1].click();
                updateButtons(currentIndex - 1);
            }
        });

        $tabs.forEach((tab, index) => {
            tab.addEventListener("click", function () {
                updateButtons(index);
            });
        });

        updateButtons(getActiveTabIndex());
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
</script>
<script>
    Dropzone.autoDiscover = false;
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Dropzone.autoDiscover = false;

        Dropzone.instances.forEach(dz => dz.destroy());

        const imageDZ = new Dropzone("#your-dropzone", {
            url: "#",
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*"
        });

        const pancardDZ = new Dropzone("#pancard-dropzone", {
            url: "#",
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*"
        });

        const aadhaarDZ = new Dropzone("#aadhaar-dropzone", {
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
            pancardDZ.removeAllFiles(true);
            aadhaarDZ.removeAllFiles(true);
        });
    });
</script>
@include('admin.layouts.footer')