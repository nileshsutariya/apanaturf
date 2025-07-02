@include('admin.layouts.header')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
    integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .swal2-title {
        font-size: 14px !important;
        /* Adjust as needed */
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

    .modal-content {
        width: 450px;
        height: auto;
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

    @media (max-width:575px) {
        .modal-content {
            width: auto;
        }
    }

    .choices__list {
        padding-left: 10px;
    }

    @media (max-width:426px) {
        .addcity {
            margin-top: 20px;
        }
    }

    @media (max-width:700px) {
        #search {
            width: 100%;
        }

        .search {
            justify-items: start;
        }
    }

    #balanceWrapper .small {
        display: none !important;
    }

    #balanceWrapper {
        margin-right: 100px;
    }

    .pagination {
        margin-bottom: 0px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">City List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">City</a></li>
                    <li class="breadcrumb-item active">City List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All City List</h4>
            <a class="btn btn-sm btn-primary addcity" data-bs-target="#city">
                Add City
            </a>
        </div>
        <div class="card-body pt-0">
            <div style="justify-items:end;" class="search">
                <input class="form-control ml-auto" type="search" id="search" name="search" placeholder="Search"><br>
            </div>
            <div>
                <table id="example" class="display responsive nowrap 2" style="width:100%">
                    <thead class="p-2">
                        <tr>
                            <th class="gridjs-th">City </th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="citydata">
                        @foreach ($city as $value)
                            <tr class="p-3">
                                
                                <td>
                                    {{ $value->city_name }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-soft-primary btn-sm editcity" data-bs-target="#city"
                                            data-city='@json($value)'>
                                            <i class='bx bxs-pencil bx-xs'></i>
                                        </a>
                                        <button type="button" class="btn btn-soft-danger btn-sm deletecity"
                                            data-id="{{ $value->id }}">
                                            <i class='bx bxs-trash bx-xs'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="cityWrapper">
                <div class="mt-2">
                    {{ $city->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="city" tabindex="-1" aria-labelledby="cityTitle" aria>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cityTitle">Add New city</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="formErrors" class="alert alert-danger d-none m-3">
                <ul class="mb-0"></ul>
            </div>
            <div class="modal-body">
                <form id="cityForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="cityForm" class="btn btn-primary citysave">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    function initDataTable() {
        $('#example').DataTable({ paging: false, info: false, searching: false, responsive: true });
    }
    $(document).ready(function () {
        initDataTable();

        $(document).on('click', '.addcity', function () {
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('city.store'));
            hasPermission ? $('#city').modal('show') : Swal.fire({ icon: 'error', title: '403 Unauthorized', text: 'You do not have permission to add a city.', timer: 3000, timerProgressBar: true, confirmButtonText: 'OK' });
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search = $('#search').val();
            $.ajax({
                url: '{{ route("city.index") }}',
                type: 'GET',
                data: { page: page, search: search },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    $('#cityWrapper').html($(data).find('#cityWrapper').html());
                    initDataTable();
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });

        $(document).on('submit', '#cityForm', function (e) {
            e.preventDefault();
            let form = $(this), formData = form.serialize(), cityId = $('#cityForm input[name="id"]').val();
            $.ajax({
                url: '{{ route("city.store") }}',
                type: 'POST',
                data: formData,
                success: function (res) {
                    $('#example').DataTable().destroy();
                    const html = $(res);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#cityWrapper').html(html.find('#cityWrapper').html());
                    initDataTable();
                    $('#city').modal('hide');
                    $('#formErrors').addClass('d-none').find('ul').html('');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: cityId ? 'City Updated Successfully!' : 'City Saved Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors, html = '';
                        $.each(errors, (k, v) => html += `<li>${v[0]}</li>`);
                        $('#formErrors ul').html(html).parent().removeClass('d-none').fadeIn('slow');
                        setTimeout(() => $('#formErrors').fadeOut('slow'), 7000);
                    } else {
                        alert("Something went wrong.");
                    }
                }
            });
        });

        $(document).on("input", "#search", function () {
            let search = $(this).val();
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "{{route('city.index')}}",
                type: 'GET',
                data: { search: search },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    $('#cityWrapper').html($(data).find('#cityWrapper').html());
                    initDataTable();
                }
            });
        });

        $(document).on('click', '.deletecity', function (e) {
            e.preventDefault();
            let button = $(this), id = button.data('id');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '{{ route('city.delete') }}',
                type: 'POST',
                data: { id: id },
                success: function (res) {
                    if (res.success) {
                        button.closest('tr').remove();
                        Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: 'City Deleted Successfully!', showConfirmButton: false, timer: 3000, timerProgressBar: true });
                    } else {
                        console.log('Error:', res.error);
                    }
                },
                error: function (xhr) {
                    alert("Something went wrong.");
                    console.log(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.editcity', function () {
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('city.edit'));
            if (!hasPermission) {
                return Swal.fire({ title: "403 Unauthorized", text: "You do not have permission to edit a city.", icon: "error", timer: 3000, timerProgressBar: true, confirmButtonText: "Close" });
            }
            let city = $(this).data('city');
            $('#cityTitle').text('Edit city');
            $('#cityForm input[name="id"]').val(city.id);
            $('#cityForm input[name="name"]').val(city.city_name);
            $('#city').modal('show');
        });
    });
</script>


@include('admin.layouts.footer')