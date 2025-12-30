@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Upload Images</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="passport_no" class="form-label">Passport *</label>
                  <input type="text" name="passport_no" id="passport_no" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="project_code" class="form-label">Project Code *</label>
                  <input type="text" name="project_code" id="project_code" class="form-control" required>
                </div>

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
                <div class="mb-3 p-2 border rounded">
                  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                  <input type="file"
                    name="{{ $name }}"
                    id="{{ $name }}"
                    class="form-control mb-2"
                    onchange="previewImage(this,'{{ $name }}_preview')">

                  <img id="{{ $name }}_preview"
                    src="{{ asset('images/placeholder.png') }}"
                    class="img-fluid border rounded"
                    style="height:120px; object-fit:cover; width:100%;">
                </div>
                @endforeach

              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-save"></i> Save
                </button>
                <a href="{{ route('images.index') }}" class="btn btn-secondary ms-2">
                  <i class="fas fa-times"></i> Cancel
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
