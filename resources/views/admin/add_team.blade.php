<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Team</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- CSRF Token for AJAX Requests -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  @include('admin.header')

  <div class="container mt-4">
    <h1>Add New Team</h1>
    <form method="post" id="teams-form">
      @csrf
      <div class="mb-3">
        <label for="team_name" class="form-label">Team Name</label>
        <input type="text" class="form-control" id="team_name" name="team_name" required>
      </div>

      <button type="submit" class="btn btn-primary">Add Team</button>
    </form>

    <h2 class="mt-4">Teams List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Team Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="team-table-body">
        <!-- Team rows will be inserted here -->
      </tbody>
    </table>
  </div>

  <!-- Footer -->
  <footer class="bg-light text-center py-4 mt-4">
    <div class="container">
      <p class="mb-0">&copy; 2024 . All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
$(document).ready(function () {
    // Intercept the form submission
    $('#teams-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
            'team_name': $('#team_name').val(),
            'description': $('#description').val()
        };

        $.ajax({
            type: "POST",
            url: "{{ route('add_teams') }}", // Ensure this route exists in your web.php
            data: data,
            dataType: "json",
            success: function (response) {
                // Display success message in alert popup
                alert('Team added successfully');
                // Optionally, reset the form
                $('#teams-form')[0].reset();
                $('#team-table-body').append('<tr data-id="' + response.id + '"><td>' + response.id + '</td><td>' + response.team_name + '</td><td><button class="btn btn-primary open-btn">Open</button><button class="btn btn-secondary close-btn">Close</button></td></tr>');
                attachEventListeners();
            },
            error: function(xhr, status, error) {
                // Display error message in alert popup
                alert('An error occurred. Please try again.');
                console.error('error:', error);
            }
        });
    });

    // Function to fetch teams and populate the table
    function fetchTeams() {
        $.ajax({
            type: "GET",
            url: "/getteams", // Ensure this route exists in your web.php
            dataType: "json",
            success: function(response) {
                var tableBody = $('#team-table-body');
                tableBody.empty();
                if (response.teams) {
                    response.teams.forEach(function(team) {
                        var row = `<tr data-team-id="${team.id}">
                          <td>${team.id}</td>
                          <td>${team.team_name}</td>
                          <td><button class="btn btn-primary open-btn">Open</button><button class="btn btn-secondary close-btn">Close</button></td>
                        </tr>`;
                        tableBody.append(row);
                    });
                    // Attach event listeners to buttons after table update
                    attachEventListeners();
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    }
    fetchTeams();

    // Function to attach event listeners to dynamically added buttons
    function attachEventListeners() {
        $('.open-btn').click(function() {
            alert('Open button clicked');
        });

        $('.close-btn').click(function() {
            alert('Close button clicked');
        });
    }
});
</script>

</body>
</html>
