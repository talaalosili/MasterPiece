@extends('dashboard.layout.master')
@section('title', 'Categories')

@section('content')
    <div class="text-left">
        <a href="{{ route('categories.create') }}" class="btn btn-success waves-effect waves-light">+ Add Category</a>
    </div>
    <div class="card">
        <h5 class="card-header">Category Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Category Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                           <img src="{{ asset($category->image) }}" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->category_type }}</td>

                        <td>
                            <!-- View Category -->
                            <form action="{{ route('categories.show', $category->id) }}" method="GET" style="display:inline-block;">
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Category">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <!-- Edit Category -->
                            <form action="{{ route('categories.edit', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('GET')
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Category">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <!-- Delete Category -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete Category">
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
                            form.submit(); // Submit the form only if confirmed
                        }
                    });
                });
            });
        });
    </script> 
@endsection
