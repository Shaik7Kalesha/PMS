<!DOCTYPE html>
<html>

<head>
    <title>Member Registration</title>
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
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="text-center">
            <h3>MEMBER REGISTRATION</h3>
        </div>
        <div class="mt-4">
            <form method="POST" id="member-form" action="{{ route('member_store') }}">
                @csrf
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="bio_id">Bio ID</label>
                        <input class="form-control" id="bio_id" name="bioid" type="text" placeholder="Bio ID" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="user_name">User Name</label>
                        <input class="form-control" id="user_name" name="name" type="text" placeholder="User Name" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="personal_email">Personal Email</label>
                        <input class="form-control" id="personal_email" name="personal_email" type="email" placeholder="Personal Email" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="official_email">Official Email</label>
                        <input class="form-control" id="official_email" name="official_email" type="email" placeholder="Official Email" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="employee_id">Employee ID</label>
                        <input class="form-control" id="employee_id" name="employee_id" type="text" placeholder="Employee ID" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="experience">Experience</label>
                        <input class="form-control" id="experience" name="experience" type="text" placeholder="Experience" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="linkedin">LinkedIn</label>
                        <input class="form-control" id="linkedin" name="linkedin" type="text" placeholder="LinkedIn" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="portfolio">Portfolio</label>
                        <input class="form-control" id="portfolio" name="portfolio" type="text" placeholder="Portfolio" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="mobile_number">Mobile Number</label>
                        <input class="form-control" id="mobile_number" name="mobile_number" type="text" placeholder="Mobile Number" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="tech_stack">Tech Stack</label>
                        <input class="form-control" id="tech_stack" name="tech_stack" type="text" placeholder="Tech Stack" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="designation">Designation</label>
                        <input class="form-control" id="designation" name="designation" type="text" placeholder="Designation" required>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-sm-6 col-md-4">
                        <label for="date_of_joining">Date of Joining</label>
                        <input class="form-control" id="date_of_joining" name="date_of_joining" type="date" placeholder="Date of Joining" required>
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
    $('#member-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
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
            'date_of_joining': $('#date_of_joining').val() // Include Date of Joining field
        };

        $.ajax({
            type: "POST",
            url: "{{ url('/createmember') }}",
            data: data,
            dataType: "json",
            success: function (response) {
                // Display success message in alert popup
                alert('Member added successfully');
                // Optionally, reset the form
                $('#member-form')[0].reset();
            },
            error: function(xhr, status, error) {
                // Display error message in alert popup
                alert('An error occurred. Please try again.');
                // Optionally, display error message in a specific element on the page
                // $('#response-message').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                console.error('error:', error);
            }
        });
    });
});
</script>

</body>
</html>
