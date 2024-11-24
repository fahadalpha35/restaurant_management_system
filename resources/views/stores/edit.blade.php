@extends('layout.layout')
@section('content')  

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Back Button -->
                    <a href="{{route('stores.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Edit Store</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('stores.update', $store->id) }}" method="POST"   style="background-color:#fff;padding:20px;">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Store Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $store->name }}" required>
                </div>
                <div class="form-group">
                    <label for="active">Active</label>
                    <select class="form-control" name="active" id="active">
                        <option value="1" {{ $store->active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$store->active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select name="company_id" class="form-control" required>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $store->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option> 
                            @endforeach                       
                   </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Store</button>
            </form>
        </div>
    </section>
</div>

@endsection
