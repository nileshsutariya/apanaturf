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

    span {
        font-size: 16px;
    }
</style>
<div class="page-title-box">
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3"><strong>Transaction</strong></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 pl-4 pr-4">
            <h5 class="my-3">Recent</h5>
            <table id="responsive-datatable" id="inquiriestable" class="table dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                <thead style="font-size: 12px; !important">
                    <th style="font-size: 12px; !important">No.</th>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

@include('client.layouts.footer')