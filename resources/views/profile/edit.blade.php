@extends('layout.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profile Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            Profile Settings
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
