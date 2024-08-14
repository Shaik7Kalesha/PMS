<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table {
            width: 100%;
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
        }

        .table tbody td {
            font-size: 1rem;
            padding: 1rem;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-of-type(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a99;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .form-control,
        .form-group label,
        .btn {
            color: #495057;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .buttons button {
            color: #fff;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <div class="container-fluid">
        <h4 class="mb-4">Project List</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Project Title</th>
                    <th scope="col">Batch/Year</th>
                    <th scope="col">Team</th>
                    <th scope="col">Developers</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="project-table-body">
                <!-- Project data will be populated here -->
            </tbody>
        </table>
    </div>

    <!-- Edit Project Modal -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProjectForm">
                        <input type="hidden" id="project_id">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="batch_name">Batch/Year</label>
                            <select class="form-control" id="batch_name"></select>
                        </div>
                        <div class="form-group">
                            <label for="team_name">Team</label>
                            <select class="form-control" id="team_name"></select>
                        </div>
                        <div class="form-group">
                            <label for="developer">Developers</label>
                            <select class="form-control" id="developer"></select>
                        </div>
                        <div class="form-group">
                            <label for="platform">Platform</label>
                            <input type="text" class="form-control" id="platform">
                        </div>
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <select class="form-control" id="student_name"></select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
    // CSRF token setup for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fetch and display projects
    function fetchProjects() {
        $.ajax({
            type: "GET",
            url: "/getprojects",
            dataType: "json",
            success: function (response) {
                var tableBody = $('#project-table-body');
                tableBody.empty();
                if (response.projects) {
                    response.projects.forEach(function (project) {
                        var editButton = project.status && project.status.toLowerCase() === 'accepted' ?
                            `<a class="editbtn btn btn-primary" data-toggle="modal" href="#editProjectModal" role="button" data-id="${project.id}">Edit</a>` : '';
                        var row = `<tr data-title="${project.id}">
                            <td>${project.title}</td>
                            <td>${project.batch_year}</td>
                            <td>${project.team}</td>
                            <td>${project.developers}</td>
                            <td>${project.platform}</td>
                            <td>${project.student_name}</td>
                            <td>${project.description}</td>
                            <td class="buttons">
                                <button class="accept-btn btn btn-primary" data-id="${project.id}">Accept</button>
                                <button class="reject-btn btn btn-danger" data-id="${project.id}">Reject</button>
                                ${editButton}
                            </td>
                        </tr>`;
                        tableBody.append(row);
                    });
                    attachEventListeners();
                } else {
                    console.log("No projects found.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Fetch and populate batch options
    function fetchBatchOptions() {
        $.ajax({
            type: "GET",
            url: "/getbatches",
            dataType: "json",
            success: function (response) {
                var batchSelect = $('#batch_name');
                batchSelect.empty();
                if (response.batches) {
                    response.batches.forEach(function (batch) {
                        var option = $('<option></option>').attr('value', batch.batch_name).text(batch.batch_name);
                        batchSelect.append(option);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Fetch and populate teams
    function fetchTeams() {
        $.ajax({
            type: "GET",
            url: "/getTeams",
            dataType: "json",
            success: function (response) {
                var teamSelect = $('#team_name');
                teamSelect.empty();
                if (response.teams) {
                    response.teams.forEach(function (team) {
                        var option = $('<option></option>').attr('value', team.team_name).text(team.team_name);
                        teamSelect.append(option);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Fetch and populate developers
    function fetchMembers() {
        $.ajax({
            type: "GET",
            url: "/getMembers",
            dataType: "json",
            success: function (response) {
                var memberSelect = $('#developer');
                memberSelect.empty();
                if (response.members) {
                    response.members.forEach(function (member) {
                        var option = $('<option></option>').attr('value', member.id).text(member.name);
                        memberSelect.append(option);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Fetch and populate students
    function fetchStudents() {
        $.ajax({
            type: "GET",
            url: "/getStudents",
            dataType: "json",
            success: function (response) {
                var studentSelect = $('#student_name');
                studentSelect.empty();
                if (response.students) {
                    response.students.forEach(function (student) {
                        var option = $('<option></option>').attr('value', student.id).text(student.name);
                        studentSelect.append(option);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }

    // Attach event listeners to buttons
    function attachEventListeners() {
        $('.accept-btn').on('click', function () {
            var projectId = $(this).data('id');
            if (confirm('Are you sure you want to accept this project?')) {
                $.ajax({
                    type: "POST",
                    url: `/accept_project/${projectId}`,
                    success: function (response) {
                        alert('Project accepted successfully!');
                        fetchProjects(); // Refresh the project list
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            }
        });

        $('.reject-btn').on('click', function () {
            var projectId = $(this).data('id');
            if (confirm('Are you sure you want to reject this project?')) {
                $.ajax({
                    type: "POST",
                    url: `/reject_project/${projectId}`,
                    success: function (response) {
                        alert('Project rejected successfully!');
                        fetchProjects(); // Refresh the project list
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            }
        });

        $('.editbtn').on('click', function () {
            var projectId = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `/getproject/${projectId}`,
                dataType: "json",
                success: function (response) {
                    if (response.project) {
                        $('#project_id').val(response.project.id);
                        $('#title').val(response.project.title);
                        $('#batch_name').val(response.project.batch_name);
                        $('#team_name').val(response.project.team_name);
                        $('#developer').val(response.project.developer);
                        $('#platform').val(response.project.platform);
                        $('#student_name').val(response.project.student_name);
                        $('#description').val(response.project.description);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        });
    }

    // Initialize the page
    $(document).ready(function () {
        fetchProjects();
        fetchBatchOptions();
        fetchTeams();
        fetchMembers();
        fetchStudents();
    });

    // Save changes to the project
    $('#editProjectForm').on('submit', function (e) {
        e.preventDefault();
        var projectId = $('#project_id').val();
        $.ajax({
            type: "POST",
            url: `/updateproject/${projectId}`,
            data: $(this).serialize(),
            success: function (response) {
                $('#editProjectModal').modal('hide');
                alert('Project updated successfully!');
                fetchProjects(); // Refresh the project list
            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    });
</script>

</body>

</html>
