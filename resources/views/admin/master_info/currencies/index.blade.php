@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Currencies</h3>

    <a href="{{ route('currency.create') }}" class="btn btn-primary mb-3">
        + Add Currency
    </a>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Currency</th>
                <th>Code</th>
                <th>Symbol</th>
                <th>Value</th>
                <th>Country</th>
                <th>Created By</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencies as $currency)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $currency->currency }}</td>
                    <td>{{ $currency->currency_code }}</td>
                    <td>{{ $currency->currency_symbol }}</td>
                    <td>{{ $currency->_value }}</td>
                    <td>{{ $currency->country->name ?? 'N/A' }}</td>
                    <td>{{ $currency->user->name ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('currency.edit', $currency->id) }}"
                           class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('currency.destroy', $currency->id) }}"
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $currencies->links() }}

</div>
@endsection
