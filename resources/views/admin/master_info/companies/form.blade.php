<div class="mb-3">
    <label>Name *</label>
    <input type="text" name="name" class="form-control" value="{{ $company->name ?? old('name') }}" required>
</div>

<div class="mb-3">
    <label>Short Name</label>
    <input type="text" name="short_name" class="form-control" value="{{ $company->short_name ?? old('short_name') }}">
</div>

<div class="mb-3">
    <label>Arabic Name</label>
    <input type="text" name="name_arabic" class="form-control" value="{{ $company->name_arabic ?? old('name_arabic') }}">
</div>

<div class="mb-3">
    <label>Country</label>
    <select name="country_id" class="form-control">
        <option value="">Select Country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ (isset($company) && $company->country_id == $country->id) ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>ID Number *</label>
    <input type="text" name="id_number" class="form-control" value="{{ $company->id_number ?? old('id_number') }}" required>
</div>

<div class="mb-3">
    <label>Contact By</label>
    <input type="text" name="contact_by" class="form-control" value="{{ $company->contact_by ?? old('contact_by') }}">
</div>

<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ $company->address ?? old('address') }}</textarea>
</div>

<div class="mb-3">
    <label>Email *</label>
    <input type="email" name="email" class="form-control" value="{{ $company->email ?? old('email') }}" required>
</div>

<div class="mb-3">
    <label>Phone *</label>
    <input type="text" name="phone" class="form-control" value="{{ $company->phone ?? old('phone') }}" required>
</div>
