@extends('layout.layout')

@section('content')

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profile Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile Setting</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
            @else
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data" style="background-color:#fff;padding:20px;">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $profile->firstname }}" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $profile->lastname }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $profile->username }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $profile->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $profile->phone }}" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="1" {{ $profile->gender == 1 ? 'selected' : '' }}>Male</option>
                        <option value="2" {{ $profile->gender == 2 ? 'selected' : '' }}>Female</option>
                        <option value="3" {{ $profile->gender == 3 ? 'selected' : '' }}>Transgender</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select name="company_id" class="form-control" required>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $profile->company_id ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="role_id">Role:</label>
                    <select name="role_id" class="form-control" required>
                        @foreach($role as $roles)
                            <option value="{{ $roles->id }}" {{ $roles->id == $profile->role_id ? 'selected' : '' }}>
                                {{ $roles->role_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div>
                        <img 
                            src="{{ $profile->image ? asset('images/users/' . $profile->image) : asset('images/users/item.png') }}" 
                            alt="Profile Image" 
                            width="100">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </section>
</div>

@endsection
