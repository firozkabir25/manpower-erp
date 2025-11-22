@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Working Profession</h3>

    <form action="{{ route('working-professions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <input type="hidden" name="user_id" value="{{ old('user_id', auth()->id()) }}">
            <label>User</label>
            <input type="text" class="form-control" value="{{ auth()->user()->name ?? auth()->id() }}" readonly>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
