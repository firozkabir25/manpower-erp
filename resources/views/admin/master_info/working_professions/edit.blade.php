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
            <input type="hidden" name="user_id" value="{{ old('user_id', $data->user_id ?? auth()->id()) }}">
            <label>User</label>
            <input type="text" class="form-control" value="{{ optional($data->user)->name ?? $data->user_id }}" readonly>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
