    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  li {
    list-style-type: none;
  }
  .navbar {
    background-color: #007bff; /* Blue background */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem; /* Reduce padding to make the navbar more compact */
  }
  .navbar-brand {
    font-weight: bold;
    font-size: 1.5em;
    color: #ffffff; /* White text color for brand */
    text-decoration: none; /* Remove underline from brand link */
  }
  .navbar-brand:hover {
    color: #ffffff; /* Keep title color white on hover */
  }
  .navbar-nav .nav-link {
    margin-right: 10px; /* Reduce margin to allow more space */
    font-size: 1em;
    color: #ffffff; /* White text color for links */
    padding: 0.25rem 0.5rem; /* Adjust padding to keep links in a single line */
  }
  .navbar-nav .nav-link:hover {
    color: #000000; /* Black color on hover */
  }
  .navbar-collapse {
    flex-grow: 1;
    justify-content: flex-end; /* Align links and button to the right */
  }
  .logout-button {
    margin-left: auto;
  }
  .btn-primary {
    background-color: #0056b3; /* Darker blue for button */
    border-color: #0056b3;
  }
  .btn-primary:hover {
    background-color: #003f7f; /* Even darker blue on hover */
    border-color: #003f7f;
  }
  .btn.btn-primary {
    text-transform: capitalize;
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PROJECT MANAGEMENT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('student_assigned') }}"><i class="fas fa-user-graduate"></i> Show Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('stu_attend') }}"><i class="fas fa-check-circle"></i> Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/leave') }}"><i class="fas fa-calendar-alt"></i> Leave Request</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/showteam') }}"><i class="fas fa-users"></i> Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/chat') }}"><i class="fas fa-comments"></i> Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/mem_profile')}}"><i class="fas fa-user"></i> Profile</a>
        </li>
      </ul>
      @if (Auth::check())
        <div class="logout-button">
          <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-primary">LOGOUT ({{ Auth::user()->name }})</button>
          </form>
        </div>
      @endif
    </div>
  </div>
</nav>
<!-- Bootstrap JS (requires Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
  var collapseElement = document.getElementById('menu');
  var bsCollapse = new bootstrap.Collapse(collapseElement);
</script>