@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Local Agents</h3>

    <a href="{{ route('localagent.create') }}" class="btn btn-primary mb-3">+ Add Local Agent</a>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>NID</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Ledger</th>
                <th>Code</th>
                <th>User</th>
                <th width="150">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($localagents as $agent)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->nid }}</td>
                    <td>{{ $agent->phone }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent?->ledger?->ledger ?? 'N/A' }}</td>
                    <td>{{ $agent->code }}</td>
                    <td>{{ $agent?->user?->name ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('localagent.edit', $agent->id) }}"
                           class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('localagent.destroy', $agent->id) }}"
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $localagents->links() }}

</div>
@endsection
