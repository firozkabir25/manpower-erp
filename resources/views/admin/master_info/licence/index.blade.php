@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class=" d-flex justify-content-between align-items-center">
            <div>
                <h3 class="card-title">All Licences</h3>
            </div>
            <div>
                <a href="{{ route('licence.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Licence</th>
                    <th>RL No</th>
                    <th>User</th>
                    <th>Address</th>
                    {{-- <th>Created</th> --}}
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($licences as $licence)
                <tr>
                    <td>{{ $licence->id }}</td>
                    <td>{{ $licence->licence }}</td>
                    <td>{{ $licence->rlno }}</td>
                    <td>{{ $licence->user?->name }}</td>
                    <td>{{ $licence->address }}</td>
                    {{-- <td>{{ $licence->created_at?->format('d M Y') }}</td> --}}
                    <td class="text-center">
                        <a href="{{ route('licence.edit', $licence->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i>edit
                        </a>
                        <form action="{{ route('licence.destroy', $licence->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        {{ $licences->links() }}
    </div>
</div>
@endsection