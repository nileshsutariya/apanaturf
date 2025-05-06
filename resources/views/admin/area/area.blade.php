@include('admin.layouts.header')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Responsive Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
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
        .addarea {
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
                <h4 class="mb-0 fw-semibold">Area List</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Area</a></li>
                    <li class="breadcrumb-item active">Area List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="card-title flex-grow-1">All Area List</h4>
            <a class="btn btn-sm btn-primary addarea" data-bs-toggle="modal" data-bs-target="#area">
                Add Area
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
                            <th class="gridjs-th">City </th>
                            <th class="gridjs-th">Pincode</th>
                            <th class="gridjs-th">Action</th>
                        </tr>
                    </thead>
                    <tbody id="areadata">
                        @foreach ($area as $value)
                            <tr class="p-3">
                                <td>
                                    {{ $value->area }}
                                </td>
                                <td>
                                    {{ $value->city_name }}
                                </td>
                                <td>
                                    {{ $value->pincode }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-soft-primary btn-sm editarea" data-bs-toggle="modal"
                                            data-bs-target="#area" data-area='@json($value)'>
                                            <i class='bx bxs-pencil bx-xs'></i>
                                        </a>
                                        <!-- <a href="#!" class="btn btn-soft-danger btn-sm">
                                        <i class='bx bxs-trash bx-xs'></i>
                                        </a> -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="areaWrapper">
                <div class="mt-2">
                    {{ $area->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="area" tabindex="-1" aria-labelledby="areaTitle" aria>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="areaTitle">Add New area</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formErrors" class="alert alert-danger d-none">
                    <ul class="mb-0"></ul>
                </div>
                <form id="areaForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label class="mb-1">City</label>
                        <select class="form-control citytypes" data-choices name="city" id="choices-single-default">
                            <option value="">This is a placeholder</option>
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
                        <label class="mb-1">Pincode</label>
                        <input type="text" class="form-control" name="pincode" placeholder="Enter The Pincode">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="areaForm" class="btn btn-primary areasave">Save</button>
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

    $('#area').on('hidden.bs.modal', function () {
        $('#areaForm').find('input[name="id"], input[name="name"], input[name="pincode"]').val('');
        roleChoices.setChoiceByValue('');
        $('#formErrors').addClass('d-none').find('ul').html('');
    });

    $(document).ready(function () {
        initDataTable();
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#search').val();
            $.ajax({
                url: '{{ route(name: "area.index") }}',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#areaWrapper').html($(data).find('#areaWrapper').html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
        $(document).on('submit', '#areaForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            $.ajax({
                url: '{{ route("area.store") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#example').DataTable().destroy();
                    const html = $(response);
                    $('#example tbody').html(html.find('#example tbody').html());
                    $('#areaWrapper').html(html.find('#areaWrapper').html());
                    initDataTable();
                    $('#area').modal('hide');
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
                url: "{{route('area.index')}}",
                data: {
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    $('#example').DataTable().destroy();
                    $('#example').html($(data).find('#example').html());
                    initDataTable();
                    $('#areaWrapper').html($(data).find('#areaWrapper').html());
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    let roleChoices;
    if (!document.querySelector('.citytypes').classList.contains('choices__input')) {
        roleChoices = new Choices('.citytypes', {
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

    $(document).on('click', '.editarea', function () {
        let area = $(this).data('area');
        // console.log(area.role_id);
        $('#areaTitle').text('Edit area'); // Corrected line

        $('#areaForm input[name="id"]').val(area.id);
        $('#areaForm input[name="name"]').val(area.area);
        $('#areaForm input[name="pincode"]').val(area.pincode);

        roleChoices.setChoiceByValue(area.city_id.toString());
        $('#formErrors ul').html('');
        $('#formErrors').addClass('d-none');
    });
</script>


@include('admin.layouts.footer')