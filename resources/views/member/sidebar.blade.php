<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
  .sidebar {
    background: #f8f9fa !important;
    width: 250px;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 0;
    z-index: 1000;
    transition: all 0.3s;
  }

  .sidebar .sidebar-brand-wrapper {
    background: #fff !important;
    padding: 1rem;
    text-align: center;
    border-bottom: 1px solid #e9ecef;
  }

  .sidebar .profile {
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    text-align: center;
  }

  .sidebar .profile .profile-pic {
    position: relative;
  }

  .sidebar .profile .profile-pic .img-xs {
    width: 50px;
    height: 50px;
  }

  .sidebar .profile .profile-name {
    margin-top: 10px;
  }

  .sidebar .profile .profile-name h5 {
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 500;
    color: #333;
  }

  .sidebar .profile .profile-name p {
    font-size: 0.875rem;
    color: #6c757d;
  }

  .sidebar .nav {
    padding: 1rem;
  }

  .sidebar .nav-link {
    color: #333;
    font-weight: 500;
    margin-bottom: 1rem;
    transition: all 0.3s;
    display: flex;
    align-items: center;
  }

  .sidebar .nav.sub-menu .nav-item .nav-link:hover {
    color: #000000;
}

  .sidebar .menu-icon {
    margin-right: 10px;
  }

  .sidebar .dropdown-menu {
    width: 100%;
  }

  .main-content {
    margin-left: 250px;
    padding: 1rem;
  }
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="navbar-brand" href="index.html" style="margin-right: -140px; margin-top: -10px;">
      <img
        src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='174' height='26' viewBox='0 0 174 26' fill='none'%3E%3Cpath d='M20.1369 26C22.8983 26 25.1842 23.7425 24.6732 21.0288C24.3528 19.3274 23.8679 17.6594 23.2235 16.0502C21.9602 12.8958 20.1087 10.0295 17.7745 7.61522C15.4403 5.2009 12.6692 3.28575 9.61949 1.97913C8.11383 1.33406 6.55481 0.843538 4.96489 0.512196C2.26154 -0.0511821 0 2.23858 0 5V21C0 23.7614 2.23858 26 5 26H20.1369Z' fill='%23615DFF'/%3E%3Cg style='mix-blend-mode:multiply'%3E%3Cpath d='M13.7013 26C10.9399 26 8.65395 23.7425 9.16502 21.0288C9.48544 19.3274 9.97031 17.6594 10.6147 16.0502C11.878 12.8958 13.7295 10.0295 16.0637 7.61522C18.3979 5.2009 21.169 3.28575 24.2187 1.97913C25.7244 1.33406 27.2834 0.843538 28.8733 0.512196C31.5767 -0.0511821 33.8382 2.23858 33.8382 5V21C33.8382 23.7614 31.5996 26 28.8382 26H13.7013Z' fill='%233DD9EB'/%3E%3C/g%3E%3C/svg%3E"
        alt="SVG Image">
      <a class="logo-text ms-2 d-none d-sm-block"
        style="text-decoration: auto; color: black; font-size: larger; font-weight: 400;">Pro Team</a>
    </a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal text-dark">{{ Auth::user()->name }}</h5>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#home-menu" aria-expanded="false" aria-controls="home-menu">
        <span class="menu-icon">
          <i class="fas fa-home"></i>
        </span>
        <span class="menu-title">Home</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="home-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html"><i
                class="fas fa-tachometer-alt"></i> Dashboard</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('addteams') }}"><i class="fas fa-tasks"></i>
              Tasks</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('addroles') }}"><i class="fas fa-calendar-check"></i>
              Attendance</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#details-menu" aria-expanded="false"
        aria-controls="details-menu">
        <span class="menu-icon">
          <i class="fas fa-info-circle"></i>
        </span>
        <span class="menu-title">Details</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="details-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('student_assigned') }}">
            <i class="fas fa-user-graduate"></i> Students Assigned</a></li>
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fas fa-users"></i> Team</a></li>
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fas fa-star"></i> Reviews</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link">
        <span class="menu-icon">
          <i class="fas fa-calendar-minus"></i>
        </span>
        <span class="menu-title">Leave Request</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
        <span class="menu-icon">
          <i class="fas fa-sign-out-alt"></i>
        </span>
        <span class="menu-title">Log Out</span>
      </a>
    </li>
  </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    // Handle the click event on sidebar dropdown toggles
    $('.nav-item .nav-link').on('click', function () {
      // Check if this dropdown is already open
      var $parent = $(this).parent();
      if ($parent.hasClass('active')) {
        // If it's already open, just close it
        $parent.removeClass('active');
        $parent.find('.dropdown-menu').slideUp();
      } else {
        // Close all other dropdowns
        $('.nav-item.active').removeClass('active');
        $('.dropdown-menu').slideUp();

        // Open this dropdown
        $parent.addClass('active');
        $parent.find('.dropdown-menu').slideDown();
      }
    });
  });
</script>