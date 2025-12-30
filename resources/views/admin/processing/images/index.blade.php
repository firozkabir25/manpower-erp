@extends('layouts.app')
@section('content')
@section('content')

<div class="card card-purple">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Images</h3>
        <a href="{{ route('images.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover text-nowrap">
            <thead class="bg-purple text-white">
                <tr>
                    <th>ID</th>
                    <th>Passport</th>
                    <th>Project Code</th>
                    <th>Picture</th>
                    <th>Visa Copy</th>
                    <th>Passport Copy</th>
                    <th>Driving Licence</th>
                    <th>Certificate One</th>
                    <th>Certificate Two</th>
                    <th>User Name</th>
                    <th width="90">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($images as $row)
                <tr class="align-items-center">
                    <td>{{ $row->id }}</td>
                    <td><strong>{{ $row->passport_no }}</strong></td>
                    <td>{{ $row->project_code }}</td>

                    {{-- Picture --}}
                    <td class="text-center">
                        @if($row->picture)
                            <a href="{{ asset('storage/'.$row->picture) }}" target="_blank">
                                <i class="fas fa-image text-primary"></i><img src="{{asset('storage/'.$row->picture)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($row->visa_copy)
                            <a href="{{ asset('storage/'.$row->visa_copy) }}" target="_blank">
                                <i class="fas fa-image text-info"></i><img src="{{asset('storage/'.$row->visa_copy)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($row->passport_copy)
                            <a href="{{ asset('storage/'.$row->passport_copy) }}" target="_blank">
                                <i class="fas fa-image text-info"></i><img src="{{asset('storage/'.$row->passport_copy)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    {{-- Driving --}}
                    <td class="text-center">
                        @if($row->driving_license)
                            <a href="{{ asset('storage/'.$row->driving_license) }}" target="_blank">
                                <i class="fas fa-image text-success"></i><img src="{{asset('storage/'.$row->driving_license)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    {{-- Certificate One --}}
                    <td class="text-center">
                        @if($row->cirtificate_one)
                            <a href="{{ asset('storage/'.$row->cirtificate_one) }}" target="_blank">
                                <i class="fas fa-image text-info"></i><img src="{{asset('storage/'.$row->cirtificate_one)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    {{-- Certificate Two --}}
                    <td class="text-center">
                        @if($row->cirtificate_two)
                            <a href="{{ asset('storage/'.$row->cirtificate_two) }}" target="_blank">
                                <i class="fas fa-image text-warning"></i><img src="{{asset('storage/'.$row->cirtificate_two)}}" width="40" height="40" />
                            </a>
                        @endif
                    </td>

                    <td>{{ $row->user?->name }}</td>

                    <td>
                        <a href="{{ route('images.edit', $row) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('images.destroy', $row) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this record?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $images->links() }}
    </div>
</div>

@endsection