@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Company</h1>

    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif --}}

    <form action="{{ route('company.store') }}" method="POST">
        @csrf
        @include('admin.master_info.companies.form')
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
