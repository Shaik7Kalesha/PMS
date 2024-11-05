<style>
  li {
    list-style-type: none;
  }
  nav {
    background-color: #0d6efd; /* Bootstrap's primary color */
    color: #fff;
  }
  .nav-link {
    color: #fff !important; /* Ensure text color is white */
  }
  .navbar-toggler-icon {
    background-color: #fff; /* Change toggler icon color if needed */
  }
  .navbar-brand {
    color: #fff;
  }
  /* Hover effect for links: change text color only */
  .nav-link:hover {
    color: black !important; /* Change text color to black on hover */
  }
  /* Hover effect for buttons: change text color only */
  .btn:hover {
    color: black !important; /* Change text color to black on hover */
  }
  /* Custom margin between list items */
  .nav-item {
    margin-right: 15px; /* Add space between buttons/links */
  }
</style>

<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Project Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('addteams')}}"><i class="fas fa-users"></i> Add Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('addbatches')}}"><i class="fas fa-layer-group"></i> Add Batch</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-project-diagram"></i> Project
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('addprojects')}}"><i class="fas fa-plus-circle"></i> Create Project</a></li>
            <li><a class="dropdown-item" href="{{route('allprojects')}}"><i class="fas fa-folder-open"></i> All Projects</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('member_list')}}"><i class="fas fa-users"></i> Member List</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{route('student_list')}}"><i class="fas fa-user-graduate"></i> Student List</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('fetch_leave')}}"><i class="fas fa-envelope-open-text"></i> Leave Request</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/student_list')}}"><i class="fas fa-users"></i> Student List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/profile')}}"><i class="fas fa-user"></i> Profile</a>
        </li>
      </ul>
    </div>
    @if (Auth::check())
      <li class="ms-3">
        <form method="post" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-primary">LOGOUT ({{ Auth::user()->name }})</button>
        </form>
      </li>
    @endif
  </div>
</nav>
