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
                    <th>Driving Licence</th>
                    <th>Certificate One</th>
                    <th>Certificate Two</th>
                    <th>User Name</th>
                    <th width="90">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($images as $row)
                <tr>
                    <td>{{ $row->id }}</td>

                    <td>
                        <strong>{{ $row->passport_no }}</strong>
                    </td>

                    <td>{{ $row->project_code }}</td>

                    {{-- Picture --}}
                    <td class="text-center">
                        @if($row->picture)
                            <a href="{{ asset('storage/'.$row->picture) }}" target="_blank">
                                <i class="fas fa-image text-primary"></i>
                            </a>
                        @endif
                    </td>

                    {{-- Driving --}}
                    <td class="text-center">
                        @if($row->driving_license)
                            <a href="{{ asset('storage/'.$row->driving_license) }}" target="_blank">
                                <i class="fas fa-image text-success"></i>
                            </a>
                        @endif
                    </td>

                    {{-- Certificate One --}}
                    <td class="text-center">
                        @if($row->cirtificate_one)
                            <a href="{{ asset('storage/'.$row->cirtificate_one) }}" target="_blank">
                                <i class="fas fa-image text-info"></i>
                            </a>
                        @endif
                    </td>

                    {{-- Certificate Two --}}
                    <td class="text-center">
                        @if($row->cirtificate_two)
                            <a href="{{ asset('storage/'.$row->cirtificate_two) }}" target="_blank">
                                <i class="fas fa-image text-warning"></i>
                            </a>
                        @endif
                    </td>

                    <td>{{ $row->user?->name }}</td>

                    <td>
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="#" method="POST" class="d-inline">
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