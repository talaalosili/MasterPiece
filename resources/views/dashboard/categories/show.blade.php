@extends('dashboard.layout.master')
@section('title','View Category')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Category Info
        </div>
        <div class="card-body">
            <!-- Category Name -->
            <h5 class="card-title">Category Name: {{ $category->name }}</h5> 

            <!-- Category Image -->
           
            @if($category->image)
    <p><strong>Category Image:</strong></p>
    <img src="{{ asset( $category->image) }}" alt="Category Image" style="width: 150px; height: 150px;">
@else
    <p><strong>Category Image:</strong> No Image Available</p>
@endif

             
           
           
            <!-- Category Description -->
            <p class="card-text"><b>Description:</b> {{ $category->description }}</p>

            <!-- Category Type -->
            <p class="card-text"><b>Category Type:</b> {{ $category->category_type }}</p>

            <!-- Category Created By (User) -->
            <p class="card-text"><b>Created By (User ID):</b> {{ $category->user_id }}</p>
        </div>
    </div>

    <!-- Category Reviews Section -->
    <h5 class="mt-4">Category Reviews:</h5>

    <div class="row">
        @if($category->reviews && $category->reviews->count() > 0)
            @foreach($category->reviews as $review)
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
            <p class="text-muted">No reviews found for this category.</p>
        @endif
    </div>

@endsection
