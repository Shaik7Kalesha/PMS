
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
    .navbar-brand{
      color: #fff;
    }
    .btn:hover{
  background-color: #fff; 
  color: black;
    }
  </style>



  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('addteams')}}"><i class="fas fa-users"></i> Add Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('addroles')}}"><i class="fas fa-user-tag"></i> Add Roles</a>
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
            <a class="nav-link" href="{{route('addfaculties')}}"><i class="fas fa-chalkboard-teacher"></i> Add Faculty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('member_list')}}"><i class="fas fa-users"></i> Member List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('student_list')}}"><i class="fas fa-user-graduate"></i> Student List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-envelope-open-text"></i> Leave Request</a>
          </li>
          
        </ul>
      </div>
      @if (Auth::check())
        <li>
        <form method="post" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-primary">LOGOUT ({{ Auth::user()->name }})</button>
        </form>
        </li>
      @endif
    </div>
  </nav>


