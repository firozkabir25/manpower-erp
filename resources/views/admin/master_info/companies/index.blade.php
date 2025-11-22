@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Companies</h1>

    <!-- Add Company Button -->
    <a href="{{ route('company.create') }}" class="btn btn-primary mb-3">Add Company</a>

    <!-- Success Message -->
    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <!-- Companies Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Short Name</th>
                <th>Arabic Name</th>
                <th>Country</th>
                <th>ID Number</th>
                <th>Contact By</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->short_name }}</td>
                <td>{{ $company->name_arabic }}</td>
                <td>{{ $company->country?->name ?? '-' }}</td>
                <td>{{ $company->id_number }}</td>
                <td>{{ $company->contact_by ?? '-' }}</td>
                <td>{{ $company->address ?? '-' }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->user?->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('company.edit', $company) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                    <form action="{{ route('company.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center">No companies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
