<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control"
                    value="{{ old('date', $item->date ?? '') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Company</label>
                <select name="company_id" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach($companies as $c)
                        <option value="{{ $c->id }}"
                            {{ old('company_id', $item->company_id ?? '') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Block Number</label>
                <input type="text" name="block_number" class="form-control"
                    value="{{ old('block_number', $item->block_number ?? '') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Sponsor</label>
                <select name="sponsor_id" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach($sponsors as $s)
                        <option value="{{ $s->id }}"
                            {{ old('sponsor_id', $item->sponsor_id ?? '') == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Alwaka No</label>
                <input type="text" name="alwaka_no" class="form-control"
                    value="{{ old('alwaka_no', $item->alwaka_no ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Quantity</label>
                <input type="number" step="0.0001" name="quantity" class="form-control"
                    value="{{ old('quantity', $item->quantity ?? '') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Visa Profession</label>
                <select name="visa_profession" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach($professions as $p)
                        <option value="{{ $p->id }}"
                            {{ old('visa_profession', $item->visa_profession ?? '') == $p->id ? 'selected' : '' }}>
                            {{ $p->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Licence</label>
                <select name="licence_id" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach($licences as $l)
                        <option value="{{ $l->id }}"
                            {{ old('licence_id', $item->licence_id ?? '') == $l->id ? 'selected' : '' }}>
                            {{ $l->licence }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Active</label>
                <select name="active" class="form-control">
                    <option value="1" {{ old('active', $item->active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('active', $item->active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

    </div>

    <div class="card-footer">
        <button class="btn btn-success">{{ $button ?? 'Save' }}</button>
    </div>
</div>
