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
    .card-body {
      overflow: scroll;
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
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <!-- partial -->

      <!-- main-panel -->
      <div class="main-panel" style="background: #fff">
          <!-- Table to display Batch data -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" id="projects-table-body">
                  <h4 class="card-title">Project List</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Project Title</th>
                        <th scope="col">Batch/year</th>
                        <th scope="col">Team</th>
                        <th scope="col">Developers</th>
                        <th scope="col">Platform</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        
                        
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="project-table-body">
                      <!-- Project data will go here -->
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Modal for Project Update -->
              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalToggleLabel">Update Project</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="project-form">
                        <input type="hidden" id="project_id" name="project_id">
                        @csrf
                        <div class="mb-3">
                          <label for="title" class="form-label">Project Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Project Title">
                        </div>
                        <div class="mb-3">
                          <label for="batch_name" class="form-label">Batch</label>
                          <select class="form-control" id="batch_name" name="batch_year">
                            <!-- Options will be dynamically added here -->
                          </select>
                        </div>
                        <div class="mb-3">
    <label for="team_name" class="form-label">Team</label>
    <select class="form-control" id="team_name" name="team" placeholder="Team Name">
        <!-- Options will be dynamically added here -->
    </select>
</div>
<div class="mb-3">
    <label for="developer" class="form-label">Developer</label>
    <select class="form-control" id="developer" name="developers" placeholder="Developer">
        <!-- Options will be dynamically added here -->
    </select>
</div>
                        <div class="mb-3">
                          <label for="platform" class="form-label">Platform</label>
                          <input type="text" class="form-control" id="platform" name="platform" placeholder="Platform">
                        </div>
                        <div class="mb-3">
    <label for="student_name" class="form-label">Student</label>
    <select class="form-control" id="student_name" name="student_name" placeholder="Student">
        <!-- Options will be dynamically added here -->
    </select>
</div>
                        <div class="mb-3">
                          <label for="start_date" class="form-label">Start Date</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                        </div>
                        <div class="mb-3">
                          <label for="end_date" class="form-label">End Date</label>
                          <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control" id="description" name="description" placeholder="Project Description"></textarea>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                        </div>
                      </form>
                      <div id="response-message" class="mt-4"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of Modal -->

              <!-- Modal for Team Update -->
              <div class="modal fade" id="teamModal" aria-hidden="true" aria-labelledby="teamModalLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="teamModalLabel">Update Team</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="team-form">
                        <input type="hidden" id="team_id" name="team_id">
                        @csrf
                        <div class="mb-3">
                          <label for="team_name_modal" class="form-label">Team Name</label>
                          <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name">
                        </div>
                        <div class="mb-3">
                          <label for="team_description" class="form-label">Team Description</label>
                          <textarea class="form-control" id="team_description" name="team_description" placeholder="Team Description"></textarea>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                        </div>
                      </form>
                      <div id="team-response-message" class="mt-4"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of Team Modal -->
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    // CSRF token setup for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to fetch projects and populate the table
    function fetchProjects() {
        $.ajax({
            type: "GET",
            url: "/getprojects",
            dataType: "json",
            success: function(response) {
                var tableBody = $('#project-table-body');
                tableBody.empty();
                if (response.projects) {
                    response.projects.forEach(function(project) {
                        var editButton = project.status.toLowerCase() === 'accepted' ? 
                            `<a class="editbtn btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${project.id}">Edit</a>` : '';
                        var row = `<tr data-title="${project.id}">
                            <td>${project.title}</td>
                            <td>${project.batch_year}</td>
                            <td>${project.team}</td>
                            <td>${project.developers}</td>
                            <td>${project.platform}</td>
                            <td>${project.student_name}</td>
                            <td>${project.start_date}</td>
                            <td>${project.end_date}</td>
                            <td>${project.description}</td>
                            <td>${project.status}</td>
                            <td>
                                <button class="accept-btn btn btn-primary">Accept</button>
                                <button class="reject-btn btn btn-danger">Reject</button>
                                ${editButton}
                            </td>
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
    fetchProjects();

    // Click Event for Edit Button
    $(document).on('click', '.editbtn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var status = $(this).closest('tr').find('td:eq(9)').text().trim(); // Assuming status is in the 9th column, adjust if necessary

        if (status.toLowerCase() === 'accepted') {
            $.ajax({
                type: "GET",
                url: "/edit_project/" + id,
                dataType: "json",
                success: function(response) {
                    var project = response.project;
                    $('#project_id').val(project.id); // Ensure the project ID is set here
                    $('#title').val(project.title);
                    $('#batch_name').val(project.batch_year); // Ensure correct ID for batch/year
                    $('#team_name').val(project.team); // Adjust according to your data
                    $('#developer').val(project.developers);
                    $('#platform').val(project.platform);
                    $('#student_name').val(project.student_name);
                    $('#start_date').val(project.start_date);
                    $('#end_date').val(project.end_date);
                    $('#description').val(project.description);
                    $('#exampleModalToggle').modal('show'); // Open the modal only if the status is accepted
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        } else if (status.toLowerCase() === 'rejected') {
            alert("You cannot edit projects that are in 'Rejected' status.");
        }
    });

    // Ensure that the modal is hidden after an alert if it was shown before
    $(document).on('click', '.reject-btn', function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').data('title');

        $.ajax({
            type: "POST",
            url: "/reject_project/" + id,
            dataType: "json",
            success: function(response) {
                alert(response.message);
                location.reload();
                fetchProjects(); // Reload projects after update
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    });

    // Form submission handler
    $('#project-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        var id = $('#project_id').val(); // Ensure this ID is correct
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/update_project/" + id, // Check this URL
            data: formData,
            success: function(response) {
                if (response.status == 'success') {
                    alert("Project data updated successfully!");
                    location.reload();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX Request Error: " + xhr.responseText);
            }
        });
    });

    // Function to fetch batches
    function fetchBatchOptions() {
        $.ajax({
            type: "GET",
            url: "/getbatches",  // Replace with your Laravel route to fetch batches
            dataType: "json",
            success: function(response) {
                var batchSelect = $('#batch_name');
                batchSelect.empty();
                if (response.batches) {
                    response.batches.forEach(function(batch) {
                        var option = $('<option></option>').attr('value', batch.batch_name).text(batch.batch_name);
                        batchSelect.append(option);  // Append the option to the select element
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Call the function to fetch batches and populate dropdown
    fetchBatchOptions();

    // Function to fetch teams and populate modal
    function fetchTeams() {
        $.ajax({
            type: "GET",
            url: "/getTeams",  // Replace with your Laravel route to fetch teams
            dataType: "json",
            success: function(response) {
                var teamSelect = $('#team_name');
                teamSelect.empty();
                if (response.teams) {
                    response.teams.forEach(function(team) {
                        var option = $('<option></option>').attr('value', team.team_name).text(team.team_name);
                        teamSelect.append(option);  // Append the option to the select element
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Function to fetch members and populate modal
    function fetchMembers() {
        $.ajax({
            type: "GET",
            url: "/getMembers",  // Replace with your Laravel route to fetch members
            dataType: "json",
            success: function(response) {
                var memberSelect = $('#developer');
                memberSelect.empty();
                if (response.members) {
                    response.members.forEach(function(member) {
                        var option = $('<option></option>').attr('value', member.name).text(member.name);
                        memberSelect.append(option);  // Append the option to the select element
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Call the functions to fetch teams and members
    fetchTeams();
    fetchMembers();

    // Function to fetch students and populate modal
    function fetchStudents() {
        $.ajax({
            type: "GET",
            url: "/getStudents",  // Replace with your Laravel route to fetch students
            dataType: "json",
            success: function(response) {
                var studentSelect = $('#student_name');
                studentSelect.empty();
                if (response.students) {
                    response.students.forEach(function(student) {
                        studentSelect.append(`<option value="${student.name}">${student.name}</option>`);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Call the function to fetch students and populate dropdown
    fetchStudents();

    // Attach event listeners to dynamically added buttons
    function attachEventListeners() {
        $(document).on('click', '.accept-btn', function(e) {
            e.preventDefault();
            var id = $(this).closest('tr').data('title');

            $.ajax({
                type: "POST",
                url: "/accept_project/" + id,
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                    location.reload();
                    fetchProjects(); // Reload projects after update
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        });
    }
</script>

  <!-- End custom js for this page-->
</body>
</html>
