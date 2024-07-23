<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* General Table Hover Effect */
        table.table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Header Style */
        .header {
            margin: 2rem 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: black; /* Bootstrap primary color */
            border-bottom: 2px solid #000000;
            padding-bottom: 0.5rem;
        }

        /* Modal Header */
        .modal-header {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            border-bottom: 1px solid #e5e5e5;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 500;
        }

        /* Modal Body */
        .modal-body {
            padding: 2rem;
        }

        /* Form Labels */
        .form-group label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Form Controls */
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        /* Input Focus */
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        /* Button Styles */
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Modal Footer */
        .modal-footer {
            border-top: 1px solid #e5e5e5;
            padding: 1rem;
        }

        /* Error Message Styles */
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
        }
        
        .table td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .container {
            overflow-y: scroll;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('member.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('member.header')
            <!-- partial -->
            <div class="container mt-5">
                <!-- Header above the table -->
                <div class="header">Assigned Students</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Reg No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Project Title</th>
                            <th>Mentor Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="students-table-body">
                        <!-- Student data will be loaded here -->
                    </tbody>
                </table>

                <!-- Task Modal -->
                <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="taskModalLabel">Add Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="taskForm">
                                    <input type="hidden" name="student_id" id="student_id">
                                    <input type="hidden" name="member_id" value="{{ auth()->user()->member_id }}">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="task_name">Task Name</label>
                                        <input type="text" class="form-control" name="task_name" id="task_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="task_date">Task Date</label>
                                        <input type="date" class="form-control" name="task_date" id="task_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="eta">ETA</label>
                                        <input type="date" class="form-control" name="eta" id="eta" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="completed_date">Completed Date</label>
                                        <input type="date" class="form-control" name="completed_date" id="completed_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="pending">Pending</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full version of jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function loadStudents() {
                    $.ajax({
                        type: "GET",
                        url: "/fetch_student",
                        dataType: "json",
                        success: function(response) {
                            var tableBody = $('#students-table-body');
                            tableBody.empty();
                            if (response.studentlist && response.studentlist.length) {
                                response.studentlist.forEach(function(student) {
                                    var data = `<tr>
                                        <td>${student.regno}</td>
                                        <td>${student.name}</td>
                                        <td>${student.email}</td>
                                        <td>${student.project_title}</td>
                                        <td>${student.mentor_name}</td>
                                        <td>
                                            <a class="accept-btn btn btn-primary" data-name="${student.name}" data-toggle="modal" data-target="#taskModal">ADD TASK</a>
                                            <a class="reject-btn btn btn-danger" data-id="${student.id}">VIEW REPORT</a>
                                        </td>
                                    </tr>`;
                                    tableBody.append(data);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Ajax error:", xhr.responseText);
                        }
                    });
                }

                loadStudents();

                $(document).on('click', '.accept-btn', function() {
                    var studentName = $(this).data('name');
                    $('#student_id').val(studentName);

                    // Fetch the project details and populate the modal form
                    $.ajax({
                        type: "GET",
                        url: "/fetch_project/" + studentName,
                        success: function(response) {
                            if (response.success) {
                                $('#title').val(response.project.title);
                                $('#description').val(response.project.description);
                            } else {
                                alert('Project not found for this student.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Ajax error:", xhr.responseText);
                        }
                    });
                });

                $('#taskForm').submit(function (e) {
                    e.preventDefault(); // Prevent the default form submission

                    // Clear previous error messages
                    $('.invalid-feedback').text('');

                    // Collect form data
                    var formData = $(this).serialize();

                    // Send the form data via AJAX
                    $.ajax({
                        type: "POST",
                        url: "{{ route('add_task') }}",
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                $('#taskModal').modal('hide');
                                alert('Task added successfully!');
                                $('#taskForm')[0].reset(); // Reset the form
                                // Optionally, update the task list or reload the page
                            } else {
                                alert('Error adding task.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Ajax error:", xhr.responseText);
                        }
                    });
                });

            });
        </script>

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
    </div>
</body>

</html>
