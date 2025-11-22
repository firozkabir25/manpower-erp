@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Expense</h3>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- <div class="mb-3">
            <label>User ID *</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Active</label>
            <select name="active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div> --}}

        <div class="mb-3">
            <label>Sort *</label>
            <input type="number" step="0.1" name="sort" value="0.0" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
