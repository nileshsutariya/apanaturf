@include('users.layouts.header2')
<style>
    html, body {
        overflow-x: hidden;
        width: 100%;
    }
    .custom-card {
        /* border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.16);
        padding: 10px; */
        /* padding-left: 15px; */
        /* background: #fff;
        border: none; */
    }
    .main-container {
        display: flex;
    }

    .sidebar {
        flex-shrink: 0;
    }

    .page-content {
        flex-grow: 1;
        padding: 50px;
    }
    @media (max-width: 768px) {
        .mobiles {
            display: none;
        }
        .page-content {
            padding: 30px;
        }
    }
    
</style>
<div class="page-content" id="mainContent">
    <div class="page-container" style="background-color: transparent;">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h1 style="font-family: 'Poppins', serif !important; font-weight: 600 !important;">Refer & Earn</h1>
                </div>
                <div class="mt-5 text-muted" style="letter-spacing: 0.6px; font-family: 'Poppins', serif !important; ">
                    Refer and earn: Share unique link, both get rewards for successful referrals. Win-win for users and businesses
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 refer" 
                    style="margin-top: 80px; font-family: 'Poppins', serif !important;">
                    <input type="text" class="form-control p-4" 
                        placeholder="aaaaaaaaaaaaaaaaaaaaaaaaa......" 
                        style="border-radius: 15px; flex: 1; min-width: 200px;" readonly>
                    <button class="btn btn-success px-5" style="padding-top: 13px; padding-bottom: 13px; border-radius: 15px;">Copy</button>
                </div>

                
                <div class="d-flex flex-wrap bd-highlight mb-4" style="margin-top: 80px; font-family: 'Monda', sans-serif !important;">
                    <div class="d-inline">
                        <img src="{{asset('assets/image/users/link.svg')}}" class="img-fluid mx-5 my-2" alt="link">
                        <a class="nav-link mx-2 text-uppercase" data-filter="complete" href="#" style="font-size: 13px; font-weight: 600 !important;">Copy Link<span class="sr-only"></span></a>
                    </div>
                    <div class="d-inline">
                        <img src="{{asset('assets/image/users/whatsapp.svg')}}" class="img-fluid mx-5 my-2" alt="link">
                        <a class="nav-link mx-2 text-uppercase" data-filter="going-on" href="#" style="font-size: 13px; font-weight: 600 !important;">Whatsapp<span class="sr-only"></span></a>
                    </div>    
                    <div class="d-inline">
                        <img src="{{asset('assets/image/users/facebook.svg')}}" class="img-fluid mx-5 my-2" alt="link">
                        <a class="nav-link mx-2 text-uppercase" data-filter="upcoming" href="#" style="font-size: 13px; font-weight: 600 !important;">facebook<span class="sr-only"></span></a>
                    </div>
                    <div class="d-inline">
                        <img src="{{asset('assets/image/users/moredots.svg')}}" class="img-fluid" alt="link" style="margin-left: 31px; padding-top: 15px;">
                        <a class="nav-link mx-2 text-uppercase my-3" data-filter="bidding" href="#" style="font-size: 13px; font-weight: 600 !important;">  More  <span class="sr-only"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mobiles">
                <img src="{{asset('assets/image/users/mobiles.svg')}}" class="img-fluid mx-5 my-2" alt="link" height="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="text-muted mb-2 ml-3" style="font-weight: 400 !important; letter-spacing: 0.7px;">Contacts</div>
                <div class="input-group mt-3">
                    <span class="input-group-text bg-light border-0 pl-4" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;;">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" class="form-control bg-light border-0 py-4" placeholder="Contacts" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;">
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12" style="font-family: 'Poppins', serif !important; ">
                    <div class="container" style="padding-left: 0px;">
                        <div class="card custom-card border-0" style="">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('assets/image/users/Ellipse775.svg')}}" alt="card" class="img-fluid" style="width: 50px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="">Name</span>
                                            <img src="{{asset('assets/image/users/whatsappblack.svg')}}" alt="card" class="img-fluid">
                                        </div>
                                        <div class="d-flex" style="font-size: 12px; color: #b3aeae;">
                                            <span class="mt-2">1234567890</span>
                                            <a href="" class="mt-2 mx-4">Invite</a href="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('users.layouts.userfooter')