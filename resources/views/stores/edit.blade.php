@extends('layout.layout')
@section('content')  

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Back Button -->
                    <a href="{{route('stores.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br>
                    <h1 class="m-0">Edit Floor</h1>
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
                    <label for="name">Floor Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $store->name }}" required>
                </div>
                <!-- Branch Selection -->
                <div class="form-group">
                    <label for="branch_id">Branch:</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $branch->id == $store->branch_id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option> 
                        @endforeach                       
                    </select>
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
                    <input type="text" readonly class="form-control" value="{{$user_company_name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Store</button>
            </form>
        </div>
    </section>
</div>

@endsection
