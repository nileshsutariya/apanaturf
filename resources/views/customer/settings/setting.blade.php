@include('customer.layouts.header2')

<link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{asset('assets/css/app2.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
<link rel="stylesheet" href="{{ asset('assets/css/app2.min.css') }}" type="text/css" id="app-style" />
<style>
    @import url(https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap);

    .form-label {
        font-size: 15px;
        /* color: #878787; */
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

    .save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        padding-left: 50px;
        padding-right: 50px;
        border-radius: 4px;
    }

    .sidebar {
        height: 800px !important;
    }

    .page-content {
        flex-grow: 1;
        padding: 20px;
        /* Adjust spacing */
    }

    #otp::placeholder {
        font-size: 16px;
    }

    .modal-demo {
        width: 380px !important;
        height: 200px;
        padding: 30px;
        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
        border-radius: 12px;
        position: relative;
    }

    @media (max-width: 435px) {
        .modal-demo {
            width: 86% !important;
        }
    }
</style>
<div class="page-content" id="mainContent">
    <div class="page-container" style="background-color: transparent;">
        <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <h4 class="mb-0 ml-3" style=" font-family: 'Poppins', serif !important; font-size: 20px;">Settings</h4>
                    <div class="ml-3 mt-1 pb-2"
                        style="font-size: 12px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important;">
                        Update any changes
                    </div>
                    <div class="card p-2 mt-2 ml-3"
                        style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5" style="font-size: 12px;">
                                    <h5>Profile Info</h5>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Abhishek Guleria" name="name"
                                            style="letter-spacing: 0.7px; font-size: 12px; border: none;" value="{{$customer->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="abhishekguleria1599@gmail.com" name="email"
                                            style="letter-spacing: 0.7px; font-size: 12px; border: none;" value="{{$customer->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="1234567890" name="phone"
                                            style="letter-spacing: 0.7px; font-size: 12px; border: none;"  value="{{$customer->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <h5>Your Profile Picture</h5>
                                    <div class="d-flex mt-3 mb-3" style="margin-left: 2px;">
                                        <label for="uploadInput"
                                        style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                            @if ($customer->image && $customer->image->image_path)
                                                <img id="profilePreview" src="{{ asset('storage/' . $customer->image->image_path) }}"
                                                    alt="Profile"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                                    <button onclick="removeImage()" 
                                                        style="position: absolute; top: 40px; left: 92px; 
                                                                color: rgba(0,0,0,0.6); background: transparent; 
                                                                border: none; border-radius: 50%; width: 24px; height: 24px; 
                                                                font-weight: bold; cursor: pointer; line-height: 1;">
                                                        ×
                                                    </button>

                                            @else
                                                <img id="profilePreview" src="{{ asset('assets/image/gallery-add.svg') }}"
                                                    alt="Upload Icon"
                                                    style="cursor: pointer; height: 25px; width: 25px;">
                                                <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">
                                                    Upload image
                                                </span>
                                            @endif
                                            <input type="file" name="profile_image" id="uploadInput" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr style="width: 95%;">
                            <h5>Change Password</h5>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="oldpassword" placeholder="123456"
                                    style="letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="newpassword" placeholder="123456"
                                    style="letter-spacing: 0.7px; font-size: 12px; border: none;">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="addBanner" class="modal-demo">
    <div style="display: flex; justify-content: space-between; align-items: center; ">
        <h6 style="font-weight: bold; margin: 0;">Code</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>
    <div class="otp-container mt-3">
        <form>
            <div class="mb-3" style="font-size: 16px;">
                <input type="text" class="form-control" id="otp" placeholder="Enter the Otp here"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div style="text-align: center;">
                <button type="button" class="btn save ">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('addBanner').style.display = 'none';
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/custombox@4.0.3/dist/custombox.min.js"></script>

<script src="https://unpkg.com/lucide@latest"></script>

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
<script>
    document.getElementById('uploadInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const preview = document.getElementById('profilePreview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.width = '100%';
            preview.style.height = '100%';
            preview.style.objectFit = 'cover';
        };

        reader.readAsDataURL(file);
    });
</script>

@include('customer.layouts.userfooter')