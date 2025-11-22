@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Local Agent</h3>

    <form action="{{ route('localagent.store') }}" method="POST">
        @csrf

        @include('admin.master_info.localagents.form')

        <button type="submit" class="btn btn-success mt-2">Save</button>
        <a href="{{ route('localagent.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>

</div>
@endsection
