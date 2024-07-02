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
    #batchname {
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
    .card{
      border: none !important;
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
          <!-- Form with Batch field in a card view -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Project</h4>
                  <form method="post" id="projects-form">
                    @csrf
                    <div class="form-group">
                      <label for="title">Project Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Project Title">
                    </div>
                    <div class="form-group">
                      <label for="source">Source</label>
                      <input type="text" class="form-control" id="source" name="source" placeholder="Project Source">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Project Description">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
  
        </div>

        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mem-reg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container mt-3">
            <div class="mt-4">
              <form method="POST" id="projects-form" >
              <input type="hidden" id="title" name="source">

                @csrf
                <div class="row mb-4">
                  <div class="col-md-4">
                  <label for="title">Project Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Project Title">
                  </div>
                  <div class="col-md-4">
                  <label for="source">Project Source</label>
                  <input type="text" class="form-control" id="source" name="source" placeholder="Project Source">
                  </div>
                  <div class="col-md-4">
                  <label for="description">Project Description</label>
                  <input type="text" class="description" id="description" name="description" placeholder="Project Description">
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
    $('#projects-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
            'title': $('#title').val(),
            'source': $('#source').val(), 
            'description': $('#description').val()         
        };
        $.ajax({
            type: "POST",
            url: "{{ route('add_projects') }}",
            data: data,
            dataType: "json",
            success: function (response) {
                // Display success message in alert popup
                alert('Project added successfully');
                location.reload();

                // Optionally, reset the form
                $('#projects-form')[0].reset();
                // Optionally, update the table
                $('#projects-table-body').append('<tr data-title="' + response.title + '"><td>' + response.title + '</td><td>' + response.source + '</td><td>' + response.description + '</td><td><button class="btn btn-primary open-btn">Open</button><button class="btn btn-secondary close-btn">Close</button></td></tr>');
                
                // Attach event listeners to new buttons
                attachEventListeners();
            },
            error: function(xhr, status, error) {
                // Display error message in alert popup
                alert('An error occurred. Please try again.');
                console.error('error:', error);
            }
        });
    });

    // Function to fetch projects and populate the table
    // function fetchProjects() {
    //     $.ajax({
    //         type: "GET",
    //         url: "/getprojects",
    //         dataType: "json",
    //         success: function(response) {
    //             var tableBody = $('#project-table-body');
    //             tableBody.empty();
    //             if (response.projects) {
    //                 response.projects.forEach(function(project) {
    //                     var row = `<tr data-title="${project.id}">
    //                         <td>${project.title}</td>
    //                         <td>${project.source}</td>
    //                         <td>${project.description}</td>                            
    //                         <td>
    //                             <button class="btn btn-primary open-btn">Open</button>
    //                             <button class="btn btn-danger close-btn">Close</button>
    //                         </td>
    //                     </tr>`;
    //                     tableBody.append(row);
    //                 });
    //                 // Attach event listeners to buttons after table update
    //                 attachEventListeners();
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Ajax error:", xhr.responseText);
    //         }
    //     });
    // }
    // fetchProjects();
});
</script>
  <!-- End custom js for this page-->
</body>
</html>

