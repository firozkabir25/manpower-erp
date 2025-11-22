@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Airline</h3>

    <form action="{{ route('airline.store') }}" method="POST">
        @csrf

        @include('admin.master_info.airlines.form')

        <button type="submit" class="btn btn-success mt-2">Save</button>
        <a href="{{ route('airline.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
