@include('new.admin.layouts.header')

<style>
    /* .drop_box {
        margin: 10px 0;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 2px dashed #d8dfe7;
        border-radius: 5px;
    }

    .drop_box h4 {
        font-size: 16px;
        font-weight: 400;
        color: #2e2e2e;
    }

    .drop_box p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #a3a3a3;
    } */
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
            <a class="btn btn-sm btn-primary adduser" data-bs-toggle="modal" data-bs-target="#banner">
                Add Banner
            </a>
        </div>
        <div class="card-body pt-0">
            <div class="d-flex flex-wrap align-items-center  gap-3 mb-3">
                <div class="row" id="example">
                    @if(isset($banner))
                        <!-- <div class="col-sm-3">
                                    <div class="card " data-bs-toggle="modal" data-bs-target="#banner">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center p-0">
                                            <img class="m-1" src="{{asset('asset/images/add.png')}}" alt="football"
                                                style="width: 100%; height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div> -->
                        @foreach ($banner as $value)
                            <div class="col-sm-3">
                                <img src="{{ asset('storage/' . $value->image_path) }}" alt="football" width="100%"
                                    class="rounded mb-3">
                                <span class="close-icon" id="deletebanner" value="{{ $value->id }}"
                                    style="position: absolute; top: 0px; right: 20px; font-size: 25px; cursor: pointer;">&times;
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
                <div class="modal-body">
                    <div id="formErrors" class="alert alert-danger d-none">
                        <ul class="mb-0"></ul>
                    </div>
                    <form action="{{  route('banner.update') }}" id="bannerForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="file-container" class="dropzone">
                            <div class="fallback">
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                            <div class="dz-message needsclick">
                                <i class="h1 bx bx-cloud-upload"></i>
                                <h3>Drop files here or click to upload.</h3>
                                <span class="text-muted fs-13">
                                    (This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                    uploaded.)
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
        $(document).ready(function () {
            $('#bannerForm').off('submit').on('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                dzAllocationFiles.getAcceptedFiles().forEach((file, index) => {
                    formData.append('banner_image', file);
                });

                $.ajax({
                    url: '{{  route('banner.update') }}',
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

            $(document).on('click', '#deletebanner', function (e) {
                e.preventDefault();
                var id = $(this).attr('value');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{  route('banner.delete') }}',
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

    @include('new.admin.layouts.footer')