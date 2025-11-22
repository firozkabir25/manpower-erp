@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Visa Profession</h3>

    <form action="{{ route('visa-profession.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Name Arabic *</label>
            <input type="text" name="namearabic" value="{{ $data->namearabic }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>User *</label>
            <input type="text" name="user_id" value="{{ $data->user_id }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
