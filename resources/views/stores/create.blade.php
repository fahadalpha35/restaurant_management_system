@extends('layout.layout')
@section('content')  

<div class="content-wrapper" style="padding:20px;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ route('stores.index') }}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br><br>
          <h1 class="m-0">Create Floor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Floor</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content" style="background-color:#fff;padding:20px;">
    <div class="container-fluid">
      <form action="{{ route('stores.store') }}" method="POST">
        @csrf
        <div class="form-group">
                    <label for="company_id">Company:</label>
                    <input type="text" readonly class="form-control" value="{{$user_company_name}}">
        </div>
        <div class="form-group">
          <label for="name">Floor Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        
        <div class="form-group">
          <label for="branch_id">Branch</label>
          <select name="branch_id" class="form-control" required>
            <option value="">Select a Branch</option>
            @foreach ($branches as $branch)
              <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="active">Active</label>
          <select class="form-control" name="active" id="active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Floor</button>
      </form>
    </div>
  </section>
</div>

@endsection
