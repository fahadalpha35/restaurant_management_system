@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Item Lists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Items</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Item</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table id="storesTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->subcategory_name }}</td>
                        <td>{{ $product->price }} BDT</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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