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
      font-weight: bold;
    }


    .form-control, .form-group label, .btn {
      color: #343a40;
    }
    #batches-form{
    width: 500px;
    margin: 0 auto;
    box-shadow: 1px 1px 5px #ccc;
    padding: 20px;
}

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .table thead th {
      background-color: #ffffff;
      color: #000;
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

    @media (max-width: 768px) {
      .table-responsive {
        overflow-x: auto;
      }
    }
        td{
            border-left:1px solid #ccc;
            text-transform:capitalize;
        }
        td:nth-child(3){text-transform:none;}
        table{
            border:1px solid black;
        }
        thead th{
            border-left:1px solid #ccc;

        }
        .batch-list{
          width:500px;
          margin:0 auto;
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
        <div>
          <div>
            <h4 class="text-center">Add Batch</h4>
            <form method="post" id="batches-form">
              @csrf
              <div class="form-group mb-3">
                <label for="batchid">Batch Id</label>
                <input type="text" class="form-control" id="batchid" name="batchid" placeholder="Batch Id" required>
              </div>
              <div class="form-group mb-3">
                <label for="batchname">Batch Name</label>
                <input type="text" class="form-control" id="batch_name" name="batchname" placeholder="Batch Name" required>
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <button type="reset" class="btn btn-dark">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <!-- Table for Displaying Batches -->
        <div>
          <div>
          <div class='batch-list'>
            <h4 class="text-center">Batch List</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Batch Id</th>
                    <th scope="col">Batch Name</th>
                    <!-- <th scope="col">Action</th> -->
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

        const data = {
          '_token': '{{ csrf_token() }}',
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
            addBatchRow(response.batch_id, response.batch_name);
            window.location.reload();
          },
          error: function (xhr) {
            alert(`An error occurred: ${xhr.responseText}`);
          }
        });
      });

      // Function to fetch and display batches on page load
      function fetchBatches() {
        $.ajax({
          type: "GET",
          url: "/getbatches",
          dataType: "json",
          success: function (response) {
            const tableBody = $('#batch-table-body');
            tableBody.empty();
            response.batches.forEach(batch => {
              addBatchRow(batch.batch_id, batch.batch_name);
            });
          },
          error: function (xhr) {
            console.error("Ajax error:", xhr.responseText);
          }
        });
      }

      // Function to add a batch row to the table
      function addBatchRow(batchId, batchName) {
        const row = `
          <tr data-batch-id="${batchId}">
            <td>${batchId}</td>
            <td>${batchName}</td>
          </tr>`;
        $('#batch-table-body').append(row);
      }

      // Event delegation for dynamic buttons
      $('#batch-table-body').on('click', '.open-btn', function () {
        const batchId = $(this).closest('tr').data('batch-id');
        alert(`Open Batch ID: ${batchId}`);
      });

      $('#batch-table-body').on('click', '.close-btn', function () {
        const batchId = $(this).closest('tr').data('batch-id');
        alert(`Close Batch ID: ${batchId}`);
      });

      // Fetch batches on page load
      fetchBatches();
    });
  </script>
     @include('home.footer')
</body>

</html>
