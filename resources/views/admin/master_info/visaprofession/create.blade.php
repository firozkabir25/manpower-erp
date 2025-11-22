@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Visa Profession</h3>

    <form action="{{ route('visa-profession.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Name Arabic *</label>
            <input type="text" name="namearabic" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>User *</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
