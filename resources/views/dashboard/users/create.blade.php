@extends('dashboard.layout.master')
@section('title','Create User')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('users.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add User</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        <option value="-1">Super Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>

        </div>
    </div>
@endsection
