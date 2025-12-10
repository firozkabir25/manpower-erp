@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h1>Passport Entry</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('passport-entries.store') }}" method="POST">
            @csrf
            @include('admin.processing.passport_entry._form')
            {{-- <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Passport *</label>
                    <input type="text" name="passport_no" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Father's Name</label>
                    <input type="text" name="fathers_name" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Mother's Name</label>
                    <input type="text" name="mothers_name" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Passport Issue Date</label>
                    <input type="date" name="passport_issue_date" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Passport Expire Date</label>
                    <input type="date" name="passport_expire_date" class="form-control">
                </div>

                <div class="col-12 mb-3">
                    <label>Birth Place</label>
                    <textarea name="birth_place" class="form-control"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Country</label>
                    <select name="country_id" class="form-control">
                        @foreach($countries as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Profession</label>
                    <select name="working_profession_id" class="form-control">
                        @foreach($professions as $wp)
                            <option value="{{ $wp->id }}">{{ $wp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Grade</label>
                    <input type="text" name="grade" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Basic Salary</label>
                    <input type="number" step="0.01" name="basic_salary" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Education</label>
                    <input type="text" name="education" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Overseas Experience</label>
                    <input type="text" name="overseas_experience" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Religion</label>
                    <input type="text" name="religion" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>District</label>
                    <select name="district_id" class="form-control">
                        @foreach($districts as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Local Experience</label>
                    <input type="text" name="local_experience" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Local Agent</label>
                    <select name="local_agent_id" class="form-control">
                        @foreach($agents as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Gender *</label>
                    <select name="gender" class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label>Note</label>
                    <input type="text" name="note" class="form-control">
                </div>

            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Save
            </button> --}}
        </form>

    </div>
</div>

</div>
@endsection