@include('vendor.layouts.header')
<style>

    .content {
        display: none;
        padding: 20px 0;
    }

    .content.active {
        display: block;
        margin-left: 10px;
    }

    .save-btn {
        background: teal;
        color: white;
        padding: 10px 60px 10px 60px;
        /* top - right - bottom - left*/
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #299D91;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-group input {
        width: 100%;
        padding: 8px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        outline: none;
    }

    .form-group input:focus {
        border-color: #14b8a6;
        box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.2);
    }

    .form-group textarea {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #cbd5e0;
        border-radius: 8px;
        color: #000000;
        height: 128px;
    }

    @media(max-width:400px) {
        .upload {
            display: block !important;
        }
        .uploadinput {
            margin-left: 0px !important;
        }
    }

    #otp::placeholder {
        font-size: 16px;
    }

</style>

<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="card p-2 mt-2 ml-3"
            style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); background-color: #FFFFFF;">
            <div id="account" class="content active">
                <div class="card-body p-3 pt-0">
                    <!-- Account Section -->
                    <div class="row">
                        <div class="col-md-5" style="font-size: 12px;">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Abhishek Guleria"
                                    style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="abhishekguleria1599@gmail.com"
                                    style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vender ID</label>
                                <input type="text" class="form-control" placeholder="098765"
                                    style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="1234567890"
                                    style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                            <div class="d-flex align-items-end mb-3">
                                <label class="me-5 mt-0 mb-0">Request Booking</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="requestBooking" checked
                                        style="width: 2.5rem; height: 1.5rem; background-color: #234723; border-radius: 50px; border: none; transition: background-color 0.3s ease-in-out;"
                                        oninput="this.style.backgroundColor = this.checked ? '#1d3819' : '#ddd'">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            Your Profile Picture
                            <div class="d-flex mt-3 mb-5" style="margin-left: 2px;">
                                <label for="uploadInput"
                                    style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                    <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        style="cursor: pointer; height: 25px; width: 25px;">
                                    <span
                                        style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload
                                        image</span>
                                    <input type="file" id="uploadInput" style="display: none;">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="save-btn ml-3 mt-3">Save</button>
            </div>
        </div>
    </div>
</div>

@include('vendor.layouts.footer')
