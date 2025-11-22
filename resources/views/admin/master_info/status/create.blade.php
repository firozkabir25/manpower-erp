@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Status</h3>

    <form action="{{ route('status.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Status Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Sort</label>
            <input type="number" step="0.0001" name="sort" class="form-control">
        </div>

        <button class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
