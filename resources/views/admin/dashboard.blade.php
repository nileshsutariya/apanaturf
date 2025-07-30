@include('admin.layouts.header')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* body {
      background-color: #f5f7fa;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 40px;
    } */

    /* .card {
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
      padding: 24px 32px;
      max-width: 800px;
      margin: auto;
    } */

    /* h4 {
      margin: 0 0 16px;
      font-size: 18px;
      font-weight: 600;
      color: #333;
    } */
    
    .vendor-card {
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 18px;
      margin-bottom: 1.5rem;
      /* margin: auto; */
    }

    .vendor-card h3 {
      margin: 0 0 16px;
      font-size: 18px;
      font-weight: 600;
      color: #333;
    }

    .vendor-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px solid #e5e7eb;
    }

    .vendor-rank {
      color: #6b7280;
      font-weight: 500;
    }

    .vendor-name {
      font-weight: 600;
      color: #111827;
    }

    .vendor-amount {
      color: #4b5563;
      font-size: 14px;
    }

    .vendor-row:last-child {
      /* border-bottom: none; */
    }

    canvas {
      width: 100% !important;
      height: auto !important;
    }
  </style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Dashboard</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xxl-5">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                                                <iconify-icon icon="solar:users-group-rounded-broken" class="avatar-title fs-32 text-primary"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">Total Users</p>
                                            <h3 class="text-dark mt-1 mb-0">200</h3>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                                                <iconify-icon icon="solar:shop-2-broken" class="avatar-title fs-32 text-success"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">Total Vendor</p>
                                            <h3 class="text-dark mt-1 mb-0">200</h3>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                                                <iconify-icon icon="solar:football-broken" class="avatar-title fs-32 text-primary"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">Total Turf</p>
                                            <h3 class="text-dark mt-1 mb-0">200</h3>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                                                <iconify-icon icon="solar:money-bag-broken" class="avatar-title fs-32 text-success"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">Total Balance</p>
                                            <h3 class="text-dark mt-1 mb-0">200</h3>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="text-muted mb-0" style="font-size: 15px;">Total Users</p>
                                            <h3 class="text-dark mt-1 mb-0" style="font-size: 25px;">200</h3>
                                        </div>
                                        <div class="col-4">
                                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                                                <iconify-icon icon="tabler:users" class="avatar-title fs-30 text-primary"></iconify-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="padding: 10px;">
                        <div class="card-body">
                            <div class="mb-3" style="font-size: 15px; font-weight: 600;">Total Users</div>
                            <canvas id="userChart"></canvas>    
                        </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="vendor-card">
                        <div class="mb-2" style="font-size: 15px; font-weight: 600;">
                            Top Vendor
                        </div>
                        <div class="vendor-row">
                            <div class="vendor-rank">#1</div>
                            <div class="vendor-name">Name 1</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#2</div>
                            <div class="vendor-name">Name 2</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#3</div>
                            <div class="vendor-name">Name 3</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#4</div>
                            <div class="vendor-name">Name 4</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#5</div>
                            <div class="vendor-name">Name 5</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#5</div>
                            <div class="vendor-name">Name 5</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#5</div>
                            <div class="vendor-name">Name 5</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>

                        <div class="vendor-row">
                            <div class="vendor-rank">#5</div>
                            <div class="vendor-name">Name 5</div>
                            <div class="vendor-amount">₹100110</div>
                        </div>
                    </div>
                </div>    
            </div>       
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('userChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.2)');
    gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');

    const data = {
      labels: ['20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
      datasets: [{
        label: 'Total Users',
        data: [150, 120, 135, 125, 130, 115, 110, 140, 160, 155, 20],
        borderColor: '#3693f3',
        backgroundColor: gradient,
        pointBackgroundColor: '#3693f3',
        pointBorderColor: '#ffffff',
        pointRadius: 4,
        pointHoverRadius: 6,
        fill: true,
        tension: 0.35,
        borderWidth: 2
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        plugins: {
          tooltip: {
            callbacks: {
              title: function () {
                return '';
              },
              label: function(context) {
                const total = context.raw;
                const booked = Math.floor(total * 0.85);
                const available = total - booked;
                return [`Booked : ${booked}`, `Available : ${available}`];
              }
            },
            backgroundColor: '#1f2937',
            titleColor: '#ffffff',
            bodyColor: '#d1d5db',
            cornerRadius: 6,
            padding: 12,
            displayColors: false
          },
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: true
            },
            ticks: {
              color: '#6b7280',
              font: {
                size: 12
              }
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              display: false,
              color: '#e5e7eb'
            },
            ticks: {
              color: '#6b7280',
              font: {
                size: 12
              }
            }
          }
        }
      }
    };

    new Chart(ctx, config);
</script>
@include('admin.layouts.footer')