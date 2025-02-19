@include('users.layouts.userheader')

<section class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 text-section text-center text-md-left mb-4 mb-md-0 mt-5">
                <h1 class="title">MY GROUND</h1>
                <h2 class="subtitle" style="color: #279B5A;">MY GAME</h2>
            </div>
            <div class="col-12 col-md-6 text-section text-center position-relative">
                <h1 class="sport text-outline-success ml-5">SPORT</h1>
                <img src="{{asset('assets/image/users/mockuuups-female-hand.svg')}}" 
                     class="position-absolute" 
                     style="top: -0px; 
                     /* right: 100px; */
                     margin-top: 30px;
                     width: 350px;
                     " 
                     alt="Mobile Mockup">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card ml-3" style="background-color: transparent; border: solid black 1px; border-radius: 11px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{asset('assets/image/users/Group.svg')}}" class="d-inline-block align-top" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <span class="" style="font-size: 13px;">Location</span>
                                            <div class="text-muted" style="font-size: 12px;">Ankleshwar, Gujarat</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{asset('assets/image/users/calendar.svg')}}" class="d-inline-block align-top" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <span class="" style="font-size: 13px;">Date</span>
                                            <div class="text-muted" style="font-size: 12px;">01-01-2003</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-success pt-2 pb-2 pl-3 pr-3" type="submit" style=" background-color: #000; border: none;">
                                        <i class="bi bi-search" style="color: #fff; font-size: 25px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3 mr-5" style="font-size: 12px; line-height: 25px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos corporis assumenda dolor in consequatur hic molestias delectus sapiente incidunt culpa!
                    </div>
                    <div class="ml-3 mt-4 mr-5" style="font-size: 12px; line-height: 25px;">
                        <img src="{{asset('assets/image/users/appstore.svg')}}" class="d-inline-block align-top" alt="" style="width: 250px;">
                    </div>
                </div>
                {{-- <div class="col-sm-4">
                    <img src="{{asset('assets/image/users/mockuuups-female-hand.svg')}}" 
                     class="position-absolute" 
                     style="top: -50px; right: 100px; width: 250px;" 
                     alt="Mobile Mockup">    
                </div> --}}
            </div>
            {{-- <hr> --}}
        </div>
    </div>
</section>

<hr style="margin-top: 37px;">

<section class="content" style="background-color: #e9eaeb;">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6">
                <span style="color: #279B5A; font-size: 45px; font-family: 'Lato', sans-serif;">Exclusive Benefits</span> <span style="font-size: 45px; font-family: 'Lato', sans-serif;">of SportsAstra</span> 
            </div>
            <div class="col-md-6">
                <div class="card" style="margin-top: 50px; background-color: transparent; border: none; border-left: solid #279B5A 3px; border-radius: 0px;">
                    <div class="card-body" style="font-size: 13px; padding: 2px; padding-left: 7px;">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita nam tempore iste, aspernatur ad ab.
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/Clock.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            Fast Booking
                        </div>
                        <div class="text-muted" style="font-size: 11px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/CardWallet.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            Secure Payment
                        </div>
                        <div class="text-muted" style="font-size: 11px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="background-color: transparent; border: none; padding: 10px;">
                    <div class="card-body">
                        <button class="btn btn-light">
                            <img src="{{asset('assets/image/users/24Hours.svg')}}" class="d-inline-block align-top pt-1 pb-1" alt="" style="width: 40px;">
                        </button>
                        <div class="fw-bold mt-4 mb-2">
                            24x7 Support
                        </div>
                        <div class="text-muted" style="font-size: 11px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat suscipit dolores culpa, accusantium nam.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="content">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-5">
                <span style="font-size: 40px; font-family: 'Lato', sans-serif;">Download </span> <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif;">SportsAstra</span> 
                <span style="color: #279B5A; font-size: 40px; font-family: 'Lato', sans-serif;">App </span> <span style="font-size: 40px; font-family: 'Lato', sans-serif;">Today</span> 
            
                <div class="mt-4 fw-bold" style="font-size: 12px;">
                    5 bank accounts, 5 apps? Not anymore. Connect your other bank account.
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div style="color: #279B5A; font-size: 27px;">
                            20 Million+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            Active Users
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="color: #279B5A; font-size: 27px;">
                            20+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            States
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="color: #279B5A; font-size: 27px;">
                            700+
                        </div>
                        <div class="fw-bold" style="font-size: 12px;">
                            Venders
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-7">
                <div class="card mt-4" style="background-color: transparent; border: none;">
                    <div class="card-body">
                        <div style="display: flex; gap: 20px; justify-content: center; align-items: center;">
                            <div style="width: 250px; height: 260px; padding: 15px; border-radius: 17px; background: #dfdddd; text-align: center; position: relative;">
                                <h3 style="margin: 0; font-size: 30px; ">For iOS</h3>
                                <p style="margin: 5px 0; font-size: 13px; color: #666;">iOS +15</p>
                                <button style="background: #279B5A; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">Download App</button>
                                <div style="margin-top: 10px;"><img src="qr-ios.png" alt="QR Code for iOS" style="width: 80px; height: 80px;"></div>
                                <div style="position: absolute; bottom: -20px; right: -20px; background: white; border-radius: 50%; padding: 10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
                                    <img src="apple-icon.png" alt="Apple Logo" style="width: 30px; height: 30px;">
                                </div>
                            </div>
                        
                            <div style="width: 200px; padding: 15px; border-radius: 15px; background: #F5F5F5; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); text-align: center; position: relative;">
                                <h3 style="margin: 0; font-size: 16px; font-weight: bold;">For Android</h3>
                                <p style="margin: 5px 0; font-size: 12px; color: #666;">Android 9.0+</p>
                                <button style="background: #279B5A; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">Download App</button>
                                <div style="margin-top: 10px;"><img src="qr-android.png" alt="QR Code for Android" style="width: 80px; height: 80px;"></div>
                                <div style="position: absolute; bottom: -20px; right: -20px; background: white; border-radius: 50%; padding: 10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
                                    <img src="android-icon.png" alt="Android Logo" style="width: 30px; height: 30px;">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@include('users.layouts.userfooter')