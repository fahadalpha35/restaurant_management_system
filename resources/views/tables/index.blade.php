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

    <div class="form-container">
            <div class="form-group">
                <label for="store">Branch Name:</label>
                <select name="store" id="store" class="form-control">
                    <option value="">Select Branch</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group">
                <label for="other">Floor Name:</label>
                <select name="other" id="other" class="form-control">
                    <option value="">Select Floor</option>
                    <!-- Add options here -->
                </select>
            </div>
    </div>
    @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    <div class="tablecontainer">

        @foreach($tables->sortBy('branch_name') as $table)
            <div class="tablebox" 
                style="background: 
                    @if($table->active == 0) #ff0000ad; 
                    @elseif($table->active == 1) #14af0bad; 
                    @elseif($table->active == 3) #ffca00; 
                    @endif;">
                <div class="item">
                    <b>{{ $table->table_name }}</b><br>
                    Seat Capacity: {{ $table->capacity }}<br>
                    Floor: {{ $table->store_name }}<br>
                    Branch: {{ $table->branch_name }}<br>
                    <b>Status: 
                        @if($table->active == 0)
                            Occupied
                        @elseif($table->active == 1)
                            Available
                        @elseif($table->active == 3)
                            Reserved
                        @endif
                    </b> 
                </div>
            </div>&nbsp;&nbsp;
        @endforeach

    </div>
    <br>
    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">

            <table id="storesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Table Name</th>
                        <th>Capacity</th>
                        <th>Available</th>
                        <th>Floor</th>
                        <th>Branch</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i =1 @endphp
                    @foreach($tables->sortBy('branch_name') as $table)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $table->table_name }}</td>
                            <td>{{ $table->capacity }}</td>
                            <td>{{ $table->available }}</td>
                            <td>{{ $table->store_name }}</td>
                            <td>{{ $table->branch_name }}</td>
                            <td>
                                @if($table->active == 1)
                                    Yes
                                @elseif($table->active == 0)
                                    No
                                @else($table->active == 3)
                                    Reserved
                                @endif
                            </td>
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
<style>

.tablecontainer {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  padding: 10px;
}

@media screen and (min-width: 768px) {
  .tablecontainer {
    flex-direction: row;
  }
}

@media screen and (min-width: 768px) {
  .tablebox{width: 221px;}
}

.tablebox {
    color: white;
    padding: 1px;
    border-radius: 12px;
}

.item {
  background: #30376bad;
  border-radius: 32px;
  padding: 15px;
  margin: 10px;
  min-width: 15%;
  flex-grow: 1;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.item:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.19), 0 26px 26px rgba(0, 0, 0, 0.23);
}

</style>

@endsection

@push('masterScripts')
<script>
     $(document).ready(function() {
    $('#storesTable').DataTable({
      responsive: true, // Enable responsive behavior
      dom: 'Bfrtip',
      pageLength: 20,
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
