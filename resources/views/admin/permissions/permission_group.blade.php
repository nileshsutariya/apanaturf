@include('admin.layouts.header')
<!-- DataTables -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- @if(session('success'))
    <p>{{ session('success') }}</p>
@endif --}}
<style>
    .swal2-title {
        font-size: 14px !important; /* Adjust as needed */
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
        .addpermission {
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
                <h4 class="mb-0 fw-semibold">Permission Group List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Permission Group</a></li>
                    <li class="breadcrumb-item active">Permission Group List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Permission Group List</h4>
            <a class="btn btn-sm btn-primary addpermissiongroup" data-bs-target="#permissiongroup">
                Add Permission Group
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
                            <th class="gridjs-th">Permission Group Name</th>
                            <th class="gridjs-th">Status </th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="permissiongroupdata">
                        @foreach ($permissiongroup as $value)
                            <tr class="p-3">
                                <td>
                                    {{ $value->name }}
                                </td>
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge bg-success-subtle text-success py-1 px-2 fs-11">Active</span>                                    
                                    @else
                                        <span class="badge bg-danger-subtle text-danger py-1 px-2 fs-11">Inactive</span>                                    
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-soft-primary btn-sm editpermissiongroup" 
                                            data-bs-target="#permissiongroup" data-permissiongroup='@json($value)'>
                                            <i class='bx bxs-pencil bx-xs'></i>
                                    </button>
                                    <button type="button" class="btn btn-soft-danger btn-sm deletepermission"
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
            <div id="permissiongroupWrapper">
                <div class="mt-2">
                    {{ $permissiongroup->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="permissiongroup" tabindex="-1" aria-labelledby="permissiongroupTitle" aria>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissiongroupTitle">Add New Permission Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="formErrors" class="alert alert-danger d-none m-3">
                <ul class="mb-0"></ul>
            </div>
            <div class="modal-body">
                <form id="permissiongroupForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <input class="form-check-input" type="checkbox" name="status" id="statusCheckbox" value="1" checked>
                        <label class="form-check-label" for="statusCheckbox">
                            Is Active?
                        </label>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="permissiongroupForm" class="btn btn-primary permissiongroupsave">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }
    $(document).on('click', '.addpermissiongroup', function () {

        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('permissiongroup.store'));

        if (hasPermission) {
            $('#permissiongroup').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                title: '403 Unauthorized',
                text: 'You do not have permission to add a permissions group.',
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: 'OK'
            });
        }
    });

    $('#permissiongroup').on('hidden.bs.modal', function () {
        $('#permissiongroupForm').find('input[name="id"], input[name="name"]').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');
    });

    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route(name: "permissiongroup.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#permissiongroupWrapper').html($(data).find('#permissiongroupWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
        $(document).on('submit', '#permissiongroupForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let permissiongroupId = $('#permissiongroupForm input[name="id"]').val(); 

            $.ajax({
                url: '{{ route("permissiongroup.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example').replaceWith(html.find('#example')); 
                    $('#permissiongroupWrapper').html(html.find('#permissiongroupWrapper').html());
                    initDataTable();
                    $('#permissiongroup').modal('hide');
                    $('#formErrors').addClass('d-none').find('ul').html('');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: permissiongroupId ? 'Permissiongroup Updated Successfully!' : 'Permissiongroup Saved Successfully!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }, error: function (xhr) {
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
        $(document).on("input", "#search", function () {
            var search = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('permissiongroup.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#permissiongroupWrapper').html($(data).find('#permissiongroupWrapper').html());
                }
            });
        });
    });
</script>

<script>
    $(document).on('click', '.editpermissiongroup', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('permissiongroup.edit'));

        if (!hasPermission) {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit a permission group.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
            return; 
        }

        let permissiongroup = $(this).data('permissiongroup');
        $('#permissiongroupTitle').text('Edit Permission Group'); // Corrected line

        $('#permissiongroupForm input[name="id"]').val(permissiongroup.id);
        $('#permissiongroupForm input[name="name"]').val(permissiongroup.name);
        $('#permissiongroupForm input[name="status"]').prop('checked', permissiongroup.status == 1);

        $('#formErrors ul').html('');
        $('#formErrors').addClass('d-none');
        $('#permissiongroup').modal('show');
        
    });

$(document).on('click', '.deletepermission', function (e) {
    e.preventDefault();
    let button = $(this); 
    let id = button.data('id');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '{{ route('permissiongroup.delete') }}',
        type: 'POST',
        data: { id: id },
        success: function (response) {
            if (response.success) {
                button.closest('tr').remove();
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Permissiongroup Deleted Successfully!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            } else {
                console.log('Error:', response.error);
            }
        },
        error: function (xhr) {
            alert("Something went wrong.");
            console.log(xhr.responseText);
        }
    });
});

</script>

@include('admin.layouts.footer')