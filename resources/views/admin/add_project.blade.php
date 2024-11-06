<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSRF Token for AJAX Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 2rem;
        }

        .card {
            margin: 0 auto;
            max-width: 600px;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body>

    @include('admin.header')

    <div class="container mt-4">
        <h1>Create Projects</h1>

        <!-- Form to Add Project -->
        <div class="card">
            <div class="card-body">
                <form method="post" id="projects-form">
                    @csrf
                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="project_description" class="form-label">Project Description</label>
                        <textarea class="form-control" id="project_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="project_source" class="form-label">Source</label>
                        <input type="text" class="form-control" id="project_source" name="source" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Project</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // Intercept the form submission
            $('#projects-form').submit(function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // Submit the form via AJAX
                var data = {
                    '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
                    'title': $('#project_name').val(),
                    'description': $('#project_description').val(),
                    'source': $('#project_source').val()
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('add_projects') }}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // Display success message in alert popup
                        alert('Project added successfully');

                        // Optionally, reset the form
                        $('#projects-form')[0].reset();

                        // Update the table (assumed to exist)
                        $('#projects-table-body').append(
                            `<tr>
                                <td>${response.project_name || 'N/A'}</td>
                                <td>${response.project_description || 'N/A'}</td>
                                <td>${response.project_source || 'N/A'}</td>
                            </tr>`
                        );
                    },
                    error: function(xhr, status, error) {
                        // Display error message in alert popup
                        alert('An error occurred. Please try again.');
                        console.error('error:', error);
                    }
                });
            });
        });
    </script>

    <footer class="footer">
        <p>&copy; 2024 Project Management System. All rights reserved.</p>
    </footer>
</body>

</html>
