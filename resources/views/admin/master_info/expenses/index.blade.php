@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Expense List</h3>

    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">
        Add New
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User</th>
                <th>Active</th>
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
                <td>
                    <a href="{{ route('expenses.toggle.active', $item->id) }}"
                       class="btn btn-sm {{ $item->active == '1' ? 'btn-success' : 'btn-secondary' }}">
                        {{ $item->active == '1' ? 'Active' : 'Inactive' }}
                    </a>
                </td>
                <td>{{ $item->sort }}</td>
                <td>
                    <a href="{{ route('expenses.edit', $item->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('expenses.destroy', $item->id) }}" method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">
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
