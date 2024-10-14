@extends('dashboard.layout.master')
@section('title', 'Users')

@section('content')
    <div class="text-left">
        <a href="{{ route('users.create') }}" class="btn btn-success waves-effect waves-light">+ Add User</a>
    </div>
    <div class="card">
        <h5 class="card-header">User Table</h5>
        
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                           <img src="{{ asset($user->image) }}" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == '0')
                                <span class="badge bg-primary">User</span>
                            @elseif($user->role == '1')
                                <span class="badge bg-success">Admin</span>
                            @elseif($user->role == '-1')
                                <span class="badge bg-warning">Super Admin</span>
                            @endif
                        </td>
                        <td>
                            <!-- View User -->
                            <form action="{{ route('users.show', $user->id) }}" method="GET" style="display:inline-block;">
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View User">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <!-- Edit User -->
                            <form action="{{ route('users.edit', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('GET')
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <!-- Delete User -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete User">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert Script -->
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
