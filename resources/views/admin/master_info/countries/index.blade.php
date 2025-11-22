@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Country List</h3>

    <a href="{{ route('country.create') }}" class="btn btn-primary mb-3">Add New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Short</th>
                <th>Visa Days</th>
                <th>Police Days</th>
                <th>Medical Days</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($countries as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->short }}</td>
                <td>{{ $c->visa_expire_days }}</td>
                <td>{{ $c->police_expire_days }}</td>
                <td>{{ $c->medical_expire_days }}</td>

                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('country.edit',$c->id) }}">Edit</a>

                    <form action="{{ route('country.destroy',$c->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
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
