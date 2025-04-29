@include('admin.layouts.header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

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

    @media (max-width:426px) {
        .addcustomer {
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
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Customers List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                    <li class="breadcrumb-item active">Customers List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Customers List</h4>
            <a class="btn btn-sm btn-primary addcustomer" data-bs-toggle="modal" data-bs-target="#customer">
                Add Customer
            </a>
        </div>
        <div class="card-body pt-0">
            <!-- <p class="text-muted">The most basic list group is an unordered list with list items and
                the proper classes. Build upon it with the options that follow, or with your own CSS
                as needed.</p>
            <div class="py-3">
                <div id="table-fixed-header"></div>
            </div> -->
            <div class="search">
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
                            <th class="gridjs-th">Balance</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="customerdata">
                        @foreach ($customer as $value)
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
                                    <h4><span class="badge badge-soft-info pt-1"
                                            style="border-radius: 5px; font-size: 14px; height: 30px; width: 100px;">Customer</span>
                                    </h4>
                                </td>
                                <td>
                                    {{ $value->balance }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-soft-primary btn-sm editcustomer" data-bs-toggle="modal"
                                            data-bs-target="#customer" data-customer='@json($value)'>
                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                                            </iconify-icon>
                                        </a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                class="align-middle fs-18"></iconify-icon>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="customerWrapper">
                <div class="mt-2">
                    {{ $customer->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="customerTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerTitle">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="customerForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Mob. No.</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter The Phone Number">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter The Email Address">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Balance</label>
                        <input type="text" class="form-control" name="balance" placeholder="Enter The Balance">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="customerForm" class="btn btn-primary customersave">Save</button>
            </div>

        </div>
    </div>
</div>

<script>

    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }

    $(document).on('click', '.addcustomer', function () {
        $('#customerForm')[0].reset();
        $('input[name="id"]').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');
    });
    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: '{{ route("customer.index") }}?page=' + page,
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#customerWrapper').html($(data).find('#customerWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
        $(document).on('submit', '#customerForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            console.log(formData);
            $.ajax({
                url: '{{ route("customer.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(response).find('#example').html());
                    initDataTable();
                    $('#customerWrapper').html($(response).find('#customerWrapper').html());
                    $('#customer').modal('hide');
                    $('#customerForm')[0].reset();
                    document.activeElement.blur();
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
                url: "{{route('customer.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#customerWrapper').html($(data).find('#customerWrapper').html());
                }
            });
        });
    });
</script>
<script>
    $(document).on('click', '.editcustomer', function () {
        let customer = $(this).data('customer');

        $('#customerForm input[name="id"]').val(customer.id);
        $('#customerForm input[name="name"]').val(customer.name);
        $('#customerForm input[name="email"]').val(customer.email);
        $('#customerForm input[name="phone"]').val(customer.phone);
        $('#customerForm input[name="balance"]').val(customer.balance);

        $('#formErrors ul').html('');
        $('#formErrors').addClass('d-none');

        $('#customer').modal('show');
    });
</script>


@include('admin.layouts.footer')