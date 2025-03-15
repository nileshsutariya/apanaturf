
@include('adminlayouts.header')
    <style> 
        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .side-nav .side-nav-item .side-nav-link {
            -webkit-transition: none !important;
            transition: none !important;
            border-radius: 0 !important;
            padding: 7px !important;
            background-color: rgb(24, 24, 24);
        }
        body{
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 500 !important;
            letter-spacing: 0.9px;
            background-color: #F5F5F5;
        }
        .content {
            margin-left: 0;
            transition: 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }
        .page-title-box {
            padding: 20px 24px;
            margin: 0 -24px 24px -24px;
            /* background-color: var(--bs-secondary-bg); */
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: rgb(0, 128, 117);
            border-color: rgb(0, 128, 117);
        }

        html[data-sidenav-size=condensed]:not([data-layout=topnav]) .sidenav-menu .side-nav .side-nav-item .side-nav-link {
            -webkit-transition: none !important;
            transition: none !important;
            border-radius: 0 !important;
            padding: 7px !important;
        }
        .hr {
            border-color: grey;
        }
        .chart-container {
            width: 96%;
            /* max-width: 900px; */
            background: white;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 50px;
            padding-bottom: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>

    <div class="page-title-box">
        
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h2 class="ml-3 mb-4"><strong>Dashboard</strong></h2>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 11px;">Total Users</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group1.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 11px;">Total Vender</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group2.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 11px;">Total Turf</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group3.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 11px;">Total Venue</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group4.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 11px;">Total Spot</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group5.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                <div class="card tilebox-one" style="background-color: transparent; border-left: 5px solid #e0dddd; height: 70px; box-shadow: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="text-muted mt-0" style="font-size: 10px;">Total Balance</h6>
                                <h3 data-plugin="counterup" style="font-weight:700;font-size: 20px;">200</h3>
                            </div>
                            <div class="col-3">
                                <img src="{{asset('assets/image/Group6.svg')}}" alt="dashboard" style="width: 35px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="chart-container">
                    <div class="mb-4" style="font-size: 13px; font-weight: 500;">Total Users</div>
                    <canvas id="myChart">
                        
                    </canvas>
                </div>
            </div>
            <div class="col-md-4 pl-4">
                <h5 class="mt-3 ml-3">Top Vender</h5>
                <table class="table" style="border-color: black; width: 80%;">
                    <thead>
                        <!-- <tr style="font-size: 12px;">
                            <th class="text-muted" scope="col">#1</th>
                            <th scope="col">Name1</th>
                            <th class="text-muted" scope="col">₹100110</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                        <tr style="font-size: 12px;">
                            <td class="text-muted" scope="row">#1</td>
                            <td>Name1</td>
                            <td class="text-muted">₹100110</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    
    <!-- END wrapper -->


    <script>
        
        $(document).ready(function () {
            // Get the current page URL (excluding query params)
            var currentUrl = window.location.pathname.split("/").pop();
    
            // Loop through sidebar links
            $(".side-nav-link").each(function () {
                var linkUrl = $(this).attr("href");
    
                // If the href matches the current page, add 'active' class
                if (linkUrl === currentUrl) {
                    $(this).addClass("active");
    
                    // Optional: Add active class to the parent <li> for better styling
                    $(this).closest(".side-nav-item").addClass("active");
                }
            });
        });

        // $(document).ready(function() {
        //     $(".side-nav-link").click(function(e) {
        //         e.preventDefault();
        //         var target = $(this).attr("href");
                
        //         if ($(target).hasClass("show")) {
        //             $(target).removeClass("show"); // Close if open
        //         } else {
        //             $(".collapse").removeClass("show"); // Close all dropdowns
        //             $(target).addClass("show"); // Open the clicked dropdown
        //         }
        //     });
        // });

        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('myChart').getContext('2d');
    
            // Create a gradient for the chart background
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, "rgba(66, 135, 245, 0.2)"); // Softer blue
            gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
            
            const labels = ["20", "21", "22", "23", "24", "25", "26", "27", "28", "29"];
            const bookedData = [100, 120, 115, 110, 105, 100, 95, 110, 130, 125];
            const availableData = [80, 70, 65, 75, 85, 90, 95, 85, 70, 75];
    
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Users',
                        data: bookedData,
                        borderColor: '#f5b400',
                        backgroundColor: gradient,
                        borderWidth: 2,
                        pointBackgroundColor: '#f5f5f5',
                        pointRadius: 4,
                        tension: 0.4,  // Smooth curves
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            backgroundColor: '#333',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            displayColors: false,
                            callbacks: {
                                label: function (tooltipItem) {
                                    const index = tooltipItem.dataIndex;
                                    return `Booked: ${bookedData[index]} \nAvailable: ${availableData[index]}`;
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
                                display: true,  // Show vertical grid lines
                                color: "rgba(200, 200, 200, 0.5)",  // Light vertical grid lines
                            }
                        },
                        y: {
                            grid: {
                                display: false  // Hide horizontal grid lines
                            },
                            min: 0,
                            max: 200
                        }
                    }
                }
            });
        });
    </script>
@include('adminlayouts.footer')