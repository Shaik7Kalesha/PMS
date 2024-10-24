<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .header {
            margin: 2rem 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: black;
            border-bottom: 2px solid #000000;
            padding-bottom: 0.5rem;
        }

        .modal-header {
            background-color: #007bff;
            color: #fff;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .table td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        body,
        html {
            overflow-x: hidden;
            background-color: #ffffff;
        }

        .form-control {
            background-color: #fff !important;
            color: #000000;
        }
    </style>
</head>

<body>
    @include('member.header')

    <div class="container mt-5">
        <div class="header">Assigned Students</div>
        <table class="table table-hover table-bordered">
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
                <!-- Data will be injected here via AJAX -->
            </tbody>
        </table>

        <!-- Task Modal -->
        <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel"
            aria-hidden="true">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
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
                    success: function (response) {
                        var tableBody = $('#students-table-body');
                        tableBody.empty();
                        if (response.studentlist && response.studentlist.length) {
                            response.studentlist.forEach(function (student) {
                                var data = `<tr>
                                    <td>${student.regno}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.project_title}</td>
                                    <td>${student.mentor_name}</td>
                                    <td>
                                        <a class="accept-btn btn btn-primary" data-id="${student.id}" data-toggle="modal" data-target="#taskModal">Add Task</a>
                                        <a class="btn btn-danger" href="/view_report/${student.id}">View Report</a>
                                    </td>
                                </tr>`;
                                tableBody.append(data);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="6" class="text-center">No students assigned yet.</td></tr>');
                        }
                    },
                    error: function (xhr) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            }

            loadStudents();

            // Fetch project title and description when "Add Task" button is clicked
            $(document).on('click', '.accept-btn', function () {
                var studentId = $(this).data('id');
                $('#student_id').val(studentId); // Set student_id in the modal form

                // Fetch project details for the selected student
                $.ajax({
                    type: "GET",
                    url: `/fetch_project/${studentId}`,
                    success: function (response) {
                        if (response.success) {
                            // Populate the form with the project title and description
                            $('#title').val(response.project.title);
                            $('#description').val(response.project.description);
                        } else {
                            alert("Project details not found for this student.");
                        }
                    },
                    error: function (xhr) {
                        console.error("Error fetching project details:", xhr.responseText);
                    }
                });
            });

            // Handle task form submission
            $('#taskForm').on('submit', function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('add_task') }}",
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            alert("Task added successfully");
                            $('#taskModal').modal('hide');
                        } else {
                            alert("Failed to add task");
                        }
                    },
                    error: function (xhr) {
                        console.error("Form submission error:", xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>
