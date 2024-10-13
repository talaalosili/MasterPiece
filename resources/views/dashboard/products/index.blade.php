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
    <form action="{{ route('products.show', $product->id) }}" method="GET" style="display:inline-block;">
        <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View User">
            <i class="fas fa-eye"></i>
        </button>
    </form>

    <form action="{{ route('products.edit',$product->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('GET')
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete User">
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
@endsection
