<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin Home</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

  <style>
    /* Your custom styles here */
    .card-title {
      color: black !important;
    }
    .card-body {
      background-color: #fff;
    }
    .form-control, .form-group label, .btn {
      color: black;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-light {
      background-color: #f8f9fa;
      border-color: #f8f9fa;
    }
    #teamname {
      color: #fff;
    }
    .form-control, .form-control:focus {
      background: #fff;
    }
    .table th, .table td {
      color: black !important;
    }
    .table thead th {
      background-color: #007bff;
      color: #fff;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }
    .table-striped tbody tr:hover {
      background-color: rgba(0, 123, 255, 0.15);
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Include sidebar and header -->
    @include('admin.sidebar')
    @include('admin.header')

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel" style = "background: #fff">
        <div class="content-wrapper">
          <!-- Form to add faculties -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Faculty</h4>
                  <form method="post" id="faculties-form">
                    @csrf
                    <div class="form-group">
                      <label for="staffid">Staff Id</label>
                      <input type="text" class="form-control" id="staffid" name="staffid" placeholder="Staff Id">
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="department">Department</label>
                      <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                    </div>
                    <div class="form-group">
                      <label for="mobilenumber">Mobile Number</label>
                      <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                      <label for="designation">Designation</label>
                      <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Table to display faculties -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" id="faculties-table-body">
                  <h4 class="card-title">Faculties</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Staff Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Department</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Password</th>
                      </tr>
                    </thead>
                    <tbody id="faculty-table-body">
                      <!-- Faculty data will be dynamically added here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- End plugin js for this page -->

  <!-- jQuery and AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      // Intercept the form submission
      $('#faculties-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
          '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
          'staffid': $('#staffid').val(),
          'name': $('#name').val(),
          'email': $('#email').val(),
          'department': $('#department').val(),
          'mobilenumber': $('#mobilenumber').val(),
          'designation': $('#designation').val(),
          'password': $('#password').val(),
        };

        $.ajax({
          type: "POST",
          url: "{{ route('add_faculties') }}",
          data: data,
          dataType: "json",
          success: function (response) {
            // Display success message in alert popup
            alert('Faculty added successfully');
            location.reload();
            // Optionally, reset the form
            $('#faculties-form')[0].reset();
            // Add new row to the table with received data (adjust according to your response structure)
            var row = `<tr>
              <td>${response.staffid}</td>
              <td>${response.name}</td>
              <td>${response.email}</td>
              <td>${response.department}</td>
              <td>${response.mobilenumber}</td>
              <td>${response.designation}</td>
              <td>${response.password}</td>
            </tr>`;
            $('#faculty-table-body').append(row);
          },
          error: function (xhr, status, error) {
            // Display error message in alert popup
            alert('An error occurred. Please try again.');
            console.error('Error:', error);
          }
        });
      });

      // Function to fetch faculties and populate the table
      function fetchFaculties() {
        $.ajax({
          type: "GET",
          url: "/getfaculties",
          dataType: "json",
          success: function (response) {
            var tableBody = $('#faculty-table-body');
            tableBody.empty();
            if (response.faculties) {
              response.faculties.forEach(function (faculty) {
                var row = `<tr>
                  <td>${faculty.staffid}</td>
                  <td>${faculty.name}</td>
                  <td>${faculty.email}</td>
                  <td>${faculty.department}</td>
                  <td>${faculty.mobilenumber}</td>
                  <td>${faculty.designation}</td>
                  <td>${faculty.password}</td>
                </tr>`;
                tableBody.append(row);
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      // Initial fetch of faculties
      fetchFaculties();
    });
  </script>

  <!-- End custom js for this page -->
</body>
</html>
