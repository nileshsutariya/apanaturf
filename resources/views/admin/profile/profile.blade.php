@include('admin.layouts.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .profile-pic-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
        margin: auto;
    }

    .profile-pic-wrapper img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #ddd;
    }

    .edit-icon {
        position: absolute;
        bottom: 4px;
        right: 3px;
        background: white;
        border-radius: 50%;
        padding: 0px 5px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .remove-link {
        display: block;
        text-align: center;
        color: #007bff;
        cursor: pointer;
        text-decoration: none;
    }

    .remove-link:hover {
        text-decoration: underline;
    }

    .profile-pic-wrapper input[type="file"] {
        display: none;
    }
</style>

<div class="container mt-3">
    <div class="card p-3">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-2" style="padding-left: 30px;">
                    <div class="text-center">
                        <div class="profile-pic-wrapper">
                            @php
                                $image = \App\Models\Images::find($user->profile_image);
                            @endphp
                            @if ($image)
                                <img class="rounded-circle" id="profileImagePreview" src="{{ asset('storage/' . $image->image_path) }}" alt="avatar">
                            @else
                                <div class="avatar-circle">
                                    <img src="{{asset('asset/images/users/avatar-1.jpg')}}" alt="user">
                                </div>                       
                            @endif
                            <label class="edit-icon" for="profileImageInput">
                                <i class="bi bi-pencil-fill" style="font-size: 10px;"></i>
                            </label>
                            <form id="profileImageForm" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="profileImageInput" name="profile_image" accept="image/*" onchange="document.getElementById('profileImageForm').submit()">
                            </form>
                        </div>
                        @if ($user->profile_image != NULL)
                            <form action="{{route('profile.delete')}}" method="POST" onsubmit="return confirm('Are you sure you want to remove the profile photo?');">
                                @csrf
                                <button type="submit" class="remove-link btn btn-link" style="font-size: 11px;">Remove Profile Photo</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-9 profile-name">
                    <div class="label name" style="margin-top: 30px;"><h4>{{ Str::ucfirst(strtolower(Auth::user()->name)) }}</h4></div>
                    <div class="label email">{{Auth::user()->email}}</div>
                </div>
            </div>
            <form action="{{route('profile.store')}}" method="POST">
                @csrf
                <input type="hidden" class="form-control" value="{{Auth::user()->id}}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="label">Name</div>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                    </div>
                    <div class="col-md-6">
                        <div class="label">Email</div>
                        <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="label">Phone</div>
                        <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone">
                    </div>
                    <div class="col-md-6">
                        <div class="label">Role</div>
                        <select class="form-select" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ Auth::user()->role_id == $role->id ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="label">City</div>
                        <select class="form-select" name="city_id" id="city-select">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>
                                    {{ $city->city_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6" id="area-container">
                        <div class="label">Area</div>
                        <select class="form-select" name="area_id" id="area-select">
                            <option value="">Select Area</option>
                            @if($user->city_id && isset($areas[$user->city_id]))
                                @foreach ($areas[$user->city_id] as $area)
                                    <option value="{{ $area->id }}" {{ $user->area_id == $area->id ? 'selected' : '' }}>
                                        {{ $area->area }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary px-5">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const citySelect = document.getElementById('city-select');
        const areaSelect = document.getElementById('area-select');

        const areasByCity = @json($areas);

        citySelect.addEventListener('change', function () {
            const cityId = this.value;

            areaSelect.innerHTML = '<option value="">Select Area</option>';

            if (cityId && areasByCity[cityId]) {
                areasByCity[cityId].forEach(area => {
                    const option = document.createElement('option');
                    option.value = area.id;
                    option.textContent = area.area;
                    areaSelect.appendChild(option);
                });
            }
        });
    });
</script>

@include('admin.layouts.footer')
