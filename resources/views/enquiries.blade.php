@include('adminlayouts.header')
<style>
    body {
        /* font-size: 15px;
        font-family: 'Inter', sans-serif; */
        font-weight: 400 !important;
        /* letter-spacing: 0.9px;
        background-color: #F5F5F5; */
    }

    .hr {
        border-color: grey;
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        height: 50%;
        width: 80%;
        line-height: 0px;
    }

    .table tbody tr td {
        vertical-align: middle;
        font-size: 14px;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .pagination .page-item .page-link {
        border-radius: 5px;
        color: #6c757d;
    }

    .pagination .page-item.active .page-link {
        background-color: #198754;
        border-color: #198754;
        color: white;
    }
    thead {
        position: sticky;
        background: #F5F5F5;
        top: 0;
        z-index: 10;
    }
    .table-container {
        max-height: 400px; /* Adjust as needed */
        overflow-y: auto;
        scrollbar-width: none; 
        position: relative;
    }
    .pagination-container {
        position: sticky;
        bottom: 0;
        background-color: #F5F5F5;
        padding: 10px 0;
        z-index: 2;
        text-align: center;
        /* box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);  */
    }
    table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: left;
    }
    .app-search .form-control {
        padding-left: 15px;
    }
</style>



<div class="page-title-box">

    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h2 class="ml-3"><strong>Enquiries</strong></h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: transparent; box-shadow: none;">
                <div class="card-body pt-2" style="overflow: hidden;">
                    <div class="table-container" style="max-height: 400px; overflow-y: auto;">
                        <table id="responsive-datatable" id="inquiriestable" class="table dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-none d-sm-flex">
                                            <form class="app-search">
                                                <div class="app-search-box">
                                                    <div class="input-group">
                                                        <input type="text" id="nameSearch" class="form-control"
                                                            placeholder="Name" style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-none d-sm-flex">
                                            <form class="app-search">
                                                <div class="app-search-box">
                                                    <div class="input-group">
                                                        <input type="text" id="emailSearch" class="form-control"
                                                            placeholder="Email" style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-none d-sm-flex">
                                            <form class="app-search">
                                                <div class="app-search-box">
                                                    <div class="input-group">
                                                        <input type="text" id="subjectSearch" class="form-control"
                                                            placeholder="Place" style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-none d-sm-flex">
                                            <form class="app-search">
                                                <div class="app-search-box">
                                                    <div class="input-group">
                                                        <input type="text" id="dateSearch" class="form-control"
                                                            placeholder="Mobile" style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <!-- <a href="#add" class="btn btn-primary waves-effect waves-light" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Blur</a>
                    
                                                        <div id="add" class="modal-demo">
                                                            <div class="d-flex h-80 w-100 p-3 align-items-center justify-content-between">
                                                                <h4 class="add-title">Modal title</h4>
                                                                <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                            </div>
                                                            <div class="add-text text-muted">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero unde repellendus quidem dolorem minus, ipsum, quisquam veritatis harum ducimus repudiandae debitis, maiores autem voluptates. Saepe eum similique est vel maiores consectetur illo, vero eaque explicabo rem laudantium, vitae, error eveniet delectus quis nam iste. At, minus amet alias illum dignissimos dicta pariatur magni praesentium distinctio harum iste fugiat eos quam adipisci perspiciatis exercitationem quidem. Esse, autem. Molestiae tempore perferendis quisquam.
                                                            </div>
                                                        </div> -->

                                        <a href="#add" class="enquiries-details waves-effect waves-light"
                                            data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                            data-overlayColor="#36404a">
                                            <i class="bi bi-info-circle mt-4" style="font-size: 19px; color: blue;"></i>
                                        </a>

                                        <div id="add" class="modal-demo" style="width: 380px !important;
                                                                                                height: 500px;
                                                                                                padding: 20px;
                                                                                                box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
                                                                                                border-radius: 12px;
                                                                                                ">

                                            <div class="d-flex p-3 align-items-center justify-content-between"
                                                style="max-width: 700px; width: 100%; height: auto;">
                                                <h4 class="add-title">
                                                    View Enquiries
                                                </h4>
                                                <button type="button" class="btn-close btn-close-white"
                                                    onclick="Custombox.modal.close();">
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="add-text ml-2" style="font-size: small;">
                                                <div class="container-fluid">
                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-4"><strong>Name :</strong></div>
                                                            <div class="col-md-4">
                                                                <div class="text-muted">Abhishek</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-4"><strong>ID :</strong></div>
                                                            <div class="col-md-4">
                                                                <div class="text-muted">000000</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-4"><strong>Date :</strong></div>
                                                            <div class="col-md-4">
                                                                <div class="text-muted">dd/mm/yyyy</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-4"><strong>Subject :</strong></div>
                                                            <div class="col-md-4">
                                                                <div class="text-muted">Box Cricket</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-md-4"><strong>Description</strong></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="text-muted ml-3" style="word-wrap: break-word;">
                                                                    Lorem ipsum dolor sit amet consectetur, adipisicing
                                                                    elit.
                                                                    Magni fugit beatae maxime rem accusamus ipsum!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <img class="mb-4" src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>
                                <tr>
                                    <td> #000001 </td>
                                    <td>#000001</td>
                                    <td>#000001</td>
                                    <td>1234567890</td>

                                    <td>
                                        <img src="{{asset('assets/image/trash.svg')}}" alt="dashboard">
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- Custom Pagination -->
                <div class="pagination-container">
                    <nav>
                        <ul class="pagination custom-pagination mb-0">
                            <!-- Custom pagination links will be inserted here by JS -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    // $(document).ready(function () {
    //     // Get the current page URL (excluding query params)
    //     var currentUrl = window.location.pathname.split("/").pop();

    //     // Loop through sidebar links
    //     $(".side-nav-link").each(function () {
    //         var linkUrl = $(this).attr("href");

    //         // If the href matches the current page, add 'active' class
    //         if (linkUrl === currentUrl) {
    //             $(this).addClass("active");

    //             // Optional: Add active class to the parent <li> for better styling
    //             $(this).closest(".side-nav-item").addClass("active");
    //         }
    //     });
    // });



    $(document).ready(function () {
        var table = $('#responsive-datatable').DataTable({
            "ordering": false,
            "paging": true,
            "searching": true,
            "info": false,
            "pageLength": 10,  // Show 10 records per page
            "lengthChange": false,
            "dom": 'rt',
        });

        function createCustomPagination() {
           
            var pageInfo = table.page.info();
            var totalPages = pageInfo.pages;
            var currentPage = pageInfo.page;
            var pagination = $('.custom-pagination');
            pagination.empty();

            // Previous Button
            pagination.append('<li class="page-item ' + (currentPage === 0 ? 'disabled' : '') + '"><a class="page-link prev-page" href="javascript:void(0);">&lt;</a></li>');

            // First Page
            if (totalPages > 0) {
                pagination.append('<li class="page-item ' + (currentPage === 0 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="0">1</a></li>');
            }

            // Show '...' before current range if needed
            if (currentPage > 2) {
                pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
            }

            // Show two pages around the current page
            for (var i = Math.max(1, currentPage - 1); i <= Math.min(totalPages - 2, currentPage + 1); i++) {
                pagination.append('<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + i + '">' + (i + 1) + '</a></li>');
            }

            // Show '...' before last page if needed
            if (currentPage < totalPages - 3) {
                pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
            }

            // Last Page
            if (totalPages > 1) {
                pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + (totalPages - 1) + '">' + totalPages + '</a></li>');
            }

            // Next Button
            pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'disabled' : '') + '"><a class="page-link next-page" href="javascript:void(0);">&gt;</a></li>');
        }

        // Pagination Click Events
        $(document).on('click', '.page-num', function () {
            var pageNum = $(this).data('page');
            table.page(pageNum).draw(false);
            createCustomPagination();
        });

        $(document).on('click', '.prev-page', function () {
            var currentPage = table.page.info().page;
            if (currentPage > 0) {
                table.page(currentPage - 1).draw(false);
                createCustomPagination();
            }
        });

        $(document).on('click', '.next-page', function () {
            var currentPage = table.page.info().page;
            var totalPages = table.page.info().pages;
            if (currentPage < totalPages - 1) {
                table.page(currentPage + 1).draw(false);
                createCustomPagination();
            }
        });

        // Initialize Pagination
        createCustomPagination();

        $('#nameSearch').on('keyup', function () {
            table.column(0).search(this.value).draw();
        });
    
        $('#emailSearch').on('keyup', function () {
            table.column(1).search(this.value).draw();
        });
    
        $('#subjectSearch').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });
    
        $('#dateSearch').on('keyup', function () {
            table.column(3).search(this.value).draw();
        });

        $('#nameSearch, #emailSearch, #subjectSearch, #dateSearch').on('keyup', function () {
            table.draw();
            createCustomPagination(); // Update pagination based on filtered results
        });
    });










    $(document).ready(function () {
        $(document).on("click", ".enquiries-details", function (e) {
            e.preventDefault();

            // Check if screen width is less than 768px (mobile devices)
            if ($(window).width() < 554) {
                // Open Modal using Custombox
                new Custombox.modal({
                    content: {
                        effect: "blur",
                        target: "#add"
                    }
                }).open();
            }
        });

        // Close Modal
        $(document).on("click", ".btn-close", function () {
            Custombox.modal.close();
        });
    });

</script>
@include('adminlayouts.footer')
