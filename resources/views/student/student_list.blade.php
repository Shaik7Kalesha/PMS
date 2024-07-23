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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-scroller">
    <!-- Sidebar and Header -->
    @include('admin.sidebar')
    @include('admin.header')
    <!-- Main Content -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="text-center">
          <h3>STUDENT LIST</h3>
        </div>
        <div class="content-wrapper">
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
            <tbody id="students-table-body"></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Student Registration Modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered mem-reg modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Student Registration</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
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
                      <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                      <label for="password">Password</label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password"
                        required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="department">Department</label>
                      <input class="form-control" id="department" name="department" type="text" placeholder="Department"
                        required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="batch_year">Batch/Year</label>
                      <input class="form-control" id="batch_year" name="batch_year" type="text" placeholder="Batch/Year"
                        required>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                      <label for="mentor_name">Mentor Name</label>
                      <input class="form-control" id="mentor_name" name="mentor_name" type="text"
                        placeholder="Mentor Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="mentor_number">Mentor Number</label>
                      <input class="form-control" id="mentor_number" name="mentor_number" type="text"
                        placeholder="Mentor Number" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="student_number">Student Number</label>
                      <input class="form-control" id="student_number" name="student_number" type="text"
                        placeholder="Student Number" required>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-6 col-md-4">
                      <label for="guide" class="form-label">Guide</label>
                      <select class="form-control" id="guide" name="guide" placeholder="Guide" required>
                        <option value="">Select Guide</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="title">Title</label>
                      <select class="form-control" id="title" name="project_title" required>
                        <option value="">Select Title</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <label for="description">Description</label>
                      <select class="form-control" id="description" name="project_description" required>
                        <option value="">Select Description</option>
                      </select>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="update_student btn btn-primary mt-2"><i class="fas fa-paper-plane"></i>
                      Update</button>
                  </div>
                </form>
                <div id="response-message" class="mt-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    

  </div>
  <!-- Script Files -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/hoverable-collapse.js"></script>
  <script src="admin/assets/js/misc.js"></script>
  <script src="admin/assets/js/settings.js"></script>
  <script src="admin/assets/js/todolist.js"></script>
  <script src="admin/assets/js/dashboard.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
   
    $(document).ready(function () {
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
      // Function to load student data
      function loadStudents() {
        $.ajax({
          type: "GET",
          url: "/student_list",
          dataType: "json",
          success: function (response) {
            var tableBody = $('#students-table-body');
            tableBody.empty();
            if (response.students && response.students.length) {
              response.students.forEach(function (student) {
                var data = `<tr>
                            <td>${student.regno}</td>
                            <td>${student.name}</td>
                            <td>${student.email}</td>
                            <td>${student.department}</td>
                            <td>${student.batch_year}</td>
                            <td>${student.mentor_name}</td>
                            <td><a class="editbtn btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${student.id}">Edit</a></td>
                            <td><a class="accept-btn btn btn-primary" data-id="${student.id}">Accept</a></td>
                            <td><a class="reject-btn btn btn-danger" data-id="${student.id}">Reject</a></td>
                        </tr>`;
                tableBody.append(data);
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      // Function to load student data when the page loads
      loadStudents();

      // Function to handle edit button click and populate modal
      $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        // AJAX request to fetch student data
        $.ajax({
          type: "GET",
          url: "/edit_student/" + id,
          dataType: "json",
          success: function (response) {
            if (response.student) {
              var student = response.student;
              $('#regno').val(student.regno);
              $('#name').val(student.name);
              $('#email').val(student.email);
              $('#password').val(student.password); // Ensure you handle passwords securely
              $('#department').val(student.department);
              $('#batch_year').val(student.batch_year);
              $('#mentor_name').val(student.mentor_name);
              $('#mentor_number').val(student.mentor_number);
              $('#student_number').val(student.student_number);

              // Set selected guide and project details in the modal
              $('#guide').val(student.member_id); // Assuming member_id is used for guide selection
              $('#title').val(student.project_title);
              $('#description').val(student.project_description);

              $('#exampleModalToggle').modal('show'); // Show the modal with populated data
            } else {
              console.error("No student found in the response");
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });

      // Function to handle form submission for updating student data
      $('#student-form').on('submit', function (e) {
        e.preventDefault();

        // Example: Fetch member_id from #guide dropdown or any other source
        var id = $('#regno').val(); // Assuming this should be the student ID, not regno

        var member_id = $('#guide').val();
        var formData = $(this).serialize();

        // Add member_id to formData if not directly from form fields
        formData += '&member_id=' + member_id;

        $.ajax({
          type: "POST",
          url: "/update-student/" + id,
          data: formData,
          success: function (response) {
            if (response.status === 'success') {
              alert("Student data updated successfully!");
              location.reload(); // Reload the page after successful update
            } else {
              console.error("Error:", response.message);
              alert("Error: " + response.message);
            }
          },
          error: function (xhr, status, error) {
            console.error("AJAX Request Error:", xhr.responseText);
            alert("AJAX Request Error: " + xhr.responseText);
          }
        });
      });


      // Function to handle accepting a student
      $(document).on('click', '.accept-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        // AJAX request to accept student
        $.ajax({
          type: "POST",
          url: "/accept_student/" + id,
          dataType: "json",
          success: function (response) {
            alert(response.message);
            loadStudents(); // Reload student list after action
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });

      // Function to handle rejecting a student
      $(document).on('click', '.reject-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        // AJAX request to reject student
        $.ajax({
          type: "POST",
          url: "/reject_student/" + id,
          dataType: "json",
          success: function (response) {
            alert(response.message);
            loadStudents(); // Reload student list after action
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });

      // Function to populate guide and project dropdowns in the modal
      $('#exampleModalToggle').on('show.bs.modal', function () {
        getMembersAndProjects();
      });

      // Function to fetch guide and project data
      function getMembersAndProjects() {
        // AJAX request to fetch guides (members)
        $.ajax({
          type: "GET",
          url: "/getmember",
          dataType: "json",
          success: function (response) {
            var memberSelect = $('#guide');
            memberSelect.empty();
            if (response.getmember) {
              response.getmember.forEach(function (member) {
                var option = $('<option></option>').attr('value', member.bioid).text(member.name);
                memberSelect.append(option);
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });

        // AJAX request to fetch projects
        $.ajax({
          type: "GET",
          url: "/getproject",
          dataType: "json",
          success: function (response) {
            var projectSelect = $('#title');
            var descriptionSelect = $('#description');
            projectSelect.empty();
            descriptionSelect.empty();
            projectSelect.append('<option value="">Select Title</option>');
            descriptionSelect.append('<option value="">Select Description</option>');
            if (response.projects) {
              response.projects.forEach(function (project) {
                var projectOption = $('<option></option>')
                  .attr('value', project.title)
                  .attr('data-description', project.description) // Add description as a data attribute
                  .text(project.title);
                projectSelect.append(projectOption);

                var descriptionOption = $('<option></option>')
                  .attr('value', project.description)
                  .text(project.description);
                descriptionSelect.append(descriptionOption);
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      // Function to update project description based on selected project title
      $('#title').change(function () {
        var selectedDescription = $(this).find('option:selected').data('description');
        var descriptionSelect = $('#description');
        descriptionSelect.val(selectedDescription);
      });
    });



  </script>


</body>

</html>