@extends('layout.layout')
@section('content')  

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Floors</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('stores.create')}}" class="btn btn-success float-sm-right">Add New Floor</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="storesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i =1 @endphp
                    @foreach($stores->sortBy('branch_name') as $store)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->branch_name }}</td>
                            <td>{{ $store->company_name }}</td>
                            <td>{{ $store->active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- <script>
    $(document).ready(function() {
        $('#storesTable').DataTable();
    });
</script> -->

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
