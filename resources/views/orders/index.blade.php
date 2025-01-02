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
                  <td></td>
                  <td>{{ $orders->store_name }}</td>
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