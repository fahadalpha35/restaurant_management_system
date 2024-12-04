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


    <div class="tablecontainer">
        <div class="tablebox">
            <div class="item">
                <b>Table 1</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad">
                <b>Table 2</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad">
                <b>Table 3</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 4</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox">
            <div class="item">
                <b>Table 5</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 3<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 6</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox">
            <div class="item">
                <b>Table 1</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad;">
                <b>Table 2</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad;">
                <b>Table 3</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 4</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox">
            <div class="item">
                <b>Table 5</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 3<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 6</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox">
            <div class="item">
                <b>Table 1</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad">
                <b>Table 2</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox2">
            <div class="item" style="background: #f5f93bad">
                <b>Table 3</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 4<br>
                <b>Status: Reserved</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 4</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox">
            <div class="item">
                <b>Table 5</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 3<br>
                <b>Status: Occupied</b> 
            </div>
        </div>&nbsp;&nbsp;
        <div class="tablebox3">
            <div class="item" style="background: #93cc66ad;">
                <b>Table 6</b><br>
                Seat Capacity: 4<br>
                Seat Occupied: 0<br>
                <b>Status: Available</b> 
            </div>
        </div>&nbsp;&nbsp;
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

.tablebox {
    background: #ff0000ad;
    color: white;
    padding: 1px;
    border-radius: 12px;
}

.tablebox2 {
    background: #ffca00;
    padding: 1px;
    border-radius: 12px;
}

.tablebox3 {
    background: #adf177ad;
    padding: 1px;
    border-radius: 12px;
}

.item {
  background: #cc6666ad;
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
