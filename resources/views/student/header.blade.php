
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
            <a class="nav-link" href="{{route('addteams')}}"><i class="fas fa-users"></i>Assigned Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('addroles')}}"><i class="fas fa-user-tag"></i>Assigned projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/chat')}}"><i class="fas fa-user-tag"></i>Chat</a>
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


