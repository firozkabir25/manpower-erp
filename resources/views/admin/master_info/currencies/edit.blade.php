@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Currency</h3>

    <form action="{{ route('currency.update', $currency->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.master_info.currencies.form')

        <button type="submit" class="btn btn-success mt-2">Update</button>
        <a href="{{ route('currency.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
