@include('admin.layouts.header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
    .choices__list {
        padding-left: 10px;
    }

    .information {
        float: right;
    }

    .info_view div {
        margin-bottom: 17px;
    }

    .search {
        justify-items: end;
    }

    #search {
        width: 20%;
    }

    @media (max-width:426px) {
        .addcoupons {
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

    .choices__list[aria-expanded] .choices__item--selectable[data-select-text] {
        padding-right: 10px !important;
    }
</style>

<div class="container-fluid">

    <!-- ========== Page Title Start ========== -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Coupons List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Coupons</a></li>
                    <li class="breadcrumb-item active">Coupons List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Coupons List</h4>
            <a class="btn btn-sm btn-primary addcoupons" data-bs-target="#coupons">
                Add Coupons
            </a>
        </div>
        <div class="card-body pt-0">
            <div class="search">
                <input class="form-control ml-auto" type="search" id="search" name="search" placeholder="Search"><br>
            </div>
            <div>
                <table id="example" class="display responsive nowrap 2" style="width:100%">
                    <thead class="p-2">
                        <tr>
                            <th class="gridjs-th">Coupons Code</th>
                            <th class="gridjs-th">Created Date</th>
                            <th class="gridjs-th">Created by</th>
                            <th class="gridjs-th">Name</th>
                            <th class="gridjs-th">Validaty</th>
                            <th class="gridjs-th">Discount(₹/%)</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="couponsdata">
                        @if(isset($coupons))
                            @foreach ($coupons as $value)
                                <tr class="p-3">
                                    <td>
                                        {{ $value->coupons_code }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($value->created_at)) }}
                                    </td>
                                    <td>
                                        {{ $value->created_by_type }}
                                    </td>
                                    <td>
                                        {{ $value->coupons_name }}
                                    </td>
                                    <td>
                                        {{ date('d/m', strtotime($value->start_date)) }} -
                                        {{ date('d/m', strtotime($value->end_date)) }}
                                    </td>
                                    <td>
                                        {{ $value->discount}}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-soft-success btn-sm viewcoupon" data-bs-toggle="modal"
                                                data-bs-target="#couponsview" data-coupons='@json($value)'>
                                                <i class='bx bxs-message-square-detail bx-xs'></i>
                                            </a>
                                            <a class="btn btn-soft-primary btn-sm editcoupon" data-bs-target="#coupons"
                                                data-coupons='@json($value)'>
                                                <i class='bx bxs-pencil bx-xs'></i>
                                            </a>
                                            {{-- <a href="" class="btn btn-soft-danger btn-sm">
                                                <i class='bx bxs-trash bx-xs'></i>
                                            </a> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div id="couponsWrapper">
                <div class="mt-2">
                    {{ $coupons->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="coupons" tabindex="-1" aria-labelledby="couponsTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="couponsTitle">Add New coupons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mt-3 pt-0 add_coupon" style="scrollbar-width: none;">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="couponsForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <input type="hidden" class="form-control" id="c_code" name="code" placeholder="Enter The Name">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Coupon Name</label>
                        <input type="text" class="form-control" id="couponName" name="name"
                            placeholder="Enter The Name">
                    </div>
                    <div class="row" style="margin-bottom: 12px;">
                        <div class="col-md-6 col-sm-12">
                            <label class="mb-1">Valid Date</label>
                            <input type="text" id="valid-datepicker" name="valid_date" class="form-control"
                                placeholder="Select Valid date">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="mb-1">Expire Date</label>
                            <input type="text" id="expire-datepicker" name="expire_date"
                                class="form-control expire_date" placeholder="Pick Expire date">
                        </div>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Min. Order</label>
                        <input type="text" class="form-control" name="min_order" placeholder="Enter Min. Order"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">User Limit</label>
                        <input type="text" class="form-control" name="user_limit" placeholder="Enter User Limit"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div>
                        <label class="mb-1">Turf</label>
                        <select class="form-control turf turfselect" data-choices name="turf"
                            id="choices-single-default" style="height: 30px;">
                            <option value="">Select Turf</option>
                            @if (isset($turf))
                                @foreach ($turf as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div>
                        <label class="mb-1 mt-2">City</label>
                        <select class="form-control turf cityselect" data-choices name="city"
                            id="choices-single-default" style="height: 30px;">
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

                    <div style="margin-bottom: 12px; margin-top: 12px;" class="d-flex">
                        <div class="row" style="width: -webkit-fill-available;">
                            <div class="col-md-6 col-sm-12">
                                <label class="mb-1">Discount Type</label>
                                <select class="form-control typeselect" name="discount_type" id="discount_type"
                                    placeholder="Select discount Type" style="height: 30px;">
                                    <option value="">Select discount Type</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Percentage">Percentage</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="mb-1">Discount</label>
                                <input type="text" class="form-control" id="c_per" name="discount"
                                    placeholder="Enter Discount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="couponsForm" class="btn btn-primary Couponsave">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="couponsview" tabindex="-1" aria-labelledby="couponsTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable" style="justify-items:center;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="couponsTitle">View of Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row" style="padding: 12px;">
                <div class="col-sm-10" style="margin: auto;">
                    <div class="card bg-dark coupon-card" style="margin-bottom: 0px !important;">
                        <div class="card-body pb-0" style="padding: 16px;">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1 text-success i_percentage"></h4>
                                    <p class="i_max"></p>
                                </div>
                                <div style="justify-items: end;">
                                    <h4 class="mb-1 text-info i_code"></h4>
                                    <p class="i_date" style="text-align: right;"></p>
                                </div>
                            </div>
                            <div class="pb-2">
                                <h5 class="text-info i_name "></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-2 ml-2 pl-5 pt-0" style="scrollbar-width: none;">
                <div style="color: #333; padding-left:5px!important;" class="info_view">
                    <div>
                        <strong>Created By :</strong>
                        <span style="color: gray;" class="i_user"></span>
                    </div>
                    <div>
                        <strong>TURF Name &nbsp;&nbsp;:</strong>
                        <span style="color: gray;" class="i_turf"></span>
                    </div>
                    <div>
                        <strong>City Name &nbsp;&nbsp;:</strong>
                        <span style="color: gray;" class="i_city"></span>
                    </div>
                    <div>
                        <strong>Created On :</strong>
                        <span style="color: gray;" class="i_created"></span>
                    </div>
                    <div style="margin-top: 12px; margin-bottom: 8px;">
                        <strong>Valid Date :</strong>
                    </div>
                    <div style="margin-left: 10px; margin-bottom: 4px;">
                        <strong>Start date :</strong>
                        <span style="color: gray;" class="i_start_date"></span>
                    </div>
                    <div style="margin-left: 10px;">
                        <strong>End date&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                        <span style="color: gray;" class="i_end_date"></span>
                    </div>
                    <div>
                        <strong>Min. Order :</strong>
                        <span style="color: gray;" class="i_min_order"></span>
                    </div>
                    <div>
                        <strong>Discount &nbsp;&nbsp;&nbsp;:</strong>
                        <span style="color: gray;" class="i_discount"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#valid-datepicker", {
        dateFormat: "d-m-Y",
        allowInput: true
    });
    flatpickr("#expire-datepicker", {
        dateFormat: "d-m-Y",
        allowInput: true
    });

    function generateCouponCode() {
        const randomNum = Math.floor(Math.random() * 100)
            .toString()
            .padStart(2, '0');
        return 'END' + randomNum;
    }
</script>

<script>
    function initChoices(selector) {
        const element = document.querySelector(selector);
        if (!element.classList.contains('choices__input')) {
            return new Choices(selector, {
                placeholder: true,
                shouldSort: false,
                allowHTML: false,
            });
        }
        return Choices.instances.find(
            (instance) => instance.passedElement.element === element
        );
    }

    let roleChoices = initChoices('.turfselect');
    let typeChoices = initChoices('.typeselect');
    let cityChoices = initChoices('.cityselect');
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

    $(document).on('click', '.addcoupons', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('coupons.store'));

        if (hasPermission) {
            $('#couponsForm')[0].reset();
            $('#couponsForm').find('input[name="expire_date"],input[name="dis_per"],input[name="dis_rupees"], input[name="valid_date"], input[name="name"], input[name="min_order"]').val('');
            roleChoices.setChoiceByValue('');
            typeChoices.setChoiceByValue('');
            let code = generateCouponCode();
            $('#c_code').val(code);
            $('#formErrors').addClass('d-none').find('ul').html('');
            $('#coupons').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to add coupons.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });

    $('#coupons').on('hidden.bs.modal', function () {
        $('#couponsForm')[0].reset();
        $('#couponsForm input[name="id"]').val(''); 
        $('#couponsTitle').text('Add New coupons');

        roleChoices.setChoiceByValue('');
        typeChoices.setChoiceByValue('');
        let code = generateCouponCode();
        $('#c_code').val(code);
        $('#formErrors').addClass('d-none').find('ul').html('');
    });

    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route("coupons.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#couponsWrapper').html($(data).find('#couponsWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
        $(document).on('submit', '#couponsForm', function (e) {
            e.preventDefault();
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize();
            console.log(formData);
            $.ajax({
                url: '{{ route("coupons.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#couponsWrapper').html(html.find('#couponsWrapper').html());
                    initDataTable();
                    $('#coupons').modal('hide');
                }, error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorHtml = '';

                        $.each(errors, function (key, value) {
                            errorHtml += `<li>${value[0]}</li>`;
                        });

                        $('#formErrors ul').html(errorHtml);
                        $('#formErrors').removeClass('d-none');
                        $('#formErrors').fadeIn('slow');
                        $('.modal-body').animate({
                            scrollTop: $('#formErrors').position().top
                        }, 600);

                        setTimeout(function () {
                            $('#formErrors').fadeOut('slow');
                        }, 7000);
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
                url: "{{route('coupons.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#couponsWrapper').html($(data).find('#couponsWrapper').html());
                }
            });
        });
    });
