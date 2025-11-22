@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Status List</h3>

    <a href="{{ route('status.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User</th>
                <th>Sort</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ optional($item->user)->name ?? $item->user_id }}</td>
                <td>{{ $item->sort }}</td>
                <td>
                    <a href="{{ route('status.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('status.destroy', $item->id) }}" 
                          method="POST"
                          style="display:inline-block;">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete?')" 
                                class="btn btn-danger btn-sm">
                                Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
