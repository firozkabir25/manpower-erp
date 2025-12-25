@extends('layouts.app')

@section('content')
<div class="card card-purple">
    <div class="card-header">
        <a href="{{ route('workers.create') }}" class="btn btn-light btn-sm">
            <i class="fa fa-plus"></i> Add New Worker
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover text-nowrap">
            <thead class="bg-purple text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Passport No</th>
                    <th>Project</th>
                    <th>Country</th>
                    <th>Profession</th>
                    <th>Local Agent</th>
                    <th>Contact</th>
                    <th>Active</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                <tr>
                    <td>{{ $worker->id }}</td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->passport_no }}</td>
                    <td>{{ $worker->project?->project ?? $worker->project_code }}</td>
                    <td>{{ $worker->country?->name }}</td>
                    <td>{{ $worker->profession?->name }}</td>
                    <td>{{ $worker->localAgent?->name }}</td>
                    <td>{{ $worker->contact }}</td>
                    <td>{{ $worker->active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('workers.show', $worker) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('workers.edit', $worker) }}" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('workers.destroy', $worker) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $workers->links() }}
    </div>
</div>
@endsection