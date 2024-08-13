<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Batch Management</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom Styles -->
  <style>
    .card-title {
      color: #343a40;
    }

    .card-body {
      background-color: #f8f9fa;
    }

    .form-control,
    .form-group label,
    .btn {
      color: #343a40;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-light {
      background-color: #e9ecef;
      border-color: #e9ecef;
    }

    .table thead th {
      background-color: #007bff;
      color: #fff;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .table-striped tbody tr:hover {
      background-color: rgba(0, 123, 255, 0.15);
    }

    .navbar {
      position: sticky;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      padding: 10px;
      text-align: center;
      background-color: #f8f9fa;
      border-top: 1px solid #dee2e6;
      z-index: 1000;
    }

    @media (max-width: 768px) {
      .table-responsive {
        overflow-x: auto;
      }
    }
  </style>
</head>

<body>
  <!-- Include Header -->
  @include('admin.header')

  <div class="container mt-4">
    <div class="row mb-4">
      <div class="col-lg-12 col-md-12">
        <!-- Form for Adding Batches -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Batch</h4>
            <form method="post" id="batches-form">
              @csrf
              <div class="form-group mb-3">
                <label for="batchid">Batch Id</label>
                <input type="text" class="form-control" id="batchid" name="batchid" placeholder="Batch Id" required>
              </div>
              <div class="form-group mb-3">
                <label for="batchname">Batch Name</label>
                <input type="text" class="form-control" id="batch_name" name="batchname" placeholder="Batch Name"
                  required>
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <button type="reset" class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <!-- Table for Displaying Batches -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Batch List</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Batch Id</th>
                    <th scope="col">Batch Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="batch-table-body">
                  <!-- Batch data will be dynamically inserted here -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Handle form submission
      $('#batches-form').submit(function (event) {
        event.preventDefault();

        var data = {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'batch_id': $('#batchid').val(),
          'batch_name': $('#batch_name').val()
        };

        $.ajax({
          type: "POST",
          url: "{{ route('add_batches') }}",
          data: data,
          dataType: "json",
          success: function (response) {
            alert('Batch added successfully');
            $('#batches-form')[0].reset();
            $('#batch-table-body').append(
              '<tr data-batch-id="' + response.batch_id + '"><td>' + response.batch_id + '</td><td>' + response.batch_name + '</td><td><button class="btn btn-primary open-btn">Open</button><button class="btn btn-danger close-btn">Close</button></td></tr>'
            );
            attachEventListeners();
          },
          error: function (xhr, status, error) {
            alert('An error occurred: ' + error);
          }
        });
      });

      // Function to fetch batches and populate the table
      function fetchBatches() {
        $.ajax({
          type: "GET",
          url: "/getbatches",
          dataType: "json",
          success: function (response) {
            var tableBody = $('#batch-table-body');
            tableBody.empty();
            if (response.batches) {
              response.batches.forEach(function (batch) {
                var row = `<tr data-batch-id="${batch.batch_id}">
                  <td>${batch.batch_id}</td>
                  <td>${batch.batch_name}</td>
                  <td>
                    <button class="btn btn-primary open-btn">Open</button>
                    <button class="btn btn-danger close-btn">Close</button>
                  </td>
                </tr>`;
                tableBody.append(row);
              });
              attachEventListeners();
            }
          },
          error: function (xhr, status, error) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      // Function to attach event listeners to buttons
      function attachEventListeners() {
        $('.open-btn').click(function () {
          var batchId = $(this).closest('tr').data('batch-id');
          console.log('Open Batch ID:', batchId);
        });

        $('.close-btn').click(function () {
          var batchId = $(this).closest('tr').data('batch-id');
          console.log('Close Batch ID:', batchId);
        });
      }

      // Initial fetch of batches on page load
      fetchBatches();
    });
  </script>
</body>

</html>