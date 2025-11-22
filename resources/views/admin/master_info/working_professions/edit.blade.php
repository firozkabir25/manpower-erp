@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Working Profession</h3>

    <form action="{{ route('working-professions.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>User ID *</label>
            <input type="text" name="user_id" value="{{ $data->user_id }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
