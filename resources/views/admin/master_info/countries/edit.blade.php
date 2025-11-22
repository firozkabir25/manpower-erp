@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="mb-4">Edit Country</h3>
    <form action="{{ route('country.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
            </div>
            <div class="col-md-4">
                <label>Short Name *</label>
                <input type="text" name="short" class="form-control" value="{{ $country->short }}" required>
            </div>
            <div class="col-md-4">
                <label>Visa Expire Days</label>
                <input type="number" name="visa_expire_days" class="form-control" value="{{ $country->visa_expire_days }}">
            </div>
            <div class="col-md-4 mt-3">
                <label>Police Expire Days</label>
                <input type="number" name="police_expire_days" class="form-control" value="{{ $country->police_expire_days }}">
            </div>
            <div class="col-md-4 mt-3">
                <label>Medical Expire Days</label>
                <input type="number" name="medical_expire_days" class="form-control" value="{{ $country->medical_expire_days }}">
            </div>
            {{-- ================= OVERSEAS STATUS ================= --}}
            <div class="col-md-6 mt-3 position-relative">
                <label>Overseas Status</label>
                @php
                    $selectedOverseas = json_decode($country->overseas_status, true) ?? [];
                @endphp
                <input type="text"
                    id="overseas_input"
                    class="form-control"
                    placeholder="Click to select"
                    readonly
                    value="{{ implode(', ', $selectedOverseas) }}">

                <div id="overseas_box"
                    style="
                        display:none;
                        height:350px;
                        overflow-y:scroll;
                        border:1px solid #ddd;
                        padding:10px;
                        background:#fff;
                        position:absolute;
                        width:100%;
                        z-index:999;
                    ">

                    <input type="text" class="form-control mb-2" placeholder="Search..." id="overseas_search">

                    <div class="row" id="overseas_list">
                        @foreach($overseasList as $item)
                        <div class="col-md-6 mb-1 overseas-item">
                            <input type="checkbox"
                                class="ov-item"
                                name="overseas_status[]"
                                value="{{ $item }}"
                                {{ in_array($item, $selectedOverseas) ? 'checked' : '' }}>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            {{-- ================= EXPENSE HEAD ================= --}}
            <div class="col-md-6 mt-3 position-relative">
                <label>Expense Head</label>

                @php
                    $selectedExpenses = json_decode($country->expense_id, true) ?? [];
                @endphp

                <input type="text"
                    id="expense_input"
                    class="form-control"
                    placeholder="Click to select"
                    readonly
                    value="{{ $expenseList->whereIn('id',$selectedExpenses)->pluck('name')->implode(', ') }}">

                <div id="expense_box"
                    style="
                        display:none;
                        height:350px;
                        overflow-y:scroll;
                        border:1px solid #ddd;
                        padding:10px;
                        background:#fff;
                        position:absolute;
                        width:100%;
                        z-index:999;
                    ">

                    <input type="text" class="form-control mb-2" placeholder="Search..." id="expense_search">

                    <div class="row" id="expense_list">
                        @foreach($expenseList as $exp)
                        <div class="col-md-6 mb-1 expense-item">
                            <input type="checkbox"
                                class="exp-item"
                                name="expense_id[]"
                                value="{{ $exp->id }}"
                                {{ in_array($exp->id, $selectedExpenses) ? 'checked' : '' }}>
                            {{ $exp->name }}
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>

{{-- ================= JAVASCRIPT ================== --}}
<script>
    // Open dropdowns
    document.getElementById('overseas_input').onclick = () => {
        document.getElementById('overseas_box').style.display = 'block';
    };
    document.getElementById('expense_input').onclick = () => {
        document.getElementById('expense_box').style.display = 'block';
    };

    // Close when clicking outside
    document.addEventListener('click', function(e){
        if(!e.target.closest('.position-relative')){
            document.getElementById('overseas_box').style.display = 'none';
            document.getElementById('expense_box').style.display = 'none';
        }
    });

    // Update selected text
    function updateInput(inputId, itemsClass){
        let selected = [];
        document.querySelectorAll('.' + itemsClass + ':checked').forEach(e=>{
            selected.push(e.parentNode.textContent.trim());
        });
        document.getElementById(inputId).value = selected.join(', ');
    }

    document.querySelectorAll('.ov-item').forEach(e=>{
        e.addEventListener('change', () => updateInput('overseas_input','ov-item'));
    });

    document.querySelectorAll('.exp-item').forEach(e=>{
        e.addEventListener('change', () => updateInput('expense_input','exp-item'));
    });

    // Search Overseas
    document.getElementById('overseas_search').addEventListener('keyup', function(){
        let val = this.value.toLowerCase();
        document.querySelectorAll('.overseas-item').forEach(item=>{
            item.style.display = item.textContent.toLowerCase().includes(val) ? 'block' : 'none';
        });
    });

    // Search Expense
    document.getElementById('expense_search').addEventListener('keyup', function(){
        let val = this.value.toLowerCase();
        document.querySelectorAll('.expense-item').forEach(item=>{
            item.style.display = item.textContent.toLowerCase().includes(val) ? 'block' : 'none';
        });
    });
</script>

@endsection
