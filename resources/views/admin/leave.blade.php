<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('admin.header') <!-- Include your admin header here -->

    <div class="container mt-5">
        <h2>Leave Requests</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bio ID</th>
                    <th>Designation/Dept</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $request)
                    <tr>
                        <td>{{ $request->bio_id }}</td>
                        <td>{{ $request->designation }}</td>
                        <td>{{ $request->reason }}</td>
                        <td>{{ $request->date->format('Y-m-d') }}</td>
                        <td>{{ $request->status }}</td> <!-- Assuming you have a status column -->
                        <td>
                            <a href="{{ route('leave.request.edit', $request->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('leave.request.destroy', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
