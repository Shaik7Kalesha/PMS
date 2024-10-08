<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Member List</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  @include('admin.header')

  <div class="container mt-4">
    <h1 class="mb-4">Member List</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date Of Joining</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="members-table-body">
          <!-- Member data will be dynamically added here -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal for Editing Member -->
  <div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Edit Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="member-form">
            <input type="hidden" id="member_id">
            <div class="mb-3">
              <label for="bioid" class="form-label">Bio ID</label>
              <input type="text" class="form-control" id="bioid" required>
            </div>
            <div class="mb-3">
              <label for="user_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="user_name" required>
            </div>
            <div class="mb-3">
              <label for="personal_email" class="form-label">Personal Email</label>
              <input type="email" class="form-control" id="personal_email" required>
            </div>
            <div class="mb-3">
              <label for="employee_id" class="form-label">Employee ID</label>
              <input type="text" class="form-control" id="employee_id" required>
            </div>
            <div class="mb-3">
              <label for="mobile_number" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="mobile_number" required>
            </div>
            <div class="mb-3">
              <label for="date_of_joining" class="form-label">Date of Joining</label>
              <input type="date" class="form-control" id="date_of_joining" required>
            </div>
            <!-- Add more fields as needed -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function () {
      // Fetch members and populate the table
      function fetchMembers() {
        $.ajax({
          type: "GET",
          url: "/member_list",
          dataType: "json",
          success: function (response) {
            console.log("AJAX response:", response);
            var tableBody = $('#members-table-body');
            tableBody.empty();
            if (response.members) {
              response.members.forEach(function (member) {
                var actions = '';
                if (member.status === 'accepted') {
                  actions = `<td><a class="editbtn btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${member.id}">Edit</a></td>`;
                } else {
                  actions = `<td></td>`; // No action if not accepted
                }
                
                var row = `<tr>
                    <td>${member.bioid}</td>
                    <td>${member.name}</td>
                    <td>${member.personalemail}</td>
                    <td>${member.mobilenumber}</td>
                    <td>${member.dateofjoining}</td>
                    <td>${member.status}</td>
                    ${actions}
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="acceptDropdown${member.id}" data-bs-toggle="dropdown" aria-expanded="false">
                                Accept
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="acceptDropdown${member.id}">
                                 <li><a class="accept-btn dropdown-item accept-option" data-id="${member.id}" data-value="option1" data-usertype="tl">Accept as TL</a></li>
                                 <li><a class="accept-btn dropdown-item accept-option" data-id="${member.id}" data-value="option2" data-usertype="developer">Accept as Developer</a></li>
                            </ul>
                        </div>
                    </td>
                    <td><a class="reject-btn btn btn-danger" data-id="${member.id}">Reject</a></td>
                </tr>`;
                tableBody.append(row);
              });

              // Event handler for accept options
              $('.accept-option').on('click', function () {
                var memberId = $(this).data('id');
                var selectedOption = $(this).data('value');
                console.log("Accepted member ID:", memberId, "with option:", selectedOption);

                $.ajax({
                  type: "POST",
                  url: "/accept_member/" + memberId,
                  contentType: "application/json",
                  dataType: "json",
                  data: JSON.stringify({ id: memberId, usertype: selectedOption }),
                  success: function (response) {
                    alert(response.message);
                    fetchMembers(); // Reload the members list
                  },
                  error: function (xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                  }
                });
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      fetchMembers();

      // Click Event for Edit Button
      $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          type: "GET",
          url: "/edit_member/" + id,
          dataType: "json",
          success: function (response) {
            var member = response.member;
            $('#member_id').val(member.id);
            $('#bioid').val(member.bioid);
            $('#user_name').val(member.name);
            $('#personal_email').val(member.personalemail);
            $('#employee_id').val(member.employeeid);
            $('#mobile_number').val(member.mobilenumber);
            $('#date_of_joining').val(member.dateofjoining);
            // Populate other fields as needed

            $('#exampleModalToggle').modal('show'); // Open the modal
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });

      // AJAX Request to Update Member Data based on bioid
      $('#member-form').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission
        var bioid = $('#bioid').val(); // Use bioid instead of id
        var formData = $(this).serialize();

        $.ajax({
          type: "POST",
          url: "/update-member/" + bioid, // Use bioid in the URL
          data: formData,
          success: function (response) {
            if (response.status == 'success') {
              alert("Member data updated successfully!");
              $('#exampleModalToggle').modal('hide'); // Close the modal
              fetchMembers(); // Reload the members list
            } else {
              alert("Error: " + response.message);
            }
          },
          error: function (xhr, status, error) {
            alert("AJAX Request Error: " + xhr.responseText);
          }
        });
      });

      // Accept member
      $(document).on('click', '.accept-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var usertype = $(this).data('usertype');

        $.ajax({
          type: "POST",
          url: "/accept_member/" + id,
          contentType: "application/json",
          dataType: "json",
          data: JSON.stringify({ id: id, usertype: usertype }),
          success: function (response) {
            alert(response.message);
            fetchMembers(); // Reload the members list
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });

      // Reject member
      $(document).on('click', '.reject-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          type: "POST",
          url: "/reject_member/" + id,
          dataType: "json",
          success: function (response) {
            alert(response.message);
            fetchMembers(); // Reload the members list
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      });
    });
  </script>

</body>
</html>
