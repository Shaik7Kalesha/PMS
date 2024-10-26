<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

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
        <h1 class="text-center mb-4">Task List</h1>
        
        <table class="table table-striped" id="taskTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>ETA</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Task rows will be appended here -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Fetch tasks on page load
            fetchTasks();

            function fetchTasks() {
                $.ajax({
                    url: "{{ route('fetchtaskuser') }}", // AJAX URL
                    method: "GET",
                    success: function(data) {
                        // Clear the existing table body
                        $('#taskTable tbody').empty();

                        // Populate the table with the fetched data
                        $.each(data, function(index, task) {
                            let statusBadge = task.status == 'completed' ? 'bg-success' : 'bg-warning';
                            $('#taskTable tbody').append(`
                                <tr>
                                    <td>${task.id}</td>
                                    <td>${task.title}</td>
                                    <td>${task.task_name}</td>
                                    <td>${task.description}</td>
                                    <td>${task.task_date}</td>
                                    <td>${task.eta}</td>
                                    <td>
                                        <span class="badge ${statusBadge}">
                                            ${task.status.charAt(0).toUpperCase() + task.status.slice(1)}
                                        </span>
                                    </td>
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
