<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Attendance Marking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body, html {
            overflow-x: hidden;
            background-color: #ffffff;
        }
        .header {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
            margin-top: 2rem;
            padding-bottom: 0.5rem;
            text-align: center;
            /* border-bottom: 3px solid #007bff; */
        }
        .table-responsive {
            margin-top: 0; /* Remove the space between header and table */
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table-bordered th, .table-bordered td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-present, .btn-absent {
            color: #fff;
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn-present {
            background-color: #28a745;
        }
        .btn-present:hover {
            background-color: #218838;
        }
        .btn-absent {
            background-color: #dc3545;
        }
        .btn-absent:hover {
            background-color: #c82333;
        }
        .form-control {
            background-color: #ffffff !important;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    @include('member.header')

    <div class="container mt-5">
        <h2 class="header">Attendance Marking</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Reg No</th>
                        <th>Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                </thead>
                <tbody id="students-table-body">
                    <!-- Data will be dynamically injected here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Set up CSRF token for AJAX
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            // Load students data into the table
            function loadStudents() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_student1",
                    dataType: "json",
                    success: function (response) {
                        var tableBody = $('#students-table-body');
                        tableBody.empty();

                        if (response.studentlist && response.studentlist.length) {
                            response.studentlist.forEach(function (student) {
                                var row = `<tr>
                                    <td>${student.regno}</td>
                                    <td>${student.name}</td>
                                    <td><button class="btn btn-present" data-id="${student.id}">Present</button></td>
                                    <td><button class="btn btn-absent" data-id="${student.id}">Absent</button></td>
                                </tr>`;
                                tableBody.append(row);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="4" class="text-center text-muted">No students found.</td></tr>');
                        }
                    },
                    error: function (xhr) {
                        console.error("Error fetching student data:", xhr.responseText);
                    }
                });
            }

            // Mark attendance status for students
            function markAttendance(studentId, status) {
                $.ajax({
                    type: "POST",
                    url: "/mark_attendance",
                    data: { id: studentId, status: status },
                    success: function (response) {
                        alert(`Marked student as ${status}`);
                        loadStudents(); // Reload the table after updating attendance
                    },
                    error: function (xhr) {
                        console.error("Error marking attendance:", xhr.responseText);
                    }
                });
            }

            // Load students when page loads
            loadStudents();

            // Event listeners for Present and Absent buttons
            $(document).on('click', '.btn-present', function () {
                var studentId = $(this).data('id');
                markAttendance(studentId, 'present');
            });

            $(document).on('click', '.btn-absent', function () {
                var studentId = $(this).data('id');
                markAttendance(studentId, 'absent');
            });
        });
    </script>
</body>

</html>
