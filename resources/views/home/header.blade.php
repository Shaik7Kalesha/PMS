<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
         <a class="navbar-brand" href="index.html"><img style="width: 110px;
    height: 50px;"  src="images/pms-logo.png" alt="#" /></a>
     <a class="logo-text ms-2 d-none d-sm-block" style="color: darkblue; font-weight: 700;">Project Management System</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <!-- <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li> -->
               <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
               </li> -->
               <li class="nav-item">
                  <a class="btn btn-primary" href="{{ route('login') }}">LOGIN</a>
               </li><br>
               <div class="dropdown" style="padding-left: 20px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    REGISTER
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <!-- <li><a class="dropdown-item" href="{{route('register')}}">Admin</a></li> -->
    <li><a class="dropdown-item" href="{{route('member_register')}}">Member</a></li>
    <li><a class="dropdown-item" href="{{route('student_register')}}">Student</a></li>
  </ul>
</div>
            </ul>
         </div>
      </nav>
   </div>
</header>