<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    @include('member.header') <!-- Include your header file here -->
    <div class="container mt-5">
        <h1 class="mb-4">Student Attendance</h1>

        <!-- Success Alert -->
        <div id="success-alert" class="alert alert-success d-none"></div>

        <!-- Attendance Form
        <div class="card mb-4">
            <div class="card-header">
                Mark Attendance
            </div>
            <div class="card-body">
                <form id="attendanceForm">
                    @csrf
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="student_name" placeholder="Enter student name" required>
                        <div id="studentNameError" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="attendanceStatus" class="form-label">Status</label>
                        <select class="form-select" id="attendanceStatus" name="attendance_status" required>
                            <option value="" selected>Select Status</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                        <div id="attendanceStatusError" class="text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div> -->

        <!-- Attendance Table -->
        <div class="card">
            <div class="card-header">
                Attendance Records
            </div>
            <div class="card-body">
                <table class="table table-striped" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->student_name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($attendance->status) }}</td>
                                <td>{{ $attendance->date ? $attendance->date->format('Y-m-d') : 'N/A' }}</td> <!-- Ensure date is a Carbon instance -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#attendanceForm').on('submit', function(e) {
                e.preventDefault();
                
                // Clear previous errors and alert
                $('#studentNameError').text('');
                $('#attendanceStatusError').text('');
                $('#success-alert').addClass('d-none');

                $.ajax({
                    url: "{{ url('/attendance') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display success message
                        $('#success-alert').text(response.success).removeClass('d-none');
                        
                        // Append new attendance record to the table
                        $('#attendanceTable tbody').append(
                            `<tr>
                                <td>${response.data.id}</td>
                                <td>${response.data.student_name}</td>
                                <td>${response.data.status}</td>
                                <td>${response.data.date}</td>
                            </tr>`
                        );
                        
                        // Clear form fields
                        $('#attendanceForm')[0].reset();
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        if (errors.student_name) {
                            $('#studentNameError').text(errors.student_name[0]);
                        }
                        if (errors.attendance_status) {
                            $('#attendanceStatusError').text(errors.attendance_status[0]);
                        }
                    }
                });
            });
        });
    </script>
       @include('home.footer')
       </body>
</html>
