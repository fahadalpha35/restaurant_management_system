@extends('layout.layout')
@section('content')  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding:20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Lists</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#fff;padding:20px;">
      <div class="container-fluid">
      <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add New Order</a>

      <form id="filterForm" method="GET" action="{{ route('tables.index') }}">
        <div class="form-container">
        <div class="form-group">
            <label for="branch">Branch Name:</label>
            <select name="branch" id="branch" class="form-control" onchange="document.getElementById('filterForm').submit();">
                <option value="">Select Branch</option>

            </select>
        </div>

        <div class="form-group">
                <label for="floor">Floor Name:</label>
                <select name="store" id="store" class="form-control" onchange="document.getElementById('filterForm').submit();">
                    <option value="">Select Floor</option>

                </select>
            </div>
        </div>
    </form>

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <table id="storesTable" class="table table-bordered">
      <thead>
          <tr>
              <th>ID</th>
              <th>Order No.</th>
              <th>Table No.</th>
              <th>Floor</th>
              <th>Branch</th>
              <th>Date Time</th>
              <th>Total Products</th>
              <th>Total Amount</th>
              <th>Paid Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
      @php $i =1 @endphp
          @foreach($orders as $orders)
              <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $orders->bill_no }}</td>
                  <td>{{ $orders->table_name }}</td>
                  <td>{{ $orders->store_name }}</td>
                  <td>{{ $orders->branch_name }}</td>
                  <td>{{ $orders->date_time }}</td>
                  <td></td>
                  <td>{{ $orders->net_amount }} BDT</td>
                  <td>{{ $orders->paid_status ? 'Paid' : 'Unpaid' }}</td>
                  <td>
                      <a href="{{ route('orders.edit', $orders->id) }}" class="btn btn-info btn-sm">Edit</a>
                      <form action="{{ route('orders.destroy', $orders->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
      </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <style>
      /* Add the container style */
      .form-container {
          display: grid;
          grid-template-columns: repeat(2, 1fr); /* Creates two equal-width columns */
          gap: 20px; /* Adds space between the columns */
      }

      /* Make sure form groups are stacked on smaller screens */
      @media (max-width: 768px) {
          .form-container {
              grid-template-columns: 1fr; /* Stack columns on small screens */
          }
      }

      /* Ensure the select elements fill the container */
      .form-group {
          width: 100%;
      }

      /* Style the form control to be more consistent */
      .form-control {
          width: 100%;
          padding: 8px;
          margin-top: 5px;
          border-radius: 4px;
          border: 1px solid #ccc;
      }
  </style>

  @endsection

  @push('masterScripts')
<script>
     $(document).ready(function() {
    $('#storesTable').DataTable({
      responsive: true, // Enable responsive behavior
      dom: 'Bfrtip',
      // order: [[0, 'desc']],
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Labeling) from printing
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Labeling) from CSV
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Labeling) from Excel
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Labeling) from PDF
                }
            }
        ]
    });
});
  </script>
  @endpush