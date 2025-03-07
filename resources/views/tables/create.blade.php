@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('tables.index') }}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
            <h2>Create New Table</h2>
            <form action="{{ route('tables.store') }}" method="POST" style="background-color:#fff;padding:20px;">
                @csrf
                <div class="form-group">
                    <label for="table_name">Table Name:</label>
                    <input type="text" name="table_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="capacity">Capacity:</label>
                    <input type="text" name="capacity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="available">Available:</label>
                    <input type="number" name="available" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="branch">Branch:</label>
                    <select name="branch_id" id="branch" class="form-control" required>
                        <option value="" disabled selected>Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="store">Floor:</label>
                    <select name="store_id" id="store" class="form-control" required>
                        <option value="" disabled selected>Select Floor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="active">Active:</label>
                    <select name="active" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        <option value="3">Reserved</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('masterScripts')
<script>
    $(document).ready(function () {
        // Fetch Floors based on selected Branch
        $('#branch').on('change', function () {
            var branchId = $(this).val();
            if (branchId) {
                $.ajax({
                    url: '/get-floor/' + branchId, // URL for fetching floors
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#store').empty().append('<option value="" disabled selected>Select Floor</option>');
                        $.each(data, function (key, value) {
                            $('#store').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching floors:', error);
                    }
                });
            } else {
                $('#store').empty().append('<option value="" disabled selected>Select Floor</option>');
            }
        });
    });
</script>
@endpush
