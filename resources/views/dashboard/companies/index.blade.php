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
    <form action="{{ route('companies.show', $company->id) }}" method="GET" style="display:inline-block;">
        <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Company">
            <i class="fas fa-eye"></i>
        </button>
    </form>

    <form action="{{ route('companies.edit', $company->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('GET')
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Company">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
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
        </div>
    </div>
@endsection
