@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Currency</h3>

    <form action="{{ route('currency.store') }}" method="POST">
        @csrf

        @include('admin.master_info.currencies.form')

        <button type="submit" class="btn btn-success mt-2">Save</button>
        <a href="{{ route('currency.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
