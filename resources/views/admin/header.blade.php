<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  li {
    list-style-type: none;
  }
  nav {
    background-color: #0d6efd;
    color: #fff;
  }
  .navbar-brand, .nav-link, .btn {
    color: #fff !important;
    padding: 0.5rem; /* Tighten padding */
  }
  .navbar-brand {
    font-size: 1.25rem;
    font-weight: bold;
    white-space: nowrap;
  }
  
  /* Hover effect for links and buttons */
  .nav-link:hover, .btn:hover {
    color: black !important;
  }
  /* Space between list items */
  .nav-item {
    margin-right: 10px; /* Adjusted for tighter fit */
  }
  /* Flex to prevent wrapping */
  .navbar-nav {
    flex-wrap: nowrap;
  }
  button{
    text-transform:capitalize;
  }
  element.style {
    text-transform: capitalize;
}
</style>

<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">PROJECT MANAGEMENT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto flex-nowrap">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('addteams') }}"><i class="fas fa-users"></i> Add Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('addbatches') }}"><i class="fas fa-layer-group"></i> Add Batch</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-project-diagram"></i> Project
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('addprojects') }}"><i class="fas fa-plus-circle"></i> Create Project</a></li>
            <li><a class="dropdown-item" href="{{ route('allprojects') }}"><i class="fas fa-folder-open"></i> All Projects</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member_list') }}"><i class="fas fa-users"></i> Member List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('fetch_leave') }}"><i class="fas fa-envelope-open-text"></i> Leave Request</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/student_list') }}"><i class="fas fa-users"></i> Student List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/profile') }}"><i class="fas fa-user"></i> Profile</a>
        </li>
      </ul>
      @if (Auth::check())
        <form method="post" action="{{ route('logout') }}" class="d-flex">
          @csrf
          <button   class="btn btn-primary ms-3">LOGOUT ({{ Auth::user()->name }})</button>
        </form>
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