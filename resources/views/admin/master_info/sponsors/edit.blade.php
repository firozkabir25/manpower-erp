@extends('layouts.app')

@section('Sponsors', 'content')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('sponsors.update', $sponsor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Sponsor ID *</label>
                <input type="text" name="sponsor_id" value="{{ old('sponsor_id', $sponsor->sponsor_id) }}" class="form-control" required>
                @error('sponsor_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Name (English)</label>
                <input type="text" name="name" value="{{ old('name', $sponsor->name) }}" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Name (Arabic)</label>
                <input type="text" name="name_arabic" value="{{ old('name_arabic', $sponsor->name_arabic) }}" class="form-control">
                @error('name_arabic') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>User *</label>
                <input type="text" name="user_id" value="{{ old('user_id', $sponsor->user_id) }}" class="form-control" required>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address', $sponsor->address) }}</textarea>
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-center pt-2">
                <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>
</div>
@endsection
