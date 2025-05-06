@include('admin.layouts.header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
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

    .dz-remove {
        margin-top: 10px;
        color: red;
    }

    .dz-image-preview {
        justify-items: center;
    }

    .dz-details {
        margin-bottom: 10px;
        text-align: center;
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
                <h4 class="mb-0 fw-semibold">Sports</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sports</a></li>
                    <li class="breadcrumb-item active">Sports List</li>
                </ol>
            </div>
        </div>
    </div>


    <!-- end dropzon-preview -->

    <div class="d-flex flex-wrap align-items-center mb-3 " id="example">
        @if(isset($sport))
            @foreach ($sport as $value)
                <div class="card icon-box">
                    <button type="button" title="Delete" class="deletesport" value="{{ $value->id }}"
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
        {{-- @can('sports.store')  --}}
        <div class="card icon-box addsport" data-bs-target="#sport">
            <div class="card-body d-flex flex-column align-items-center justify-content-center icon-body">
                <img class="m-1" src="{{asset('asset/images/add.png')}}" alt="football" style="height: 105px;">
                <!-- <h5 class="mt-2 mb-0">Add Sport</h5> -->
            </div>
        </div>
        {{-- @endcan --}}

    </div>
</div>

<div class="modal fade" id="sport" tabindex="-1" aria-labelledby="sportTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sportTitle">Add New sport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="scrollbar-width: none;">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="sportForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" hidden name="sport_image" class="form-control">
                    <div id="file-container" class="dropzone mb-2">
                        <div class="fallback">
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
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="sportForm" class="btn btn-primary sportsave">Save</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        $('#sport').on('show.bs.modal', function () {
            $('#sportForm input[type="file"]').val(null);
            dzAllocationFiles.removeAllFiles(true);
        });
    });
</script>

<script>
    $(document).on('click', '.addsport', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('sports.store'));

        if (hasPermission) {
            $('#sport').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                title: '403 Unauthorized',
                text: 'You do not have permission to add a sport.',
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: 'OK'
            });
        }
    });

    $('#sport').on('hidden.bs.modal', function () {
        $('#sportForm').find('input[name="name"]').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');

        if (Dropzone.instances.length > 0) {
            Dropzone.instances.forEach(dz => dz.removeAllFiles(true));
        }
    });



    $(document).ready(function () {
        $('#sportForm').off('submit').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            dzAllocationFiles.getAcceptedFiles().forEach((file, index) => {
                formData.append('sport_image', file);
            });

            $.ajax({
                url: '{{  route('sports.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#example').html($(response).find('#example').html());
                    $('#sport').modal('hide');
                    $('#sportForm')[0].reset();
                    document.activeElement.blur();
                    dzAllocationFiles.removeAllFiles(true);
                    $('#sportForm input[type="file"]').val(null);
                    $('#formErrors').addClass('d-none').find('ul').html('');
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
                        alert("Something went wrong.");
                    }
                }
            });
        });

        $(document).on('click', '.deletesport', function (e) {
            e.preventDefault();
            var id = $(this).val();
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('sports.delete'));

            if (!hasPermission) {
                Swal.fire({
                    title: "403 Unauthorized",
                    text: "You do not have permission to delete a sport.",
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
                url: '{{  route('sports.delete') }}',
                type: 'POST',
                data: {
                    id: id
                }, success: function (response) {
                    $('#example').html($(response).find('#example').html());
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