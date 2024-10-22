<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        @media (max-width: 768px) {
            .modal-dialog {
                max-width: 100%;
                margin: 0;
            }

            .modal-content {
                border-radius: 0;
            }

            .table {
                font-size: 0.8rem;
            }
        }

        .modal-content {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <!-- Main Content -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="text-center mb-4">
                <h3>STUDENT LIST</h3>
            </div>
            <div class="content-wrapper">
                <table class="table table-striped table-responsive">
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
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Student Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mt-4">
                            <form method="POST" id="student-form" action="{{ route('student_update', '') }}">
                                @csrf
                                <input type="hidden" id="student_id" name="student_id">
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="regno">Reg NO</label>
                                        <input class="form-control" id="regno" name="regno" type="text" placeholder="Reg No" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Name" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="password">Password</label>
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="department">Department</label>
                                        <input class="form-control" id="department" name="department" type="text" placeholder="Department" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="batch_year">Batch/Year</label>
                                        <input class="form-control" id="batch_year" name="batch_year" type="text" placeholder="Batch/Year" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="mentor_name">Mentor Name</label>
                                        <input class="form-control" id="mentor_name" name="mentor_name" type="text" placeholder="Mentor Name" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="mentor_number">Mentor Number</label>
                                        <input class="form-control" id="mentor_number" name="mentor_number" type="text" placeholder="Mentor Number" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="student_number">Student Number</label>
                                        <input class="form-control" id="student_number" name="student_number" type="text" placeholder="Student Number" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="update_student btn btn-primary mt-2">
                                        <i class="fas fa-paper-plane"></i> Update
                                    </button>
                                </div>
                            </form>
                            <div id="response-message" class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Load students
            function loadStudents() {
                $.ajax({
                    type: "GET",
                    url: "/student_list",
                    dataType: "json",
                    success: function (response) {
                        var tableBody = $('#students-table-body');
                        tableBody.empty();

                        if (response.students && Array.isArray(response.students)) {
                            response.students.forEach(function (student) {
                                var data = `<tr data-id="${student.id}">
                                    <td>${student.regno}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.department}</td>
                                    <td>${student.batch_year}</td>
                                    <td>${student.mentor_name}</td>
                                    <td>
                                        <a class="editbtn btn btn-primary me-2" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${student.id}">Edit</a>
                                        <a class="accept-btn btn btn-success me-2" data-id="${student.id}">Accept</a>
                                        <a class="reject-btn btn btn-danger" data-id="${student.id}">Reject</a>
                                    </td>
                                </tr>`;
                                tableBody.append(data);
                            });
                        } else {
                            console.error("Invalid response structure:", response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            }

            // Handle accept button
            $(document).on('click', '.accept-btn', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/student/accept/" + id,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        alert(response.message);
                        loadStudents(); // Reload students after accepting
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            // Handle reject button
            $(document).on('click', '.reject-btn', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/student/reject/" + id,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        alert(response.message);
                        loadStudents(); // Reload students after rejecting
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            // Edit student
            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var id = $(this).data('id');

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
                            $('#department').val(student.department);
                            $('#batch_year').val(student.batch_year);
                            $('#mentor_name').val(student.mentor_name);
                            $('#mentor_number').val(student.mentor_number);
                            $('#student_number').val(student.student_number);
                            $('#student_id').val(student.id); // Set the hidden ID field

                            // Set the action URL with the student ID for update
                            $('#student-form').attr('action', "{{ route('student_update', '') }}/" + student.id);
                        } else {
                            console.error("Invalid response structure:", response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            // Handle form submission for updating student
            $('#student-form').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    success: function (response) {
                        // Show success alert
                        $('#response-message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Student updated successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

                        // Reload the page after a brief delay (1 second)
                        setTimeout(function () {
                            loadStudents(); // Reload students after update
                            $('#exampleModalToggle').modal('hide'); // Hide the modal
                        }, 1000);
                    },
                    error: function (xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                    }
                });
            });

            // Initial load of students
            loadStudents();
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
