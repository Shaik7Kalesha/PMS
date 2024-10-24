<!DOCTYPE html>
<html>

<head>
    <title>Member Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        body {
            background: url('https://example.com/background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            height: auto; /* Set height to auto to fit content */
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

        .text-center h3 {
            color: #000;
        }

        .form-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .container {
            max-width: 1540px !important;
        }

        img {
            height: 765px !important;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <!-- Left side image -->
            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                <img src="../images/pms-imag.jpg" alt="Registration Image" class="form-image">
            </div>

            <!-- Right side form -->
            <div class="col-lg-6 col-md-6">
                <div class="glass-effect">
                    <div class="text-center">
                        <h3>MEMBER REGISTRATION</h3>
                    </div>
                    <div class="mt-4">
                        <!-- Inside the form -->
                        <form method="POST" id="member-form" action="{{ route('member_store') }}">
                            @csrf
                            
                            <!-- First Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="bio_id" name="bioid" placeholder="Bio ID" required>
                                        <label for="bio_id">Bio ID</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="user_name" name="name" placeholder="User Name" required>
                                        <label for="user_name">User Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="personal_email" name="personal_email" placeholder="Personal Email" required>
                                        <label for="personal_email">Personal Email</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="official_email" name="official_email" placeholder="Official Email" required>
                                        <label for="official_email">Official Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID" required>
                                        <label for="employee_id">Employee ID</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Fourth Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience" required>
                                        <label for="experience">Experience</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn" required>
                                        <label for="linkedin">LinkedIn</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Fifth Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="portfolio" name="portfolio" placeholder="Portfolio" required>
                                        <label for="portfolio">Portfolio</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required>
                                        <label for="mobile_number">Mobile Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Sixth Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="tech_stack" name="tech_stack" placeholder="Tech Stack" required>
                                        <label for="tech_stack">Tech Stack</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
                                        <label for="designation">Designation</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Seventh Row -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" required>
                                        <label for="date_of_joining">Date of Joining</label>
                                    </div>
                                </div>
                                <div class="col-md-6"></div> <!-- Empty column for alignment -->
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                            </div>
                        </form>

                        <!-- Response message placeholder -->
                        <div id="response-message" class="mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intercept the form submission
            $('#member-form').submit(function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // Submit the form via AJAX
                var data = {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'bioid': $('#bio_id').val(),
                    'name': $('#user_name').val(),
                    'password': $('#password').val(),
                    'personal_email': $('#personal_email').val(),
                    'official_email': $('#official_email').val(),
                    'employee_id': $('#employee_id').val(),
                    'tech_stack': $('#tech_stack').val(),
                    'experience': $('#experience').val(),
                    'linkedin': $('#linkedin').val(),
                    'portfolio': $('#portfolio').val(),
                    'mobile_number': $('#mobile_number').val(),
                    'designation': $('#designation').val(),
                    'date_of_joining': $('#date_of_joining').val()
                };

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: data,
                    success: function (response) {
                        $('#response-message').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#member-form')[0].reset();
                    },
                    error: function (xhr) {
                        // Handle error response
                        $('#response-message').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                    }
                });
            });
        });
    </script>
</body>

</html>