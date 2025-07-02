@include('admin.layouts.header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>
    .swal2-title {
        font-size: 14px !important;
        font-weight: 500;
    }

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

    .choices__list--dropdown {
        height: 160px;
    }

    .choices__list--dropdown div[role="listbox"] {
        height: 100px;
    }

    @media (max-width:700px) {
        #search {
            width: 100%;
        }

        .search {
            justify-items: start;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Turf List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Turf</a></li>
                    <li class="breadcrumb-item active">Turf List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body pt-0">
            <div class="search">
                <input class="form-control ml-auto" type="search" id="search" name="search" placeholder="Search"><br>
            </div>
            <div>
                <table id="example" class="display responsive nowrap 2" style="width:100%">
                    <thead class="p-2">
                        @php
                            $users = Auth::user()->role_id;
                        @endphp
                        <tr>
                            <th class="gridjs-th">Name</th>
                            <th class="gridjs-th">Vendor</th>
                            <th class="gridjs-th">Location</th>
                            <th class="gridjs-th">Status</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="venuesdata">
                        @if(isset($turfs))
                            @foreach ($turfs as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>
                                        {{ $value->venue_name ?? 'No Venue Name' }}
                                    </td>
                                    <td>
                                       {{ $value->location_text }}
                                    </td>
                                    <td>
                                        <h4>
                                            @if ($value->status == 1)
                                                <span class="badge badge-soft-warning pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Pending</span>
                                            @elseif ($value->status == 2)
                                                <span class="badge badge-soft-info pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Active</span>
                                            @else
                                                <span class="badge badge-soft-danger pt-1"
                                                    style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Deactive</span>
                                            @endif
                                        </h4>
                                    </td>
                                    @if ($users == 3)
                                    <td>
                                        <div class="d-flex gap-2">
                                            @php
                                                $turfImagesJson = htmlspecialchars(json_encode($value->turf_images), ENT_QUOTES, 'UTF-8');
                                            @endphp
                                            <a class="btn btn-soft-secondary btn-sm viewVendor" href="{{route('turf.view', encrypt($value->id))}}">
                                                <i class="bi bi-eye-fill" style="font-size: medium"></i> 
                                            </a>
                                            
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div id="venuesWrapper">
                <div class="mt-2">
                    {{-- {{ $venues->onEachSide(1)->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')
