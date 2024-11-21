<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    body {
        overflow-x: hidden;
    }

    .sidebar {
        background: #f8f9fa !important;
        width: 250px;
        /* position: fixed; */
        height: 730px;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 0;
        z-index: 1000;
        transition: all 0.3s;
    }

    .sidebar .sidebar-brand-wrapper {
        background: #fff !important;
        padding: 1rem;
        text-align: center;
    }

    .sidebar .nav {
        padding: 1rem;
    }

    .sidebar .nav-link {
        color: #333;
        font-weight: 500;
        margin-bottom: 1rem;
        transition: all 0.3s;
    }

    .sidebar .nav-link:hover {
        background: #e9ecef;
        color: #007bff;
    }

    .sidebar .menu-icon {
        margin-right: 10px;
    }

    .sidebar .profile {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        text-align: center;
    }

    .sidebar .profile .profile-pic {
        position: relative;
    }

    .sidebar .profile .profile-pic .img-xs {
        width: 50px;
        height: 50px;
    }

    .sidebar .profile .profile-name {
        margin-top: 10px;
    }

    .sidebar .profile .profile-name h5 {
        margin-bottom: 0;
        font-size: 1rem;
    }

    .sidebar .profile .profile-name p {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .sidebar .profile .dropdown-menu {
        width: 100%;
    }

    .main-content {
        margin-left: 250px;
        padding: 1rem;
    }
    a{
text-decoration: none !important;

    }
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    
    <ul class="nav flex-column mt-4">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <!-- <img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt=""> -->
                        
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal text-dark">DASHBOARD</h5>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fas fa-cog text-primary"></i>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fas fa-key text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fas fa-calendar-alt text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon"><i class="fas fa-home"></i></span>
                <span class="menu-title">Home</span>
                <i class="menu-arrow fas fa-chevron-right"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('addteams')}}"><i class="fas fa-users"
                                style="margin-right: 8px;"></i> Add Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('addroles')}}"><i class="fas fa-user-tag"
                                style="margin-right: 8px;"></i> Add Roles</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('addbatches')}}"><i
                                class="fas fa-layer-group" style="margin-right: 8px;"></i> Add Batch</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#project-basic" aria-expanded="false" aria-controls="project-basic">
                <span class="menu-icon"><i class="fas fa-project-diagram" style="margin-right: 8px;"></i></span>
                <span class="menu-title">Project</span>
                <i class="menu-arrow fas fa-chevron-right"></i>
            </a>
            <div class="collapse" id="project-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('addprojects')}}"><i
                                class="fas fa-plus-circle" style="margin-right: 8px;"></i> Create Project</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('allprojects')}}"><i
                                class="fas fa-folder-open" style="margin-right: 8px;"></i> All Projects</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('addfaculties')}}">
                <span class="menu-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="menu-title">Add Faculty</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('member_list')}}">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                <span class="menu-title">Member List</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('student_list')}}">
                <span class="menu-icon"><i class="fas fa-user-graduate"></i></span>
                <span class="menu-title">Student List</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link">
                <span class="menu-icon"><i class="fas fa-envelope-open-text"></i></span>
                <span class="menu-title">Leave Request</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('login')}}">
                <span class="menu-icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="menu-title">Log Out</span>
            </a>
        </li>
    </ul>
</nav>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $("#profile-dropdown").click(function (e) {
        e.preventDefault();
        $(this).next(".dropdown-menu").toggle();
    });
</script>