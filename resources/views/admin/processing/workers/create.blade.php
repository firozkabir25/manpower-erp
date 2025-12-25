@extends('layouts.app')

@section('title', 'Add Worker')

@section('content')
<form method="POST" action="{{ route('workers.store') }}">
    @csrf

    <div class="card card-purple">
        <div class="card-header">
            <h4>Basic Information</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Date *</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
                </div>
                <div class="col-md-3">
                    <label>Project *</label>
                    <select name="project_id" class="form-control" required>
                        <option value=""></option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                {{ $project->name ?? $project->project_code }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Interview Ref</label>
                    <input type="text" name="interview_ref" class="form-control" value="{{ old('interview_ref') }}">
                </div>
                <div class="col-md-3">
                    <label>Passport No *</label>
                    <input type="text" name="passport_no" class="form-control" value="{{ old('passport_no') }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-3">
                    <label>Father's Name</label>
                    <input type="text" name="fathers_name" class="form-control" value="{{ old('fathers_name') }}">
                </div>
                <div class="col-md-3">
                    <label>Mother's Name</label>
                    <input type="text" name="mothers_name" class="form-control" value="{{ old('mothers_name') }}">
                </div>
                <div class="col-md-3">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Passport Issue Date</label>
                    <input type="date" name="passport_issue_date" class="form-control" value="{{ old('passport_issue_date') }}">
                </div>
                <div class="col-md-3">
                    <label>Passport Expire Date</label>
                    <input type="date" name="passport_expire_date" class="form-control" value="{{ old('passport_expire_date') }}">
                </div>
                <div class="col-md-3">
                    <label>Birth Place</label>
                    <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place') }}">
                </div>
                <div class="col-md-3">
                    <label>Country *</label>
                    <select name="country_id" class="form-control" required>
                        <option value=""></option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Working Profession *</label>
                    <select name="working_profession_id" class="form-control" required>
                        <option value=""></option>
                        @foreach($professions as $profession)
                            <option value="{{ $profession->id }}" {{ old('working_profession_id') == $profession->id ? 'selected' : '' }}>
                                {{ $profession->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Grade</label>
                    <input type="text" name="grade" class="form-control" value="{{ old('grade') }}">
                </div>
                <div class="col-md-3">
                    <label>Basic Salary</label>
                    <input type="number" step="0.01" name="basic_salary" class="form-control" value="{{ old('basic_salary') }}">
                </div>
                <div class="col-md-3">
                    <label>Overseas Experience</label>
                    <input type="text" name="overseas_experiance" class="form-control" value="{{ old('overseas_experiance') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Religion</label>
                    <input type="text" name="religion" class="form-control" value="{{ old('religion') }}">
                </div>
                <div class="col-md-3">
                    <label>Nationality</label>
                    <input type="text" name="nationality" class="form-control" value="{{ old('nationality') }}">
                </div>
                <div class="col-md-3">
                    <label>District</label>
                    <select name="district_id" class="form-control">
                        <option value=""></option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Local Experience</label>
                    <input type="text" name="local_experience" class="form-control" value="{{ old('local_experience') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Address</label>
                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                </div>
                <div class="col-md-3">
                    <label>Local Agent</label>
                    <select name="local_agent_id" class="form-control">
                        <option value=""></option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}" {{ old('local_agent_id') == $agent->id ? 'selected' : '' }}>
                                {{ $agent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value=""></option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Contact</label>
                    <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
                </div>
                <div class="col-md-3">
                    <label>PP Issue Place</label>
                    <input type="text" name="pp_issue_place" class="form-control" value="{{ old('pp_issue_place') }}">
                </div>
                <div class="col-md-3">
                    <label>Marital Status</label>
                    <select name="marital_status" class="form-control">
                        <option value=""></option>
                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Education</label>
                    <input type="text" name="education" class="form-control" value="{{ old('education') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Selection Type</label>
                    <input type="text" name="selection_type" class="form-control" value="{{ old('selection_type') }}">
                </div>
                <div class="col-md-3">
                    <label>Sales Edition</label>
                    <input type="text" name="sales_edition" class="form-control" value="{{ old('sales_edition') }}">
                </div>
                <div class="col-md-3">
                    <label>Visa Edition</label>
                    <input type="text" name="visa_edition" class="form-control" value="{{ old('visa_edition') }}">
                </div>
                <div class="col-md-3">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', date('Y')) }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Active</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ old('active', 1) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>POB</label>
                    <input type="text" name="pob" class="form-control" value="{{ old('pob') }}">
                </div>
                <div class="col-md-3">
                    <label>Picture</label>
                    <input type="text" name="picture" class="form-control" value="{{ old('picture') }}">
                </div>
                <div class="col-md-3">
                    <label>Passport Copy</label>
                    <input type="text" name="passport_copy" class="form-control" value="{{ old('passport_copy') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Vaccin Card</label>
                    <input type="text" name="vaccin_card" class="form-control" value="{{ old('vaccin_card') }}">
                </div>
                <div class="col-md-3">
                    <label>Visa Copy</label>
                    <input type="text" name="visa_copy" class="form-control" value="{{ old('visa_copy') }}">
                </div>
                <div class="col-md-3">
                    <label>Special Offer</label>
                    <input type="number" step="0.01" name="special_offer" class="form-control" value="{{ old('special_offer') }}">
                </div>
                <div class="col-md-3">
                    <label>Remarks on Offer</label>
                    <input type="text" name="remarks_on_offer" class="form-control" value="{{ old('remarks_on_offer') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Project Code</label>
                    <input type="text" name="project_code" class="form-control" value="{{ old('project_code') }}">
                </div>
                <div class="col-md-3">
                    <label>PC Issue Date</label>
                    <input type="date" name="pc_issue_date" class="form-control" value="{{ old('pc_issue_date') }}">
                </div>
                <div class="col-md-3">
                    <label>Medical Date</label>
                    <input type="date" name="medical_date" class="form-control" value="{{ old('medical_date') }}">
                </div>
                <div class="col-md-3">
                    <label>Medical Result</label>
                    <input type="text" name="medical_result" class="form-control" value="{{ old('medical_result') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Gross Salary</label>
                    <input type="number" step="0.01" name="gross_salary" class="form-control" value="{{ old('gross_salary') }}">
                </div>
                <div class="col-md-3">
                    <label>Worker Type</label>
                    <input type="text" name="worker_type" class="form-control" value="{{ old('worker_type') }}">
                </div>
                <div class="col-md-3">
                    <label>Skill Certificate</label>
                    <input type="text" name="skill_certificate" class="form-control" value="{{ old('skill_certificate') }}">
                </div>
                <div class="col-md-3">
                    <label>PC Number</label>
                    <input type="text" name="pc_number" class="form-control" value="{{ old('pc_number') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label>PC Date</label>
                    <input type="date" name="pc_date" class="form-control" value="{{ old('pc_date') }}">
                </div>
                <div class="col-md-3">
                    <label>Medical Status</label>
                    <input type="text" name="medical_status" class="form-control" value="{{ old('medical_status') }}">
                </div>
                <div class="col-md-3">
                    <label>Sales Edition Price</label>
                    <input type="number" step="0.01" name="salesedition_price" class="form-control" value="{{ old('salesedition_price') }}">
                </div>
                <div class="col-md-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Note</label>
                    <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Save Worker
        </button>
        <a href="{{ route('workers.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection