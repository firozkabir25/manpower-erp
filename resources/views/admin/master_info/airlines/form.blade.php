<div class="mb-3">
    <label>Name *</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $airline->name ?? '') }}" required>
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Code *</label>
    <input type="text" name="code" class="form-control"
           value="{{ old('code', $airline->code ?? '') }}" required>
    @error('code') <small class="text-danger">{{ $message }}</small> @enderror
</div>
