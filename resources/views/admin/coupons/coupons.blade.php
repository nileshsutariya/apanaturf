@include('admin.layouts.header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

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

    @media (max-width:575px) {
        .modal-content {
            width: auto;
        }
    }

    .coupon-card,
    #formErrors {
        margin-left: 28px;
        margin-right: 30px;
        margin-top: 10px;
        margin-bottom: 0px;
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
            <a class="btn btn-sm btn-primary addcoupons" data-bs-toggle="modal" data-bs-target="#coupons">
                Add Coupons
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
                                        {{ $value->role_name }}
                                    </td>
                                    <td>
                                        {{ $value->coupons_name }}
                                    </td>
                                    <td>
                                        {{ date('d/m', strtotime($value->start_date)) }} -
                                        {{ date('d/m', strtotime($value->end_date)) }}
                                    </td>
                                    <td>
                                        {{ $value->discount_in_ruppee }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-soft-primary btn-sm viewcoupon" data-bs-toggle="modal"
                                                data-bs-target="#couponsview" data-coupons='@json($value)'>
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="#!" class="btn btn-soft-danger btn-sm">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </a>
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
            <div class="row">
                <div class="col-sm-12">
                    <div id="formErrors" class="alert alert-danger d-none">
                        <ul class="mb-0"></ul>
                    </div>
                    <div class="card bg-dark coupon-card">
                        <div class="card-body pb-0 ">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class=" mb-1 text-success percentage"></h4>
                                    <p class="max"></p>
                                </div>
                                <div style="justify-items: end;">
                                    <h4 class=" mb-1 text-info code "></h4>
                                    <p class="c_date" style="text-align: right;"></p>
                                </div>
                            </div>
                            <div class="pb-2">
                                <h5 class="text-info c_name "></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3 pt-0 add_coupon" style="scrollbar-width: none;">
                <form id="couponsForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" id="c_code" name="code" placeholder="Enter The Name">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Coupon Name</label>
                        <input type="text" class="form-control" id="couponName" name="name"
                            placeholder="Enter The Name">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Valid Date</label>
                        <input type="text" id="basic-datepicker" name="valid_date" class="form-control"
                            placeholder="Select Valid date">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Expire Date</label>
                        <input type="text" id="basic-datepicker" name="expire_date" class="form-control expire_date"
                            placeholder="Select Expire date">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Min. Order</label>
                        <input type="text" class="form-control" name="min_order" placeholder="Enter Min. Order">
                    </div>
                    <div>
                        <label class="mb-1">Turf</label>
                        <select class="form-control turf" data-choices name="turf" id="choices-single-default"
                            style="height: 30px;">
                            <option value="">This is a placeholder</option>
                            @if (isset($turf))
                                @foreach ($turf as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div style="margin-bottom: 12px;margin-top: 12px;">
                        <label class="mb-1">Discount(%)</label>
                        <input type="text" class="form-control" id="c_per" name="dis_per"
                            placeholder="Enter Discount(%)">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Discount(₹)</label>
                        <input type="text" class="form-control" id="c_rup" name="dis_rupees"
                            placeholder="Enter Discount(₹)">
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
    <div class="modal-dialog modal-dialog-scrollable" style="justify-items:center; padding-top: 70px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="couponsTitle">View of Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-dark coupon-card">
                        <div class="card-body pb-0 ">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class=" mb-1 text-success i_percentage"></h4>
                                    <p class="i_max"></p>
                                </div>
                                <div style="justify-items: end;">
                                    <h4 class=" mb-1 text-info i_code "></h4>
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
            <div class="modal-body mt-3 pl-5 pt-0"style="scrollbar-width: none;">
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
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#basic-datepicker", {
        dateFormat: "Y-m-d",
        allowInput: true
    });

    function generateCouponCode() {
        const randomNum = Math.floor(Math.random() * 100)
            .toString()
            .padStart(2, '0');
        return 'END' + randomNum;
    }

    $(document).ready(function () {
        $('.code').text(generateCouponCode());
        $('#c_code').val(generateCouponCode());
    });

    $(document).on('input', '#couponName', function () {
        let value = $(this).val();
        $('.c_name').text(value);
    });

    $(document).on('input', '#c_per', function () {
        let value = $(this).val().replace(/\D/g, '');
        $('.percentage').text(value ? value + '% OFF' : '');
    });

    $(document).on('input', '#c_rup', function () {
        let value = $(this).val().replace(/\D/g, '');
        $('.max').text(value ? 'MAX ₹' + value : '');
    });

    flatpickr(".expire_date", {
        dateFormat: "Y-m-d",
        allowInput: true,
        onChange: function (selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                const date = selectedDates[0];
                const month = date.getMonth() + 1;
                const day = date.getDate();
                $('.c_date').text(`Coupon Expires ${month}/${day}`);
            }
        }
    });

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

    $('#coupons').on('hidden.bs.modal', function () {
        $('#couponsForm').find('input[name="expire_date"],input[name="dis_per"],input[name="dis_rupees"], input[name="valid_date"], input[name="name"], input[name="min_order"]').val('');
        $('.roletypes').val('');
        $('#formErrors').addClass('d-none').find('ul').html('');
    });

    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: '{{ route("coupons.index") }}?page=' + page,
                type: 'GET',
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

            let form = $(this);
            let formData = form.serialize();
            $.ajax({
                url: '{{ route("coupons.update") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#couponsWrapper').html(html.find('#couponsWrapper').html());
                    initDataTable();
                    $('#couponsWrapper').html($(response).find('#couponsWrapper').html());
                    $('#coupons').modal('hide');
                    document.activeElement.blur();
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
        $('.i_percentage').text(coupons.discount_in_per + '% OFF');
        $('.i_max').text('MAX ₹ ' + coupons.discount_in_ruppee);
        $('.i_code').text(coupons.coupons_code);
        $('.i_date').text(`Coupon Expires ${month}/${day}`);
        $('.i_name').text(coupons.coupons_name);
        $('.i_user').text(coupons.users_name);
        $('.i_turf').text(coupons.turf_name);
        $('.i_created').text(formattedDate);
        $('.i_start_date').text(sformattedDate);
        $('.i_end_date').text(eformattedDate);
        $('.i_min_order').text(coupons.min_order + '₹');
        $('.i_discount').text(coupons.discount_in_per + '% or    ' + coupons.discount_in_ruppee + '₹');

    });
</script>
<!-- ========== Page Title End ========== -->
<!-- 
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-dark ">
                <span class="coupon-close">
                <button type="button" title="Delete" class="deletesport"
                        style="position: absolute; background: none; border: none; color: #d8dfe7; font-size: 25px; font-weight: 400; cursor: pointer; z-index: 10;">&times;</button>                            </span>
                <div class="card-body pb-0 ">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class=" mb-1 text-success">20% OFF</h4>
                            <p class="">MAX ₹500</p>
                        </div>
                        <div style="justify-items: end;">
                            <h4 class=" mb-1 text-info ">END02</h4>
                            <p class="">Coupon Expires 01/03</p>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-info">End Of New Year</h5>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">View Plan</a>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@include('admin.layouts.footer')