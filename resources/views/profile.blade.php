@include('adminlayouts.header')
    <style>
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-content {
            overflow: hidden;
            white-space: nowrap; 
        }
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .sidebar-footer .footer-dot {
            overflow: hidden;
        }
        .sidebar-footer {
            position: sticky;
            bottom: 0;
            background: rgb(24, 24, 24);
            color: white;
            text-align: center;
            padding: 1px;
            width: 100%;
            z-index: 10; 
        }
        .app-topbar .topbar-menu {
            background-color: #F5F5F5;   
        }
        .container {
            width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .tabs {
            display: flex;
            /* border-bottom: 2px solid #ddd; */
        }
        .tab {
            padding: 10px;
            margin-top: 0px;
            cursor: pointer;
            font-weight: 500;
        }
        .tab.active {
            color: teal;
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
            padding: 10px 60px 10px 60px;  /* top - right - bottom - left*/
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
        }
        .side-nav{
            height: 30px;
            padding-top: 70px;
        }
        .side-nav .side-nav-item .side-nav-link {
            font-size: 12px; 
            font-family: 'Inter', sans-serif;
            font-weight: 400 !important;
            color: rgb(197, 193, 193);
            letter-spacing: 0.9px;
            padding: 7px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-icon {
           height: 20px;
           width: 20px;
           font-size: 10px;
           padding-left: 30px;
        }
        .side-nav .side-nav-item .side-nav-link .menu-text {
           padding-left: 20px;
        }
        .app-topbar .app-search .form-control {
            height: 35px;
            /* width: 200px; */
            border-radius: 10px 0 0 10px;
            background-color: white;
            box-shadow: 0 4px 5px rgba(209, 209, 209, 0.2);
        }
        .app-topbar .app-search .btn-icon {
            height: 35px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 0 10px 10px 0;
            background-color: white;
        }
        .notification-icon {
            height: 20px;
        }
        .page-title-box {
            background-color: #F5F5F5;
        }
        .hr {
            border-color: grey;
        }
        
        .custom-pagination {
            display: flex;
            flex-wrap: nowrap;  /* Prevents vertical stacking */
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 10px 0;
            gap: 5px;
            /* overflow-x: auto;  Enables horizontal scrolling if needed */
            white-space: nowrap;  /* Keeps buttons in one row */
        }

        .custom-pagination .page-item {
            display: inline-block;
        }

        .custom-pagination .page-link {
            padding: 6px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: rgb(0, 128, 96);
            color: white;
            font-weight: bold;
        }

        .custom-pagination .page-link:hover {
            background-color: #f8f9fa;
            border-color: #bbb;
        }

        /* POS Terminal & Small Mobile Screens (Fix Vertical Issue) */
        @media (max-width: 480px) {
            .custom-pagination {
                flex-wrap: nowrap;  /* Prevents stacking */
                overflow-x: auto;  /* Adds horizontal scrolling if needed */
                padding: 5px 0;
            }

            .custom-pagination .page-link {
                padding: 4px 6px;
                font-size: 10px;
            }
        }

        /* Mobile Phones (Fix Vertical Issue) */
        @media (max-width: 767px) {
            .custom-pagination {
                flex-wrap: nowrap;
                overflow-x: auto;
            }

            .custom-pagination .page-link {
                padding: 5px 8px;
                font-size: 12px;
            }
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

    </style>

                <div class="row">
                    <div class="col-lg-9 col-md-10 col-sm-12">
                        <div class="card p-3 mt-2 ml-3" style="border-radius: 13px; height: auto; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);"">
                            <div class="card-header border-0">
                                <div class="tabs">
                                    <div class="tab active" onclick="showTab('account')">Account</div>
                                    <div class="tab" onclick="showTab('security')">Security</div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <!-- Account Section -->
                                <div id="account" class="content active">
                                    <div class="row">
                                        <div class="col-md-5" style="font-size: 12px;">
                                            <div class="mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" placeholder="Abhishek Guleria" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" placeholder="abhishekguleria1599@gmail.com" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Vender ID</label>
                                                <input type="text" class="form-control" placeholder="098765" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="1234567890" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                            </div>
                                        

                                        </div>
                                        <div class="col-md-7">
                                            Your Profile Picture
                                            <div class="d-flex mt-3 mb-5" style="margin-left: 2px;">
                                                <label for="uploadInput" style="width: 100px; height: 90px; border: 2px dashed #706d6d; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                                                    <img src="{{asset('assets/image/gallery-add.svg')}}" alt="dashboard" data-bs-toggle="modal" data-bs-target="#editModal" style="cursor: pointer; height: 25px; width: 25px;">
                                                    <span style="font-size: 10px; color: #cac9c9; margin-top: 7px; font-size: 7px;">Upload image</span>
                                                    <input type="file" id="uploadInput" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Security Section -->
                                <div id="security" class="content" style="font-size: 12px;">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="abhishekguleria1599@gmail.com" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" placeholder="*******" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm</label>
                                        <input type="text" class="form-control" placeholder="*******" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="1234567890" style=" letter-spacing: 0.7px; font-size: 12px; border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="save-btn">Save</button>
                            </div>
                        </div>
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

    </script>

    @include('adminlayouts.footer')