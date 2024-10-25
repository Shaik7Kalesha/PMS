<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Attendance Marking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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

        .btn-present {
            background-color: #28a745;
            color: white;
        }

        .btn-absent {
            background-color: #dc3545;
            color: white;
        }

        .btn-present:hover,
        .btn-absent:hover {
            opacity: 0.9;
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
    <!-- Header section (you can customize or add more functionality here) -->
    @include('member.header')

    <div class="container mt-5">
        <div class="header">Assigned Students</div>
        <!-- Table to display the list of students -->
        <table class="table table-hover table-bordered">
            <thead>
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

    <!-- Include jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Setup CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Function to load the list of students
            function loadStudents() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_student1", // URL to fetch the student data
                    dataType: "json",
                    success: function (response) {
                        var tableBody = $('#students-table-body');
                        tableBody.empty(); // Clear the existing data

                        // Check if the student list is available
                        if (response.studentlist && response.studentlist.length) {
                            // Loop through each student and append a row to the table
                            response.studentlist.forEach(function (student) {
                                var row = `<tr>
                                    <td>${student.regno}</td>
                                    <td>${student.name}</td>
                                    <td>
                                        <button class="btn btn-present" data-id="${student.id}">Present</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-absent" data-id="${student.id}">Absent</button>
                                    </td>
                                </tr>`;
                                tableBody.append(row);
                            });
                        } else {
                            // Display a message if no students are found
                            tableBody.append('<tr><td colspan="4" class="text-center">No students found.</td></tr>');
                        }
                    },
                    error: function (xhr) {
                        console.error("Error fetching student data:", xhr.responseText);
                    }
                });
            }

            // Function to mark attendance (Present/Absent)
            function markAttendance(studentId, status) {
                $.ajax({
                    type: "POST",
                    url: "/mark_attendance", // URL to mark attendance
                    data: { id: studentId, status: status },
                    success: function (response) {
                        alert(`Marked student as ${status}`);
                        loadStudents(); // Reload the student list after marking attendance
                    },
                    error: function (xhr) {
                        console.error("Error marking attendance:", xhr.responseText);
                    }
                });
            }

            // Load students when the page is ready
            loadStudents();

            // Handle Present button click
            $(document).on('click', '.btn-present', function () {
                var studentId = $(this).data('id');
                markAttendance(studentId, 'present'); // Mark as present
            });

            // Handle Absent button click
            $(document).on('click', '.btn-absent', function () {
                var studentId = $(this).data('id');
                markAttendance(studentId, 'absent'); // Mark as absent
            });
        });
    </script>
</body>

</html>
