<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Team | Project Management System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- CSRF Token for AJAX Requests -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
  td:{text-transform:capitalize;}
  #teams-form{
    width: 500px;
    margin: 0 auto;
    box-shadow: 1px 1px 5px #ccc;
    padding: 20px;
}
td{
            border-left:1px solid #ccc;
            text-transform:capitalize;
        }
        td:nth-child(3){text-transform:none;}
        table{
            border:1px solid black;
            width:50%;
        }
        thead th{
            border-left:1px solid #ccc;

        }
        .table thead th {
            background-color: #ffffff;
            color: #000;
        }
        .team-list{
          width:500px;
          margin:0 auto;
        }
        @media (max-width:500px) {
    .team-list {
        width: 100%;
        margin: 0 auto;
    }
    #teams-form{
        width: 100%;
    }
    .navbar.container-fluid{
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;   
     }
}
  </style>
</head>
<body>
  <!-- Header -->
  @include('admin.header')

  <!-- Main Container -->
  <div class="container mt-5">
    <h3 class="text-center mb-4">Add Team</h3>

    <!-- Team Form -->
    <form id="teams-form">
      @csrf
      <div class="mb-3">
        <label for="team_name" class="form-label">Team Name</label>
        <input type="text" class="form-control" id="team_name" name="team_name" required placeholder="Enter team name">
      </div>
      <button type="submit" class="btn btn-primary w-100">Add Team</button>
    </form>

    <!-- Teams List Table -->
     <div class='team-list mt-4' >
    <h3 class="text-center mb-4">Teams List</h3>
    <table class="table table-striped table-hover border mt-3">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Team Name</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody id="team-table-body">
        <!-- Team rows will be dynamically populated here -->
      </tbody>
    </table>
  </div>
      </div>


  <!-- Bootstrap JS (Optional) and jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function () {
      // Add Team form submission handler
      $('#teams-form').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
          type: "POST",
          url: "{{ route('add_teams') }}", // Ensure this route exists in your routes file
          data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
            'team_name': $('#team_name').val()
          },
          dataType: "json",
          success: function () {
            alert('Team added successfully');
            location.reload(); // Reload page to refresh team list
          },
          error: function() {
            alert('An error occurred. Please try again.');
          }
        });
      });

      // Fetch all teams on page load
      function fetchTeams() {
        $.ajax({
          type: "GET",
          url: "/getteams", // Ensure this route exists in your routes file
          dataType: "json",
          success: function(response) {
            var tableBody = $('#team-table-body');
            tableBody.empty();
            response.teams.forEach(function(team) {
              addTeamRow(team.id, team.team_name);
            });
          },
          error: function(xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }
      fetchTeams();

      // Function to add a new team row to the table
      function addTeamRow(id, name) {
        var row = `<tr data-id="${id}">
                     <td>${id}</td>
                     <td>${name}</td>

                   </tr>`;
        $('#team-table-body').append(row);
        attachEventListeners();
      }

      // Attach event listeners to dynamic Open/Close buttons
      function attachEventListeners() {
        $('.open-btn').off('click').on('click', function() {
          alert('Open button clicked');
        });

        $('.close-btn').off('click').on('click', function() {
          alert('Close button clicked');
        });
      }
    });
  </script>
     @include('home.footer')
</body>
</html>
