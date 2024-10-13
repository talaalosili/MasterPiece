@extends('dashboard.layout.master')
@section('title', 'Edit Company')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('companies.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Company</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="company_name" value="{{ $company->company_name }}" class="form-control" id="companyNameInput" placeholder="Company Name" required>
                        <label for="companyNameInput">Company Name</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <textarea name="description" class="form-control" id="descriptionInput" rows="3" placeholder="Company Description" required>{{ $company->description }}</textarea>
                        <label for="descriptionInput">Description</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="phone" value="{{ $company->phone }}" class="form-control" id="phoneInput" placeholder="Company Phone" required>
                        <label for="phoneInput">Phone</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="address" value="{{ $company->address }}" class="form-control" id="addressInput" placeholder="Company Address" required>
                        <label for="addressInput">Address</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="email" name="email" value="{{ $company->email }}" class="form-control" id="emailInput" placeholder="Company Email" required>
                        <label for="emailInput">Email address</label>
                    </div>

                    

                    <button class="btn btn-success">Update</button>

                </div>
            </form>
        </div>
    </div>
@endsection
