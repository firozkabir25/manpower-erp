@extends('layouts.app')

@section('Sponsors', 'content')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Sponsors List</h3>
            <a href="{{ route('sponsors.create') }}" class="btn btn-primary btn-sm float-right">+ Add Sponsor</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sponsor ID</th>
                    <th>Name</th>
                    <th>Arabic Name</th>
                    <th>User</th>
                    <th>Address</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sponsors as $key => $row)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $row->sponsor_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->name_arabic }}</td>
                    <td>{{ $row->user_id }}</td>
                    <td>{{ $row->address }}</td>
                    <td>
                        <a href="{{ route('sponsors.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sponsors.destroy', $row->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                Delete
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
