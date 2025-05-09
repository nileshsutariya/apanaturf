@include('admin.layouts.header')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
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
</style>
<style>
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
                <h4 class="mb-0 fw-semibold">Permissions List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Permissions</a></li>
                    <li class="breadcrumb-item active">Permissions List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Permissions List</h4>
            <a class="btn btn-sm btn-primary addpermission" data-bs-target="#permission">
                Add Permission
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
                            <th class="gridjs-th">Name</th>
                            <th class="gridjs-th">User name</th>
                            <th class="gridjs-th">Group name</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="permissiondata">
                        @if (isset($permission))
                            @foreach ($permission as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>
                                        {{ $value->user_name }}
                                    </td>
                                    <td>
                                        {{ $value->group_name }}
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-soft-primary btn-sm editpermission" data-bs-target="#permission"
                                                data-permission='@json($value)'>
                                                <i class='bx bxs-pencil bx-xs'></i>
                                            </a>
                                            <button class="btn btn-soft-danger btn-sm deletepermission" id="deletepermission"
                                                value="{{ $value->id }}">
                                                <i class='bx bxs-trash bx-xs'></i>
                                                </>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div id="permissionWrapper">
                <div class="mt-2">
                    {{ $permission->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="permission" tabindex="-1" aria-labelledby="permissionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionTitle">Add New permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="permissionForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id" readonly>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Modules Group</label>
                        <select class="form-control groupselect" data-choices name="group" id="choices-single-default">
                            <option value=""> Select Module</option>
                            @if (isset($group))
                                @foreach ($group as $r)
                                    <option value="{{ $r->id }}" data-name="{{ $r->name }}">
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div style="margin-bottom: 12px;" class="routelist">
                        <label class="mb-1">Routes</label>
                        <select class="form-control routestypes" data-choices name="routes" id="choices-single-default">
                            <option value="">Select Permission</option>
                            @if (isset($routes))
                                @foreach ($routes as $r)
                                    <option value="{{ $r }}">
                                        {{ $r }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">User Name</label>
                        <select class="form-control userselect" data-choices name="user" id="choices-single-default">
                            <option value="">Select User</option>
                            @if (isset($users))
                                @foreach ($users as $r)
                                    <option value="{{ $r->id }}">
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div style="margin-bottom: 12px;" class="mt-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck1" checked name="status">
                            <label class="form-check-label" for="customCheck1"> Is Active ? </label>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="permissionForm" class="btn btn-primary permissionsave">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


<script>
    function initChoices(selector) {
        const element = document.querySelector(selector);
        if (!element) return null;

        if (!element.classList.contains('choices__input')) {
            return new Choices(selector, {
                placeholder: true,
                shouldSort: false,
                allowHTML: false,
            });
        } else {
            return Choices.instances.find(
                (instance) => instance.config?.callbackOnInit?.element?.id === 'choices-single-default'
            );
        }
    }
    const routesChoices = initChoices('.routestypes');
    const userChoices = initChoices('.userselect');
    const groupChoices = initChoices('.groupselect');

    const allroutes = @json($routes);

</script>


<script>
    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }
    $(document).on('click', '.addpermission', function () {

        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('permission.store'));

        if (hasPermission) {
            const filteredroutes = allroutes;
            routesChoices.clearStore();
            routesChoices.setChoices(
                filteredroutes.map(route => ({
                    value: route,
                    label: route
                })),
                'value',
                'label',
                true
            );
            $('#formErrors').addClass('d-none').find('ul').html('');
            $('#permissionForm')[0].reset();
            $('#permission').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to add permissions.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });


    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route(name: "permission.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#permissionWrapper').html($(data).find('#permissionWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });


        $(document).on('submit', '#permissionForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            $.ajax({
                url: '{{ route("permission.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#permissionWrapper').html(html.find('#permissionWrapper').html());
                    initDataTable();
                    $('#permission').modal('hide');
                    $('#formErrors').addClass('d-none').find('ul').html('');
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
                url: "{{route('permission.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#permissionWrapper').html($(data).find('#permissionWrapper').html());
                }
            });
        });

        $(document).on('click', '#deletepermission', function (e) {
            e.preventDefault();
            var id = $(this).val();
            var search = $('#search').val();
            var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('permission.delete'));

            if (!hasPermission) {
                Swal.fire({
                    title: "403 Unauthorized",
                    text: "You do not have permission to delete a permission.",
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
                url: '{{  route('permission.delete') }}',
                type: 'POST',
                data: {
                    id: id,
                    search: search
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
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>

    $(document).on('click', '.editpermission', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('permission.edit'));
        if (hasPermission) {
            let permission = $(this).data('permission');
            var group = $('.groupselect option[value="' + permission.permission_group_id + '"]').attr('data-name');
            const filteredroutes = allroutes.filter(route => route.startsWith(group));

            routesChoices.clearChoices();
            routesChoices.setChoices(
                filteredroutes.map(route => ({
                    value: route,
                    label: route,
                    selected: route === permission.name
                })),
                'value',
                'label',
                true
            );
            $('#permissionTitle').text('Edit permission');
            $('#permissionForm input[name="id"]').val(permission.id);
            userChoices.setChoiceByValue(permission.user_id.toString());
            routesChoices.setChoiceByValue(permission.name.toString());
            groupChoices.setChoiceByValue(permission.permission_group_id.toString());
            $('#formErrors ul').html('');
            $('#formErrors').addClass('d-none');
            $('#permission').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit a permissions.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });
    
    $('.groupselect').on('change', function () {
            var group = $(this).find('option:selected').attr('data-name');
            routesChoices.clearChoices();
            routesChoices.clearStore(); 
            const filteredroutes = allroutes.filter(route => route.startsWith(group));
            routesChoices.setChoices(
                filteredroutes.map(route => ({
                    value: route,
                    label: route,
                })),
                'value',
                'label',
                true
            );
        });

</script>


@include('admin.layouts.footer')