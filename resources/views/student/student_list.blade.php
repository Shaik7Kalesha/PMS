

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student List</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        <div class="main-panel">
        <div class="text-center">
            <h3>STUDENT LIST</h3>
        </div>
        <div class="content-wrapper">
          <div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Reg NO</th>

                            <th scope="col">Name</th>

                            <th scope="col">Email</th>

                            <th scope="col">Department</th>
                            
                            <th scope="col">Batch and Year</th>

                            <th scope="col">Mentor</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="students-table-body">
                               
                        </tbody>
                </table>
         </div>    
     </div>

      <!-- Modal for Student Registration -->
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered mem-reg modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Student Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container">
        <!-- <div class="text-center">
            <h3>STUDENT REGISTRATION</h3>
        </div> -->
        <div class="mt-4">
            <form method="POST" id="student-form" action="{{ route('student_store') }}">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="regno">Reg NO</label>
                        <input class="form-control" id="regno" name="regno" type="text" placeholder="Reg No" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Email" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="department">Department</label>
                        <input class="form-control" id="department" name="department" type="text" placeholder="Department" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="batch_year">Batch/Year</label>
                        <input class="form-control" id="batch_year" name="batch_year" type="text" placeholder="Batch/Year" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="mentor_name">Mentor Name</label>
                        <input class="form-control" id="mentor_name" name="mentor_name" type="text" placeholder="Mentor Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="mentor_number">Mentor Number</label>
                        <input class="form-control" id="mentor_number" name="mentor_number" type="text" placeholder="Mentor Number" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="student_number">Student Number</label>
                        <input class="form-control" id="student_number" name="student_number" type="text" placeholder="Student Number" required>
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="update_student btn btn-primary mt-2"><i class="fas fa-paper-plane"></i>Update</button>
                </div>
              </form>
              <!-- Response message placeholder -->
              <div id="response-message" class="mt-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
              integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

              <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/student_list",
                dataType: "json",
                success: function(response) {
                    console.log("AJAX response:", response);
                    var tableBody = $('#students-table-body');
                    tableBody.empty();
                    if(response.students && response.students.length) {
                        response.students.forEach(function(student) {
                            var data = `<tr>
                                <td>${student.regno}</td>
                                <td>${student.name}</td>
                                <td>${student.email}</td>
                                <td>${student.department}</td>
                                <td>${student.batch_year}</td>
                                <td>${student.mentor_name}</td>
                                <td><a class="editbtn btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${student.id}">Edit</a></td>
                                <td><a class="accept-btn btn btn-primary" data-id="${student.id}">Accept</a></td>
                                <td><a class="reject-btn btn btn-danger"  data-id="${student.id}">Reject</a></td>                                
                            </tr>`;
                            tableBody.append(data);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        

        // AJAX Request for Edit Student Data
        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            
            $.ajax({
                type: "GET",
                url: "/edit_student/" + id,
                dataType: "json",
                success: function(response) {
                    if(response.student) {
                        var student = response.student;
                        $('#regno').val(student.id); // Assuming regno is the unique ID
                        $('#name').val(student.name);
                        $('#email').val(student.email);
                        $('#password').val(student.password);
                        $('#department').val(student.department);
                        $('#batch_year').val(student.batch_year);
                        $('#mentor_name').val(student.mentor_name);
                        $('#mentor_number').val(student.mentor_number);
                        $('#student_number').val(student.student_number);
                        
                        $('#exampleModalToggle').modal('show'); // Open the modal
                    } else {
                        console.error("No student found in the response");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        });

        // AJAX Request to Modify Student Data
        $('#student-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            var id = $('#regno').val(); // This should be the unique ID
            var formData = $(this).serialize();


            $.ajax({
                type: "POST",
                url: "/update-student/" + id,
                data: formData,
                success: function(response) {
                    console.log("Response:", response); // Debugging log

                    if (response.status === 'success') {
                        alert("Student data updated successfully!");
                        location.reload(); // Optionally, you can perform actions after successful update
                    } else {
                        console.error("Error:", response.message);
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", xhr.responseText); // Log the error response to the console
                    alert("AJAX Request Error: " + xhr.responseText); // Display the error response to the user
                    // Optionally, handle AJAX errors
                }
            });
        });
    });
     //accept code
     $(document).on('click', '.accept-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        type: "POST",
        url: "/accept_student/" + id,
        dataType: "json",
        success: function(response) {
            alert(response.message);
            // Optionally, reload the members list
            loadStudents();
        },
        error: function(xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
        }
    });
});

//reject code 
$(document).on('click', '.reject-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        type: "POST",
        url: "/reject_student/" + id,
        dataType: "json",
        success: function(response) {
            alert(response.message);
            // Optionally, reload the members list
            loadStudents();
        },
        error: function(xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
        }
    });
});




</script>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
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
