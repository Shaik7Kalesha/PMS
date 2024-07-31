<style>
  .sidebar {
    background: #fff !important;

  }

  .sidebar .sidebar-brand-wrapper {
    background: #fff !important;
  }

  .navbar{
    left:0px !important;
  }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal text-dark">{{ Auth::user()->name }}</h5>
          </div>
        </div>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('gettask_student')}}">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Taks</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Projects</span>
      </a>

    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Log Out</span>
      </a>
    </li>
  </ul>
</nav>