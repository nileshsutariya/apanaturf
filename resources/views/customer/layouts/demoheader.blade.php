





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Responsive Collapsible Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .toggle-icon {
      cursor: pointer;
      font-size: 14px;
      margin-right: 6px;
    }
    .details-row {
      display: none;
      background-color: #f9f9f9;
    }

    /* Hide extra columns on small screens */
    @media (max-width: 768px) {
      .hide-mobile {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-4">
  <h5 class="mb-4">Responsive User Table</h5>

  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th class="hide-mobile">Mobile</th>
          <th class="hide-mobile">Type</th>
          <th class="hide-mobile">Balance</th>
          <th class="hide-mobile">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Row 1 -->
        <tr>
          <td>
            <span class="toggle-icon d-md-none" onclick="toggleDetails(this)">▶</span>
            admin123
          </td>
          <td>admin4@mail.com</td>
          <td class="hide-mobile">1234567891</td>
          <td class="hide-mobile"><span class="badge bg-info text-dark">admin1</span></td>
          <td class="hide-mobile">₹400</td>
          <td class="hide-mobile">
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>
        <tr class="details-row d-md-none">
          <td colspan="6">
            <strong>Mobile:</strong> 1234567891<br>
            <strong>Type:</strong> <span class="badge bg-info text-dark">admin1</span><br>
            <strong>Balance:</strong> ₹400<br>
            <strong>Action:</strong>
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>

        <!-- Row 2 -->
        <tr>
          <td>
            <span class="toggle-icon d-md-none" onclick="toggleDetails(this)">▶</span>
            subadmin
          </td>
          <td>subadmin@gmail.com</td>
          <td class="hide-mobile">9876543210</td>
          <td class="hide-mobile"><span class="badge bg-secondary">user</span></td>
          <td class="hide-mobile">₹150</td>
          <td class="hide-mobile">
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>
        <tr class="details-row d-md-none">
          <td colspan="6">
            <strong>Mobile:</strong> 9876543210<br>
            <strong>Type:</strong> <span class="badge bg-secondary">user</span><br>
            <strong>Balance:</strong> ₹150<br>
            <strong>Action:</strong>
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>

        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</div>

<script>
  function toggleDetails(el) {
    const row = el.closest('tr');
    const nextRow = row.nextElementSibling;
    if (nextRow && nextRow.classList.contains('details-row')) {
      nextRow.style.display = nextRow.style.display === 'table-row' ? 'none' : 'table-row';
      el.textContent = nextRow.style.display === 'table-row' ? '▼' : '▶';
    }
  }
</script>

</body>
</html>









{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Responsive Collapsible DataTable</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .toggle-icon {
      cursor: pointer;
      font-size: 14px;
      margin-right: 6px;
    }
    .details-row {
      display: none;
    }
    @media (max-width: 768px) {
      .full-table thead {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-light">
<div class="container py-4">
  <h5 class="mb-4">User List</h5>

  <div class="table-responsive">
    <table class="table full-table table-bordered">
      <thead class="table-light">
        <tr>
          <th>NAME</th>
          <th>EMAIL</th>
        </tr>
      </thead>
      <tbody>
        <!-- Row 1 -->
        <tr>
          <td>
            <span class="toggle-icon" onclick="toggleDetails(this)">▶</span> admin123
          </td>
          <td>admin4@mail.com</td>
        </tr>
        <tr class="details-row">
          <td colspan="2">
            <strong>Mobile No.:</strong> 1234567891<br>
            <strong>Type:</strong> <span class="badge bg-info text-dark">admin1</span><br>
            <strong>Balance:</strong> ₹400<br>
            <strong>Action:</strong>
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>

        <!-- Row 2 -->
        <tr>
          <td>
            <span class="toggle-icon" onclick="toggleDetails(this)">▶</span> subadmin
          </td>
          <td>subadmin1234@gmail.com</td>
        </tr>
        <tr class="details-row">
          <td colspan="2">
            <strong>Mobile No.:</strong> 9876543210<br>
            <strong>Type:</strong> <span class="badge bg-secondary">staff</span><br>
            <strong>Balance:</strong> ₹120<br>
            <strong>Action:</strong>
            <i class="bi bi-eye text-success me-2"></i>
            <i class="bi bi-pencil-square text-primary me-2"></i>
            <i class="bi bi-trash text-danger"></i>
          </td>
        </tr>

        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script>
  function toggleDetails(icon) {
    const tr = icon.closest("tr");
    const next = tr.nextElementSibling;

    if (next && next.classList.contains("details-row")) {
      next.style.display = next.style.display === "table-row" ? "none" : "table-row";
      icon.textContent = next.style.display === "table-row" ? "▼" : "▶";
    }
  }
</script>
</body>
</html> --}}






{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Expandable Responsive Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .expand-btn {
      cursor: pointer;
      font-size: 1.2rem;
    }

    .details-row {
      display: none;
    }

    @media (max-width: 767.98px) {
      .hide-mobile {
        display: none;
      }

      .details-row {
        background-color: #f9f9f9;
      }
    }
  </style>
</head>
<body>

<div class="container my-5">
  <h5 class="mb-4">Responsive Expandable Table</h5>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th></th>
          <th>Engine</th>
          <th>Browser</th>
          <th class="hide-mobile">Platform(s)</th>
          <th class="hide-mobile">Version</th>
          <th class="hide-mobile">Grade</th>
        </tr>
      </thead>
      <tbody>
        <!-- Row 1 -->
        <tr>
          <td class="text-center align-middle">
            <span class="expand-btn text-primary" onclick="toggleDetails(this)">+</span>
          </td>
          <td>Gecko</td>
          <td>Firefox 1.0</td>
          <td class="hide-mobile">Win 98+ / OSX.2+</td>
          <td class="hide-mobile">1.7</td>
          <td class="hide-mobile">A</td>
        </tr>
        <tr class="details-row">
          <td colspan="6">
            <strong>Platform(s):</strong> Win 98+ / OSX.2+<br>
            <strong>Version:</strong> 1.7<br>
            <strong>CSS Grade:</strong> A
          </td>
        </tr>

        <!-- Row 2 -->
        <tr>
          <td class="text-center align-middle">
            <span class="expand-btn text-primary" onclick="toggleDetails(this)">+</span>
          </td>
          <td>Gecko</td>
          <td>Firefox 2.0</td>
          <td class="hide-mobile">Win 2k+ / OSX.3+</td>
          <td class="hide-mobile">1.8</td>
          <td class="hide-mobile">A</td>
        </tr>
        <tr class="details-row">
          <td colspan="6">
            <strong>Platform(s):</strong> Win 2k+ / OSX.3+<br>
            <strong>Version:</strong> 1.8<br>
            <strong>CSS Grade:</strong> A
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<script>
  function toggleDetails(element) {
    const row = element.closest('tr');
    const nextRow = row.nextElementSibling;

    if (nextRow && nextRow.classList.contains('details-row')) {
      nextRow.style.display = nextRow.style.display === 'table-row' ? 'none' : 'table-row';
      element.textContent = nextRow.style.display === 'table-row' ? '−' : '+';
    }
  }
</script>

</body>
</html>

 --}}




{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Coupon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            /* justify-content: center;
            align-items: center; */
            flex-wrap: wrap;
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .coupon-container {
            position: relative;
            width: 80%;
            max-width: 400px;
            display: inline-block;
            margin: 3px;
        }
        .coupon-img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }
        .close-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
        .coupon-content {
            position: absolute;
            top: 12%;
            left: 10%;
            width: 84%;
            color: white;
        }
        .d-flex {
            display: flex;
        }
        .space-between {
            justify-content: space-between;
        }
        .coupon-discount {
            font-size: 24px;
            font-weight: 600;
        }
        .coupon-code {
            font-size: 24px;
            color: #29c26c;
            text-align: right;
            margin-right: 10px;
        }
        .small-text {
            font-size: 12px;
            color: gray;
            width: 50%;
            margin-right: 10px;
        }
        .coupon-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
            width: 100%;
        }
        @media (max-width: 768px) {
            .coupon-container {
                width: 90%;
            }
            .coupon-content {
                top: 15%;
                left: 5%;
                width: 90%;
            }
            .coupon-discount, .coupon-code {
                font-size: 20px;
            }
            .small-text {
                font-size: 10px;
            }
            .coupon-title {
                font-size: 16px;
            }
            .close-icon {
                width: 20px;
                height: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="coupon-container">
        <img src="{{ asset('assets/image/users/couponscard.svg') }}" class="coupon-img" alt="Coupon Card">
        <img src="{{ asset('assets/image/users/close-circle.svg') }}" class="close-icon" alt="Close Button">
        <div class="coupon-content">
            <div class="d-flex space-between">
                <span class="coupon-discount">20% OFF</span>
                <span class="coupon-code">END02</span>
            </div>
            <div class="d-flex space-between">
                <span class="small-text">MAX ₹500</span>
                <span class="small-text" style="text-align: right;">Coupon Expires 01/03</span>
            </div>
            <span class="coupon-title">End Of New Year</span>
        </div>
    </div>
    <div class="coupon-container">
        <img src="{{ asset('assets/image/users/couponscard.svg') }}" class="coupon-img" alt="Coupon Card">
        <img src="{{ asset('assets/image/users/close-circle.svg') }}" class="close-icon" alt="Close Button">
        <div class="coupon-content">
            <div class="d-flex space-between">
                <span class="coupon-discount">20% OFF</span>
                <span class="coupon-code">END02</span>
            </div>
            <div class="d-flex space-between">
                <span class="small-text">MAX ₹500</span>
                <span class="small-text" style="text-align: right;">Coupon Expires 01/03</span>
            </div>
            <span class="coupon-title">End Of New Year</span>
        </div>
    </div>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-text {
            color: #f0ad4e;
            font-weight: bold;
        }
        .user-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-4"> --}}


        {{-- <div class="d-flex align-items-center mt-3"> --}}
            {{-- <img src="https://via.placeholder.com/40" alt="User" class="user-img me-2"> --}}
            {{-- <div> --}}
                {{-- <p class="mb-0">changer name</p> --}}
                {{-- <a href="#" class="text-primary">Order confirmation</a> --}}
            {{-- </div> --}}
            {{-- <span class="ms-3 text-warning">&#128994; Processing</span> --}}
            {{-- <span class="ms-auto text-muted">29/07/2023 12:08</span> --}}
            {{-- <a href="#" class="ms-3 text-primary">Flow Chart</a> --}}
        {{-- </div> --}}

        {{-- <div class="d-flex align-items-center mt-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="">name</label>
                    <input type="text" class="form-control" value="changer name" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">date</label>
                    <input type="text" class="form-control" value="changer name" readonly>
                </div>

            </div>
        </div>


        <h5>Old Value</h5>
        <p>Using the custom buttons on Task form</p>
        
        <div class="mb-3">
            <label class="form-label"><strong>Changes</strong></label>
            <textarea class="form-control" rows="3" placeholder="Here is a custom multiple line control for task owners to input comments."></textarea>
        </div>
        
            <div class="d-flex align-items-center">
                <p class="me-3 mb-0"><strong>Submission Date:</strong> 29/07/2023&nbsp;&nbsp;|&nbsp;&nbsp;12:08</p> --}}
                {{-- <p class="status-text mb-0">Status: In process</p> --}}
            {{-- </div>
        
        <button class="btn btn-success btn-sm me-2 mt-3">Approve</button>
        <button class="btn btn-danger btn-sm mt-3">Reject</button>

        <hr>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> --}}