<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-primary {
            width: 100%;
            font-size: 16px;
            padding: 10px;
        }
    </style>
</head>
<body>
    @include('member.header')
    
    <div class="container mt-4">
        <div class="form-container">
            <h3 class="form-title">Leave Request Form</h3>
            
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('leave.request.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="bio_id" class="form-label">Bio ID</label>
                    <input type="text" class="form-control" id="bio_id" name="bio_id" required>
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation/Dept</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Leave Request</button>
            </form>
        </div>
    </div>

    @include('home.footer')
    </body>
</html>
