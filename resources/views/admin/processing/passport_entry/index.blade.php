@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Working Profession List</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('passport-entries.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>

        <div class="card-body p-0">

            {{-- Make Table Responsive --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Passport</th>
                            <th>Name</th>
                            <th>Father</th>
                            <th>Mother</th>
                            <th>Date Of Birth</th>
                            <th>Passport Expire Date</th>
                            <th>Passport Issue Date</th>
                            <th>Birth Place</th>
                            <th>Country</th>
                            <th>Profession</th>
                            <th>Grade</th>
                            <th>Basic Salary</th>
                            <th>Education</th>
                            <th>Overseas Experience</th>
                            <th>Religion</th>
                            <th>District</th>
                            <th>Local Experience</th>
                            <th>Address</th>
                            <th>Local Agent</th>
                            <th>Gender</th>
                            <th>Note</th>
                            <th>Add Time</th>
                            <th>User Name</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($applicants as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->passport_no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->fathers_name }}</td>
                            <td>{{ $item->mothers_name }}</td>
                            <td>{{ $item->date_of_birth }}</td>
                            <td>{{ $item->passport_issue_date }}</td>
                            <td>{{ $item->passport_expire_date }}</td>
                            <td>{{ $item->birth_place }}</td>
                            <td>{{ $item->country->name }}</td>
                            <td>{{ $item->workingProfession->name }}</td>
                            <td>{{ $item->grade }}</td>
                            <td>{{ $item->basic_salary }}</td>
                            <td>{{ $item->education }}</td>
                            <td>{{ $item->overseas_experiance }}</td>
                            <td>{{ $item->religion }}</td>
                            <td>{{ $item->district->name }}</td>
                            <td>{{ $item->local_experience }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->localAgent->name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->note }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <a href="{{ route('passport-entries.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('passport-entries.destroy', $item->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Are you sure?');">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{-- End Responsive Wrapper --}}

        </div>
    </div>
</div>
@endsection
