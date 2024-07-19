<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Home</title>
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
        table.table-hover tbody tr:hover {
            background-color: white !important;
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
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Table to display students -->
                    <h2 class="text-center">Assigned Students</h2>
                    <table class="table table-bordered ">
                        <thead class="thead-light">
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
                            <!-- Students will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        
        <!-- Modal HTML -->
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
                            <div class="form-group">
                                <label for="taskName">Task Name</label>
                                <input type="text" class="form-control" id="taskName" name="taskName" required>
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">Task Title</label>
                                <input type="text" class="form-control" id="taskTitle" name="taskTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="taskDescription">Task Description</label>
                                <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="taskDate">Task Date</label>
                                <input type="date" class="form-control" id="taskDate" name="taskDate" required>
                            </div>
                            <div class="form-group">
                                <label for="taskEta">ETA</label>
                                <input type="time" class="form-control" id="taskEta" name="taskEta" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Full version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // Function to load student data
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
                                        <a class="accept-btn btn btn-primary" data-id="${student.id}" data-toggle="modal" data-target="#taskModal">ADD TASK</a>
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

            // Function to load student data when the page loads
            loadStudents();

            // Handle form submission
            $('#taskForm').submit(function(e) {
                e.preventDefault();
                
                var studentId = $(this).data('student-id');
                var formData = $(this).serialize() + `&studentId=${studentId}`;
                
                $.ajax({
                    type: "POST",
                    url: "/add_task",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#taskModal').modal('hide');
                            alert('Task added successfully!');
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
</body>
</html>
