<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .table th {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>
    @include('student.header')

    <div class="container mt-4">
        <h1 class="text-center mb-4">Attendance List</h1>
        
        <table class="table table-striped" id="attendanceTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Attendance rows will be appended here -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Fetch attendance records on page load
            fetchAttendance();

            function fetchAttendance() {
                $.ajax({
                    url: "{{ route('fetchattendenceuser') }}", // AJAX URL
                    method: "GET",
                    success: function(data) {
                        // Clear the existing table body
                        $('#attendanceTable tbody').empty();

                        // Populate the table with the fetched data
                        $.each(data, function(index, record) {
                            let statusBadge = record.attendence_status == 'present' ? 'bg-success' : 'bg-danger';
                            $('#attendanceTable tbody').append(`
                                <tr>
                                    <td>${record.id}</td>
                                    <td>${record.name}</td>
                                    <td>${record.updated_at}</td>
                                    <td>${record.attendance_status}</td>
                                    
                                </tr>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: ", error);
                    }
                });
            }
        });
    </script>
</body>
</html>
