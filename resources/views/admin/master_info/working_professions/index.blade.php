@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Working Profession List</h3>

    <a href="{{ route('working-professions.create') }}" class="btn btn-primary mb-3">
        Add New
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>
                        <a href="{{ route('working-professions.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('working-professions.destroy', $item->id) }}"
                              method="POST" style="display:inline-block;">
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
