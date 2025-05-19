@include('vendor.layouts.header')
<style>
    .page-title-box {
        padding: 0px;
        margin: 0px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }
    .chart-container {
        width: 97%;
        /* max-width: 900px; */
        background: white;
        padding: 30px;
        border-radius: 11px;
        /* position: relative; */
        overflow: hidden;
    }

    .chart-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
    }

    canvas {
        width: 100% !important;
        height: 350px !important;
    }
    @media (min-width: 768px) and (max-width: 990px) {
        .client-information{
            margin-bottom: 10px;
        }
        .client-booking{
            display: block!important;
        }
        .client-btn-div{
            display: flex!important;
        }
        .client-div{
            display: block!important;
        }
        .client-btn{
            /* margin-bottom: 5px; */
            margin-left: 15px!important;
        }
        .client-button{
            margin-left: 22px !important;
            width: 100% !important;
            margin-top: 8px !important;
        }
    }

</style>
<div class="page-title-box">
    <div class="row">
        <div class="col-md-8 pr-3">
            <span style="font-size: 18px; color: #878787; font-weight: 400;">Today bookings</span>
            <span class="text-muted float-end mt-2 mx-2" style="font-size: 11px;">
                View All <img class="ml-1" src="{{asset('assets/image/client/rightarrow.svg')}}" alt="dashboard" height="">
            </span>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                        <div class="d-flex align-items-center">
                            <div class="me-3 d-flex align-items-center">
                                <img src="{{asset('assets/image/client/linegray.svg')}}" alt="dashboard" height="60px">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Slots</h6>
                                <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">200</h3>
                            </div>
                            <div class="ms-auto">
                                <button style="border: none; background-color: #ffffff; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;"> 
                                    <img src="{{asset('assets/image/client/calendarblack.svg')}}" alt="dashboard" style="width: 20px;">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                        <div class="d-flex align-items-center">
                            <div class="me-3 d-flex align-items-center">
                                <img src="{{asset('assets/image/client/linegreen.svg')}}" alt="dashboard" height="60px">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Booked</h6>
                                <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">135</h3>
                            </div>
                            <div class="ms-auto">
                                <button style="border: none; background-color: #109145; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;"> 
                                    <img src="{{asset('assets/image/client/calendarwhite.svg')}}" alt="dashboard" style="width: 20px;">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                        <div class="d-flex align-items-center">
                            <div class="me-3 d-flex align-items-center">
                                <img src="{{asset('assets/image/client/lineblack.svg')}}" alt="dashboard" height="60px">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Available</h6>
                                <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">65</h3>
                            </div>
                            <div class="ms-auto">
                                <button style="border: none; background-color: #191F2F; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;"> 
                                    <img src="{{asset('assets/image/client/calendarwhite.svg')}}" alt="dashboard" style="width: 20px;">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="chart-container mx-auto" style="box-shadow: 0px 20px 27px #00000040;">
                    <div class="mb-4 chart-title" style="font-size: 13px; font-weight: 500;">Booking Analytics</div>
                    <canvas id="myChart">
                        
                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 ">
            <span style="font-size: 18px; color: #878787; font-weight: 400;">Notifications</span>
            <span class="text-muted float-end mt-2" style="font-size: 11px;">
                View All <img class="ml-1" src="{{asset('assets/image/client/rightarrow.svg')}}" alt="dashboard" height="">
            </span>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap bd-highlight" style="margin-top: 5px; margin-bottom: 12px;">
                                <a class="nav-link mx-1" data-filter="complete" href="#" style="font-size: 15px; font-weight: 600 !important;">All <span class="sr-only">(current)</span></a>
                                <a class="nav-link mx-1" data-filter="going-on" href="#" style="font-size: 15px; font-weight: 600 !important;">Requests <span class="sr-only">(current)</span></a>
                                <a class="nav-link mx-1" data-filter="bidding" href="#" style="font-size: 15px; font-weight: 600 !important;">Payments <span class="sr-only">(current)</span></a>
                            </div>
                            
                            <div class="container mt-2" style="font-family: 'Poppins', sans-serif !important; border-radius: 7px;">
                                <div class="row">
                                    <div class="card border-0 " style="border-radius: 12px; padding: 0px; box-shadow: 0 2px 4px #00000040; ">
                                        <div class="card-body">
                                            <div class="d-flex client-booking">
                                                <div class="d-flex client-information">
                                                    <img class="me-2 client" src="{{asset('assets/image/client/rectangleimage.svg')}}" alt="dashboard" height="50px">
                                                    <div class="">
                                                        <div class="fw-bold" style="font-size: 11px;">User Name</div>
                                                        <div style="color: #E1D68D; font-size: 11px;">Id: 12345</div>
                                                        <div style="font-size: 11px; color: #666;">
                                                            <img src="{{asset('assets/image/client/location.svg')}}" alt="dashboard" height="11 px">
                                                            Dumas, Surat
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted" style="font-size: 10px;">Booking Request</div>
                                            </div>
                                            <div class="d-flex client-div justify-content-between align-items-center mt-3">

                                                <div class="mt-2 ml-0 client-btn-div">
                                                    <div class="fw-semibold" style="font-size: 10px;">Date: <span class="fw-normal">23/11/23</span></div>
                                                    <div class="fw-semibold client-btn" style="font-size: 10px;">Time: <span class="fw-normal">00:00AM</span></div>
                                                </div>
                                                <div class="d-flex gap-1 mt-1 ml-4 client-button">
                                                    <button class="btn btn-outline-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Deny</button>
                                                    <button class="btn btn-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-2" style="font-family: 'Poppins', sans-serif !important; border-radius: 7px;">
                                <div class="row">
                                    <div class="card border-0 " style="border-radius: 12px; padding: 0px; box-shadow: 0 2px 4px #00000040; ">
                                        <div class="card-body">
                                            <div class="d-flex client-booking">
                                                <div class="d-flex client-information">
                                                    <img class="me-2 client" src="{{asset('assets/image/client/rectangleimage.svg')}}" alt="dashboard" height="50px">
                                                    <div class="">
                                                        <div class="fw-bold" style="font-size: 11px;">User Name</div>
                                                        <div style="color: #E1D68D; font-size: 11px;">Id: 12345</div>
                                                        <div style="font-size: 11px; color: #666;">
                                                            <img src="{{asset('assets/image/client/location.svg')}}" alt="dashboard" height="11 px">
                                                            Dumas, Surat
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted" style="font-size: 10px;">Booking Request</div>
                                            </div>
                                            <div class="d-flex client-div justify-content-between align-items-center mt-3">

                                                <div class="mt-2 ml-0 client-btn-div">
                                                    <div class="fw-semibold" style="font-size: 10px;">Date: <span class="fw-normal">23/11/23</span></div>
                                                    <div class="fw-semibold client-btn" style="font-size: 10px;">Time: <span class="fw-normal">00:00AM</span></div>
                                                </div>
                                                <div class="d-flex gap-1 mt-1 ml-4 client-button">
                                                    <button class="btn btn-outline-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Deny</button>
                                                    <button class="btn btn-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-2" style="font-family: 'Poppins', sans-serif !important; border-radius: 7px;">
                                <div class="row">
                                    <div class="card border-0 " style="border-radius: 12px; padding: 0px; box-shadow: 0 2px 4px #00000040; ">
                                        <div class="card-body">
                                            <div class="d-flex client-booking">
                                                <div class="d-flex client-information">
                                                    <img class="me-2 client" src="{{asset('assets/image/client/rectangleimage.svg')}}" alt="dashboard" height="50px">
                                                    <div class="">
                                                        <div class="fw-bold" style="font-size: 11px;">User Name</div>
                                                        <div style="color: #E1D68D; font-size: 11px;">Id: 12345</div>
                                                        <div style="font-size: 11px; color: #666;">
                                                            <img src="{{asset('assets/image/client/location.svg')}}" alt="dashboard" height="11 px">
                                                            Dumas, Surat
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted" style="font-size: 10px;">Booking Request</div>
                                            </div>
                                            <div class="d-flex client-div justify-content-between align-items-center mt-3">

                                                <div class="mt-2 ml-0 client-btn-div">
                                                    <div class="fw-semibold" style="font-size: 10px;">Date: <span class="fw-normal">23/11/23</span></div>
                                                    <div class="fw-semibold client-btn" style="font-size: 10px;">Time: <span class="fw-normal">00:00AM</span></div>
                                                </div>
                                                <div class="d-flex gap-1 mt-1 ml-4 client-button">
                                                    <button class="btn btn-outline-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Deny</button>
                                                    <button class="btn btn-dark btn-sm px-3" style="border-radius: 8px; font-size: 10px;">Accept</button>
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
    </div>
    <div class="row">
        <div class="col-md-12 pl-4" style="background-color: #fff;">
            <h5 class="my-3">Recent 
                <span class="text-muted float-end mt-2 mx-2" style="font-size: 12px;">
                    View All <img class="ml-1" src="{{asset('assets/image/client/rightarrow.svg')}}" alt="dashboard" height="">
                </span>
            </h5>
            <table id="responsive-datatable" class="table dt-responsive nowrap" style="border:black; border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                <thead>
                    <tr style="font-size: 12px;">
                        <th scope="col" >No.</th>
                        <th>UserId</th>
                        <th>User Name</th>
                        <th>Booking Time</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">1</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1"><h4><span class="badge badge-soft-primary text-center pt-2" style="border-radius: 30px; font-size: 12px; height: 28px; width: 100px;">Paid</span></h4></td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">2</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1"><h4><span class="badge badge-soft-warning text-center pt-2" style="border-radius: 30px; font-size: 12px; height: 28px; width: 100px;">Pending</span></h4></td>
                        <td class="text-warning fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">3</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1"><h4><span class="badge badge-soft-primary text-center pt-2" style="border-radius: 30px; font-size: 12px; height: 28px; width: 100px;">Paid</span></h4></td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="text-muted" scope="row">4</td>
                        <td class="text-muted">#000001</td>
                        <td class="text-muted">Abhi</td>
                        <td class="text-muted">00:00 pm - 00:00 pm</td>
                        <td class="text-muted">23 Dec.2023</td>
                        <td class="p-1"><h4><span class="badge badge-soft-primary text-center pt-2" style="border-radius: 30px; font-size: 12px; height: 28px; width: 100px;">Paid</span></h4></td>
                        <td class="text-success fw-semibold">+400</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(0, 128, 0, 0.3)');  
    gradient.addColorStop(1, 'rgba(255, 255, 255, 0)'); 

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['20', '21', '22', '23', '24', '25', '26', '27', '28', '29'],
            datasets: [{
                label: 'Bookings',
                data: [100, 120, 135, 110, 115, 105, 98, 100, 140, 130],
                borderColor: '#008000', 
                borderWidth: 3,
                fill: true,
                backgroundColor: gradient, 
                pointBackgroundColor: "#ffffff",
                pointBorderColor: "#008000", 
                pointBorderWidth: 1, 
                pointRadius: 3,
                pointHoverRadius: 4,
                tension: 0.4 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)', 
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    bodyFont: { family: '"Inter", sans-serif' },
                    padding: 10,
                    displayColors: false,
                    callbacks: {
                        title: function () {
                            return '';
                        },
                        label: function(tooltipItem) {
                            let value = tooltipItem.raw;
                            let available = 200 - value;
                            return [`Booked: ${value}`, `Available: ${available}`];
                        }
                    }
                },
                legend: {
                    display: false 
                }
            },
            scales: {
                x: {
                    grid: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.1)"
                    },
                    ticks: {
                        color: "#666",
                        font: { family: 'Inter, sans-serif', size: 12 }
                    }
                },
                y: {
                    grid: {
                        display: false 
                    },
                    beginAtZero: true,
                    max: 200,
                    ticks: {
                        color: "#666",
                        font: { family: 'Inter, sans-serif', size: 12 }
                    }
                }
            }
        }
    });
</script>
 @include('vendor.layouts.footer')
