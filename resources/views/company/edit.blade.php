@extends('layout.layout')
@section('content')

<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Company Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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

            <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data" style="background-color:#fff;padding:20px;">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $company->company_name }}" required>
                </div>

                <div class="form-group">
                    <label for="service_charge_value">Service Charge Value</label>
                    <input type="text" name="service_charge_value" id="service_charge_value" class="form-control" value="{{ $company->service_charge_value }}" required>
                </div>

                <div class="form-group">
                    <label for="vat_charge_value">VAT Charge Value</label>
                    <input type="text" name="vat_charge_value" id="vat_charge_value" class="form-control" value="{{ $company->vat_charge_value }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ $company->country }}" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="4" required>{{ $company->message }}</textarea>
                </div>

                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" name="currency" id="currency" class="form-control" value="{{ $company->currency }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Company Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div>
                        <img 
                            src="{{ $company->image ? asset('images/company/' . $company->image) : asset('images/company/item.png') }}" 
                            alt="Profile Image" 
                            width="100">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Company</button>
            </form>
        </div>
    </section>
</div>

@endsection
