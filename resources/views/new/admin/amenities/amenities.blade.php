@include('new.admin.layouts.header')

<style>
    .icon-body {
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .drop_box {
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

    <div class="d-flex flex-wrap align-items-center  gap-3 mb-3 " id="example">
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
        <div class="card icon-box" data-bs-toggle="modal" data-bs-target="#amenities">
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
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
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
                                (This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                uploaded.)
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

    $(document).ready(function () {
        $('#amenitiesForm').off('submit').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            dzAllocationFiles.getAcceptedFiles().forEach((file, index) => {
                formData.append('amenities_image', file);
            });

            $.ajax({
                url: '{{  route('amenities.update') }}',
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




        $(document).on('click', '.deleteamenities', function (e) {
            e.preventDefault();
            var id = $(this).val();
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