@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h3>Foreign Agents</h3>
    <a href="{{ route('foreign-agents.create') }}" class="btn btn-success">Add New</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Country</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Ledger ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($agents as $agent)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $agent->name }}</td>
            <td>{{ $agent->country->name ?? '--' }}</td>
            <td>{{ $agent->email }}</td>
            <td>{{ $agent->phone }}</td>
            <td>{{ $agent->ledger_id }}</td>
            <td>
                <a href="{{ route('foreign-agents.edit', $agent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('foreign-agents.destroy', $agent->id) }}" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Del</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $agents->links() }}
@endsection
