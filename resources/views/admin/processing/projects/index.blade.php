@extends('layouts.app')

@section('content')
<div class="card card-purple">
    <div class="card-header">
        <a href="{{ route('projects.create') }}" class="btn btn-light btn-sm">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover text-nowrap">
            <thead class="bg-purple text-white">
                <tr>
                    <th>ID</th>
                    <th>Start Date</th>
                    <th>Country</th>
                    <th>Company Name</th>
                    <th>Foreign Agent</th>
                    <th>Total Visa</th>
                    <th>Document Receive Date</th>
                    <th>Working Profession</th>
                    <th>Visa Block</th>
                    <th>Description</th>
                    <th>Source / Sub Agency</th>
                    <th>Active</th>
                    <th>User</th>
                    <th width="80">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->country?->name }}</td>
                    <td>{{ $project->company?->name }}</td>
                    <td>{{ $project->foreignAgent?->name }}</td>
                    <td class="text-right">{{ number_format($project->total_visa,2) }}</td>
                    <td>{{ $project->document_receive_date }}</td>
                    <td>{{ $project->profession?->name }}</td>
                    <td>{{ $project->visa_block }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->source?->name }}</td>
                    <td>{{ $project->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $project->user?->name }}</td>
                    <td>
                        <a href="{{ route('projects.show',$project) }}"
                           class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('projects.edit',$project) }}"
                           class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
