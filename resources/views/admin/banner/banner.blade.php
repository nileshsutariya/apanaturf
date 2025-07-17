@include('admin.layouts.header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .swal2-title {
        font-size: 14px !important;
        font-weight: 500;
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

    @media (max-width:426px) {
        .addbanner {
            margin-top: 20px;
        }
    }

    .dz-image-preview {
        justify-items: center;
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
                <h4 class="mb-0 fw-semibold">Banners</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Banners</a></li>
                    <li class="breadcrumb-item active">Banners List</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- end dropzon-preview -->
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Banners List</h4>
            <a class="btn btn-sm btn-primary addbanner" data-bs-target="#banner">
                Add Banner
            </a>
        </div>
        <div class="card-body pt-0">
            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                <div class="row" id="example">
                    @if(isset($banner))
                        @foreach ($banner as $value)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <img src="{{ asset('storage/' . $value->image_path) }}" alt="football" style="width:223px; height:131px"
                                    class="rounded mb-3">
                                <span class="close-icon" id="deletebanner" value="{{ $value->id }}"
                                    style="position: absolute; top: -6px; left: 211px; font-size: 25px; cursor: pointer;">&times;
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="banner" tabindex="-1" aria-labelledby="bannerTitle" aria-hidden="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerTitle">Add New banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="formErrors" class="alert alert-danger d-none m-3">
                    <ul class="mb-0"></ul>
                </div>
                <div class="modal-body" style="scrollbar-width: none;">
                    <form id="bannerForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="file-container" class="dropzone">
                            <div class="fallback">
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                            <div class="dz-message needsclick">
                                <i class="h1 bx bx-cloud-upload"></i>
                                <h3>Drop files here or click to upload.</h3>
                                <span class="text-muted fs-13">
                                    ( Kindly upload proper image formats such as .png, .jpg, .jpeg, .webp, or .svg.)
                                </span>
                            </div>
                        </div>
                        <div style="margin-bottom: 12px;">
                            <label class="mb-1 mt-2">Event id</label>
                            <input type="text" class="form-control" name="event_id" placeholder="Enter The Event id">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="bannerForm" class="btn btn-primary bannerave">Save</button>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Dropzone.autoDiscover = false;
            Dropzone.instances.forEach(dz => dz.destroy());
            dzAllocationFiles = new Dropzone("#file-container", {
                url: "#",
                maxFiles: 1,
                autoProcessQueue: false,
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: "image/*,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            });
            $('#banner').on('show.bs.modal', function () {
                $('#bannerForm input[type="file"]').val(null);
                dzAllocationFiles.removeAllFiles(true);
            });
        });
    </script>

    <script>

        $(document).on('click', '.addbanner', function () {
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('banners.store'));

            if (hasPermission) {
                $('#bannerForm')[0].reset();
                $('#bannerForm').find('input[name="id"], input[name="title"], input[name="image"]').val('');
                $('#formErrors').addClass('d-none').find('ul').html('');
                $('#banner').modal('show');
            } else {
                Swal.fire({
                    title: "403 Unauthorized",
                    text: "You do not have permission to add a banner.",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true,
                    confirmButtonText: "Close"
                });
            }
        });


        $('#banner').on('hidden.bs.modal', function () {
            $('#bannerForm').find('input[name="event_id"]').val('');
            $('#formErrors').addClass('d-none').find('ul').html('');

            if (Dropzone.instances.length > 0) {
                Dropzone.instances.forEach(dz => dz.removeAllFiles(true));
            }
        });

        $(document).ready(function () {
            $('#bannerForm').off('submit').on('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                dzAllocationFiles.getAcceptedFiles().forEach((file, index) => {
                    formData.append('banner_image', file);
                });

                $.ajax({
                    url: '{{  route('banners.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#example').html($(response).find('#example').html());
                        $('#banner').modal('hide');
                        $('#bannerForm')[0].reset();
                        document.activeElement.blur();
                        dzAllocationFiles.removeAllFiles(true);
                        $('#bannerForm input[type="file"]').val(null);
                        $('#formErrors').addClass('d-none').find('ul').html('');
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Banner Saved Successfully!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '';

                            $.each(errors, function (key, value) {
                                errorHtml += `<li>${value[0]}</li>`;
                            });

                            $('#formErrors ul').html(errorHtml);
                            $('#formErrors').removeClass('d-none');
                            $('#formErrors').fadeIn('slow');

                            setTimeout(function () {
                                $('#formErrors').fadeOut('slow');
                            }, 7000);
                        } else {
                            alert("Something went wrong.");
                        }
                    }
                });
            });

            $(document).on('click', '#deletebanner', function (e) {
                e.preventDefault();
                var id = $(this).attr('value');
                var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('banners.delete'));

                if (!hasPermission) {
                    Swal.fire({
                        title: "403 Unauthorized",
                        text: "You do not have permission to delete a banner.",
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
                    url: '{{  route('banners.delete') }}',
                    type: 'POST',
                    data: {
                        id: id
                    }, 
                    success: function (response) {
                        if (response.success) {
                            $('#example').html(response.html);

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Banner Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            setTimeout(function () {
                            location.reload(); // OR manually reload just #example via AJAX if needed
                        }, 1000);
                        }

                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            console('all done')
                        } else {
                            alert("Something went wrong.");
                        }
                    }
                });
            });
        });
    </script>

    @include('admin.layouts.footer')