<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Roles</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- CSRF Token for AJAX Requests -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .nav-link {
      color: #fff !important; /* Ensure text color is white */
    }
  </style>
</head>
<body>
  @include('admin.header')

  <div class="container mt-4">
    <h1>Manage Roles</h1>
    
    <!-- Form to Add Role -->
    <form method="post" id="roles-form">
      @csrf
      <div class="mb-3">
        <label for="role_name" class="form-label">Role Name</label>
        <input type="text" class="form-control" id="role_name" name="role_name" required>
      </div>

      <button type="submit" class="btn btn-primary">Add Role</button>
    </form>

    <!-- Roles List -->
    <h2 class="mt-4">Roles List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Role Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="roles-table-body">
        <!-- Role rows will be inserted here -->
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
$(document).ready(function () {
    // Intercept the form submission
    $('#roles-form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form via AJAX
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token from meta tag
            'role_name': $('#role_name').val()
        };

        $.ajax({
            type: "POST",
            url: "{{ route('add_roles') }}", // Ensure this route exists in your web.php
            data: data,
            dataType: "json",
            success: function (response) {
                // Display success message in alert popup
                alert('Role added successfully');
                // Optionally, reset the form
                $('#roles-form')[0].reset();
                $('#roles-table-body').append('<tr data-role-id="' + response.id + '"><td>' + response.role_name + '</td><td><button class="btn btn-danger delete-btn">Delete</button></td></tr>');
                attachEventListeners();
            },
            error: function(xhr, status, error) {
                // Display error message in alert popup
                alert('An error occurred. Please try again.');
                console.error('error:', error);
            }
        });
    });

    // Function to fetch roles and populate the table
    function fetchRoles() {
        $.ajax({
            type: "GET",
            url: "/getroles", // Ensure this route exists in your web.php
            dataType: "json",
            success: function(response) {
                var tableBody = $('#roles-table-body');
                tableBody.empty();
                if (response.roles) {
                    response.roles.forEach(function(role) {
                        var row = `<tr data-role-id="${role.id}">
                          <td>${role.role_name}</td>
                          <td><button class="btn btn-danger delete-btn">Delete</button></td>
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
    fetchRoles();

    // Function to attach event listeners to dynamically added buttons
    function attachEventListeners() {
        $('.delete-btn').click(function() {
            var roleId = $(this).closest('tr').data('role-id');
            if (confirm('Are you sure you want to delete this role?')) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('roles') }}/" + roleId, // Ensure this route exists in your web.php
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Role deleted successfully');
                        $('tr[data-role-id="' + roleId + '"]').remove();
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error('error:', error);
                    }
                });
            }
        });
    }
});
</script>

</body>
</html>
