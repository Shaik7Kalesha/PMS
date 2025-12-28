<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Management</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    .faculty-card {
      margin-bottom: 20px;
    }

    .faculty-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    @media (max-width: 768px) {
      .faculty-img {
        height: 150px;
      }
    }

    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>

<body>
  @include('admin.header')

  <div class="container-fluid page-body-wrapper">
    <div class="main-panel" style="background: #fff">
      <div class="content-wrapper">
        <!-- Form to add faculties -->
        <div class="row mt-2">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Faculty</h4>
                <form method="post" id="faculties-form">
                  @csrf
                  <div class="row g-3">
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="staffid">Staff Id</label>
                        <input type="text" class="form-control" id="staffid" name="staffid" placeholder="Staff Id">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="mobilenumber">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Table to display faculties -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Faculties</h4>
                <div class="table-responsive">
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
            // Optionally, reset the form
            $('#faculties-form')[0].reset();
            // Add new row to the table with received data
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

            // Debug message to check the response
            // console.log("API Response:", response);

            if (response && response.faculties) {
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
            } else {
              console.log("No faculties found or response format is incorrect.");
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }
      fetchFaculties();
    });
  </script>
</body>

</html>
