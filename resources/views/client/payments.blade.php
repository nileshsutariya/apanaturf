@include('client.layouts.header')
<style>
    .card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .label {
        font-size: 16px;
        color: #9F9F9F;
        font-weight: 400;
    }

    .value {
        font-size: 17px;
        color: #878787;
        font-weight: 600;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn.remove,
    .btn.withdraw {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.withdraw,
    .btn.save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.remove,
    .btn.cancel {
        background-color: white;
        color: #299D91;
        border: 1px solid #299D91;
        font-size: 16px;
        font-weight: 700;
    }

    .modal-demo {
        width: 380px !important;
        max-height: 90vh;
        /* Ensures it doesn't exceed viewport height */
        border-radius: 15px;
        padding: 0px 20px 10px;
        overflow-y: auto;
        scrollbar-width: none;

        /* For Firefox */
        -ms-overflow-style: none;
        /* For Internet Explorer/Edge */
    }

    /* Hide scrollbar for WebKit browsers (Chrome, Safari) */
    .modal-demo::-webkit-scrollbar {
        display: none;
    }

    .form-control {
        border-radius: 8px;
        padding: 20px;
        height: 45px;
        font-size: 15px;
    }

    /* span {
        font-size: 16px;
    } */
</style>
<div class="page-title-box">
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3"><strong>Account Details</strong></h6>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="edit-icon ml-auto">
            <a href="#paymentedit" class="add-banner waves-effect waves-light" data-animation="blur"
                data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
                style="text-decoration: none;">
                <div>
                    <img src="{{ asset('assets/image/client/message-edit.svg') }}">
                </div>
            </a>
        </div>
        <div class="row ">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">User Name</div>
                <div class="value">Abhishek Guleria</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">Account Type</div>
                <div class="value">Savings Account</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">IFSC Code</div>
                <div class="value">PYTM0123456</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">Balance</div>
                <div class="value">₹20,00,000</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">Account Number</div>
                <div class="value">000000000*****</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-3">
                <div class="label">Bank Name</div>
                <div class="value">Ankleshwar</div>
            </div>
            <div class="actions mt-2">
                <button class="btn withdraw">
                    <a href="#payment-withdraw" class="add-banner waves-effect waves-light" data-animation="blur"
                        data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
                        style="text-decoration: none;">
                        <div style="color: #FFFFFF;">
                            Withdraw
                        </div>
                    </a></button>
                <button class="btn remove">Remove</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pl-4 pr-4">
            <h5 class="my-3">Recent</h5>
            <table id="responsive-datatable" id="inquiriestable" class="table dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px; border:black">
                <thead>
                        <th>No.</th>
                        <th>UserId</th>
                        <th>User Name</th>
                        <th>Booking Time</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">1</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1">
                            <h4><span class="badge badge-soft-primary text-center"
                                    style="border-radius: 30px; font-size: 12px; height: 25px; width: 100px;">Paid</span>
                            </h4>
                        </td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">2</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1">
                            <h4><span class="badge badge-soft-warning text-center"
                                    style="border-radius: 30px; font-size: 12px; height: 25px; width: 100px;">Pending</span>
                            </h4>
                        </td>
                        <td class="text-warning fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">3</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1">
                            <h4><span class="badge badge-soft-primary text-center"
                                    style="border-radius: 30px; font-size: 12px; height: 25px; width: 100px;">Paid</span>
                            </h4>
                        </td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">4</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1">
                            <h4><span class="badge badge-soft-primary text-center"
                                    style="border-radius: 30px; font-size: 12px; height: 25px; width: 100px;">Paid</span>
                            </h4>
                        </td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


</div>
<div id="paymentedit" class="modal-demo">
    <div class="d-flex pr-3 pt-3 align-items-center justify-content-between mb-0" style="width: 100%; height: auto;">
        <button type="button" class="btn-close ml-auto" onclick="Custombox.modal.close();">
            <span class="sr-only">Close</span>
        </button>
    </div>
    <div class="add-text ml-2 mt-0" style="font-size: small;">
        <div class="container-fluid">
            <!-- Date Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>User Name</span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>
            </div>

            <!-- Amount Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Account Type</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="saving Account">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Balance</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" placeholder="₹20,00,000">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Bank Name</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="Ankleshwar">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Account Number</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="00000000000000">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>IFSC code</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="PYTM0123456">
                    </div>
                </div>
            </div>

            <div class=" mt-4 mb-2" style="border: none;">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <button class="btn cancel mr-2" style="width: 100%;"
                                onclick="Custombox.modal.close();">cancel</button>
                            <button class="btn save" style="width: 100%;">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="payment-withdraw" class="modal-demo">
    <div class="d-flex pr-3 pt-3 align-items-center justify-content-between mb-0" style="width: 100%; height: auto;">
        <button type="button" class="btn-close ml-auto" onclick="Custombox.modal.close();">
            <span class="sr-only">Close</span>
        </button>
    </div>
    <div class="add-text ml-2 mt-0" style="font-size: small;">
        <div class="container-fluid">
            <!-- Date Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>User Name</span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>
            </div>

            <!-- Amount Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Account Type</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="saving Account">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Balance</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" placeholder="₹20,00,000">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Bank Name</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="Ankleshwar">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Account Number</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="00000000000000">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Withdraw Amount</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="00.00 ₹">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>IFSC code</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobileno" placeholder="PYTM0123456">
                    </div>
                </div>
            </div>

            <div class=" mt-4 mb-2" style="border: none;">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <button class="btn cancel mr-2" style="width: 100%;"
                                onclick="Custombox.modal.close();">cancel</button>
                            <button class="btn withdraw" style="width: 100%;">Withdraw</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

@include('client.layouts.footer')