@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('tables.index') }}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
            <h2>Edit Table</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('tables.update', $table->id) }}" method="POST" style="background-color:#fff;padding:20px;">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="table_name">Table Name:</label>
                    <input type="text" name="table_name" class="form-control" value="{{ $table->table_name }}" required>
                </div>
                <div class="form-group">
                    <label for="capacity">Capacity:</label>
                    <input type="text" name="capacity" class="form-control" value="{{ $table->capacity }}" required>
                </div>
                <div class="form-group">
                    <label for="available">Available:</label>
                    <input type="number" name="available" class="form-control" value="{{ $table->available }}" required>
                </div>
                
                <div class="form-group">
                    <label for="branch">Branch:</label>
                    <select name="branch_id" id="branch" class="form-control" required>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $branch->id == $table->selectedBranchId ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="store_id">Store:</label>
                    <select name="store_id" id="store" class="form-control" required>
                        @foreach($stores as $store)
                            <option value="{{ $table->id }}" {{ $store->id == $table->selectedStoreId ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="active">Active:</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $table->active == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $table->active == 0 ? 'selected' : '' }}>No</option>
                        <option value="3" {{ $table->active == 3 ? 'selected' : '' }}>Reserved</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('masterScripts')
<script>
    $(document).ready(function () {

        $('#branch').on('change', function () {
            var branchId = $(this).val();
            if (branchId) {
                $.ajax({
                    url: '/get-floor/' + branchId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#store').empty().append('<option value="">Select Floor</option>');
                        $.each(data, function (key, value) {
                            $('#store').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Clear the Table dropdown
                        $('#table').empty().append('<option value="">Select Table</option>');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching floors:', error);
                    }
                });
            } else {
                $('#store').empty().append('<option value="">Select Floor</option>');
                $('#table').empty().append('<option value="">Select Table</option>');
            }
        });





        // Fetch Floors based on selected Branch
        // $('#branch').on('change', function () {
        //     var branchId = $(this).val();
        //     if (branchId) {
        //         $.ajax({
        //             url: '/get-branch/' + branchId, // URL for fetching floors
        //             type: 'GET',
        //             dataType: 'json',
        //             success: function (data) {
        //                 $('#store').empty().append('<option value="" disabled selected>Select Floor</option>');
        //                 $.each(data, function (key, value) {
        //                     $('#store').append('<option value="' + value.id + '">' + value.name + '</option>');
        //                 });
        //             },
        //             error: function (xhr, status, error) {
        //                 console.error('Error fetching floors:', error);
        //             }
        //         });
        //     } else {
        //         $('#store').empty().append('<option value="" disabled selected>Select Floor</option>');
        //     }
        // });




    });
</script>
@endpush
