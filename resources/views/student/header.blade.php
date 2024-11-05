
<style>
li {
    list-style-type: none;
  }
  .navbar {
    background-color: #007bff; /* Blue background */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
    margin-right: 15px;
    font-size: 1.1em;
    color: #ffffff; /* White text color for links */
  }
  .navbar-nav .nav-link:hover {
    color: #000000; /* Black color on hover */
  }
  .navbar-collapse {
    flex-basis: 100%;
    flex-grow: 0 !important;
    align-items: center;
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
            <a class="nav-link" href="{{route('fetchtaskuser')}}"><i class="fas fa-users"></i>Assigned Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('fetchattendenceuser')}}"><i class="fas fa-user-tag"></i>Attendence</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{url('/chat')}}"><i class="fas fa-comments"></i> Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/profile')}}"><i class="fas fa-user"></i> Profile</a>
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


