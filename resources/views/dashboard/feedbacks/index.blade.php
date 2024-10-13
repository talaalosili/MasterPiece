@extends('dashboard.layout.master')

@section('content')
    <h1>Feedbacks</h1>
    <a href="{{ route('feedback.create') }}" class="btn btn-primary">Create Feedback</a>

    @if($feedbacks->isEmpty())
        <p>No feedbacks found.</p>
    @else
        <table>
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
                        <td>{{ $feedback->id_feedback }}</td>
                        <td>{{ $feedback->full_name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>
                        
    <form action="{{ route('feedback.edit', $feedback->id_feedback) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('GET')
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="{{ route('feedback.destroy', $feedback->id_feedback) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete User">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
