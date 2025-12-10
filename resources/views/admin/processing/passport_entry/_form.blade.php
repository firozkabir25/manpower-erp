<div class="row">
    <div class="col-md-4 mb-3">
        <label>Passport *</label>
        <input type="text" name="passport_no" class="form-control" value="{{ old('passport_no', $passportEntry->passport_no ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label>Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $passportEntry->name ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label>Father's Name</label>
        <input type="text" name="fathers_name" class="form-control"
               value="{{ old('fathers_name', $passportEntry->fathers_name ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Mother's Name</label>
        <input type="text" name="mothers_name" class="form-control"
               value="{{ old('mothers_name', $passportEntry->mothers_name ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control"
               value="{{ old('date_of_birth', $passportEntry->date_of_birth ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Passport Issue Date</label>
        <input type="date" name="passport_issue_date" class="form-control"
               value="{{ old('passport_issue_date', $passportEntry->passport_issue_date ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Passport Expire Date</label>
        <input type="date" name="passport_expire_date" class="form-control"
               value="{{ old('passport_expire_date', $passportEntry->passport_expire_date ?? '') }}">
    </div>

    <div class="col-12 mb-3">
        <label>Birth Place</label>
        <textarea name="birth_place" class="form-control">{{ old('birth_place', $passportEntry->birth_place ?? '') }}</textarea>
    </div>

    <div class="col-md-4 mb-3">
        <label>Country</label>
        <select name="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($countries as $c)
                <option value="{{ $c->id }}"
                    {{ old('country_id', $passportEntry->country_id ?? '') == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label>Profession</label>
        <select name="working_profession_id" class="form-control">
            @foreach($professions as $wp)
                <option value="{{ $wp->id }}"
                    {{ old('working_profession_id', $passportEntry->working_profession_id ?? '') == $wp->id ? 'selected' : '' }}>
                    {{ $wp->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label>Grade</label>
        <input type="text" name="grade" class="form-control"
               value="{{ old('grade', $passportEntry->grade ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Basic Salary</label>
        <input type="number" step="0.01" name="basic_salary" class="form-control"
               value="{{ old('basic_salary', $passportEntry->basic_salary ?? 0) }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Education</label>
        <input type="text" name="education" class="form-control"
               value="{{ old('education', $passportEntry->education ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Overseas Experience</label>
        <input type="text" name="overseas_experience" class="form-control"
               value="{{ old('overseas_experience', $passportEntry->overseas_experience ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Religion</label>
        <input type="text" name="religion" class="form-control"
               value="{{ old('religion', $passportEntry->religion ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>District</label>
        <select name="district_id" class="form-control">
            @foreach($districts as $d)
                <option value="{{ $d->id }}"
                    {{ old('district_id', $passportEntry->district_id ?? '') == $d->id ? 'selected' : '' }}>
                    {{ $d->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label>Local Experience</label>
        <input type="text" name="local_experience" class="form-control"
               value="{{ old('local_experience', $passportEntry->local_experience ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control"
               value="{{ old('address', $passportEntry->address ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Local Agent</label>
        <select name="local_agent_id" class="form-control">
            @foreach($agents as $a)
                <option value="{{ $a->id }}"
                    {{ old('local_agent_id', $passportEntry->local_agent_id ?? '') == $a->id ? 'selected' : '' }}>
                    {{ $a->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label>Gender *</label>
        <select name="gender" class="form-control">
            <option value="Male" {{ old('gender', $passportEntry->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $passportEntry->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="col-12 mb-3">
        <label>Note</label>
        <input type="text" name="note" class="form-control"
               value="{{ old('note', $passportEntry->note ?? '') }}">
    </div>

</div>

<button class="btn btn-primary">
    <i class="fas fa-save"></i> {{ isset($passportEntry) ? 'Update' : 'Save' }}
</button>
