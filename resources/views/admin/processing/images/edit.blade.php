@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Images</h3>
        </div>

        <div class="card-body">
          <form method="POST"
                action="{{ route('images.update', $image->id) }}"
                enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-6">

                <!-- Passport -->
                <div class="mb-3">
                  <label class="form-label">Passport *</label>
                  <input type="text"
                         name="passport_no"
                         class="form-control"
                         value="{{ old('passport_no', $image->passport_no) }}"
                         required>
                </div>

                <!-- Project Code -->
                <div class="mb-3">
                  <label class="form-label">Project Code *</label>
                  <input type="text"
                         name="project_code"
                         class="form-control"
                         value="{{ old('project_code', $image->project_code) }}"
                         required>
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
                  <label class="form-label">{{ $label }}</label>

                  <input type="file"
                         name="{{ $name }}"
                         class="form-control mb-2"
                         onchange="previewImage(this,'{{ $name }}_preview')">

                  <img id="{{ $name }}_preview"
                       src="{{ $image->$name
                            ? asset($image->$name)
                            : asset('images/placeholder.png') }}"
                       class="img-fluid border rounded"
                       style="height:120px; object-fit:cover; width:100%;">
                </div>
                @endforeach

              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button class="btn btn-primary">
                  <i class="fas fa-save"></i> Update
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
