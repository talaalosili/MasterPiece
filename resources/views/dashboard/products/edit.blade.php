@extends('dashboard.layout.master')
@section('title','Edit Product')

@section('content')
    <div class="text-left">
        <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Product</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <!-- Product Name -->
                    <div class="mb-3">
    <label for="name" class="form-label">Product Name:</label>
    <input type="text" id="name" name="name" class="form-control" required>
</div>


                    <!-- Product Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <textarea name="description" class="form-control" id="description" placeholder="Product Description" rows="4" required>{{ $product->description }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    <!-- Product Price -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Price" step="0.01" required>
                        <label for="price">Price</label>
                    </div>

                    <div class="mb-3">
    <label for="category_id" class="form-label">Category:</label>
    <select id="category_id" name="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                {{ $category->category_type }}
            </option>
        @endforeach
    </select>
</div>


                    <!-- Upload Image -->
                    <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                    <button class="btn btn-success">Update Product</button>

                </div>
            </form>
        </div>
    </div>
@endsection
