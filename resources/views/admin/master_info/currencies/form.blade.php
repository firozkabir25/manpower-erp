<div class="mb-3">
    <label>Country</label>
    <select name="country_id" class="form-control">
        <option value="">Select Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}"
                {{ old('country_id', $currency->country_id ?? '') == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Currency *</label>
    <input type="text" name="currency" class="form-control"
        value="{{ old('currency', $currency->currency ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Currency Code</label>
    <input type="text" name="currency_code" class="form-control"
        value="{{ old('currency_code', $currency->currency_code ?? '') }}">
</div>

<div class="mb-3">
    <label>Currency Symbol</label>
    <input type="text" name="currency_symbol" class="form-control"
        value="{{ old('currency_symbol', $currency->currency_symbol ?? '') }}">
</div>

<div class="mb-3">
    <label>Value *</label>
    <input type="number" step="0.01" name="_value" class="form-control"
        value="{{ old('_value', $currency->_value ?? '0') }}" required>
</div>
