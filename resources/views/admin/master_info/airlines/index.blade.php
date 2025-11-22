@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Airlines</h3>

    <a href="{{ route('airline.create') }}" class="btn btn-primary mb-3">
        + Add Airline
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Created By</th>
                <th width="160">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($airlines as $airline)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $airline->name }}</td>
                    <td>{{ $airline->code }}</td>
                    <td>{{ $airline->user->name ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('airline.edit', $airline->id) }}"
                           class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('airline.destroy', $airline->id) }}"
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this airline?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $airlines->links() }}
</div>
@endsection
