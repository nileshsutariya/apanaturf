@include('users.layouts.header2')

<link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{asset('assets/css/app2.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

<style>
    @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

    .form-label {
        font-size: 15px;
        color: #878787;
        font-weight: 500;
    }

    .form-label ::placeholder {
        color: #9F9F9F;
    }

    .headeruser {
        font-size: 17px;
        color: #878787;
        padding-bottom: 25px;
        font-weight: 600;
    }

    .headeruser.active {
        color: #299D91;
        text-decoration: underline;
        text-underline-offset: 10px;
        text-decoration-thickness: 2px;

    }

    .form-contol {
        font-size: 16px;
    }

    .card {
        border: none;
    }

    .card-footer {
        background-color: white;
        border: none;
        margin-right: 45px;
        margin-bottom: 35px;

    }

    .btn {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        padding-left: 50px;
        padding-right: 50px;
        border-radius: 4px;
    }
    .sidebar{
        height: 700px;
    }
    
</style>
<!-- <div class="col-lg-9 col-md-10 col-sm-12"> -->
<h4 class="mb-0 ml-3" style=" font-family: 'Poppins', serif !important; font-size: 22px;  ">Setting</h4>
<div class="ml-3 pb-2" style="font-size: 14px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important; ">
    Update any changes
</div>
<div class="card p-2 mt-2 ml-3" style=" border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
    <div class="card-body">

        <!-- Account Section -->
        <div class="row">
            <div class="col-md-5">
                <div id="account" class="headeruser active" style="padding-left: 15px;"> Account </div>
            </div>
            <div class="col-md-7">
                <div id="account" class="headeruser "> Your Profile Picture</div>
            </div>
        </div>

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
            </div>

            <div class="col-md-7">
                <div class="d-flex mt-1 mb-5" style="margin-left: 2px;">
                    <label for="uploadInput"
                        style="width: 120px; height: 110px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                        <img src="{{ asset('assets/image/gallery-add.svg')}}" alt="dashboard" data-bs-toggle="modal"
                            data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                        <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload your
                            image</span>
                        <input type="file" id="uploadInput" style="display: none;">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer ml-auto">
        <a href="#addBanner" class="add-banner waves-effect waves-light" data-animation="blur" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a">
            <button type="button" class="btn  ml-auto">Save</button>
        </a>
    </div>
</div>



        <!-- Add Banners Button -->
    

        <!-- Theme Modal for Add Banners -->
        <div id="addBanner" class="modal-demo" style="width: 380px !important;
                                                                        height: 320px;
                                                                        padding: 20px;
                                                                        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
                                                                        border-radius: 12px;">

            <!-- Modal Header -->
            <div class="d-flex p-3 align-items-center justify-content-between">
                <h4 class="add-title">Add Banners</h4>
                <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Upload Image Section -->
            <div class="d-flex mt-3 mb-4 justify-content-center">
                <label for="uploadInput" style="width: 100px; height: 90px; 
                                                                    border: 2px dashed #706d6d; 
                                                                    border-radius: 10px; 
                                                                    display: flex; flex-direction: column; 
                                                                    align-items: center; justify-content: center; 
                                                                    cursor: pointer;">
                    <img src="{{ asset('assets/image/gallery-add.svg') }}" alt="Upload"
                        style="cursor: pointer; height: 25px; width: 25px;">
                    <span class="text-center" style="font-size: 10px; color: #cac9c9; margin-top: 7px;">Upload
                        Image</span>
                    <input type="file" id="uploadInput" style="display: none;">
                </label>
            </div>

            <!-- Modal Footer -->
            <div class="text-center">
                <button type="button" class="btn btn-success col-md-5">Add</button>
            </div>
        </div>
    

<!-- <script src="{{asset('assets/js/vendor2.min.js')}}"></script> -->

<!-- App js -->
<script src="{{asset('assets/js/app2.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>

    function showTab(tabName) {
        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.content').forEach(content => content.classList.remove('active'));

        document.querySelector(`[onclick="showTab('${tabName}')"]`).classList.add('active');
        document.getElementById(tabName).classList.add('active');
    }



</script>


@include('users.layouts.userfooter')