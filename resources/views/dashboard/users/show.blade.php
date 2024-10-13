@extends('dashboard.layout.master')
@section('title','View User')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('users.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            User Info
        </div>
        <div class="card-body">
            <h5 class="card-title">User Name: {{ $user->fullname }}</h5> 

            <p class="card-text">
                @if($user->image)
                    <img src="{{ asset($user->image) }}" alt="User Image" style="width: 150px; height: 150px;">
                @endif
            </p>

            <p class="card-text"><b>User Email:</b> {{ $user->email }}</p>
            <p class="card-text"><b>User Mobile:</b> {{ $user->phone }}</p> 

            <p class="card-text"><b>User Role:</b>
                @if($user->role == '0') {{ 'User' }} @endif
                @if($user->role == '1') {{ 'Admin' }} @endif
                @if($user->role == '-1') {{ 'Super Admin' }} @endif
            </p>
        </div>
    </div>

    <h5 class="mt-4">User Reviews:</h5>

    <div class="row">
        @if($user->testimonials && $user->testimonials->count() > 0)
            @foreach($user->testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h4 class="card-title">{{ $user->fullname }}</h4>
                            <p class="card-text">User Review: {{ $testimonial->review }}</p>
                            <p class="card-text">Created At: {{ $testimonial->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">No reviews found for this user.</p>
        @endif
    </div>

@endsection