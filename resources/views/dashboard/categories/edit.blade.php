@extends('dashboard.layout.master')
@section('title','Edit Category')

@section('content')
    <div class="text-left">
        <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Category</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <!-- Category Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Category Name" required>
                        <label for="name">Category Name</label>
                    </div>

                    <!-- Category Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <textarea name="description" class="form-control" id="description" placeholder="Category Description" rows="4" required>{{ $category->description }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    <!-- Category Type -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-select" name="category_type" id="category_type" required>
                            <option value="hannah" {{ $category->category_type == 'Hannah' ? 'selected' : '' }}>Hannah</option>
                            <option value="gender Reveal" {{ $category->category_type == 'Gender Reveal' ? 'selected' : '' }}>Gender Reveal</option>
                            <option value="wedding" {{ $category->category_type == 'Wedding' ? 'selected' : '' }}>Wedding</option>
                            <option value="engagement" {{ $category->category_type == 'Engagement' ? 'selected' : '' }}>Engagement</option>
                            <option value="graduation" {{ $category->category_type == 'Graduation' ? 'selected' : '' }}>Graduation</option>
                        </select>
                        <label for="category_type">Category Type</label>
                    </div>

                    <!-- Parent Category (Category ID) -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">No Parent Category</option>
                            @foreach($categories as $parentCategory)
                                <option value="{{ $parentCategory->id }}" {{ $category->category_id == $parentCategory->id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                            @endforeach
                        </select>
                        <label for="category_id">Parent Category</label>
                    </div>

                    <!-- Upload Image -->
                    <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                    <button class="btn btn-success">Update Category</button>

                </div>
            </form>
        </div>
    </div>
@endsection
