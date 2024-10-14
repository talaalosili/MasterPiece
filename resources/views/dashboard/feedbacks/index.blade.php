@extends('dashboard.layout.master')
@section('title', 'Feedbacks')

@section('content')
    <div class="text-left">
        <a href="{{ route('feedback.create') }}" class="btn btn-primary">+ Add Feedback</a>
    </div>

    <div class="card mt-4">
        <div class="card-header">Feedbacks List</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($feedbacks->isEmpty())
                <p>No feedbacks found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $feedback->full_name }}</td>
                            <td>{{ $feedback->email }}</td>
                            <td>{{ Str::limit($feedback->message, 50) }}</td>
                            <td>
                                <!-- Edit Feedback -->
                                <form action="{{ route('feedback.edit', $feedback->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Feedback">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>

                                <!-- Delete Feedback -->
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete Feedback">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- SweetAlert Script for Confirm Delete -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = button.closest('form'); // Select the closest form for deletion

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>
@endsection
