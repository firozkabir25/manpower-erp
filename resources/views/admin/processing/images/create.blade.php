@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <label>Passport *</label>
            <input type="text" name="passport_no" class="form-control mb-2" required>
            <label>Project Code *</label>
            <input type="text" name="project_code" class="form-control mb-3" required>

            @php
            $fields = [
                'picture' => 'Picture',
                'visa_copy' => 'Visa Copy',
                'passport_copy' => 'Passport Copy',
                'vaccine_card' => 'Vaccine Card',
                'driving_license' => 'Driving License',
                'cirtificate_one' => 'Certificate One',
                'cirtificate_two' => 'Certificate Two',
            ];
            @endphp

            @foreach($fields as $name => $label)
            <div class="mb-3 p-2 d-flex flex-row align-items-center">
                <label>{{ $label }}</label>
                <input type="file"
                    name="{{ $name }}"
                    class="form-control mb-1"
                    onchange="previewImage(this,'{{ $name }}_preview')">

                <img id="{{ $name }}_preview"
                    src="{{ asset('images/placeholder.png') }}"
                    class="img-fluid border"
                    style="height:120px;object-fit:cover;">
            </div>
            @endforeach

        </div>
    </div>

    <button class="btn btn-primary mt-3">
        <i class="fas fa-save"></i> Save
    </button>
</form>
</div>
@endsection
