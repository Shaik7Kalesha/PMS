<style>
  li{
    list-style-type: none;
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <!-- Profile Section -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="profileDropdown">
            <!-- Optional Profile Links -->
            <!-- <a class="dropdown-item" href="#">Profile</a> -->
          </div>
        </li>

        <!-- Navigation Items -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="homeMenu" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-home"></i> Home
          </a>
          <div class="dropdown-menu" aria-labelledby="homeMenu">
            <a class="dropdown-item" href="pages/ui-features/buttons.html"><i class="fas fa-tachometer-alt"></i>
              Dashboard</a>
            <a class="dropdown-item" href="{{ route('addteams') }}"><i class="fas fa-tasks"></i> Tasks</a>
            <a class="dropdown-item" href="{{ route('addroles') }}"><i class="fas fa-calendar-check"></i> Attendance</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="detailsMenu" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-info-circle"></i> Details
          </a>
          <div class="dropdown-menu" aria-labelledby="detailsMenu">
            <a class="dropdown-item" href="{{ route('student_assigned') }}"><i class="fas fa-user-graduate"></i>
              Students Assigned</a>
            <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Team</a>
            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> Reviews</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-calendar-minus"></i> Leave Request</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"
            href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
            <i class="fas fa-sign-out-alt"></i> Log Out
          </a>
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