<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS (optional for using Bootstrap components) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%; /* Set the width to 80% or any percentage you prefer */
            max-width: 800px; /* Set a max-width to limit how wide the table can be */
            margin: 20px auto; /* Center the table */
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-transform:capitalize;
        }

        th {
            background-color: #e9ecef;
            color: dark;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .accept-btn {
            background-color: #28a745; /* Green */
        }

        .reject-btn {
            background-color: #dc3545; /* Red */
        }

        button:hover {
            opacity: 0.9;
        }

        /* Optional responsive design */
        @media (max-width: 600px) {
            table, th, td {
                font-size: 14px; /* Adjust font size for smaller screens */
            }

            button {
                width: 100%; /* Make buttons full width on small screens */
                margin: 5px 0;
            }
        }

        body {
            padding: 0px !important;
        }
    </style>
</head>
<body>
    @include('member.header')
    <h3 class="text-center mt-5 d-block">Team Details</h3>
    <table id="projectTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Project</th>
                <th>Team</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be appended here -->
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/showteam', // Adjust the URL to your route
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Log the full response to check structure
                    if (response.success) {
                        // Loop through the project data and append it to the table
                        $.each(response.data, function(index, project) {
                            $('#projectTable tbody').append(
                                `<tr>
                                    <td>${project.developers}</td>
                                    <td>${project.title}</td>
                                    <td>${project.team}</td>
                                </tr>`
                            );
                        });

                    } else {
                        console.log('Error fetching data:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching team data:', error);
                }
            });
        });
    </script>
       @include('home.footer')
       </body>
</html>
