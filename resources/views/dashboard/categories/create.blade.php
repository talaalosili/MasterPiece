@extends('dashboard.layout.master')
@section('title','Create Category')

@section('content')
    <div class="text-left">
        <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Category</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <!-- Category Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                </div>

                <!-- Category Type -->
                <div class="mb-3">
                    <label for="category_type" class="form-label">Category Type:</label>
                    <select id="category_type" name="category_type" class="form-control" required>
                    <option value="hannah">Hannah</option>
            <option value="gender reveal">Gender Reveal</option>
            <option value="wedding">Wedding</option>
            <option value="engagement">Engagement</option>
            <option value="graduation">Graduation</option>
                    </select>
                </div>

                

                <!-- Upload Image -->
                <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>

        </div>
    </div>
@endsection
