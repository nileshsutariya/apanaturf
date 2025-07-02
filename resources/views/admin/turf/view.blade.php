@include('admin.layouts.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Turf Data</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Turf</a></li>
                    <li class="breadcrumb-item active">Turf Data</li>
                </ol>
            </div>
        </div>
    </div>
    <form action="">
        @foreach ($turfs as $turf)
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Turf</label>
                    <input type="text" id="simpleinput" class="form-control" value="{{ $turf->name }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Venue</label>
                    <input type="email" id="example-email" name="example-email" class="form-control" value="{{ $turf->venue_name }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Sports</label>
                    @php
                        $sportNames = $turf->sports_data->pluck('name')->toArray();
                        $sportText = implode(', ', $sportNames);
                    @endphp
                    <input type="text" id="simpleinput" class="form-control" value="{{ $sportText }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Amenities</label>
                    {{-- @if (!empty($turf->amenities_data) && count($turf->amenities_data))
                        @foreach ($turf->amenities_data as $amenity) --}}
                        @php
                            $amenityNames = $turf->amenities_data->pluck('name')->toArray();
                            $amenityText = implode(', ', $amenityNames);
                        @endphp
                        <input type="text" id="example-email" name="example-email" class="form-control" value="{{ $amenityText }}" readonly>
                        {{-- @endforeach
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Location text</label>
                    <input type="text" id="simpleinput" class="form-control" value="{{ $turf->location_text }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Location Link</label>
                    <input type="text" id="example-email" name="example-email" class="form-control" value="{{ $turf->location_link }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="simpleinput" class="form-label">Turf Images</label>
                <div class="mb-3">
                    @if (!empty($turf->turf_images) && count($turf->turf_images))
                        <a href="#" class="btn btn-link view-turf-images"
                        data-images='@json($turf->turf_images)'>
                            Turf Images {{ count($turf->turf_images) }}(s)
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
                    <label for="simpleinput" class="form-label">Height</label>
                    <input type="text" id="simpleinput" class="form-control" value="{{ $turf->height }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Width</label>
                    <input type="text" id="example-email" name="example-email" class="form-control" value="{{ $turf->width }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Length</label>
                    <input type="text" id="example-email" name="example-email" class="form-control" value="{{ $turf->length }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Sessions</label>
                    <input type="text" id="simpleinput" class="form-control" value="{{ $turf->sessions }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Timing</label>
                    @foreach ($turf->timings as $time)
                        <input type="text" id="simpleinput" class="form-control" value="{{ $time->from }}   -   {{ $time->to }}" readonly>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="example-email" class="form-label">Booking Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control amountpaid" name="amount_paid" id="amountpaid" value="{{ $turf->booking_price }}" readonly>
                        <div class="input-group-text">{{$turf->unit}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="example-textarea" class="form-label">Description</label>
            <textarea class="form-control" id="example-textarea" rows="5" readonly>{{ $turf->description }}</textarea>
        </div>
        <div class="col-md-12 mb-3">
            @if ($turf->status == 1)
                @if (Auth::user()->role_id == 3)
                    <button class="btn btn-soft-success btn-sm approveTurf" value="{{ $turf->id }}">
                        <i class='bx bxs-check-circle bx-xs'></i> Approve
                    </button>
                    <button class="btn btn-soft-danger btn-sm disapproveTurf" data-id="{{ $turf->id }}">
                        <i class='bx bxs-x-circle bx-xs'></i> Disapprove
                    </button>
                @endif
            @elseif($turf->status == 2)
                <a class="btn btn-soft-primary btn-sm editvenues" data-bs-target="#venues"
                    data-venues='@json($turf)'>
                    <i class='bx bxs-pencil bx-xs'></i> Edit
                </a>
                <button class="btn btn-soft-danger btn-sm" id="deletevenues"
                    value="{{ $turf->id }}">
                    <i class='bx bxs-trash bx-xs'></i> Delete
                </button>
            @else
                <button class="btn btn-soft-info btn-sm approveTurf" value="{{ $turf->id }}">
                    <i class='bx bx-refresh bx-xs'></i> Re-approve
                </button>
                <button class="btn btn-soft-danger btn-sm deleteTurf" value="{{ $turf->id }}">
                    <i class='bx bxs-trash bx-xs'></i> Delete
                </button>
            @endif
        </div>
        @endforeach
    </form>
</div>

<div class="modal fade" id="turfImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Turf Image Preview</h5>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <img src="{{ asset('storage') }}/${img.image_path}" class="d-block w-100" alt="Turf Image">
                    </div>`;
                carouselInner.append(imageTag);
            });

            const modal = new bootstrap.Modal(document.getElementById('turfImageModal'));
            modal.show();
        }
    });
    
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.approveTurf', function () {
            // console.log("dcfvgbhnj");

            var turfId = $(this).val();

            $.ajax({
                url: '{{ route("turf.approve") }}',
                method: 'POST',
                data: { id: turfId },
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

    $(document).on('click', '.disapproveTurf', function () {
        var turfId = $(this).data('id');
        console.log("Disapprove clicked:", turfId);

        if (!turfId) {
            alert("Turf ID not found.");
            return;
        }

        $.ajax({
            url: '{{ route("turf.disapprove") }}',
            method: 'POST',
            data: {
                id: turfId,
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

@include('admin.layouts.footer')
