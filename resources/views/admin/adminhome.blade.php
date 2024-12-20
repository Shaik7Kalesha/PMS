<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet"href="../customcss/responsive.css">


    <style>


        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }


        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-text {
            font-size: 1.5rem;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('admin.header')

    <div class="container mt-4">
        <div class="row col-lg-12">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-primary">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h4 class="card-title">Teams</h4>
                        <p class="card-text" id="teamCount">{{ $getteamscount ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body text-center">
                        <i class="fas fa-layer-group fa-3x text-success mb-3"></i>
                        <h4 class="card-title">Batches</h4>
                        <p class="card-text" id="batchCount">{{ $getbatchescount ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-info">
                    <div class="card-body text-center">
                        <i class="fas fa-project-diagram fa-3x text-info mb-3"></i>
                        <h4 class="card-title">Projects</h4>
                        <p class="card-text" id="projectCount">{{ $getprojectscount ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 offset-lg-2">
                <div class="card shadow-sm border-warning">
                    <div class="card-body text-center">
                        <i class="fas fa-user-tie fa-3x text-warning mb-3"></i>
                        <h4 class="card-title">Members</h4>
                        <p class="card-text" id="memberCount">{{ $getmemberscount ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-secondary">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-3x text-secondary mb-3"></i>
                        <h4 class="card-title">Students</h4>
                        <p class="card-text" id="studentCount">{{ $students_count ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function updateCount(url, targetElement) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $(targetElement).text(data.count);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching count:', error);
                        $(targetElement).text('Error');
                    }
                });
            }

            updateCount('/getteamcount', '#teamCount');
            updateCount('/getbatchcount', '#batchCount');
            updateCount('/getprojectcount', '#projectCount');
            updateCount('/getmembercount', '#memberCount');
            updateCount('/getstudentcount', '#studentCount');
        });
    </script>
</body>

</html>
