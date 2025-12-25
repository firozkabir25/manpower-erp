@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h1>Passport Entry</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('passport-entries.store') }}" method="POST">
            @csrf
            @include('admin.processing.passport_entry._form')
        </form>

    </div>
</div>

</div>
@endsection