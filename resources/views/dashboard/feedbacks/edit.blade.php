@extends('dashboard.layout.master')
@section('title', 'Edit Feedback')

@section('content')
<div class="container">
    <h2>Edit Feedback</h2>

    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $feedback->full_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $feedback->email }}" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" required>{{ $feedback->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Feedback</button>
    </form>
</div>
@endsection
