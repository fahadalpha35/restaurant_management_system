@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <a href="{{route('products.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Add New Product</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
        <div class="container-fluid">
        <form action="{{ route('products.store') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Sub Category</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="store_id">Store</label>
                <select name="store_id" id="store_id" class="form-control">
                    @foreach($store as $stores)
                        <option value="{{ $stores->id }}">{{ $stores->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
        </div>
    </section>
</div>

<script>
    // Fetch subcategories based on selected category
    document.getElementById('category_id').addEventListener('change', function() {
        const categoryId = this.value;
        fetch(`/api/subcategories/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                const subcategorySelect = document.getElementById('subcategory_id');
                subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
                data.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            });
    });
</script>
@endsection
