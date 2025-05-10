@include('admin.layouts.header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

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

    .choices__list {
        padding-left: 10px;
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
            {{-- @if(Auth::user() && Auth::user()->hasPermissionTo('customer.store'))  <!-- Check if user has permission --> --}}
                <a class="btn btn-sm btn-primary addcustomer" data-bs-target="#customer">
                    Add Customer
                </a>
            {{-- @endif --}}
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
                                        <a class="btn btn-soft-primary btn-sm editcustomer"
                                            data-bs-target="#customer" data-customer='@json($value)'>
                                            <i class='bx bxs-pencil bx-xs'></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-sm">
                                        <i class='bx bxs-trash bx-xs'></i>
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

<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="customerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerTitle">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="formErrors" class="alert alert-danger d-none m-3">
                <ul class="mb-0"></ul>
            </div>
            <div class="modal-body">
                <form id="customerForm" method="POST">
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

                    <div style="margin-bottom: 12px;" class="balancefield">
                        <label class="mb-1">Balance</label>
                        <input type="text" class="form-control" name="balance" placeholder="Enter The Balance" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">City</label>
                        <select class="form-control city" data-choices name="city" id="choices-single-default">
                            <option value="">Select City</option>
                            @if (isset($city))
                                @foreach ($city as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->city_name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Area</label>
                        <select class="form-control area" data-choices name="area" id="choices-single-default">
                            <option value="">Select Area</option>
                            @if (isset($area))
                                @foreach ($area as $a)
                                    <option value="{{ $a->id }}">
                                        {{ $a->area }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    const allAreas = @json($areas); 
    function initDataTable() {
        $('#example').DataTable({
            paging: false,
            info: false,
            searching: false,
            responsive: true,
        });
    }

    $(document).on('click', '.addcustomer', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('customer.store'));

        if (hasPermission) {
            $('#customerForm')[0].reset();
            $('input[name="id"]').val('');
            $('#customerForm input[name="balance"]')
                .val(customer.balance)
                .prop('readonly', false);
            $('#formErrors').addClass('d-none').find('ul').html('');
            const filteredAreas = allAreas;
            areaChoices.clearStore();
            areaChoices.setChoices(
                filteredAreas.map(area => ({
                    value: area.id,
                    label: area.area
                })),
                'value',
                'label',
                true
            );

            $('#customer').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to add a customer.",
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
                url: '{{ route("customer.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
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
            let customerId = $('#customerForm input[name="id"]').val(); 

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
                    $('#customerForm input[name="balance"]')
                        .val(customer.balance)
                        .prop('readonly', false);
                    $('#customerForm')[0].reset();
                    document.activeElement.blur();
                    $('#formErrors').addClass('d-none').find('ul').html('');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: customerId ? 'Customer Updated Successfully!' : 'Customer Saved Successfully!',
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
    $(document).on('click', '.editcustomer', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('customer.edit'));

        if (hasPermission) {
            let customer = $(this).data('customer');
            $('#customerTitle').text('Edit Customer'); 

            $('#customerForm input[name="id"]').val(customer.id);
            $('#customerForm input[name="name"]').val(customer.name);
            $('#customerForm input[name="email"]').val(customer.email);
            $('#customerForm input[name="phone"]').val(customer.phone);
            $('#customerForm input[name="balance"]').val(customer.balance);
            $('#customerForm input[name="balance"]').val(customer.balance).prop('readonly', true);
            if (customer.city_id) {
                cityChoices.setChoiceByValue(customer.city_id.toString());
            } else {
                cityChoices.removeActiveItems();
            }

            // const filteredAreas = allAreas.filter(area => area.city_id == customer.city_id);
            const filteredAreas = customer.city_id 
                ? allAreas.filter(area => area.city_id == customer.city_id)
                : allAreas;

            areaChoices.clearChoices();
            areaChoices.setChoices(
                filteredAreas.map(area => ({
                    value: area.id,
                    label: area.area,
                    selected: area.id == customer.area_id
                })),
                'value',
                'label',
                true
            );

            $('#formErrors ul').html('');
            $('#formErrors').addClass('d-none');

            $('#customer').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit a customer.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });
    $('.city').on('change', function () {
        const selectedCityId = $(this).val();
        const filteredAreas = allAreas.filter(area => area.city_id == selectedCityId);

        areaChoices.clearStore(); 
        areaChoices.setChoices(
            filteredAreas.map(area => ({
                value: area.id,
                label: area.area
            })),
            'value',
            'label',
            true
        );
    });
</script>

<script>
    let areaElement = document.querySelector('.area');
    if (!areaElement.classList.contains('choices__input')) {
        areaChoices = new Choices(areaElement, {
            placeholder: true,
            shouldSort: false,
            allowHTML: false,
        });
    }
</script>
<script>
    let cityElement = document.querySelector('.city');
    if (!cityElement.classList.contains('choices__input')) {
        cityChoices = new Choices(cityElement, {
            placeholder: true,
            shouldSort: false,
            allowHTML: false,
        });
    }
</script>

@include('admin.layouts.footer')