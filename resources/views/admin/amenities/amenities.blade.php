@include('admin.layouts.header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .swal2-title {
        font-size: 14px !important; /* Adjust as needed */
        font-weight: 500;
    }
    .icon-body {
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .dz-success-mark {
        display: none;
    }

    .dz-error-mark,
    .dz-progress,
    .dz-error-message {
        display: none;
    }

    .dz-image-preview {
        justify-items: center;
    }

    .dz-details {
        margin-bottom: 10px;
        text-align: center;
    }

    .dz-remove {
        margin-top: 10px;
        color: red;
    }

    #example {
        gap: 1.0rem;
        /* or gap: 5%; etc. */
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Amenities</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Amenities</a></li>
                    <li class="breadcrumb-item active">Amenities List</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- end dropzon-preview -->

    <div class="d-flex flex-wrap align-items-center mb-3 " id="example">
        @if(isset($amenities))
            @foreach ($amenities as $value)
                <div class="card icon-box">
                    <input type="hidden" class="form-control" name="id" value="{{ $value->id }}">
                    <button type="button" title="Delete" class="deleteamenities" value="{{ $value->id }}"
                        style="position: absolute; top: 0px; right: 5px; background: none; border: none; color: #d8dfe7; font-size: 25px; font-weight: 400; cursor: pointer; z-index: 10;">&times;</button>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <img class="m-1" src="{{asset('storage/' . $value->image_path)}}" alt="football" style="height: 50px;">
                        <h5 class="mt-2 mb-0">
                            {{ $value->name }}
                        </h5>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="card icon-box addamenities" data-bs-target="#amenities">
            <div class="card-body d-flex flex-column align-items-center justify-content-center icon-body">
                <img class="m-1" src="{{asset('asset/images/add.png')}}" alt="football" style="height: 105px;">
                <!-- <h5 class="mt-2 mb-0">Add amenities</h5> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="amenities" tabindex="-1" aria-labelledby="amenitiesTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="amenitiesTitle">Add New amenities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="formErrors" class="alert alert-danger d-none m-3">
                <ul class="mb-0"></ul>
            </div>
            <div class="modal-body" style="scrollbar-width: none;">
                <form id="amenitiesForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" hidden name="amenities_image" class="form-control">
                    <div id="file-container" class="dropzone">
                        <div class="fallback">
                        </div>
                        <div class="dz-message needsclick">
                            <i class="h1 bx bx-cloud-upload"></i>
                            <h3>Drop files here or click to upload.</h3>
                            <span class="text-muted fs-13">
                                ( Please upload proper images like in .png , .jpg , .jpeg , .webp , .svg )
                            </span>
                        </div>
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="amenitiesForm" class="btn btn-primary Amenitiesave">Save</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<!-- <script src="{{ asset('asset/js/components/form-fileupload.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    Dropzone.autoDiscover = false;
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        Dropzone.autoDiscover = false;

        Dropzone.instances.forEach(dz => dz.destroy());

        dzAllocationFiles = new Dropzone("#file-container", {

            url: "#", // Dummy URL, won't be used
            maxFiles: 1,
            autoProcessQueue: false,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",

        });
        $('#amenities').on('show.bs.modal', function () {
            $('#amenitiesForm input[type="file"]').val(null);
            dzAllocationFiles.removeAllFiles(true);
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.addamenities', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('amenities.store'));

        if (hasPermission) {
            $('#amenities').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                title: '403 Unauthorized',
                text: 'You do not have permission to add a amenities.',
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: 'OK'
            });
        }
    });

    $('#amenities').on('hidden.bs.modal', function () {
        $('#amenitiesForm').find('input[name="name"]').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');

        if (Dropzone.instances.length > 0) {
            Dropzone.instances.forEach(dz => dz.removeAllFiles(true));
        }
    });


    $(document).ready(function () {
        $('#amenitiesForm').off('submit').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            dzAllocationFiles.getAcceptedFiles().forEach((file, index) => {
                formData.append('amenities_image', file);
            });

            $.ajax({
                url: '{{  route('amenities.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#example').html($(response).find('#example').html());
                    $('#amenities').modal('hide');
                    $('#amenitiesForm')[0].reset();
                    document.activeElement.blur();
                    dzAllocationFiles.removeAllFiles(true);
                    $('#amenitiesForm input[type="file"]').val(null);
                    $('#formErrors').addClass('d-none').find('ul').html('');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Amenity Saved Successfully!',
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
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Failed to Save Amenity!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                }
            });
        });

        $(document).on('click', '.deleteamenities', function (e) {
            e.preventDefault();
            var id = $(this).val();
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('amenities.delete'));

            if (!hasPermission) {
                Swal.fire({
                    title: "403 Unauthorized",
                    text: "You do not have permission to delete a amenities.",
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
                url: '{{  route('amenities.delete') }}',
                type: 'POST',
                data: {
                    id: id
                }, success: function (response) {
                    $('#example').html($(response).find('#example').html());
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Amenity Deleted Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        console('all done')
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Failed to Delete Aminity!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        }); 
                    }
                }
            });
        });
    });
</script>

@include('admin.layouts.footer')