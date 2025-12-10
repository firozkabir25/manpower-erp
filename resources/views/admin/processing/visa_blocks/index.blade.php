@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Visa Block List</h3>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('visa-blocks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Company</th>
                            <th>Block No</th>
                            <th>Sponsor</th>
                            <th>Alwaka No</th>
                            <th>Qty</th>
                            <th>Profession</th>
                            <th>Licence</th>
                            <th>Active</th>
                            <th>User</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($blocks as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->company->name ?? '' }}</td>
                            <td>{{ $item->block_number }}</td>
                            <td>{{ $item->sponsor->name ?? '' }}</td>
                            <td>{{ $item->alwaka_no }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->profession->name ?? '' }}</td>
                            <td>{{ $item->licence->licence ?? '' }}</td>
                            <td>{{ $item->active ? 'Yes' : 'No' }}</td>
                            <td>{{ $item->user->name ?? '' }}</td>

                            <td>
                                <a href="{{ route('visa-blocks.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('visa-blocks.destroy', $item->id) }}"
                                      method="POST" style="display:inline-block"
                                      onsubmit="return confirm('Are you sure?')">

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

        </div>
    </div>

    <div class="mt-3">
        {{ $blocks->links() }}
    </div>
</div>
@endsection
