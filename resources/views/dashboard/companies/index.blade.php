@extends('dashboard.layout.master')
@section('title', 'Companies')

@section('content')
    <div class="text-left">
        <a href="{{ route('companies.create') }}" class="btn btn-success">+ Add Company</a>
    </div>

    <div class="card mt-4">
        <div class="card-header">Companies List</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>
                            <!-- View Company -->
                            <form action="{{ route('companies.show', $company->id) }}" method="GET" style="display:inline-block;">
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Company">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <!-- Edit Company -->
                            <form action="{{ route('companies.edit', $company->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('GET')
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Company">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <!-- Delete Company -->
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete Company">
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
