@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <section class="content">
        <div class="container-fluid">
        <a href="{{route('tables.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
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
                    <label for="active">Active:</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $table->active ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$table->active ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="store_id">Store:</label>
                    <select name="store_id" class="form-control" required>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}" {{ $store->id == $table->store_id ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection
