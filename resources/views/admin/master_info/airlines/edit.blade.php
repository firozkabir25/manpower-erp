@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Airline</h3>

    <form action="{{ route('airline.update', $airline->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.master_info.airlines.form')

        <button type="submit" class="btn btn-success mt-2">Update</button>
        <a href="{{ route('airline.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
