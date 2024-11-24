@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <a href="{{route('categories.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Edit Category</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="active">Active</label>
                    <select class="form-control" id="active" name="active">
                        <option value="1" {{ $category->active ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$category->active ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection
