<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: #ffffff;
            color: #000;
        }

        .table tbody td {
            font-size: 1rem;
            padding: 1rem;
            text-transform:capitalize;
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
        th{
            
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
            color: #fff;
        }

        .buttons button {
            color: #fff;
        }
        td{
            border-left:1px solid #ccc;
            text-transform:capitalize;
        }
        td:nth-child(3){text-transform:none;}
        td:nth-child(8){text-wrap: nowrap;;}
        table{
            border:1px solid black;
        }
        thead th{
            border-left:1px solid #ccc;

        }
        

        @media (max-width:770px) {
            .project-list {
            width: 100%;
            margin: 0 auto;
        }
        .navbar {
            width: 1147px;
        }
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="container-fluid">
    <div class="text-center mb-4">
    <div class='project-list'>
                <h3>PROJECTS LIST</h3>
            </div>
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
<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="project_id" name="project_id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="batch_name">Batch/Year</label>
                        <select class="form-control" id="batch_name" name="batch_year" required></select> <!-- Ensure name matches -->
                    </div>
                    <div class="form-group">
                        <label for="team_name">Team</label>
                        <select class="form-control" id="team_name" name="team" required></select> <!-- Ensure name matches -->
                    </div>
                    <div class="form-group">
                        <label for="developer">Developers</label>
                        <select class="form-control" id="developer" name="developers" required></select> <!-- Ensure name matches -->
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input type="text" class="form-control" id="platform" name="platform" required>
                    </div>
                    <div class="form-group">
                        <label for="student_name">Student Name</label>
                        <select class="form-control" id="student_name" name="student_name" required></select> <!-- Ensure name matches -->
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


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
                        `<a class="editbtn btn btn-primary" data-toggle="modal" data-target="#editProjectModal" data-id="${project.id}">Edit</a>` : '';
                    var row = `<tr data-id="${project.id}">
                        <td style="width:290px">${project.title}</td>
                        <td>${project.batch_year}</td>
                        <td>${project.team}</td>
                        <td>${project.developers}</td>
                        <td>${project.platform}</td>
                        <td>${project.student_name}</td>
                        <td style="width:190px">${project.description}</td>
                        <td >
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
            console.error("Ajax error:", xhr.status, xhr.statusText);
            console.error("Response:", xhr.responseText); // Log the response text to understand the issue
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
                            var option = $('<option></option>').attr('value', member.name).text(member.name);
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
                url: "/getStudets",
                dataType: "json",
                success: function (response) {
                    var studentSelect = $('#student_name');
                    studentSelect.empty();
                    if (response.students) {
                        response.students.forEach(function (student) {
                            var option = $('<option></option>').attr('value', student.name).text(student.name);
                            studentSelect.append(option);
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        }

        // Attach event listeners
        function attachEventListeners() {
            $('.accept-btn').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/accept_project/" + id,
                    success: function (response) {
                        fetchProjects();
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            $('.reject-btn').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/reject_project/" + id,
                    success: function (response) {
                        fetchProjects();
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            // Handle edit project button click
            $('.editbtn').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/getproject/" + id,
                    dataType: "json",
                    success: function (response) {
                        var project = response.project;
                        if (project) {
                            $('#project_id').val(project.id);
                            $('#title').val(project.title);
                            $('#batch_name').val(project.batch_name);
                            $('#team_name').val(project.team_name);
                            $('#developer').val(project.developer);
                            $('#platform').val(project.platform);
                            $('#student_name').val(project.student_name);
                            $('#description').val(project.description);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });
        }

        $('#editProjectForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/updateproject/" + $('#project_id').val(),
                data: $(this).serialize(),
                success: function (response) {
                    $('#editProjectModal').modal('hide');
                    fetchProjects();
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        });

        $(document).ready(function () {
            fetchProjects();
            fetchBatchOptions();
            fetchTeams();
            fetchMembers();
            fetchStudents();
        });
    </script>
       @include('home.footer')
</body>

</html>