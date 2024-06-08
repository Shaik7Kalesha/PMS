

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
       @include('admin.header')
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
                               
                        </tbody>
                </table>
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
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "/member_list",
            dataType: "json",
            success: function(response) {
                console.log("AJAX response:", response);
                var tableBody = $('#members-table-body');
                tableBody.empty();
                if(response.members && response.members.length) {
                    response.members.forEach(function(member) {
                        var data = `<tr>
                        <td>${member.bioid}</td>
                                        <td>${member.name}</td>
                                        <td>${member.personalemail}</td>
                                        <td>${member.employeeid}</td>
                                        <td>${member.mobilenumber}</td>
                                        <td>${member.dateofjoining}</td>
                                        <td><button class="btn btn-primary">EDIT</button></td>
                                        <td><button class="btn btn-danger">DELETE</button></td>
                                    </tr>`;
                        tableBody.append(data);
                    });
                }
            },
            error:function(xhr,status,error)
{
    console.error("Ajax error:",xhr.responseText)
}        });
    });
</script>

    <!-- container-scroller -->
    <!-- plugins:js -->
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
  </body>
</html>


















<!-- <table id="members-table">
              <thead>
                <tr>
                  <th class="sort align-middle" scope="col" data-sort="bio_id" style="width:15%; min-width:87px;">Bio
                    ID</th>
                  <th class="sort align-middle" scope="col" data-sort="employee_id" style="width:15%; min-width:200px;">
                    Employee ID</th>
                  <th class="sort align-middle" scope="col" data-sort="user_name" style="width:15%; min-width:200px;">
                    User Name</th>
                  <th class="sort align-middle" scope="col" data-sort="personal_email"
                    style="width:15%; min-width:200px;">Personal Email</th>
                  <th class="sort align-middle" scope="col" data-sort="mobile_number"
                    style="width:20%; min-width:200px;">Mobile Number</th>
                  <th class="sort align-middle" scope="col" data-sort="date_of_joining"
                    style="width:19%; min-width:120px;">Date of Joining</th>
                  <th class="sort align-middle" scope="col" data-sort="action">Action</th>
                </tr>
              </thead>
              <tbody id="members-table-body">
                Member data will be inserted here dynamically
              </tbody>
            </table> -->