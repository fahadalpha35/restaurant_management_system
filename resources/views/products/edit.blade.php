@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Edit Item</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="subcategory_id">Subcategory</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        <option value="">Select Sub Category</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="store_id">Store</label>
                    <select name="store_id" id="store_id" class="form-control">
                        @foreach($store as $stores)
                            <option value="{{ $stores->id }}" {{ $stores->id == $product->store_id ? 'selected' : '' }}>{{ $stores->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $product->active == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $product->active == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </section>
</div>

<!-- jQuery should be included if not already -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load subcategories when the page loads
        function loadSubcategories(categoryId, selectedSubcategoryId = null) {
            if(categoryId) {
                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Select Sub Category</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '"' + (value.id == selectedSubcategoryId ? ' selected' : '') + '>' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').empty();
                $('#subcategory_id').append('<option value="">Select Sub Category</option>');
            }
        }

        // When the category is changed, update the subcategories
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            loadSubcategories(categoryId);
        });

        // Load subcategories for the initially selected category
        var initialCategoryId = $('#category_id').val();
        var selectedSubcategoryId = '{{ $product->subcategory_id }}';
        loadSubcategories(initialCategoryId, selectedSubcategoryId);
    });
</script>
@endsection
