<div class="form-group">
    <label>Name *</label>
    <input type="text" name="name" value="{{ old('name', $agent?->name ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Country</label>
    <select name="country_id" class="form-control">
        <option value="">-- Select Country --</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}"
                {{ old('country_id', $agent?->country_id ?? '') == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Email *</label>
    <input type="email" name="email" value="{{ old('email', $agent?->email ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Phone *</label>
    <input type="text" name="phone" value="{{ old('phone', $agent?->phone ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control" rows="3">{{ old('address', $agent?->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>User *</label>
    <input type="hidden" name="user_id" value="{{ old('user_id', $agent?->user_id ?? auth()->id()) }}">
    <input type="text" class="form-control" value="{{ $agent?->user?->name ?? auth()->user()?->name ?? auth()->id() }}" readonly>
</div>

<div class="form-group">
    <label>Ledger *</label>
    <div class="input-group">
         <input type="hidden" name="ledger_id" id="ledger_id"
             value="{{ old('ledger_id', $agent?->ledger_id ?? '') }}">

         <input type="text" id="ledger_name"
             value="{{ old('ledger_name', $agent?->ledger?->ledger ?? '') }}"
               class="form-control"
               placeholder="Select Ledger"
               readonly>

        <button type="button" class="btn btn-primary" onclick="openLedgerPopup()">
            <i class="fa fa-search"></i>
        </button>
    {{-- <label>Ledger</label>
    <input type="text" name="ledger_id" value="{{ old('ledger_id', $agent?->ledger_id ?? '') }}" class="form-control"> --}}
</div>
