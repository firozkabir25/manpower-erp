<div class="mb-3">
    <label>Name *</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $localagent->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>NID *</label>
    <input type="number" name="nid" class="form-control"
           value="{{ old('nid', $localagent->nid ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control"
           value="{{ old('phone', $localagent->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Email *</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $localagent->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control" rows="2">{{ old('address', $localagent->address ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Ledger</label>
    <select name="ledger_id" class="form-control">
        <option value="">Select Ledger</option>
        @foreach ($ledgers as $ledger)
            <option value="{{ $ledger->id }}"
                {{ old('ledger_id', $localagent->ledger_id ?? '') == $ledger->id ? 'selected' : '' }}>
                {{ $ledger->ledger }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Code *</label>
    <input type="number" name="code" class="form-control"
           value="{{ old('code', $localagent->code ?? '') }}" required>
</div>
