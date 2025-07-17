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
    <form>
        {{-- @foreach ($vendor as $vendor) --}}
        <div class="vendorFormWrapper" id="vendorForm">
            <a href="{{route('vendor.index')}}" class="btn btn-sm btn-primary backToTable mb-3"> Back </a href="{{route('vendor.index')}}">
            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Vendor ID</label>
                    <input type="text" id="vendor_id" class="form-control" value="{{ $vendor->vendor_id }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Name</label>
                    <input type="text" id="owner_name" class="form-control" value="{{ $vendor->owner_name }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">email</label>
                    <input type="text" id="owner_email" class="form-control" value="{{ $vendor->owner_email }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Phone</label>
                    <input type="text" id="owner_phone" class="form-control" value="{{ $vendor->owner_phone }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Location text</label>
                    <input type="text" id="location_text" class="form-control" value="{{ $vendor->location_text }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Location Link</label>
                    <input type="text" id="location_link" class="form-control" value="{{ $vendor->location_link }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="simpleinput" class="form-label">Turf Images</label>
                <div class="mb-3">
                    @if (!empty($vendor->turf_images) && count($vendor->turf_images))
                        <a href="#" class="btn btn-link view-turf-images" 
                        data-images='@json($vendor->turf_images)'>
                            Turf Images ({{ count($vendor->turf_images) }})
                        </a>
                    @else
                        <p>No images available.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">City</label>
                    <input type="text" id="city_name" class="form-control" value="{{ $vendor->city_name }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Area</label>
                    <input type="text" id="area_name" class="form-control" value="{{ $vendor->area_name }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Pincode</label>
                    <input type="text" id="pincode" class="form-control" value="{{ $vendor->pincode }}" {{ $vendor->status != 2 ? 'readonly' : '' }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="simpleinput" class="form-label">Pancard</label>
                <div class="mb-4">
                    @if ($vendor->pancard_image_data)
                        <a href="#" 
                        class="image-preview-link d-block text-primary text-decoration-underline"
                        data-image="{{ asset('storage/' . $vendor->pancard_image_data->image_path) }}"
                        data-name="{{ $vendor->pancard_image_data->image_name }}" style="text-decoration: none !important;">
                            {{ $vendor->pancard_image_data->image_name }}
                        </a>
                    @else
                        <p>No Pancard uploaded.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <label for="simpleinput" class="form-label">Aadhar Card</label>
                <div class="mb-4">
                    @if ($vendor->aadhaar_image_data)
                        <a href="#" 
                        class="image-preview-link d-block text-primary text-decoration-underline"
                        data-image="{{ asset('storage/' . $vendor->aadhaar_image_data->image_path) }}"
                        data-name="{{ $vendor->aadhaar_image_data->image_name }}" style="text-decoration: none !important;">
                            {{ $vendor->aadhaar_image_data->image_name }}
                        </a>
                    @else
                        <p>No Pancard uploaded.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <label for="simpleinput" class="form-label">Vendor Profile Image</label>
                <div class="mb-4">
                    @if ($vendor->vendor_image_data)
                        <a href="#" 
                        class="image-preview-link d-block text-primary text-decoration-underline"
                        data-image="{{ asset('storage/' . $vendor->vendor_image_data->image_path) }}"
                        data-name="{{ $vendor->vendor_image_data->image_name }}" style="text-decoration: none !important;">
                            {{ $vendor->vendor_image_data->image_name }}
                        </a>
                    @else
                        <p>No Pancard uploaded.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            @if ($vendor->status == 1)
                @if (Auth::user()->role_id == 2)
                    <button class="btn btn-soft-success btn-sm approveVendor" value="{{ $vendor->id }}">
                        <i class='bx bxs-check-circle bx-xs'></i> Approve
                    </button>
                    <button class="btn btn-soft-danger btn-sm disapproveVendor" data-id="{{ $vendor->id }}">
                        <i class='bx bxs-x-circle bx-xs'></i> Disapprove
                    </button>
                @endif
            {{-- @elseif($vendor->status == 2)
                <a class="btn btn-soft-primary btn-sm editvenues" data-bs-target="#venues"
                    data-venues='@json($vendor)'>
                    <i class='bx bxs-pencil bx-xs'></i> Edit
                </a>
                <button class="btn btn-soft-danger btn-sm" id="deletevenues"
                    value="{{ $vendor->id }}">
                    <i class='bx bxs-trash bx-xs'></i> Delete
                </button> --}}
            {{-- @else
                <button class="btn btn-soft-info btn-sm approveVendor" value="{{ $vendor->id }}">
                    <i class='bx bx-refresh bx-xs'></i> Re-approve
                </button>
                <button class="btn btn-soft-danger btn-sm `deleteVendor" value="{{ $vendor->id }}">
                    <i class='bx bxs-trash bx-xs'></i> Delete
                </button> --}}
            @endif
        </div>
        {{-- @endforeach --}}
    </form>

    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="imageModalTitle">Image Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
            <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="turfImageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Turf Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="turfCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="carouselInner"></div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#turfCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#turfCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.image-preview-link', function (e) {
        e.preventDefault();
        const imageUrl = $(this).data('image');
        const imageName = $(this).data('name');

        $('#modalImage').attr('src', imageUrl);
        $('#imageModalTitle').text(imageName);
        const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
        modal.show();
    });
</script>
<script>
    $(document).on('click', '.view-turf-images', function (e) {
        e.preventDefault();

        const images = $(this).data('images'); 
        const carouselInner = $('#carouselInner');
        carouselInner.empty();

        if (images && images.length > 0) {
            images.forEach((img, index) => {
                const isActive = index === 0 ? 'active' : '';
                const imageTag = `
                    <div class="carousel-item ${isActive}">
                        <img src="{{ asset('storage') }}/${img.image_path}" class="d-block w-100" alt="Turf Image" height="280">
                    </div>`;
                carouselInner.append(imageTag);
            });

            const modal = new bootstrap.Modal(document.getElementById('turfImageModal'));
            modal.show();
        }
    });
</script>
@include('admin.layouts.footer')