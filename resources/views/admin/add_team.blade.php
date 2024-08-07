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

    #teamname{
        color:#fff;
    }
    .form-control, .form-control:focus{
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
              <!-- <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p> -->
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
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <!-- partial -->
      
      <!-- main-panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Form with Team field in a card view -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Team</h4>
                  <form method="post" id="teams-form">
                    @csrf
                    <div class="form-group">
                      <label for="teamid">Team Id</label>
                      <input type="text" class="form-control" id="teamid" name="teamid" placeholder="Team Id">
                    </div>
                    <div class="form-group">
                      <label for="teamname">Team Name</label>
                      <input type="text" class="form-control" id="team_name" name="teamname" placeholder="Team Name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" id="teams-table-body">
                  <h4 class="card-title">Teams <h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th scope="col">Team Id</th>
                      <th scope="col">Team Name</th>
                      </tr>
                    </thead>
                    <tbody id="team-table-body">
                      <!-- Member data will go here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
$(document).ready(function () {
    // Intercept the form submission
    $('#teams-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
            'team_id': $('#teamid').val(),
            'team_name': $('#team_name').val()
        };

        $.ajax({
            type: "POST",
            url: "{{ route('add_teams') }}",
            data: data,
            dataType: "json",
            success: function (response) {
                // Display success message in alert popup
                alert('Team added successfully');
                // Optionally, reset the form
                $('#teams-form')[0].reset();
                $('#teams-table-body').append('<tr data-team_id="' + response.team_id + '"><td>' + response.team_id + '</td><td>' + response.team_name + '</td><td><button class="btn btn-primary open-btn">Open</button><button class="btn btn-secondary close-btn">Close</button></td></tr>');
                attachEventListeners();
            },
            error: function(xhr, status, error) {
                // Display error message in alert popup
                alert('An error occurred. Please try again.');
                // Optionally, display error message in a specific element on the page
                // $('#response-message').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                console.error('error:', error);
            }
        });
    });
    
      // Function to fetch batches and populate the table
      function fetchteams() {
        $.ajax({
          type: "GET",
          url: "/getteams",
          dataType: "json",
          success: function(response) {
            var tableBody = $('#team-table-body');
            tableBody.empty();
            if (response.teams) {
              response.teams.forEach(function(team) {
                var row = `<tr data-batch-id="${team.team_id}">
                  <td>${team.team_id}</td>
                  <td>${team.team_name}</td>
                  
                </tr>`;
                tableBody.append(row);
              });
              // Attach event listeners to buttons after table update
              attachEventListeners();
            }
          },
          error: function(xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }
      fetchteams();

});
</script>

</body>
</html>

















  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/hoverable-collapse.js"></script>
  <script src="admin/assets/js/misc.js"></script>
  <script src="admin/assets/js/settings.js"></script>
  <script src="admin/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="admin/assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>
</html>
