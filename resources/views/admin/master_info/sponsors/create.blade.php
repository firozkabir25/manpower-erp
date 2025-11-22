@extends('layouts.app')

@section('Sponsors', 'content')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('sponsors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Sponsor ID *</label>
                <input type="text" name="sponsor_id" value="{{ old('sponsor_id') }}" class="form-control" required>
                @error('sponsor_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Name (English)</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Name (Arabic)</label>
                <input type="text" name="name_arabic" value="{{ old('name_arabic') }}" class="form-control">
                @error('name_arabic') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ old('user_id', auth()->id()) }}">
                <label>User</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name ?? auth()->id() }}" readonly>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-center pt-2">
                <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </form>
    </div>
</div>
@endsection
