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

    .btn.cancle,
    .btn.create {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        font-weight: 700;
    }
    .btn.create {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.cancel {
        background-color: white;
        color: #299D91;
        border: 1px solid #299D91;
        font-size: 16px;
        font-weight: 700;
    }
</style>
<div class="page-title-box">
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3"><strong>Coupons & Offers</strong></h6>
        </div>
    </div>
    <hr>
    <div class="card mb-5 pb-5" style="background-color: #F5F5F5; box-shadow: none;padding-top :0px !important;;">
        <div class="row ">
        <img class="justify-content-center ml-2" src="{{ asset('assets/image/coupon.svg') }}" alt="dashboard" style="height: 120px; width: 420px;">
        <img class="justify-content-center ml-2" src="{{ asset('assets/image/coupon.svg') }}" alt="dashboard" style="height: 120px; width: 420px;">
        </div>
    </div>


    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3"><strong>Create Coupons</strong></h6>
        </div>
    </div>
    <div class="card">
        <div class="row ">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">User Name</div>
                <div class="value">Abhishek Guleria</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">Account Type</div>
                <div class="value">Savings Account</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">IFSC Code</div>
                <div class="value">PYTM0123456</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">Balance</div>
                <div class="value">₹20,00,000</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">Account Number</div>
                <div class="value">000000000*****</div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="label">Bank Name</div>
                <div class="value">Ankleshwar</div>
            </div>
            <div class="actions mt-2">
                <button class="btn create">Create</button>
                <button class="btn cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@include('client.layouts.footer')