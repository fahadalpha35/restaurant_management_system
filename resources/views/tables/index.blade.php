@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tables List</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('tables.create') }}" class="btn btn-success float-sm-right">Add New Table</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table id="storesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Table Name</th>
                        <th>Capacity</th>
                        <th>Available</th>
                        <th>Active</th>
                        <th>Store</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->table_name }}</td>
                            <td>{{ $table->capacity }}</td>
                            <td>{{ $table->available }}</td>
                            <td>{{ $table->active ? 'Yes' : 'No' }}</td>
                            <td>{{ $table->store_name }}</td>
                            <td>
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@push('masterScripts')
<script>
     $(document).ready(function() {
    $('#storesTable').DataTable({
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
