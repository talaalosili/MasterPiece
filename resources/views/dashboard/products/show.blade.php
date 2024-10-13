@extends('dashboard.layout.master')
@section('title', 'View Product')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Product Info
        </div>
        <div class="card-body">
            <!-- Product Name -->
            <h5 class="card-title">Product Name: {{ $product->name }}</h5> 

            <!-- Product Image -->
            @if($product->image)
                <p><strong>Product Image:</strong></p>
                <img src="{{ asset($product->image) }}" alt="Product Image" style="width: 150px; height: 150px;">
            @else
                <p><strong>Product Image:</strong> No Image Available</p>
            @endif

            <!-- Product Description -->
            <p class="card-text"><b>Description:</b> {{ $product->description }}</p>

            <!-- Product Price -->
            <p class="card-text"><b>Price:</b> {{ number_format($product->price, 2) }} $</p>

            <!-- Product Category -->
            <p class="card-text"><b>Category:</b> {{ $product->category->name }}</p> <!-- Assuming category relationship exists -->

            <!-- Product Created By (User) -->
            <p class="card-text"><b>Created By (User ID):</b> {{ $product->user_id }}</p>
        </div>
    </div>

    <!-- Product Reviews Section -->
    <h5 class="mt-4">Product Reviews:</h5>

    <div class="row">
        @if($product->reviews && $product->reviews->count() > 0)
            @foreach($product->reviews as $review)
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h4 class="card-title">{{ $review->title }}</h4>
                            <p class="card-text">Review: {{ $review->review }}</p>
                            <p class="card-text">Created At: {{ $review->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">No reviews found for this product.</p>
        @endif
    </div>

@endsection
