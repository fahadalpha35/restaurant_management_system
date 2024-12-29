@extends('layout.layout')
@section('content')  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding:20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Branches</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('branches.create')}}" class="btn btn-success float-sm-right">Add New Branch</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#fff;padding:20px;border-radius:15px;">
      <div class="container-fluid">
      @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="branchTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>                 
                        <th>Company</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i =1 @endphp
                    @foreach($branches as $branch)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->company_name }}</td>
                            <td>{{ $branch->active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
    $('#branchTable').DataTable({
      responsive: true, // Enable responsive behavior
      dom: 'Bfrtip',
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
