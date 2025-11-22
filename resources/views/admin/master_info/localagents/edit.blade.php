@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Local Agent</h3>

    <form action="{{ route('localagent.update', $localagent->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.master_info.localagents.form')

        <button type="submit" class="btn btn-success mt-2">Update</button>
        <a href="{{ route('localagent.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
