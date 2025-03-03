@include('client.layouts.header')
<style>
    .actions {
        display: flex;
        gap: 10px;
    }

    .btn.remove {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.pay {
        color: #299D91;
        border: 2px solid #299D91;
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
  

    .table-header {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        color: #4b5563;
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 0.5rem;
        color: #7C8082;
    }

    .list {
        max-height: 24rem;
        height: 380px !important;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .list::-webkit-scrollbar {
        display: none;
    }

    .list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem;
        border: none;
        border-left: 1px solid #09BB71;
        border-right: 1px solid #09BB71;
        border-bottom: 2px solid #09BB71;
        border-radius: 10px;
        margin-bottom: 0.5rem;
        /* box-shadow: 0 4px 4px #09BB71; */
        transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        margin-left: auto;
        margin-right: auto;
    }

    .list-item:hover {
        background-color: #FFFFFF;
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 10;
        position: relative;
        border: 1px solid #000000;
    }

    .list-item img {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
    }

    .list-item .info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .list-item .info span {
        font-weight: 600;
        font-size: 16px !important;
    }

    .list-item .info .name {
        color: #4b5563;
    }

    .list-item .amount {
        color: #4b5563;
        font-weight: 400;
        font-size: 14px;
    }

    .list-item .info img.opacity-50 {
        opacity: 0.5;
    }

    .list-item .info .name.opacity-50 {
        opacity: 0.5;
    }

    .list-item.light {
            opacity: 0.5;
        }
    .list-item.large {
        width: 100%;
    }

    .list-item.medium {
        width: 94%;
    }

    .list-item.small {
        width: 88%;
    }

    .footer {
        display: flex;
        justify-content: space-between;
    }

    .footer button {
        padding: 0.5rem 0rem;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        width: 48%;
    }

    .footer .back {
        background-color: #ffffff;
        color: #10b981;
        border: 1px solid #10b981;
    }

    .footer .back:hover {
        background-color: #ffffff;
        transform: scale(1.05);
    }

    .footer .select {
        background-color: #10b981;
        color: white;
        border: none;
    }

    .footer .select:hover {
        background-color: #059669;
        transform: scale(1.05);
    }

    @media (max-width: 640px) {

        .table-header {
            font-size: 0.75rem;
        }

        .list-item .info span,
        .list-item .amount {
            font-size: 0.75rem;
        }

        .footer button {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }
    }
</style>

<div class="actions mt-2">
    <button class="btn btn-success">
        <a href="#payment-withdraw" class="add-banner waves-effect waves-light" data-animation="blur"
            data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
            style="text-decoration: none;">
            <div style="color: #FFFFFF;">
                Booked
            </div>
        </a></button>
    <button class="btn btn-success mr-3">
        <a href="#view-details" class="add-banner waves-effect waves-light" data-animation="blur"
            data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
            style="text-decoration: none;">
            <div style="color: #FFFFFF;">
                View Details
            </div>
        </a></button><br><br>

</div>
<div class="action">
<button class="btn btn-success mr-3">
        <a href="#Booking-venue" class="add-banner waves-effect waves-light" data-animation="blur"
            data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"
            style="text-decoration: none;">
            <div style="color: #FFFFFF;">
                Booking Venue
            </div>
        </a></button>
    <button class="btn btn-success mr-3">
        <a href="#bedding" class="add-banner waves-effect waves-light" data-animation="blur" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a" style="text-decoration: none;">
            <div style="color: #FFFFFF;">
                Bedding
            </div>
        </a></button>
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
                        <input type="text" class="form-control" name="name" placeholder="Abhishek Guleria">
                    </div>
                </div>
            </div>

            <!-- Amount Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Venue</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="venue" placeholder="Sports complex,abc,393001">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Time & Date</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="timedate" placeholder="9AM , 17 Jan 2025">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Entry Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="entrytime" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Exit Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="exittime" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Pending Payment</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pendingpayment" placeholder="00.00 ₹">
                    </div>
                </div>
            </div>

            <div class=" mt-4 mb-2" style="border: none;">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn save" style="width: 100%;">Refund</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="view-details" class="modal-demo">
    <div class="d-flex pr-3 pt-3 align-items-center justify-content-between mb-0" style="width: 100%; height: auto;">
        <button type="button" class="btn-close ml-auto" onclick="Custombox.modal.close();">
            <span class="sr-only">Close</span>
        </button>
    </div>
    <div class="add-text ml-2 mt-0" style="font-size: small;">
        <div class="container-fluid">
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>User Name</span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" placeholder="Abhishek Guleria">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Venue</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="venue" placeholder="Sports complex,abc,393001">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Time & Date</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="timedate" placeholder="9AM , 17 Jan 2025">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Entry Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="entrytime" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Exit Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="exittime" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Pending Payment</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pendingpayment" placeholder="00.00 ₹">
                    </div>
                </div>
            </div>

            <div class=" mt-4 mb-2" style="border: none;">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <button class="btn save mr-2" style="width: 100%;">Refund</button>
                            <button class="btn pay" style="width: 100%;">pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div id="Booking-venue" class="modal-demo">
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
                        <input type="text" class="form-control" name="name" placeholder="Abhishek Guleria">
                    </div>
                </div>
            </div>

            <!-- Amount Section -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Venue</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="venue" placeholder="Sports complex,abc,393001">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Time & Date</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="timedate" placeholder="9AM , 17 Jan 2025">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Entry Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="entrydate" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Exit Time</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="exittime" placeholder="N/A">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Total amount</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="totalamount" placeholder="00.00 ₹">
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <span>Amount Pay</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="amoutpay" placeholder="00.00 ₹">
                    </div>
                </div>
            </div>

            <div class=" mt-4 mb-2" style="border: none;">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <button class="btn pay mr-2" style="width: 100%;"
                                onclick="Custombox.modal.close();">cancel</button>
                            <button class="btn save " style="width: 100%;">Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="bedding" class="modal-demo">
    <div class="d-flex pr-3 pt-3 align-items-center justify-content-between mb-0" style="width: 100%; height: auto;">
        <button type="button" class="btn-close ml-auto pl-3 pb-0" onclick="Custombox.modal.close();">
            <span class="sr-only">Close</span>
        </button>
    </div>
    <div class="add-text ml-2 mt-0" style="font-size: small;">
        <p style="font-size:12px; color: #7C8082;" class="pt-1 mr-5">The winner has been selected automatically within sometime <span style="font-size: 12px; color:black">00:00:00</span></p>
        <div class="container-fluid">
            <div class="table-header">
                <div>Rank</div>
                <div class="ml-3">Name</div>
                <div class="ml-1">Amount</div>
            </div>
            <div class="list">
                <div class="list-item selected large">
                    <div class="info">
                        <span>#1</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">600</span>
                </div>
                <div class="list-item medium">
                    <div class="info">
                        <span>#2</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">550</span>
                </div>
                <div class="list-item small">
                    <div class="info">
                        <span>#3</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">500</span>
                </div>
                <div class="list-item small">
                    <div class="info">
                        <span>#4</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">3768</span>
                </div>
                <div class="list-item small">
                    <div class="info">
                        <span>#5</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">2000</span>
                </div>
                <div class="list-item light small">
                    <div class="info">
                        <span>#6</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">1500</span>
                </div>
                <div class="list-item light small">
                    <div class="info">
                        <span>#7</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">4970</span>
                </div>
            
                <div class="list-item light small">
                    <div class="info">
                        <span>#8</span>
                            <img src="{{ asset('assets/image/client/Ellipse 4.svg') }}">
                        <span class="name">Devon Lane</span>
                    </div>
                    <span class="amount">700</span>
                </div>
            </div>
            <div class="footer">
                <button class="back">Back</button>
                <button class="select">Select</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

@include('client.layouts.footer')















































