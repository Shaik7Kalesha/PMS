<style>
  li {
    list-style-type: none;
  }
  .navbar-collapse {
    flex-basis: 100%;
    flex-grow: 0 !important;
    align-items: center;
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PROJECT MANAGEMENT SYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-calendar-minus"></i>Home</a>
        </li>
        <!-- Navigation Items -->
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('student_assigned')}}"><i class="fas fa-calendar-minus"></i>Show
            Students</a>
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
      @if (Auth::check())
    <li>
      <form method="post" action="{{ route('logout') }}">
      @csrf
      <button class="btn btn-primary">LOGOUT ({{ Auth::user()->name }})</button>
      </form>
    </li>
  @endif
    </div>
   
  </div>

</nav>