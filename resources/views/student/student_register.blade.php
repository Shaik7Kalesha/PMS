<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="text-center">
            <h3>STUDENT REGISTRATION</h3>
        </div>
        <div class="mt-4">
            <form method="POST" id="student-form" action="{{ route('student_store') }}">
                @csrf
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="regno">Reg NO</label>
                        <input class="form-control" id="regno" name="regno" type="text" placeholder="Reg No" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="department">Department</label>
                        <input class="form-control" id="department" name="department" type="text" placeholder="Department" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="batch_year">Batch/Year</label>
                        <input class="form-control" id="batch_year" name="batch_year" type="text" placeholder="Batch/Year" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="mentor_name">Mentor Name</label>
                        <input class="form-control" id="mentor_name" name="mentor_name" type="text" placeholder="Mentor Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="mentor_number">Mentor Number</label>
                        <input class="form-control" id="mentor_number" name="mentor_number" type="text" placeholder="Mentor Number" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="student_number">Student Number</label>
                        <input class="form-control" id="student_number" name="student_number" type="text" placeholder="Student Number" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                </div>
            </form>
            <!-- Response message placeholder -->
            <div id="response-message" class="mt-4"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intercept the form submission
            $('#student-form').submit(function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // Submit the form via AJAX
                var data = {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'regno': $('#regno').val(),
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'department': $('#department').val(),
                    'batch_year': $('#batch_year').val(),
                    'mentor_name': $('#mentor_name').val(),
                    'mentor_number': $('#mentor_number').val(),
                    'student_number': $('#student_number').val()
                };

                $.ajax({
                    type: "POST",
                    url: "{{ url('/createstudent') }}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response); // Debugging line
                        if (response.status == 200) {
                            alert(response.message || 'Student added successfully');
                            location.reload(); // Refresh the page
                        } else {
                            alert(response.message || 'An error occurred. Please try again.');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>
