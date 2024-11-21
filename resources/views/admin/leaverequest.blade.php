<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">  <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS (optional for using Bootstrap components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



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
            background-color: #007bff;
            color: white;
            font-style: normal;
            text-: auto;
            color: black;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

       

        .accept-btn {
            background-color: #28a745; /* Green */
        }

        .reject-btn {
            background-color: #dc3545; /* Red */
        }

        th{
            border-bottom:1px solid black !important;
        }

        /* Optional responsive design */
       
        body {
            padding: 0px !important;
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class='leave-list'>
    <h3 class="text-center">Leave Records</h3>
    <div class="table-responsive">
    <table id="leaveTable" class="table table-bordered table-striped table-responsive">
        <thead>

            <tr>
                <th>ID</th>
                <th class='text-nowrap'>Bio ID</th>
                <th>Designation</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th> <!-- New Action column -->
            </tr>
        </thead>
        <tbody>
            <!-- Data will be appended here -->
        </tbody>
    </table>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/fetch_leave', // Adjust the URL to your route
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Log the full response to check structure
                    if (response.success) {
                        // Loop through the leave data and append it to the table
                        $.each(response.data, function(index, leave) {
                            $('#leaveTable tbody').append(
                                `<tr>
                                    <td style="text-wrap: nowrap;">${leave.id}</td>
                                    <td style="text-wrap: nowrap;">${leave.bio_id}</td>
                                    <td style="text-wrap: nowrap;">${leave.designation}</td>
                                    <td style="text-wrap: nowrap;">${leave.reason}</td>
                                    <td style="text-wrap: nowrap;">${leave.status}</td>
                                    <td style="text-wrap: nowrap;">${leave.date}</td>
                                    <td style="text-wrap: nowrap;">
                                        <button class="accept-btn btn" data-id="${leave.id}">
                                            <i class="fas fa-check"></i> Accept
                                        </button>
                                        <button class="reject-btn btn" data-id="${leave.id}">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </td>
                                </tr>`
                            );
                        });

                    } else {
                        console.log('Error fetching data:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching leave data:', error);
                }
            });

            // Accept button click event
            $(document).on('click', '.accept-btn', function() {
                var leaveId = $(this).data('id');
                $.ajax({
                    url: '/accept_leave/' + leaveId, // Adjust this URL to your route
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Leave accepted successfully.');
                            window.location.reload();
                            // Optionally, remove the row from the table or refresh the table
                        } else {
                            console.log('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error accepting leave:', error);
                    }
                });
            });

            // Reject button click event
            $(document).on('click', '.reject-btn', function() {
                var leaveId = $(this).data('id');
                $.ajax({
                    url: '/reject_leave/' + leaveId, // Adjust this URL to your route
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Leave rejected successfully.');
                            window.location.reload();
                            // Optionally, remove the row from the table or refresh the table
                        } else {
                            console.log('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error rejecting leave:', error);
                    }
                });
            });
        });
    </script>
       @include('home.footer')
</body>
</html>
