@extends('dashboard.layout.master')
@section('title','Create Product')

@section('content')
    <div class="text-left">
        <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Product</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Product Name -->
               <!-- Name field in the form -->
<div class="mb-3">
    <label for="name" class="form-label">Product Name:</label>
    <input type="text" id="name" name="name" class="form-control" required>
</div>


                <!-- Product Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>

                <div class="mb-3">
    <label for="category_id" class="form-label">Category:</label>
    <select id="category_id" name="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_type }}</option>
        @endforeach
    </select>
</div>



                <!-- Upload Image -->
                <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </div>
            </form>

        </div>
    </div>
@endsection
