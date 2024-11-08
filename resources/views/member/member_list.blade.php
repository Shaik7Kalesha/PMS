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
    <style>
        td{
            border-left:1px solid #ccc;
            text-transform:capitalize;
        }
        td:nth-child(3){text-transform:none;}
        table{
            border:1px solid black;
        }
        thead th{
            border-left:1px solid #ccc;

        }
        td:nth-child(8), td:last-child{
            border-left: none;
            padding-left: 0;
            padding-right: 0;
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="text-center mb-4">
                <h3>MEMBER LIST</h3>
            </div>
            <div class="content-wrapper">
                <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date Of Joining</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="3">Actions</th>
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
    <input type="hidden" id="member_id" name="member_id">
    <div class="mb-3">
        <label for="bioid" class="form-label">Bio ID</label>
        <input type="text" class="form-control" id="bioid" name="bioid" required>
    </div>
    <div class="mb-3">
        <label for="user_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="user_name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="personal_email" class="form-label">Personal Email</label>
        <input type="email" class="form-control" id="personal_email" name="personal_email" required>
    </div>
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" required>
    </div>
    <div class="mb-3">
        <label for="mobile_number" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
    </div>
    <div class="mb-3">
        <label for="date_of_joining" class="form-label">Date of Joining</label>
        <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" required>
    </div>
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
                        tableBody.empty(); // Clear existing rows
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
                                            <button class="btn btn-success dropdown-toggle" type="button" id="acceptDropdown${member.id}" data-bs-toggle="dropdown" aria-expanded="false">
                                                Accept
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="acceptDropdown${member.id}">
                                                <li><a class="accept-btn dropdown-item" data-id="${member.id}">Accept as Developer</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a class="reject-btn btn btn-danger" data-id="${member.id}">Reject</a></td>
                                </tr>`;
                                tableBody.append(row);
                            });

                            // Event handler for accept options
                            $('.accept-btn').on('click', function () {
                                var memberId = $(this).data('id');
                                updateMemberStatus(memberId, 'accept');
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

    var bioid = $('#bioid').val(); // Get the bioid from the form
    var formData = $(this).serialize(); // Serialize the form data

    $.ajax({
        type: "POST",
        url: "/update-member/" + bioid, // Use bioid in the URL
        data: formData, // Send the serialized form data
        dataType: "json", // Expect JSON response from the server
        success: function (response) {
            if (response.status === 'success') {
                alert("Member data updated successfully!");
                $('#exampleModalToggle').modal('hide'); // Close the modal
                fetchMembers(); // Reload the members list
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", xhr.responseText);
            alert("AJAX Request Error: " + xhr.responseText); // Alert the error message
        }
    });
});

            // Accept/Reject Member (combined function)
            function updateMemberStatus(memberId, action) {
                const url = action === 'accept' ? `/accept_member/${memberId}` : `/reject_member/${memberId}`;

                $.ajax({
                    type: "POST",
                    url: url,
                    success: function (response) {
                        alert(response.message);
                        fetchMembers(); // Reload the table
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", xhr.responseText);
                        alert("Error updating member status: " + xhr.responseText);
                    }
                });
            }

            // Accept Member
            $(document).on('click', '.accept-btn', function () {
                var memberId = $(this).data('id');
                updateMemberStatus(memberId, 'accept');
            });

            // Reject Member
            $(document).on('click', '.reject-btn', function () {
                var memberId = $(this).data('id');
                updateMemberStatus(memberId, 'reject');
            });
        });
    </script>
           @include('home.footer')

</body>
</html>
