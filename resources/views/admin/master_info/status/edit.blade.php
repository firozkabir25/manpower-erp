@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Status</h3>

    <form action="{{ route('status.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Status Name *</label>
            <input type="text" name="name" class="form-control" 
                   value="{{ $data->name }}" required>
        </div>

        <div class="form-group mt-2">
            <label>Sort</label>
            <input type="number" step="0.0001" name="sort" 
                   class="form-control" 
                   value="{{ $data->sort }}">
        </div>

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
