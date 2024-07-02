

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Member List</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <!-- <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p> -->
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="main-panel">
        <div class="text-center">
          <h3>MEMBER LIST</h3>
        </div>
        <div class="content-wrapper">
          <div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Bio Id</th>
                  <th scope="col">Name</th>
                  <!-- <th scope="col">Password</th> -->
                  <th scope="col">Personal Email</th>
                  <!-- <th scope="col">Official Email</th> -->
                  <th scope="col">Employee Id</th>
                  <!-- <th scope="col">Tech Stack</th> -->
                  <!-- <th scope="col">Experience</th> -->
                  <!-- <th scope="col">Linked In</th> -->
                  <!-- <th scope="col">Portfolio</th> -->
                  <th scope="col">Mobile Number</th>
                  <!-- <th scope="col">Designation</th> -->
                  <th scope="col">Date Of Joining</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="members-table-body">
                <!-- Member data will go here -->
              </tbody>
            </table>
          </div>
        </div>

        <!-- Modal for Member Registration -->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mem-reg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Member Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mt-3">
            <div class="text-center">
              <h3>MEMBER REGISTRATION</h3>
            </div>
            <div class="mt-4">
              <form method="POST" id="member-form" >
              <input type="hidden" id="member_id" name="member_id">

                @csrf
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="bio_id">Bio ID</label>
                    <input class="form-control" id="bioid" name="bioid" type="text" placeholder="Bio ID" required>
                  </div>
                  <div class="col-md-4">
                    <label for="user_name">User Name</label>
                    <input class="form-control" id="user_name" name="name" type="text" placeholder="User Name" required>
                  </div>
                  <div class="col-md-4">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="personal_email">Personal Email</label>
                    <input class="form-control" id="personal_email" name="personal_email" type="email" placeholder="Personal Email" required>
                  </div>
                  <div class="col-md-4">
                    <label for="official_email">Official Email</label>
                    <input class="form-control" id="official_email" name="official_email" type="email" placeholder="Official Email" required>
                  </div>
                  <div class="col-md-4">
                    <label for="employee_id">Employee ID</label>
                    <input class="form-control" id="employee_id" name="employee_id" type="text" placeholder="Employee ID" required>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="experience">Experience</label>
                    <input class="form-control" id="experience" name="experience" type="text" placeholder="Experience" required>
                  </div>
                  <div class="col-md-4">
                    <label for="linkedin">LinkedIn</label>
                    <input class="form-control" id="linkedin" name="linkedin" type="text" placeholder="LinkedIn" required>
                  </div>
                  <div class="col-md-4">
                    <label for="portfolio">Portfolio</label>
                    <input class="form-control" id="portfolio" name="portfolio" type="text" placeholder="Portfolio" required>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="mobile_number">Mobile Number</label>
                    <input class="form-control" id="mobile_number" name="mobile_number" type="text" placeholder="Mobile Number" required>
                  </div>
                  <div class="col-md-4">
                    <label for="tech_stack">Tech Stack</label>
                    <input class="form-control" id="tech_stack" name="tech_stack" type="text" placeholder="Tech Stack" required>
                  </div>
                  <div class="col-md-4">
                    <label for="designation">Designation</label>
                    <input class="form-control" id="designation" name="designation" type="text" placeholder="Designation" required>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="date_of_joining">Date of Joining</label>
                    <input class="form-control" id="date_of_joining" name="date_of_joining" type="date" placeholder="Date of Joining" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="update_member btn btn-primary mt-4"><i class="fas fa-paper-plane"></i>Update</button>
                </div>
              </form>
              <!-- Response message placeholder -->
              <div id="response-message" class="mt-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
              integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

              <script>
    $(document).ready(function() {
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // AJAX Request to Populate Member List
    $.ajax({
    type: "GET",
    url: "/member_list",
    dataType: "json",
    success: function(response) {
        console.log("AJAX response:", response);
        var tableBody = $('#members-table-body');
        tableBody.empty();
        if (response.members) {
            response.members.forEach(function(member) {
                var data = `<tr>
                    <td>${member.bioid}</td>
                    <td>${member.name}</td>
                    <td>${member.personalemail}</td>
                    <td>${member.employeeid}</td>
                    <td>${member.mobilenumber}</td>
                    <td>${member.dateofjoining}</td>
                    <td><a class="editbtn btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" data-id="${member.id}">Edit</a></td>
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
                tableBody.append(data);
            });

            // Event handler for accept options
            $('.accept-option').on('click', function() {
                var memberId = $(this).data('id');
                var selectedOption = $(this).data('value');
                console.log("Accepted member ID:", memberId, "with option:", selectedOption);
                // Perform your action for the selected accept option here
            });
        }
    },
    error: function(xhr, status, error) {
        console.error("Ajax error:", xhr.responseText);
    }
});


    // Click Event for Edit Button
    $(document).on('click', '.editbtn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "/edit_member/" + id,
            dataType: "json",
            success: function(response) {
                var member = response.member;
                $('#member_id').val(member.id); // Ensure the member ID is set here
                $('#bioid').val(member.bioid);
                $('#user_name').val(member.name);
                $('#personal_email').val(member.personalemail);
                $('#official_email').val(member.officialemail);
                $('#employee_id').val(member.employeeid);
                $('#experience').val(member.experience);
                $('#linkedin').val(member.linkedin);
                $('#portfolio').val(member.portfolio);
                $('#mobile_number').val(member.mobilenumber);
                $('#tech_stack').val(member.techstack);
                $('#designation').val(member.designation);
                $('#date_of_joining').val(member.dateofjoining);

                $('#exampleModalToggle').modal('show'); // Open the modal
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });
    });

    // AJAX Request to Update Member Data
    $('#member-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        var id = $('#member_id').val(); // Ensure this ID is correct
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/update-member/" + id, // Check this URL
            data: formData,
            success: function(response) {
                if (response.status == 'success') {
                    alert("Member data updated successfully!");
                    location.reload();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX Request Error: " + xhr.responseText);
            }
        });
    });

    //accept code
    $(document).on('click', '.accept-btn', function(e) {
  e.preventDefault();
  var id = $(this).data('id');
  var usertype = $(this).data('usertype'); // Get the usertype from the button data attribute

  $.ajax({
    type: "POST",
    url: "/accept_member/" + id,
    contentType: "application/json",
    dataType: "json",
    data: JSON.stringify({ // Send data as JSON
      id: id,
      usertype: usertype
    }),
    success: function(response) {
      alert(response.message);
      // Optionally, reload the members list
      loadMembers();
    },
    error: function(xhr, status, error) {
      console.error("Ajax error:", xhr.responseText);
    }
  });
});


//reject code 
$(document).on('click', '.reject-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        type: "POST",
        url: "/reject_member/" + id,
        dataType: "json",
        success: function(response) {
            alert(response.message);
            // Optionally, reload the members list
            // loadMembers();
        },
        error: function(xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
        }
    });
});

});
  
</script>




    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
     <style>
      .modal-dialog.mem-reg{
        max-width: 900px;

      }

    </style>
  </body>
</html>
