@extends('layouts.app')

@section('Licence', 'content')
    @section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('licence.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Licence No *</label>
                <input type="text" name="licence" value="{{ old('licence') }}" class="form-control" required>
                @error('licence') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>RL No *</label>
                <input type="text" name="rlno" value="{{ old('rlno') }}" class="form-control" required>
                @error('rlno') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>User *</label>
                <select name="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
            </div>

            <div class="d-flex justify-content-center pt-2">
                <a href="{{ route('licence.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection