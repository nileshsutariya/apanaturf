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
        .adduser {
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
                <h4 class="mb-0 fw-semibold">Users List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                    <li class="breadcrumb-item active">Users List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Users List</h4>
            <a class="btn btn-sm btn-primary adduser" data-bs-target="#user">
                Add User
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
                            <th class="gridjs-th">Email</th>
                            <th class="gridjs-th">Phone</th>
                            <th class="gridjs-th">Type</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="userdata">
                        @foreach ($user as $value)
                            <tr class="p-3">
                                <td>
                                    {{ $value->name }}
                                </td>
                                <td>
                                    {{ $value->email }}
                                </td>
                                <td>
                                    {{ $value->phone }}
                                </td>
                                <td>
                                    {{ $value->role_name }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-soft-success btn-sm" data-bs-toggle="modal" data-bs-target="#wallet"
                                            data-user='@json($value)'>
                                            <i class='bx bx-wallet bx-xs'></i>
                                        </a>
                                        <a class="btn btn-soft-primary btn-sm edituser"
                                            data-bs-target="#user" data-user='@json($value)'>
                                            <i class='bx bxs-pencil bx-xs'></i>
                                        </a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm">
                                        <i class='bx bxs-trash bx-xs'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="userWrapper">
                <div class="mt-2">
                    {{ $user->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user" tabindex="-1" aria-labelledby="userTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userTitle">Add New user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="userForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Mob. No.</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter The Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter The Email Address">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Role</label>
                        <select class="form-control roletypes" data-choices name="role" id="choices-single-default">
                            <option value="">This is a placeholder</option>
                            @if (isset($role))
                                @foreach ($role as $r)
                                    <option value="{{ $r->id }}">
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="userForm" class="btn btn-primary usersave">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="wallet" tabindex="-1" aria-labelledby="userTitle" aria>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title" id="userTitle">Wallet</h4>
                    <p class="modal-title mt-" id="userTitle" style="font-weight: 400;">Available balance :</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form method="POST">
                    @csrf
                    <table id="example2" class="display responsive nowrap 2" style="width:100%">
                        <thead class="p-2">
                            <tr>
                                <th class="gridjs-th">User Name</th>
                                <th class="gridjs-th">Booking Date</th>
                                <th class="gridjs-th">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="userdata">
                            @foreach ($user as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>
                                        02-02-2025
                                    </td>
                                    <td class="text-success">
                                        <span class="text-success">+400</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="modal-footer p-2">
                <div id="balanceWrapper">
                    <div>
                        {{ $user->onEachSide(0)->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }
    function initDataTable2() {
        $('#wallet').on('shown.bs.modal', function () {
            if ($.fn.DataTable.isDataTable('#example2')) {
                $('#example2').DataTable().destroy();
            }
            if (!$.fn.DataTable.isDataTable('#example2')) {
                $('#example2').DataTable({
                    paging: false,
                    info: false,
                    searching: false,
                    responsive: true,
                });
            }
        });
    }

    $('#user').on('hidden.bs.modal', function () {
        $('#userForm').find('input[name="id"], input[name="name"], input[name="phone"], input[name="email"]').val('');
        roleChoices.setChoiceByValue('');
        $('#formErrors').addClass('d-none').find('ul').html('');
    });
$(document).on('click', '.adduser', function () {
    var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('users.store'));

    if (hasPermission) {
        $('#userForm')[0].reset();
        $('input[name="id"]').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');
        roleChoices.setChoiceByValue('');
        $('#user').modal('show');
    } else {
        Swal.fire({
            title: "403 Unauthorized",
            text: "You do not have permission to add users.",
            icon: "error",
            timer: 3000,
            timerProgressBar: true,
            confirmButtonText: "Close"
        });
    }
});


    $(document).ready(function () {
        initDataTable();
        initDataTable2();

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route(name: "users.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#userWrapper').html($(data).find('#userWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
        $(document).on('submit', '#userForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            $.ajax({
                url: '{{ route("users.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#userWrapper').html(html.find('#userWrapper').html());
                    initDataTable();
                    $('#user').modal('hide');
                    $('#userWrapper').html($(response).find('#userWrapper').html());
                    $('#userForm').find('input[name="id"], input[name="name"], input[name="phone"], input[name="email"]').val('');
                    roleChoices.setChoiceByValue('');
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
                url: "{{route('users.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#userWrapper').html($(data).find('#userWrapper').html());
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    let roleChoices;
    if (!document.querySelector('.roletypes').classList.contains('choices__input')) {
        roleChoices = new Choices('.roletypes', {
            placeholder: true,
            shouldSort: false,
            allowHTML: false,
        });
    } else {
        roleChoices = Choices.instances.find(
            (instance) => instance.config.callbackOnInit.element.id === 'choices-single-default'
        );
    }
</script>


<script>

    $(document).on('click', '.edituser', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('users.edit'));

        if (hasPermission) {
            let user = $(this).data('user');
            // console.log(user.role_id);
            $('#userTitle').text('Edit User'); // Corrected line

            $('#userForm input[name="id"]').val(user.id);
            $('#userForm input[name="name"]').val(user.name);
            $('#userForm input[name="email"]').val(user.email);
            $('#userForm input[name="phone"]').val(user.phone);

            roleChoices.setChoiceByValue(user.role_id.toString());
            $('#formErrors ul').html('');
            $('#formErrors').addClass('d-none');
            $('#user').modal('show');

        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit a users.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });
</script>


@include('admin.layouts.footer')