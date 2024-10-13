@extends('dashboard.layout.master')
@section('title','Create Feedback')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('feedback.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Feedback</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Full Name -->
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" class="form-control" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                </div>

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Feedback</button>
                </div>
            </form>

        </div>
    </div>
@endsection
