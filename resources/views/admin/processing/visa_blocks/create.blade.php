@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Visa Block</h3>

    <form action="{{ route('visa-blocks.store') }}" method="POST">
        @csrf
        @include('admin.processing.visa_blocks._form', [
            'item' => null,
            'button' => 'Save'
        ])
    </form>

</div>
@endsection
