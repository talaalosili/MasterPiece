@extends('dashboard.layout.master')
@section('title', 'View Company')

@section('content')
    <div class="text-left">
        <a href="{{ route('companies.index') }}" class="btn btn-primary p-2">Back to List</a>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Company Information
        </div>
        <div class="card-body">
            <!-- Company Name -->
            <h5 class="card-title">Company Name: {{ $company->company_name }}</h5>

            <!-- Company Image -->
            <!-- <p class="card-text">
                @if($company->image)
                    <img src="{{ asset('storage/' . $company->image) }}" alt="Company Image" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default-company.png') }}" alt="Default Company Image" style="width: 150px; height: 150px; object-fit: cover;">
                @endif
            </p> -->

            <!-- Company Email -->
            <p class="card-text"><b>Company Email:</b> {{ $company->email }}</p>

            <!-- Company Phone -->
            <p class="card-text"><b>Company Phone:</b> {{ $company->phone }}</p>

            <!-- Company Address -->
            <p class="card-text"><b>Company Address:</b> {{ $company->address }}</p>

            <!-- Company Description -->
            <p class="card-text"><b>Company Description:</b> {{ $company->description }}</p>
        </div>
    </div>

    <!-- Company Reviews Section -->
    <h5 class="mt-4">Company Reviews:</h5>

    <div class="row">
        @if($company->testimonials && $company->testimonials->count() > 0)
            @foreach($company->testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h6 class="card-title">{{ $testimonial->title }}</h6>
                            <p class="card-text">Review: {{ $testimonial->review }}</p>
                            <p class="card-text text-muted">Created At: {{ $testimonial->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">No reviews found for this company.</p>
        @endif
    </div>
@endsection
