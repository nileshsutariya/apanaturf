@include('client.layouts.header')
<style>
    .tabs {
        display: flex;
    }

    .tab {
        padding: 10px;
        margin-top: 0px;
        cursor: pointer;
        font-weight: 500;
    }

    .tab.active {
        color: #299D91;
        border-bottom: 2px solid teal;
    }

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


    .header {
        display: flex;
        margin-bottom: 16px;
        margin-left: 15px;
    }

    .header button {
        padding: 5px 10px;
        border-radius: 100px;
        border: none;
        cursor: pointer;
    }

    .header .turf-button {
        background-color: #299D91;
        color: #ffffff;
        width: 120px;
    }

    .add-button {
        width: 35px;
        /* Set fixed width */
        height: 35px;
        /* Set fixed height */
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background-color: #000000;
        color: white;
        border-radius: 50%;
        /* Makes it circular */
        font-size: 16px;
        /* Adjust icon size */
        cursor: pointer;
        margin-left: 20px;
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

    .tags {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tag {
        display: flex;
        align-items: center;
        background-color: #FFFFFF;
        border: 1px solid #e5e7eb;

        color: #374151;
        padding: 4px 8px;
        border-radius: 9999px;
    }

    .tag i {
        margin-right: 4px;
    }

    .tag .remove-icon {
        margin-left: 8px;
        cursor: pointer;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .section-header button {
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
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

        .turfinput {
            width: 100px !important;
        }

        .tab {
            padding: 5px 7px !important;
        }
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

    .save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        padding-left: 50px;
        padding-right: 50px;
        border-radius: 4px;
    }
</style>

<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="card p-2 mt-2 ml-3"
            style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3); background-color: #FFFFFF;">
            <div class=" card-header border-0">
                <div class="tabs">
                    <div class="tab active" onclick="showTab('account')">Account</div>
                    <div class="tab" onclick="showTab('security')">Security</div>
                    <div class="tab" onclick="showTab('turf')">Turf</div>
                </div>
            </div>
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
                <div class="card-footer">
                    <button class="save-btn">Save</button>
                </div>
            </div>

            <div id="security" class="content">
                <div class="card-body p-3 pt-0" style="font-size: 12px;">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="abhishekguleria1599@gmail.com"
                            style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" placeholder="*******"
                            style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm</label>
                        <input type="text" class="form-control" placeholder="*******"
                            style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" placeholder="1234567890"
                            style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                    </div>
                </div>
                <div class="card-footer ml-auto">
                    <a href="#otp" class="add-banner waves-effect waves-light" data-animation="blur"
                        data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                        <button type="button" class="btn  ml-auto save">Save</button>
                    </a>
                </div>
            </div>

            <div id="turf" class="content pt-1">
                <div class="card-body p-3 pt-0" style="font-size: 12px;">
                    <div class="header">
                        <button class="turf-button">Turf-A</button>
                        <button class="add-button"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="container">
                                <div class="form-group">
                                    <label>Turf Name</label>
                                    <input type="text" placeholder="Turf Name">
                                </div>
                                <div class="form-group">
                                    <div class="section-header">
                                        <label>Sports</label>
                                        <a href="#addsport" class="add-banner waves-effect waves-light"
                                            data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                            data-overlayColor="#36404a">
                                            <button><i class="fas fa-plus"></i></button>
                                        </a>
                                    </div>
                                    <div class="tags" id="sportlist">
                                        <span class="sporttag">
                                            <span class="tag">
                                            <img src="{{asset('assets/image/client/Group12.svg')}}"> Cricket
                                                <span class="ms-2" onclick="removesport(this)">
                                                    <i class="fas fa-times remove-icon"></i></span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="section-header">
                                        <label>Amenities</label>
                                        <a href="#addamenities" class="add-banner waves-effect waves-light"
                                            data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                            data-overlayColor="#36404a">
                                            <button><i class="fas fa-plus"></i></button>
                                        </a>
                                    </div>
                                    <div class="tags" id="amenitieslist">
                                        <span class="amenitiestag">
                                            <span class="tag">
                                                <img src="{{asset('assets/image/client/Bottle of Water.svg')}}"> Water
                                                <span class="ms-2" onclick="removeamenities(this)">
                                                    <i class="fas fa-times remove-icon"></i></span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt"></i> Locations(link)</label>
                                    <input type="text" placeholder="Locations of google">
                                </div>
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt"></i> Locations(text)</label>
                                    <input type="text" placeholder="Locations in text">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            Your Profile Picture
                            <div class="d-flex mt-3 mb-3 upload" style="margin-left: 2px;">
                                <label class="uploadinput" for="uploadInput"
                                    style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                    <img src="{{asset('assets/image/client/gallery-add.svg')}}" alt="dashboard"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        style="cursor: pointer; height: 25px; width: 25px;">
                                    <span
                                        style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload
                                        image</span>
                                    <input type="file" id="uploadInput" style="display: none;">
                                </label>
                                <label class="uploadinput"
                                    style="width: 100px; height: 90px; border:none; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; background-color: #D9D9D9; margin-left: 30px;">
                                    <img src="{{ asset('assets/image/client/gallery-remove.svg')}}" alt="dashboard"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        style="cursor: pointer; height: 35px; width: 35px;">
                                </label> <label class="uploadinput"
                                    style="width: 100px; height: 90px; border:none; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; background-color: #D9D9D9; margin-left: 30px;">
                                    <img src="{{ asset('assets/image/client/+2.svg')}}" alt="dashboard"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        style="cursor: pointer; height: 35px; width: 35px;">
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex ">
                                    <span style="font-size: 10px; align-self: center;">Price of Booking:</span>
                                    <input type="text" placeholder="₹00.00" style="width:260px;"
                                        class="ml-2 turfinput">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Descriptions</label>
                                <textarea></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="otp" class="modal-demo">

    <!-- Close Button (Bootstrap) -->
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h6 style="font-weight: bold; margin: 0;">Code</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>

    <!-- Modal Header -->
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
<div id="addsport" class="modal-demo">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h6 style="font-weight: bold; margin: 0;">Add New Sport</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>
    <div class="otp-container mt-3">
        <form>
            <div class="mb-3" style="font-size: 16px;">
                <input type="text" class="form-control" id="newsport" placeholder="Enter New Sport"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div style="text-align: center;">
                <button type="button" class="btn save" onclick="addsport()">Save</button>
            </div>
        </form>
    </div>
</div>
<div id="addamenities" class="modal-demo">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h6 style="font-weight: bold; margin: 0;">Add New Amenities</h6>
        <button type="button" class="btn-close close-modal" onclick="Custombox.modal.close();"></button>
    </div>
    <div class="otp-container mt-3">
        <form>
            <div class="mb-3" style="font-size: 16px;">
                <input type="text" class="form-control" id="newamenities" placeholder="Enter New Amenities"
                    style="border: 2px solid #D0D5DD;">
            </div>
            <div style="text-align: center;">
                <button type="button" class="btn save" onclick="addamenities()">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>

    function showTab(tabName) {
        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.content').forEach(content => content.classList.remove('active'));

        document.querySelector(`[onclick="showTab('${tabName}')"]`).classList.add('active');
        document.getElementById(tabName).classList.add('active');

    }

    function addsport() {
        let name = document.getElementById("newsport").value.trim();
        if (name) {
            let tag = document.createElement("span");
            tag.classList.add("sporttag");

            tag.innerHTML = `                                            
            <span class="tag">
            <i class="fas fa-futbol"></i> ${name} 
            <span onclick="removesport(this)"><i class="fas fa-times remove-icon"></i></span></span>`;

            document.getElementById("sportlist").appendChild(tag);
            document.getElementById("newsport").value = "";
            Custombox.modal.close();
        }
    }

    function removesport(element) {
        element.parentElement.remove();
    }

    function addamenities() {
        let name = document.getElementById("newamenities").value.trim();
        if (name) {
            let tag = document.createElement("span");
            tag.classList.add("amenitiestag");

            tag.innerHTML = `                                            
            <span class="tag">
            <img src="{{asset('assets/image/client/Bottle of Water.svg')}}"> ${name} 
            <span onclick="removeamenities(this)"><i class="fas fa-times remove-icon"></i></span></span>`;

            document.getElementById("amenitieslist").appendChild(tag);
            document.getElementById("newamenities").value = "";
            Custombox.modal.close();
        }
    }

    function removeamenities(element) {
        element.parentElement.remove();
    }
</script>

@include('client.layouts.footer')