<div class="card card-purple">
<div class="card-body">

<div class="row">
    <div class="col-md-3">
        <label>Start Date *</label>
        <input type="date" name="start_date" class="form-control"
               value="{{ old('start_date',$project->start_date ?? '') }}">
    </div>

    <div class="col-md-3">
        <label>Country *</label>
        <select name="country_id" class="form-control">
            @foreach($countries as $c)
                <option value="{{ $c->id }}"
                 @selected(old('country_id',$project->country_id ?? '')==$c->id)>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>Company Name *</label>
        <select name="company_id" class="form-control">
            @foreach($companies as $c)
                <option value="{{ $c->id }}"
                @selected(old('company_id',$project->company_id ?? '')==$c->id)>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-4">
        <label>Project</label>
        <input type="text" name="project" class="form-control">
    </div>

    <div class="col-md-4">
        <label>Cost Center</label>
        <select name="cost_center_id" class="form-control">
            @foreach($costCenters as $cc)
                <option value="{{ $cc->id }}">{{ $cc->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label>Project Code</label>
        <input type="text" name="project_code" class="form-control">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-4">
        <label>Foreign Agent</label>
        <select name="foreign_agent_id" class="form-control">
            @foreach($agents as $a)
                <option value="{{ $a->id }}">{{ $a->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <label>Total Visa *</label>
        <input type="number" name="total_visa" class="form-control" value="0">
    </div>

    <div class="col-md-3">
        <label>Document Receive Date</label>
        <input type="date" name="document_receive_date" class="form-control">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <label>Working Profession *</label>
        <select name="profession_id" class="form-control">
            <option></option>
            @foreach($professions as $key => $profession)
                <option value="{{$profession->id}}">{{$profession->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>Visa Block</label>
        <input type="text" name="visa_block" class="form-control">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="col-md-6">
        <label>Source / Sub Agency</label>
        <select name="source_id" class="form-control">
            @foreach($sources as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>
</div>

</div>
</div>
