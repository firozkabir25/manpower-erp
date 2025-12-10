@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h1>Edit Passport Entry</h1></div>

        <div class="card-body">
            <form action="{{ route('passport-entries.update', $passportEntry->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.processing.passport_entry._form', ['passportEntry' => $passportEntry])
            </form>
        </div>
    </div>
</div>
@endsection
