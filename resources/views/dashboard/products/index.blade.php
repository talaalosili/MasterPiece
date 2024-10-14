@extends('dashboard.layout.master')
@section('title', 'Products List')

@section('content')
    <div class="text-left">
        <a href="{{ route('products.create') }}" class="btn btn-success">+ Add Product</a>
    </div>

    <div class="card mt-3">
        <h5 class="card-header">Products List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="7">No products found.</td>
                        </tr>
                    @else
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" style="width:40px; height: 40px;" alt="image"/>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->category_type }}</td>
                                <td>
                                    <!-- View Button -->
                                    <form action="{{ route('products.show', $product->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View User">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>

                                    <!-- Edit Button -->
                                    <form action="{{ route('products.edit', $product->id) }}" method="GET" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>

                                    <!-- Delete Button with SweetAlert -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete User">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const form = this.closest('.delete-form');
                    const productName = form.closest('tr').querySelector('td:nth-child(3)').innerText; // Get product name

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete "${productName}". This action cannot be undone!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });

            // Auto-hide success message after 3 seconds
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
@endsection
