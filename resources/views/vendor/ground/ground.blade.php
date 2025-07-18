@include('vendor.layouts.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .choices__list{
        padding-left: 8px; 
    }
    .header .turf-button {
        height: 35px;
    }
    .header .turf-button:hover {
        background-color: #134b45;
        color: #fff;
    }
    .header .turf-button.active {
        color: #fff;
        background-color: #1e726a;
    }
    .header .turf-button.active:hover {
        background-color: #134b45;
        color: #fff;
    }
    .swal2-title {
        font-size: 15px !important;
        font-weight: 500;
    }
    input, textarea {
        color: #706d6d;
        background: #f4f6f8;
        border: none !important;
    }
    .remove-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        font-weight: bold;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        text-align: center;
        line-height: 18px;
        cursor: pointer;
        font-size: 14px;
    }
    .content {
        padding: 20px 0;
    }
    .header {
        display: flex;
        margin-bottom: 16px;
        margin-left: 15px;
    }
    .header button {
        padding: 5px 10px;
        border-radius: 100px;
        border: none;
        cursor: pointer;
    }
    .header .turf-button {
        background-color: #299D91;
        color: #ffffff;
        width: 120px;
    }
    .add-button {
        width: 40px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background-color: #000000;
        color: white;
        border-radius: 50%;
        font-size: 16px;
        cursor: pointer;
        margin-left: 20px;
    }
    .form-group {
        margin-bottom: 16px;
    }
    .form-group label {
        display: block;
        color: #374151;
        margin-bottom: 8px;
    }
    .form-group input {
        width: 100%;
        padding: 8px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        outline: none;
    }
    .form-group input:focus {
        border-color: #14b8a6;
        box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.2);
    }
    .tags {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .tag {
        display: flex;
        align-items: center;
        background-color: #FFFFFF;
        border: 1px solid #e5e7eb;
        color: #374151;
        padding: 4px 8px;
        border-radius: 9999px;
    }
    .tag i {
        margin-right: 4px;
    }
    .tag .remove-icon {
        margin-left: 8px;
        cursor: pointer;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    .section-header button {
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
    }
    .form-group textarea {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #cbd5e0;
        border-radius: 8px;
        color: #000000;
        height: 128px;
    }
    @media(max-width:400px) {
        .upload {
            display: block !important;
        }
        .uploadinput {
            margin-left: 0px !important;
        }
        .turfinput {
            width: 100px !important;
        }
    }
    #otp::placeholder {
        font-size: 16px;
    }
    .save {
        background-color: #299D91;
        color: white;
        font-size: 15px;
        padding-left: 50px;
        padding-right: 50px;
        border-radius: 4px;
        margin-left: 30px;
    }
    .box {
        padding: 5px 15px;
        border: 1px solid #cbd5e0;
        border-radius: 8px;
        /* background-color: white; */
        font-size: 13px;
        font-family: Arial, sans-serif;
        /* color: #666; */
        width: 90px;
    }
    .multiply {
        font-size: 20px;
        font-weight: bold;
        color: #666;
    }
    .hlw-container {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 10px 5px;
    }
    @media (max-width: 490px) {
        .multiply {
            display: none;
        }
        .hlw-container {
            display: block;
        }
        .box {
            margin-bottom: 10px;
        }
    }
    @media(min-width:768px) and (max-width: 870px) {
        .multiply {
            display: none;
        }
        .hlw-container {
            display: block;
        }
        .box {
            margin-bottom: 10px;
        }
    }    
    .btn-tab {
        background-color: #299D91;
        color: #ffffff;
        width: 120px;
        font-size: 12px;
    }

    .image-box {
        position: relative;
        width: 100px;
        height: 90px;
        border-radius: 10px;
        overflow: hidden;
        margin-left: 10px;
    }
    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .image-box .delete-btn {
        position: absolute;
        top: 4px;
        right: 4px;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        font-size: 12px;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        text-align: center;
        cursor: pointer;
        line-height: 18px;
    }
    .image-box.counter {
        background-color: #D9D9D9;
        font-size: 18px;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container py-4">
    <form action="{{ route('ground.store') }}" method="POST" enctype="multipart/form-data" id="turfForm">
        @csrf
        @php
            $turfs = $turfs ?? [];
            if (count($turfs) === 0) {
                $turfs[] = (object)[
                    'id' => null,
                    'name' => '',
                    'sports_data' => [],
                    'amenity_data' => [],
                    'location_link' => '',
                    'location_text' => '',
                    'description' => '',
                    'height' => '',
                    'width' => '',
                    'length' => '',
                    'booking_price' => '',
                    'unit' => '',
                    'turf_images' => collect([]),
                ];
            }
        @endphp
        <div id="turf-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card p-2 mt-2 ml-3" style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); background-color: #FFFFFF;">
                        <div id="turf" class="content pt-1">
                            <div id="turf-template" class="turf-section">
                                <div class="card-body p-3 pt-0" style="font-size: 12px;">
                                    <div class="header d-flex flex-wrap align-items-center gap-2 mb-3">
                                        <div id="tab-buttons" class="d-flex flex-wrap gap-2">
                                            @foreach($turfs as $index => $turf)
                                                <button type="button" class="turf-button turf-tab {{ $index === 0 ? 'active' : '' }} save-turf-btn" data-tab="{{ $index }}">
                                                    {{ 'Turf-' . chr(65 + $index) }}
                                                </button>
                                            @endforeach
                                        </div>
                                        <button type="button" class="add-button add-tab"><i class="fas fa-plus" style="font-size: 14px;"></i></button>
                                    </div>
                                    <div id="tab-contents">
                                        @foreach($turfs as $index => $turf)
                                        @php
                                            $imageUrls = $turf->turf_images->map(fn($img) => asset('storage/' . $img->image_path))->toArray();
                                        @endphp
                                            <div class="turf-content" data-tab="{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
                                                <input type="hidden" name="turfs[{{ $index }}][id]" value="{{ $turf->id }}">
                                                <div id="ajaxErrorAlert-{{ $index }}" class="alert alert-danger ajax-error-alert d-none" style="background-color: rgb(246, 193, 193); border: none; opacity: 0.9; color: rgb(83, 9, 9);">
                                                    <ul id="ajaxErrorList-{{ $index }}" class="ajax-error-list mb-0"></ul>
                                                </div>
                                                {{-- @if ($turf->status == 1 || $turf->status == 0)
                                                    <div id="ajaxErrorAlert-{{ $index }}"
                                                        class="alert alert-danger ajax-error-alert"
                                                        style="background-color: rgb(246, 193, 193); border: none; opacity: 0.9; color: rgb(83, 9, 9);">
                                                        <ul id="ajaxErrorList-{{ $index }}" class="ajax-error-list mb-0">
                                                            <li>
                                                                @if ($turf->status == 1)
                                                                    Your turf is not approved yet!!
                                                                @elseif ($turf->status == 0)
                                                                    Your turf is not approved!!
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif --}}

                                                <div class="row">
                                                    <div class="col-md-5 p-3">
                                                        <div class="container">
                                                            <div class="form-group">
                                                                <label>Turf Name</label>
                                                                <input name="turfs[{{ $index }}][name]" value="{{ $turf->name }}" placeholder="Turf Name" multiple>
                                                                {{-- <small class="text-danger turf-error" data-name="turfs[{{ $index }}][name]"></small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="section-header d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                                    <label>Sports</label>
                                                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#addSportModal">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="tags sportlist d-flex flex-wrap gap-1">
                                                                    @if (isset($turf->sports_data) && count($turf->sports_data))
                                                                        @foreach($turf->sports_data as $sport)
                                                                            <span class="sporttag d-flex align-items-center px-2 py-1 me-2 mb-2">
                                                                                <span class="tag" style="margin: 5px 3px 3px 5px;">
                                                                                    <img src="{{ asset('storage/' . $sport->image->image_path) }}" alt="{{ $sport->name }}" style="height: 18px; margin-right: 5px;">
                                                                                    {{ $sport->name }}
                                                                                    <span class="ml-2" onclick="removeSport(this, {{ $sport->id }})" style="cursor:pointer;">
                                                                                        <i class="fas fa-times remove-icon"></i>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <input type="hidden" name="turfs[{{ $index }}][sports][]" value="{{ $sport->name }}">

                                                                        @endforeach
                                                                    @else
                                                                        <span class="sporttag d-flex align-items-center px-2 py-1 me-2 mb-2">
                                                                            <span class="tag" style="margin: 5px 3px 3px 5px;">
                                                                                <img src="{{asset('assets/image/client/Group12.svg')}}"> Cricket
                                                                                <span class="ms-2" onclick="removeSport(this)">
                                                                                    <i class="fas fa-times remove-icon"></i></span>
                                                                            </span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="section-header d-flex align-items-center justify-content-between flex-wrap mb-2">
                                                                    <label>Amenities</label>
                                                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#addAmenityModal">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="tags amenitylist d-flex flex-wrap gap-1">
                                                                    @if (isset($turf->amenity_data) && count($turf->amenity_data))
                                                                        @foreach($turf->amenity_data as $amenity)
                                                                            <span class="amenitiestag d-flex align-items-center px-2 py-1 me-2 mb-2">
                                                                                <span class="tag" style="margin: 5px 3px 3px 5px;">
                                                                                    <img src="{{ asset('storage/' . $amenity->image->image_path) }}" alt="{{ $amenity->name }}" style="height: 18px; margin-right: 5px;">
                                                                                    {{ $amenity->name }}
                                                                                    <span class="ml-2" onclick="removeAmenity(this, {{ $amenity->id }})" style="cursor: pointer;">
                                                                                        <i class="fas fa-times remove-icon"></i>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <input type="hidden" name="turfs[{{ $index }}][amenities][]" value="{{ $amenity->name }}">

                                                                        @endforeach
                                                                    @else
                                                                        <span class="amenitiestag d-flex align-items-center px-2 py-1 me-2 mb-2">
                                                                            <span class="tag">
                                                                                <img src="{{asset('assets/image/client/Bottle of Water.svg')}}"> Water
                                                                                <span class="ms-2" onclick="removeAmenity(this)">
                                                                                    <i class="fas fa-times remove-icon"></i>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-4">
                                                                <label><i class="fas fa-map-marker-alt"></i> Locations(link)</label>
                                                                <input type="text" name="turfs[{{ $index }}][location_link]" value="{{ $turf->location_link }}" multiple>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label><i class="fas fa-map-marker-alt"></i> Locations(text)</label>
                                                                <input name="turfs[{{ $index }}][location_text]" value="{{ $turf->location_text }}" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 p-3">
                                                        Your Turf Images
                                                        @php
                                                            $turfImages = $turf->turf_images ?? [];
                                                            $imageArray = $turfImages->map(fn($img) => [
                                                                'id' => $img->id,
                                                                'url' => asset('storage/' . $img->image_path)
                                                            ])->toArray();                  
                                                        @endphp

                                                        <div class="d-flex mt-3 mb-4 upload imagePreviewContainer" id="imagePreviewContainer-{{ $index }}">
                                                            <label class="uploadinput"
                                                                for="uploadInput-{{ $index }}"
                                                                style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                                                <img src="{{ asset('assets/image/client/gallery-add.svg') }}" alt="dashboard"
                                                                    style="cursor: pointer; height: 25px; width: 25px;">
                                                                <span style="font-size: 7px; color: #cac9c9; margin-top: 7px;">Upload image</span>
                                                               <input type="file"
                                                                    id="uploadInput-{{ $index }}"
                                                                    style="display: none;"
                                                                    name="turfs[{{ $index }}][turf_images][]"
                                                                    multiple
                                                                    data-tab-index="{{ $index }}"
                                                                    {{-- onchange="onTurfImageChange({{ $index }})"> --}}
                                                                >

                                                            </label>

                                                            <div class="d-flex flex-wrap turfimages" id="turfImagesContainer-{{ $index }}">
                                                                @php $count = count($turfImages); @endphp

                                                                @if($count > 0)
                                                                    <div class="image-box position-relative mb-2 me-2" style="width: 100px; height: 90px;">
                                                                        <img src="{{ asset('storage/' . $turfImages[0]->image_path) }}" class="rounded"
                                                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                                                        <span class="remove-btn" onclick="removeExistingImage(this, '{{ asset('storage/' . $turfImages[0]->image_path) }}')">&times;</span>
                                                                        <input type="hidden" name="turfs[{{ $index }}][existing_images][]" value="{{ $turfImages[0]->id }}">
                                                                    </div>

                                                                    @if($count > 1)
                                                                        <div class="image-box position-relative mb-2 me-2" style="width: 100px; height: 90px; cursor: pointer;" onclick="showInModal({{ json_encode($imageArray) }})">
                                                                            <img src="{{ asset('storage/' . $turfImages[1]->image_path) }}" class="rounded"
                                                                                style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5);" />
                                                                            <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold" style="font-size: 18px;">
                                                                                +{{ $count - 1 }}
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                @foreach($turfImages->slice(1) as $img)
                                                                    <input type="hidden" name="turfs[{{ $index }}][existing_images][]" value="{{ $img->id }}">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="hlw-container">
                                                            <input type="text" class="box" name="turfs[{{$index}}][height]" placeholder="Height" value="{{ $turf->height }}" multiple>
                                                            <div class="multiply">×</div>
                                                            <input type="text" class="box" name="turfs[{{$index}}][width]" placeholder="Width" value="{{ $turf->width }}" multiple>
                                                            <div class="multiply">×</div>
                                                            <input type="text" class="box" name="turfs[{{$index}}][length]" placeholder="Length" value="{{ $turf->length }}" multiple>
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <div class="row align-items-center g-2">
                                                                <div class="col-12 col-sm-auto">
                                                                    <span style="font-size: 13px;">Price of Booking:</span>
                                                                </div>

                                                                <div class="col-12 col-sm">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            name="turfs[{{$index}}][booking_price]"
                                                                            value="{{ $turf->booking_price }}"
                                                                            placeholder="₹00.00"
                                                                            class="form-control turfinput"
                                                                            style="color: #706d6d; background: #f4f6f8; border: none !important;">

                                                                        <select name="turfs[{{$index}}][unit]" class="form-select" style="max-width: 120px;">
                                                                            @foreach($units as $unit)
                                                                                <option value="{{ $unit->name }}"
                                                                                    {{ (isset($turf->unit) && $turf->unit == $unit->name) || (!isset($turf->unit) && $unit->name == 'Hour') ? 'selected' : '' }}>
                                                                                    {{ $unit->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <label class="label">Descriptions</label>
                                                            <textarea name="turfs[{{ $index }}][description]" multiple>{{ $turf->description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn save"> Save </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Uploaded Images</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex flex-wrap" id="modalImageList"></div>
                                            <input type="hidden" name="removed_existing_images[]">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="addSportModal" tabindex="-1" role="dialog" aria-labelledby="addSportModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Sport</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <select id="sportsDropdown" class="form-select" multiple
                                                            data-choices data-choices-removeItem data-placeholder="Select Sports">
                                                        @foreach($allSports as $sport)
                                                            <option value="{{ $sport->id }}"
                                                                    data-image="{{ asset('storage/' . $sport->image->image_path) }}"
                                                                    data-name="{{ $sport->name }}">
                                                                {{ $sport->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-success" onclick="addSport()">Add Sport</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="addAmenityModal" tabindex="-1" role="dialog" aria-labelledby="addAmenityModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Amenity</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <select id="amenityDropdown" class="form-select" multiple
                                                            data-choices data-choices-removeItem data-placeholder="Select Amenities">
                                                        @foreach($allAmenities as $amenity)
                                                            <option value="{{ $amenity->id }}"
                                                                    data-image="{{ asset('storage/' . $amenity->image->image_path) }}"
                                                                    data-name="{{ $amenity->name }}">
                                                                {{ $amenity->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-success" onclick="addAmenity()">Add Amenity</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="imagePreviewModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Image Previews</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-wrap" id="modal-body">
                                                <!-- Images will be appended here -->
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <button type="submit" class="btn save"> Save </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    new Choices('#sportsDropdown', {
        removeItemButton: true,
        placeholder: true,
        maxItemCount: -1,
        searchEnabled: true,
    });
    new Choices('#amenityDropdown', {
        removeItemButton: true,
        placeholder: true,
        maxItemCount: -1,
        searchEnabled: true,
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#turfForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            for (let [key, value] of formData.entries()) {
                console.log(key, value);
            }

            if (typeof turfImageFiles !== 'undefined') {
                Object.entries(turfImageFiles).forEach(([tabIndex, files]) => {
                    files.forEach((file, i) => {
                        formData.append(`turfs[${tabIndex}][turf_images][${i}]`, file);
                    });
                });
            }

            let removedImageIds = formData.getAll('removed_existing_images[]');
            formData.delete('removed_existing_images[]');
            removedImageIds.forEach(id => {
                if (!isNaN(id) && Number.isInteger(+id)) {
                    formData.append('removed_existing_images[]', id);
                }
            });

            $('.turf-error').text('');
            console.log([...formData]); 

            $.ajax({
                url: "{{ route('ground.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success(res) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Turf Saved Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    }).then(() => {
                        location.reload(); 
                    });
                },
                error(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;

                        $('.ajax-error-alert').addClass('d-none');
                        $('.ajax-error-list').empty();
                        $('.turf-error').text('');

                        let firstErrorTabIndex = null;

                        Object.entries(errors).forEach(([field, messages]) => {
                            const match = field.match(/^turfs\.(\d+)\.(.+)$/);
                            if (match) {
                                const index = match[1];
                                const fieldName = match[2];
                                const bracketField = `turfs[${index}][${fieldName}]`;

                                if (firstErrorTabIndex === null) {
                                    firstErrorTabIndex = index;
                                }

                                $(`#ajaxErrorAlert-${index}`).removeClass('d-none');
                                messages.forEach(msg => {
                                    $(`#ajaxErrorList-${index}`).append(`<li>${msg}</li>`);
                                });

                                $(`.turf-error[data-name="${bracketField}"]`).text(messages[0]);
                            }
                        });

                        if (firstErrorTabIndex !== null) {
                            $('.turf-tab').removeClass('active');
                            $(`.turf-tab[data-tab="${firstErrorTabIndex}"]`).addClass('active');

                            $('.turf-content').hide();
                            $(`.turf-content[data-tab="${firstErrorTabIndex}"]`).show();
                        }

                        const firstAlert = $('.ajax-error-alert:visible').first();
                        if (firstAlert.length) {
                            $('html, body').animate({
                                scrollTop: firstAlert.offset().top - 100
                            }, 400);
                        }
                    }
                }
            });
        });
    });
</script>


<script>
    document.querySelectorAll('.turf-tab').forEach(button => {
        button.addEventListener('click', () => {
            let tab = button.getAttribute('data-tab');
            console.log(tab);

            document.querySelectorAll('.turf-content').forEach(content => {
                content.style.display = content.getAttribute('data-tab') === tab ? 'block' : 'none';
            });

            document.querySelectorAll('.turf-tab').forEach(b => b.classList.remove('active'));
            button.classList.add('active');
        });
    });
</script>


@if(isset($turfs[0]))
<script>
    let existingImages = @json(
        $turfs[0]->turf_images->map(function($img) {
            return asset('storage/' . $img->image_path);
        })
    );
</script>
@endif

<script>
    window.turfExistingImages = window.turfExistingImages || {};
    turfExistingImages[{{ $index }}] = @json(
        $turf->turf_images->map(fn($img) => ['id' => $img->id, 'url' => asset('storage/' . $img->image_path)])->toArray()
    );
</script>



{{-- <script>
    let isCurrentTurfSaved = true;

    // Example: Call this function when user saves current turf content
    function markTurfAsSaved() {
        isCurrentTurfSaved = true;
    }

    // Call this when any field is modified (optional)
    function markTurfAsUnsaved() {
        isCurrentTurfSaved = false;
    }

    // Add Turf Tab
    document.querySelector('.add-tab').addEventListener('click', function () {
        if (!isCurrentTurfSaved) {
            alert("Please save current Turf tab before adding a new one.");
            return;
        }

        // If saved, proceed to add new tab
        addNewTurfTab();
        isCurrentTurfSaved = false; // Mark new tab as unsaved until saved
    });

    function addNewTurfTab() {
        // Generate next tab name
        const tabButtons = document.querySelectorAll('.turf-tab');
        const newIndex = tabButtons.length;
        const newTab = document.createElement('button');
        newTab.type = 'button';
        newTab.className = 'turf-button turf-tab save-turf-btn active';
        newTab.dataset.tab = newIndex;
        newTab.innerText = 'Turf-' + String.fromCharCode(65 + newIndex);

        // Remove 'active' from all buttons
        tabButtons.forEach(btn => btn.classList.remove('active'));

        document.getElementById('tab-buttons').appendChild(newTab);

        // Add corresponding content box if needed
        // Example: addTurfContent(newIndex);
    }
</script> --}}




<script>
    let turfIndex = {{ count($turfs) }};
    // let turfImageFiles = {};

    $(document).ready(function () {
        $('.turf-content').hide();
        $('.turf-content[data-tab="0"]').show();
        $('.turf-tab[data-tab="0"]').addClass('active');


        $(document).on('click', '.turf-tab', function () {
            let tabId = $(this).data('tab');
            console.log(tabId);
            $('.turf-tab').removeClass('active');
            $('.turf-content').hide();
            $(this).addClass('active');
            $('.turf-content[data-tab="' + tabId + '"]').show();
        });

        $('.add-tab').on('click', function () {
            const newTabId = turfIndex;
            console.log('new tab', newTabId);
            const newLabel = String.fromCharCode(65 + turfIndex);

            $('#tab-buttons').append(
                `<button type="button" class="turf-button turf-tab" data-tab="${newTabId}">Turf-${newLabel}</button>`
            );

            let $newContent = $('.turf-content[data-tab="0"]').first().clone();

            $newContent.find('[id^="ajaxErrorAlert-"]').attr('id', `ajaxErrorAlert-${newTabId}`);
            $newContent.find('[id^="ajaxErrorList-"]').attr('id', `ajaxErrorList-${newTabId}`);
            $newContent.find('.turf-error').each(function () {
                const oldDataName = $(this).attr('data-name');
                if (oldDataName) {
                    const newDataName = oldDataName.replace(/\[\d+\]/, `[${newTabId}]`);
                    $(this).attr('data-name', newDataName);
                }
            });

            $newContent.attr('data-tab', newTabId).hide();

            $newContent.find('input, textarea').each(function () {
                const name = $(this).attr('name');
                if (name) {
                    const updatedName = name.replace(/\[\d+\]/, `[${newTabId}]`);
                    $(this).attr('name', updatedName);
                }
                $(this).val('');
            });

            $newContent.find('.imagePreviewContainer').attr('id', `imagePreviewContainer-${newTabId}`);
            $newContent.find('.turfimages').attr('id', `turfImagesContainer-${newTabId}`);

            const uploadLabel = $(`
                <label class="uploadinput" 
                    for="uploadInput-${newTabId}" 
                    style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                    <img src="${window.uploadIconURL || '{{ asset('assets/image/client/gallery-add.svg') }}'}" style="height: 25px; width: 25px;">
                    <span style="font-size: 7px; color: #cac9c9; margin-top: 7px;">Upload image</span>
                </label>
            `);

            const newFileInput = $(`
                <input 
                    type="file" 
                    id="uploadInput-${newTabId}" 
                    name="turfs[${newTabId}][turf_images][]" 
                    multiple 
                    data-tab-index="${newTabId}" 
                    style="display: none;"
                >
            `);

            newFileInput.on('change', function () {
                const tabIndex = parseInt($(this).data('tab-index'));
                // console.log("jhgfcdfyhgfcdfgh:", tabIndex);
                onTurfImageChange(tabIndex);
            });

            uploadLabel.append(newFileInput);

            $newContent.find('.uploadinput').replaceWith(uploadLabel);

            $newContent.find('.sportlist').html('');
            $newContent.find('.amenitylist').html('');
            $newContent.find('.turfimages').html('');

            $('#tab-contents').append($newContent);
            $(`.turf-tab[data-tab="${newTabId}"]`).trigger('click');

            turfImageFiles[newTabId] = [];
            turfIndex++;
        });
    });
</script>

<script>
    let imageFiles = [];

    $('#uploadInput').off('change').on('change', function (event) {
        const newFiles = Array.from(event.target.files);
        console.log("new file", newFiles)

        newFiles.forEach(file => {
            const isDuplicate = imageFiles.some(f =>
                f.name === file.name && f.size === file.size
            );
            if (!isDuplicate) {
                imageFiles.push(file);
            }
        });
        if (imageFiles.length > 0) {
            $('#extraUploadLabels').hide();
        }
        renderImagePreviews();
        // $('#uploadInput').val(''); 
    });

    $('#imageModal').on('hidden.bs.modal', function () {
        $('#modalImageContainer').html('');
    });

    function renderImagePreviews() {
        const container = $('#imagePreviewContainer-' + getActiveTabIndex());
        console.log("imagepreview container", container);
        container.find('.image-box.counter').remove(); 
        container.find('.uploaded-image-box').remove();

        if (existingImages.length > 0) {
            existingImages.forEach((imgPath, i) => {
                container.append(`
                    <div class="image-box uploaded-image-box position-relative me-2 mb-2" style="width: 100px; height: 90px;">
                        <img src="${imgPath}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;" />
                        <span class="remove-btn" onclick="removeExistingImage(this, '${imgPath}')">&times;</span>
                        <input type="hidden" name="turfs[${getActiveTabIndex()}][existing_images][]" value="${imgPath}">
                    </div>
                `);
            });
        }

        imageFiles.forEach((file, i) => {
            const url = URL.createObjectURL(file);
            container.append(`
                <div class="image-box uploaded-image-box position-relative me-2 mb-2" style="width: 100px; height: 90px;">
                    <img src="${url}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;" />
                    <span class="remove-btn" onclick="deleteImage(${i})">&times;</span>
                </div>
            `);
        });
    }

    function deleteImage(index) {
        imageFiles.splice(index, 1);
        $('#uploadInput').val('');
        renderImagePreviews();
    }

    function showInModal(existingImages = []) {
        const modalBody = $('#modalImageList');
        modalBody.empty();

        existingImages.slice(1).forEach((img) => {
            modalBody.append(`
                <div class="position-relative d-inline-block mb-2 me-2" style="width: 100px; height: 90px;">
                    <img src="${img.url}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;" />
                    <span class="remove-btn" onclick="removeExistingImageById(this, ${img.id})">&times;</span>
                </div>
            `);
        });

        $('#imageModal').modal('show');
    }

    function showModal(images) {
        const modalBody = document.getElementById('modal-body');
        modalBody.innerHTML = '';

        images.forEach(image => {
            const img = document.createElement('img');
            img.src = image.url;
            img.className = 'rounded m-2';
            img.style = 'width: 100px; height: 90px;';
            modalBody.appendChild(img);
        });

        const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
        modal.show();
    }

    function removeExistingImageById(el, imageId) {
        const imageBox = el.closest('div');
        if (imageBox) {
            imageBox.remove();

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'removed_existing_images[]';
            input.value = imageId;
            document.getElementById('turfForm').appendChild(input);
        }

        document.querySelectorAll(`input[value='${imageId}']`).forEach(input => {
            const imgBox = input.closest('.image-box');
            if (imgBox) imgBox.remove();
        });
    }
</script>

<script>
    $('#uploadInput').on('change', function (event) {
        let files = Array.from(event.target.files);
        console.log(files);
        imageFiles = imageFiles.concat(files);

        if (imageFiles.length > 0) {
            $('#extraUploadLabels').hide();
        }
        renderImagePreviews();
    });

    function deleteImage(index) {
        imageFiles.splice(index, 1);
        renderImagePreviews();

        if (imageFiles.length === 0) {
            $('#extraUploadLabels').show();
        }

        $('#uploadInput').val('');
    }
</script>

<script>
    let turfImageFiles = {};
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('input[type="file"][data-tab-index]').forEach(input => {
            input.addEventListener('change', function () {
                const tabIndex = parseInt(this.getAttribute('data-tab-index'));
                onTurfImageChange(tabIndex);
            });
        });
    });

    function onTurfImageChange(tabIndex) {
        console.log("Uploading images for tab:", tabIndex); 

        const input = document.getElementById(`uploadInput-${tabIndex}`);
        const container = document.getElementById(`turfImagesContainer-${tabIndex}`);
        if (!input || !container) return;

        const files = Array.from(input.files);

        if (!turfImageFiles[tabIndex]) {
            turfImageFiles[tabIndex] = [];
        }

        container.querySelectorAll('.uploaded-image-box').forEach(el => el.remove());

        files.forEach(file => {
            const isDuplicate = turfImageFiles[tabIndex].some(f => f.name === file.name && f.size === file.size);
            if (!isDuplicate) {
                turfImageFiles[tabIndex].push(file);
            }
        });

        renderTurfImagePreviews(tabIndex);
    }

    function renderTurfImagePreviews(tabIndex) {
        const container = document.getElementById(`turfImagesContainer-${tabIndex}`);
        if (!container) return;

        container.querySelectorAll('.uploaded-image-box').forEach(el => el.remove());

        const existingImages = Array.from(container.querySelectorAll('.image-box:not(.uploaded-image-box)'));
        const previewImages = turfImageFiles[tabIndex] || [];
        const hasExisting = existingImages.length > 0;

        if (previewImages.length === 0) return;

        if (!hasExisting) {
            const firstImgURL = URL.createObjectURL(previewImages[0]);

            const imgBox = document.createElement('div');
            imgBox.className = 'image-box uploaded-image-box position-relative mb-2 me-2';
            imgBox.style = 'width: 100px; height: 90px;';
            imgBox.innerHTML = `
                <img src="${firstImgURL}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;" />
                <span class="remove-btn" onclick="removeUploadedTurfImage(${tabIndex}, 0)">&times;</span>
            `;
            container.appendChild(imgBox);

            if (previewImages.length > 1) {
                const plusBox = document.createElement('div');
                plusBox.className = 'image-box uploaded-image-box position-relative mb-2 me-2';
                plusBox.style = 'width: 100px; height: 90px; cursor: pointer;';
                plusBox.onclick = () => showInModal(previewImages.map(f => ({ url: URL.createObjectURL(f) })));

                plusBox.innerHTML = `
                    <img src="${URL.createObjectURL(previewImages[1])}" class="rounded" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5);" />
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold" style="font-size: 18px;">
                        +${previewImages.length - 1}
                    </div>
                `;
                container.appendChild(plusBox);
            }
        } else {
            const plusBox = document.createElement('div');
            plusBox.className = 'image-box uploaded-image-box position-relative mb-2 me-2';
            plusBox.style = 'width: 100px; height: 90px; cursor: pointer;';
            plusBox.onclick = () => showModal(previewImages.map(f => ({ url: URL.createObjectURL(f) })));

            plusBox.innerHTML = `
                <img src="${URL.createObjectURL(previewImages[0])}" class="rounded" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5);" />
                <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold" style="font-size: 18px;">
                    +${previewImages.length}
                </div>
            `;
            container.appendChild(plusBox);
        }
    }

    function removeUploadedTurfImage(tabIndex, index) {
        if (turfImageFiles[tabIndex]) {
            turfImageFiles[tabIndex].splice(index, 1);
            renderTurfImagePreviews(tabIndex);
        }
    }

    function removeExistingImage(el, imagePath) {
        const imageBox = el.closest('.image-box');
        if (imageBox) {
            imageBox.remove();

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'removed_existing_images[]';
            hiddenInput.value = imagePath;
            document.getElementById('turfForm').appendChild(hiddenInput);
        }
    }
</script>


<script>
    let removedSportIds = [];
    let removedAmenityIds = [];

    function removeSport(el, sportId = null) {
        $(el).closest('.sporttag').remove();
        if (sportId) removedSportIds.push(sportId);
    }

    function removeAmenity(el, amenityId = null) {
        $(el).closest('.amenitytag').remove();
        if (amenityId) removedAmenityIds.push(amenityId);
    }

    $('#turfForm').on('submit', function () {
        if (removedSportIds.length > 0) {
            $('<input>').attr({
                type: 'hidden',
                name: 'removed_sport_ids',
                value: JSON.stringify(removedSportIds)
            }).appendTo(this);
        }

        if (removedAmenityIds.length > 0) {
            $('<input>').attr({
                type: 'hidden',
                name: 'removed_amenity_ids',
                value: JSON.stringify(removedAmenityIds)
            }).appendTo(this);
        }
    });

</script>

<script>
    let sportIndices = {};

    function getActiveTabIndex() {
        return $('.turf-tab.active').data('tab');
    }

    function addSport() {
        const selectedOptions = $('#sportsDropdown option:selected');
        const tabIndex = getActiveTabIndex();

        if (!(tabIndex in sportIndices)) {
            sportIndices[tabIndex] = 0;
        }

        selectedOptions.each(function () {
            const id = $(this).val();
            const name = $(this).data('name');
            const img = $(this).data('image');
            const currentIndex = sportIndices[tabIndex];

            const nameInput = document.createElement('input');
            nameInput.type = 'hidden';
            nameInput.name = `turfs[${tabIndex}][sports][${currentIndex}]`;
            nameInput.value = id;

            document.getElementById('turfForm').appendChild(nameInput);

            const tag = `
                <span class="sporttag d-inline-block">
                    <span class="tag badge badge-light p-2 m-1 border">
                        <img src="${img}" style="width:18px; height:18px; margin-right:5px;"> ${name}
                        <span class="ml-2" onclick="removeSport(this)" style="cursor:pointer;">
                            <i class="fas fa-times"></i>
                        </span>
                    </span>
                </span>
            `;

            $(`.turf-content[data-tab="${tabIndex}"] .sportlist`).append(tag);

            sportIndices[tabIndex]++;
        });

        $('#addSportModal').modal('hide');
        $('#sportsDropdown').val(null).trigger('change'); 
    }

    function removeSport(el, sportId) {
        const tabIndex = getActiveTabIndex();

        $(`<input type="hidden" name="turfs[${tabIndex}][removed_sports][]" value="${sportId}">`).appendTo('#turfForm');

        $(el).closest('.sporttag').remove();
    }

</script>

<script>
    let amenityIndices = {};

    function getActiveTabIndex() {
        return $('.turf-tab.active').data('tab');
    }

    function addAmenity() {
        const selectedOptions = $('#amenityDropdown option:selected');
        const tabIndex = getActiveTabIndex();

        if (!amenityIndices[tabIndex]) {
            amenityIndices[tabIndex] = 0;
        }

        selectedOptions.each(function () {
            const amenityId = $(this).val();
            const amenityName = $(this).data('name');
            const amenityImage = $(this).data('image');

            const exists = $(`.turf-content[data-tab="${tabIndex}"] input[name="turfs[${tabIndex}][amenities][]"]`)
                .filter(function () {
                    return $(this).val() == amenityId;
                }).length > 0;

            if (exists) return;

            const hiddenInput = `<input type="hidden" name="turfs[${tabIndex}][amenities][]" value="${amenityId}">`;
            $(`.turf-content[data-tab="${tabIndex}"]`).append(hiddenInput);

            const tag = `
                <span class="amenitytag d-inline-block">
                    <span class="tag badge badge-light p-2 m-1 border">
                        <img src="${amenityImage}" style="width:18px; height:18px; margin-right:5px;"> ${amenityName}
                        <span class="ml-2" onclick="removeAmenity(this)" style="cursor:pointer;">
                            <i class="fas fa-times"></i>
                        </span>
                    </span>
                </span>
            `;

            $(`.turf-content[data-tab="${tabIndex}"] .amenitylist`).append(tag);
        });

        $('#addAmenityModal').modal('hide');
        $('#amenityDropdown').val(null).trigger('change');
    }

    function removeAmenity(el, amenityId) {
        const tabIndex = getActiveTabIndex();

        $(`<input type="hidden" name="turfs[${tabIndex}][removed_amenities][]" value="${amenityId}">`).appendTo('#turfForm');

        $(el).closest('.amenitiestag').remove();
    
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Choices('#sportsDropdown', {
            removeItemButton: true,
            placeholder: true,
        });

        new Choices('#amenityDropdown', {
            removeItemButton: true,
            placeholder: true,
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

@include('vendor.layouts.footer')
