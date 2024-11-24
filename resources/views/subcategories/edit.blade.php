@extends('layout.layout')
@section('content')  

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <a href="{{route('categories.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Edit Subcategory</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Subcategory Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $subcategory->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $subcategory->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select name="active" id="active" class="form-control" required>
                        <option value="1" {{ $subcategory->active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $subcategory->active == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>

@endsection
