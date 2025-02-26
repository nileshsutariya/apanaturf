@include('users.layouts.header2')
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

    .save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        padding-left: 50px;
        padding-right: 50px;
        border-radius: 4px;
    }

    .input {
        letter-spacing: 0.7px;
        font-size: 12px;
        border: none;
        color: #9F9F9F;
    }

    .select {
        width: 100%;
        border: 1px solid #D0D5DD;
        border-radius: 5px;
        padding: 8px;
        background-color: #F9FAFB;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
    }

    .member-tag {
        display: inline-flex;
        align-items: center;
        background: #E5E7EB;
        border-radius: 15px;
        padding: 5px 10px;
        margin-right: 5px;
    }

    .add-member-btn {
        background: #2D6A4F;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 18px;
        cursor: pointer;
    }

    .member-list {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sidebar {
        height: 800px !important;
    }

    .page-content {
        flex-grow: 1;
        padding: 20px;
        /* Adjust spacing */
    }


    @media (min-width: 768px) and (max-width: 1000px) {
        .content-wrapper {
            display: flex;
        }
    }

    @media (max-width: 630px) {
        .price {
            text-align: right !important;
            width: 100px;
        }

        .content-wrapper {
            display: block !important;
        }
    }

    @media (min-width: 769px) and (max-width: 1022px) {
        #sidebar {
            overflow: visible;
        }

        .page-content {
            width: 610px;
        }
    }
    @media (min-width: 655px) and (max-width: 690px) {
        .page-content {
            width: 510px;
        }
    }

</style>
<div class="page-content" id="mainContent">
    <div class="page-container" style="background-color: transparent;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="mb-0 ml-3" style=" font-family: 'Poppins', serif !important; font-size: 22px;  ">Split & Pay
                </h4>
                <div class="ml-3 pb-2"
                    style="font-size: 14px; color: rgb(184, 180, 180); font-family: 'Poppins', serif !important; ">
                    Details of the wallet and cashbacks</div>
                <div class="card p-2 mt-2 ml-3"
                    style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4" style="font-size: 12px;">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control input" placeholder="enter the title here">
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Select the Payments</label>
                                    <div class="d-flex">
                                        <select class="form-control select2" style="width: 400px;">
                                            <option selected="selected" style="border: none;">Name of the Match</option>
                                            <option>Alaska</option>
                                        </select>
                                        <input type="text" class="text-center price"
                                            style="color:#9F9F9F; border: none;" value="₹600">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="note">Note</label>
                                    <input type="text" class="form-control input" placeholder="Text written here ">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Add members here</label>
                                    <div class="member-list">
                                        <button class="add-member-btn" onclick="addMember()">+</button>
                                        <div id="members">
                                            <div class="member-tag">Rohit <span class="ms-2 text-danger"
                                                    onclick="removeMember(this)">×</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div id="account" class="headeruser "> Upload your Qr</div>
                                <div class="d-flex mt-1 mb-5" style="margin-left: 2px;">
                                    <label for="uploadInput"
                                        style="width: 120px; height: 110px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                        <img src="{{ asset('assets/image/gallery-add.svg')}}" alt="dashboard"
                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                            style="cursor: pointer; height: 25px; width: 25px;">
                                        <span
                                            style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload
                                            your
                                            image</span>
                                        <input type="file" id="uploadInput" style="display: none;">
                                    </label>
                                    <label
                                        style="width: 120px; height: 110px; border:none; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; background-color: #D9D9D9; margin-left: 30px;">
                                        <img src="{{ asset('assets/image/gallery-add.svg')}}" alt="dashboard"
                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                            style="cursor: pointer; height: 35px; width: 35px;">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto">
                        <button type="button" class="btn save ml-auto">Split & Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });



</script>


<script>
    function toggleDropdown() {
        document.getElementById("dropdown-menu").classList.toggle("d-none");
    }

    function selectPayment(name, price) {
        document.getElementById("selected-payment").innerHTML = `▼ ${name}`;
        document.getElementById("dropdown-menu").classList.add("d-none");
    }

    function addMember() {
        let name = prompt("Enter member name:");
        if (name) {
            let memberDiv = document.createElement("div");
            memberDiv.classList.add("member-tag");
            memberDiv.innerHTML = `${name} <span class="ms-2 text-danger" onclick="removeMember(this)">×</span>`;
            document.getElementById("members").appendChild(memberDiv);
        }
    }

    function removeMember(element) {
        element.parentElement.remove();
    }
</script>

@include('users.layouts.userfooter')