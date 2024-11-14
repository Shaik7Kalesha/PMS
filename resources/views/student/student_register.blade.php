<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Registration</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

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
        .form-floating label {
            padding-left: 1rem;
        }
        .registration-container {
            display: flex;
            align-items: stretch; /* Change to stretch to match heights */
            justify-content: center;
            min-height: 100vh;
            padding: 30px
        }
        .image-container img {
            width: 100%;
            height: 824px; /* Keep your specific height here */
            object-fit: cover; /* Ensure the image covers the space */
        }
        .form-container {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 824px; /* Set height to match the image */
            /* overflow-y: auto; Allow scrolling if content overflows */
        }
        .form-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container registration-container">
        <div class="row w-100">
        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
        <img src="../images/member.logo.jpg" alt="Registration Image" style="height:824px" class="form-image">
            </div>
            <div class="col-md-6 form-container">
            <div class="text-center">
                    <h3>STUDENT REGISTRATION</h3>
                </div>
                <div class="mt-4">
                <form method="POST" id="student-form" action="{{ route('student_store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="regno" name="regno" placeholder="Reg No" required>
                                <label for="regno">Reg No</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <label for="name">Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                <label for="email">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="department" name="department" placeholder="Department" required>
                                <label for="department">Department</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="batch_year" name="batch_year" placeholder="Batch/Year" required>
                                <label for="batch_year">Batch/Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mentor_name" name="mentor_name" placeholder="Mentor Name" required>
                                <label for="mentor_name">Mentor Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mentor_number" name="mentor_number" placeholder="Mentor Number" required>
                                <label for="mentor_number">Mentor Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Student Number" required>
                                <label for="student_number">Student Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#student-form').submit(function (event) {
                event.preventDefault();

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
                    url: "{{ route('student_store') }}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 200) {
                            alert(response.message || 'Student added successfully');
                            window.location.reload();
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