</script>

<script>
    $(document).on('click', '.viewcoupon', function () {
        let coupons = $(this).data('coupons');
        const endDate = new Date(coupons.end_date);
        const month = (endDate.getMonth() + 1).toString().padStart(2, '0');
        const day = endDate.getDate().toString().padStart(2, '0');
        const createdDate = new Date(coupons.created_at);
        const formattedDate = createdDate.toLocaleDateString('en-GB');
        const screatedDate = new Date(coupons.start_date);
        const sformattedDate = screatedDate.toLocaleDateString('en-GB');
        const ecreatedDate = new Date(coupons.end_date);
        const eformattedDate = ecreatedDate.toLocaleDateString('en-GB');
        if (coupons.type === 'Flat') {
            $('.i_percentage').text('₹ ' + coupons.discount + ' OFF');
        } else {
            $('.i_percentage').text(coupons.discount + '% OFF');
        }
        $('.i_code').text(coupons.coupons_code);
        $('.i_date').text(`Coupon Expires ${month}/${day}`);
        $('.i_name').text(coupons.coupons_name);
        $('.i_user').text(coupons.users_name);
        $('.i_turf').text(coupons.turf_name);
        $('.i_city').text(coupons.city_name);
        $('.i_created').text(formattedDate);
        $('.i_start_date').text(sformattedDate);
        $('.i_end_date').text(eformattedDate);
        $('.i_min_order').text(coupons.min_order + '₹');
        if (coupons.type === 'Flat') {
            $('.i_discount').text('₹ ' + coupons.discount);
        } else {
            $('.i_discount').text(coupons.discount + ' %');
        }
    });
    $(document).on('click', '.editcoupon', function () {
        var hasPermission = @json(Auth::user() && Auth::user()->hasPermissionTo('coupons.edit'));

        if (hasPermission) {
            let coupon = $(this).data('coupons');

            $('#couponsTitle').text('Edit Coupon');
            $('#couponsForm input[name="id"]').val(coupon.id);
            $('#couponsForm input[name="name"]').val(coupon.coupons_name);
            $('#couponsForm input[name="code"]').val(coupon.coupons_code);
            $('#couponsForm input[name="user_limit"]').val(coupon.user_limit);
            $('#couponsForm input[name="min_order"]').val(coupon.min_order);
            $('#couponsForm input[name="discount"]').val(coupon.discount);
            $('#couponsForm select[name="discount_type"]').val(coupon.discount_type).trigger('change');

            const formatDateToDMY = (d) => d ? new Date(d).toLocaleDateString('en-GB').replace(/\//g, '-') : null;
            var valid_date = formatDateToDMY(coupon.start_date);
            var expire_date = formatDateToDMY(coupon.end_date);

            roleChoices.setChoiceByValue(coupon.turf_id.toString());
            cityChoices.setChoiceByValue(coupon.city_id.toString());
            typeChoices.setChoiceByValue(coupon.discount_type);

            flatpickr("#valid-datepicker", {
                dateFormat: "d-m-Y",
                defaultDate: valid_date,
                allowInput: true
            });

            flatpickr("#expire-datepicker", {
                dateFormat: "d-m-Y",
                defaultDate: expire_date,
                allowInput: true
            });

            $('#coupons').modal('show');
        } else {
            Swal.fire({
                title: "403 Unauthorized",
                text: "You do not have permission to edit coupons.",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                confirmButtonText: "Close"
            });
        }
    });

</script>

@include('admin.layouts.footer')