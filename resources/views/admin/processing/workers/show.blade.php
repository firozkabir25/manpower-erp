@extends('layouts.app')

@section('title', 'View Worker')

@section('content')
<div class="card card-purple">
    <div class="card-header">
        <h4>{{ $worker->name }} ({{ $worker->passport_no }})</h4>
        <a href="{{ route('workers.index') }}" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <a href="{{ route('workers.edit', $worker) }}" class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i> Edit
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $worker->id }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $worker->date }}</td>
                    </tr>
                    <tr>
                        <th>Project</th>
                        <td>{{ $worker->project?->name ?? $worker->project_code }}</td>
                    </tr>
                    <tr>
                        <th>Interview Ref</th>
                        <td>{{ $worker->interview_ref }}</td>
                    </tr>
                    <tr>
                        <th>Passport No</th>
                        <td>{{ $worker->passport_no }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $worker->name }}</td>
                    </tr>
                    <tr>
                        <th>Father's Name</th>
                        <td>{{ $worker->fathers_name }}</td>
                    </tr>
                    <tr>
                        <th>Mother's Name</th>
                        <td>{{ $worker->mothers_name }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $worker->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <th>Passport Issue Date</th>
                        <td>{{ $worker->passport_issue_date }}</td>
                    </tr>
                    <tr>
                        <th>Passport Expire Date</th>
                        <td>{{ $worker->passport_expire_date }}</td>
                    </tr>
                    <tr>
                        <th>Birth Place</th>
                        <td>{{ $worker->birth_place }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $worker->country?->name }}</td>
                    </tr>
                    <tr>
                        <th>Working Profession</th>
                        <td>{{ $worker->profession?->name }}</td>
                    </tr>
                    <tr>
                        <th>Grade</th>
                        <td>{{ $worker->grade }}</td>
                    </tr>
                    <tr>
                        <th>Basic Salary</th>
                        <td>{{ number_format($worker->basic_salary, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Overseas Experience</th>
                        <td>{{ $worker->overseas_experiance }}</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td>{{ $worker->religion }}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{ $worker->nationality }}</td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>{{ $worker->district?->name }}</td>
                    </tr>
                    <tr>
                        <th>Local Experience</th>
                        <td>{{ $worker->local_experience }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $worker->address }}</td>
                    </tr>
                    <tr>
                        <th>Local Agent</th>
                        <td>{{ $worker->localAgent?->name }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $worker->gender }}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{ $worker->contact }}</td>
                    </tr>
                    <tr>
                        <th>PP Issue Place</th>
                        <td>{{ $worker->pp_issue_place }}</td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td>{{ $worker->marital_status }}</td>
                    </tr>
                    <tr>
                        <th>Education</th>
                        <td>{{ $worker->education }}</td>
                    </tr>
                    <tr>
                        <th>Selection Type</th>
                        <td>{{ $worker->selection_type }}</td>
                    </tr>
                    <tr>
                        <th>Sales Edition</th>
                        <td>{{ $worker->sales_edition }}</td>
                    </tr>
                    <tr>
                        <th>Visa Edition</th>
                        <td>{{ $worker->visa_edition }}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{ $worker->year }}</td>
                    </tr>
                    <tr>
                        <th>Active</th>
                        <td>{{ $worker->active ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>POB</th>
                        <td>{{ $worker->pob }}</td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td>{{ $worker->picture }}</td>
                    </tr>
                    <tr>
                        <th>Passport Copy</th>
                        <td>{{ $worker->passport_copy }}</td>
                    </tr>
                    <tr>
                        <th>Vaccin Card</th>
                        <td>{{ $worker->vaccin_card }}</td>
                    </tr>
                    <tr>
                        <th>Visa Copy</th>
                        <td>{{ $worker->visa_copy }}</td>
                    </tr>
                    <tr>
                        <th>Special Offer</th>
                        <td>{{ number_format($worker->special_offer, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Remarks on Offer</th>
                        <td>{{ $worker->remarks_on_offer }}</td>
                    </tr>
                    <tr>
                        <th>Project Code</th>
                        <td>{{ $worker->project_code }}</td>
                    </tr>
                    <tr>
                        <th>PC Issue Date</th>
                        <td>{{ $worker->pc_issue_date }}</td>
                    </tr>
                    <tr>
                        <th>Medical Date</th>
                        <td>{{ $worker->medical_date }}</td>
                    </tr>
                    <tr>
                        <th>Medical Result</th>
                        <td>{{ $worker->medical_result }}</td>
                    </tr>
                    <tr>
                        <th>Gross Salary</th>
                        <td>{{ number_format($worker->gross_salary, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Worker Type</th>
                        <td>{{ $worker->worker_type }}</td>
                    </tr>
                    <tr>
                        <th>Skill Certificate</th>
                        <td>{{ $worker->skill_certificate }}</td>
                    </tr>
                    <tr>
                        <th>PC Number</th>
                        <td>{{ $worker->pc_number }}</td>
                    </tr>
                    <tr>
                        <th>PC Date</th>
                        <td>{{ $worker->pc_date }}</td>
                    </tr>
                    <tr>
                        <th>Medical Status</th>
                        <td>{{ $worker->medical_status }}</td>
                    </tr>
                    <tr>
                        <th>Sales Edition Price</th>
                        <td>{{ number_format($worker->salesedition_price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td>{{ $worker->contact_number }}</td>
                    </tr>
                    <tr>
                        <th>Note</th>
                        <td>{{ $worker->note }}</td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td>{{ $worker->user?->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection