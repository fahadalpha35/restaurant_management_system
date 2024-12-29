@extends('layout.layout')
@section('content')  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:20px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        <!-- Back Button -->
        <!-- <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a><br><br><br> -->
        <a href="{{route('branches.index')}}" class="btn btn-secondary" style="background-color:#17a2b8;">Back</a><br><br><br>
          <h1 class="m-0">Create Branch</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Branch</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content" style="background-color:#fff;padding:20px;border-radius:15px;">
    <div class="container-fluid">
      
      <!-- Create Store Form -->
      <form action="{{ route('branches.store') }}" method="POST">
        @csrf

        <div class="form-group">
                    <label for="company_id">Company:</label>
                    <input type="text" readonly class="form-control" value="{{$user_company_name}}">
        </div>
        <div class="form-group">
          <label for="name">Branch Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="active">Active</label>
          <select class="form-control" name="active" id="active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Branch</button>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

@endsection
