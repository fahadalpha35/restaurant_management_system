@extends('layout.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding: 20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Profile Section -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12 col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Profile Information</h4>
                            </div>
                            <div class="card-body text-center">

                                <!-- Profile Image -->
                                <!-- <div class="profile-image mb-4">
                                    <img src="{{ $user->profile_image ?? asset('images/default-profile.png') }}" 
                                         alt="Profile Image" 
                                         class="img-thumbnail" 
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                </div> -->

                                <div class="profile-image mb-4">
                                    <img src="http://restaurant.test/dist/img/fahad.jpg" 
                                         alt="Profile Image" 
                                         class="img-thumbnail" 
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                </div>
                                
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td><strong>Username</strong></td>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>First Name</strong></td>
                                            <td>{{ $user->firstname }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Name</strong></td>
                                            <td>{{ $user->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender</strong></td>
                                            <td>
                                                @if($user->gender == 1)
                                                    Male
                                                @elseif($user->gender == 2)
                                                    Female
                                                @elseif($user->gender == 3)
                                                    Transgender
                                                @else
                                                    Not Specified
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone</strong></td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Group</strong></td>
                                            <td><button class="btn btn-info btn-sm">Super Administrator</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Section -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
