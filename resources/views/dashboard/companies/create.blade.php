@extends('dashboard.layout.master')
@section('title', 'Create Company')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('companies.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Company</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name:</label>
                    <input type="text" id="company_name" name="company_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

            
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Company</button>
                </div>
            </form>

        </div>
    </div>
@endsection
