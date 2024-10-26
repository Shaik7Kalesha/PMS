<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .header {
            font-size: 1.5rem;
            font-weight: 600;
            color: black;
            border-bottom: 2px solid #000;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .modal-header {
            background-color: #007bff;
            color: #fff;
        }
        .table td {
            word-wrap: break-word;
        }
        body {
            background-color: #fff;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    @include('member.header')

    <div class="container-fluid mt-4">
        <div class="header text-center">Assigned Students</div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered w-100 mx-auto">
                <thead class="thead-light">
                    <tr>
                        <th>Student ID</th>
                        <th>Member ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Task Name</th>
                        <th>Task Date</th>
                        <th>ETA</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="students-table-body">
                    <!-- Data will be injected here via AJAX -->
                </tbody>
            </table>
        </div>

        <!-- Task Modal -->
        <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
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
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
                                    <td>${student.id}</td>
                                    <td>${student.member_id || 'N/A'}</td>
                                    <td>${student.project_title || 'N/A'}</td>
                                    <td>${student.project_description || 'N/A'}</td>
                                    <td>${student.task_name || 'N/A'}</td>
                                    <td>${student.task_date || 'N/A'}</td>
                                    <td>${student.eta || 'N/A'}</td>
                                    <td>${student.status || 'N/A'}</td>
                                    <td>
                                        <a class="accept-btn btn btn-primary" data-id="${student.id}" data-project-title="${student.project_title}" data-project-description="${student.project_description}" data-toggle="modal" data-target="#taskModal" style="text-wrap:nowrap;">Add Task</a>
                                    </td>
                                </tr>`;
                                tableBody.append(data);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="10" class="text-center">No students assigned yet.</td></tr>');
                        }
                    },
                    error: function (xhr) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            }

            loadStudents();

            $(document).on('click', '.accept-btn', function () {
                $('#student_id').val($(this).data('id'));
                $('#title').val($(this).data('project-title'));
                $('#description').val($(this).data('project-description'));
                $('#task_name').val("");
                $('#task_date').val("");
                $('#eta').val("");
                $('#status').val("pending");
                $('#taskForm').data('action', "{{ route('add_task') }}");
            });

            $('#taskForm').on('submit', function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var actionUrl = $(this).data('action');

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            alert("Task saved successfully");
                            $('#taskModal').modal('hide');
                            loadStudents();
                        } else {
                            alert("Failed to save task: " + response.message);
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
