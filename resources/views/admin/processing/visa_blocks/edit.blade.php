@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Visa Block</h3>

    <form action="{{ route('visa-blocks.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.processing.visa_blocks._form', [
            'item' => $item,
            'button' => 'Update'
        ])
    </form>

</div>
@endsection
