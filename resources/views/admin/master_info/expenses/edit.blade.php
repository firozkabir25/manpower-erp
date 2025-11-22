@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Expense</h3>

    <form action="{{ route('expenses.update', $data->id) }}" method="POST">
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

        <div class="mb-3">
            <label>Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $data->active == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $data->active == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Sort *</label>
            <input type="number" step="0.1" name="sort" value="{{ $data->sort }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
