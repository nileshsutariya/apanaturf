@include('client.layouts.header')
<style>
    .card {
        background-color: #ffffff;
        border-radius: 0.5rem;
        box-shadow: 0 11px 26px rgba(0, 0, 0, 0.1);
        padding: 25px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px;
    }

    .card hr {
        margin-bottom: 1rem;
    }

    .card h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px;
        background-color: #ffffff;
    }

    .card-footer a {
        color: #299D91;
        text-decoration: none;
    }

    .card-footer button {
        background-color: #299D91;
        color: #ffffff;
        padding: 0.5rem 1.5rem;
        border: none;
        border-radius: 4px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .card-footer button i {
        font-size: 11px;
        margin-left: 0.5rem;
    }

    @media (max-width:768px) {
        .card {
            margin-right: 0px !important;
        }
    }

    @media (min-width:576px) and (max-width:692px) {
        .card-header {
            display: contents;
        }

        .nameofuser {
            margin-right: 50px;
        }
    }
</style>
</style>

<div class="page-title-box">

    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3"><strong>Request</strong></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 15px; color:#878787; font-weight: 600;" class="nameofuser">Name Of
                        User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 15px; color:#878787; font-weight: 600;" class="nameofuser">Name Of
                        User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 15px; color:#878787; font-weight: 600;" class="nameofuser">Name Of
                        User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 15px; color:#878787; font-weight: 600;" class="nameofuser">Name Of
                        User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 19px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 16px; color:#878787; font-weight: 700;">Name Of User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 16px; color:#878787; font-weight: 700;">Name Of User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="card mr-3">
                <div class="card-header">
                    <span style="font-size: 16px; color:#878787; font-weight: 700;">Name Of User</span>
                    <span style="font-size: 12px; color:#666666; font-weight:500;">UserID:1234</span>
                </div>
                <hr>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">Name Of The Ground</p>
                    <p style="font-size: 14px; color:#9F9F9F; font-weight:400;">Turf Name</p>
                </div>
                <div>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">May 19, 2023</p>
                    <p class="m-0" style="font-size: 20px; color:#191919; font-weight:600;">9 Am</p>
                    <p class="mt-1" style="font-size: 14px; color:#9F9F9F; font-weight:400;">Date/Time</p>
                </div>
                <div class="card-footer">
                    <a href="#">Remove</a>
                    <button>
                        Accept <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div> --}}
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@include('client.layouts.footer')