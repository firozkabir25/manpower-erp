@extends('layouts.app')

@section('title','Add Project')

@section('content')
<form method="POST" action="{{ route('projects.store') }}">
@csrf
@include('admin.processing.projects.partials.basic')

@include('admin.processing.projects.partials.tabs')

<button class="btn btn-success mt-3">
    <i class="fa fa-save"></i> Save
</button>
</form>
@endsection
@php
$professionOptions = '';
foreach($professions as $profession) {
    $professionOptions .= '<option value="' . $profession->id . '">' . $profession->name . '</option>';
}
$currencyOptions = '';
foreach($currencies as $currency) {
    $currencyOptions .= '<option value="' . $currency->id . '">' . $currency->currency . '</option>';
}
$currencyCodeOptions = '';
foreach($currencies as $currency) {
    $currencyCodeOptions .= '<option value="' . $currency->currency_code . '">' . $currency->currency_code . '</option>';
}
@endphp
@push('scripts')
<script>
let professionOptions = `{!! $professionOptions !!}`;
let currencyOptions = `{!! $currencyOptions !!}`;
let currencyCodeOptions = `{!! $currencyCodeOptions !!}`;
</script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
let salesIndex = 1;
let visaIndex  = 1;

/* ================= SALES PRICE ================= */
document.getElementById('addSalesRow').addEventListener('click', function () {
    let tbody = document.querySelector('#sales tbody');

    let row = `
    <tr>
        <td>
            <button type="button" class="btn btn-xs btn-danger removeRow">🗑️</button>
        </td>
        <td><input type="date" name="sales[${salesIndex}][date]" class="form-control"></td>
        <td>
            <select name="sales[${salesIndex}][edition]" class="form-control">
                <option value="1">Edition-1</option>
                <option value="2">Edition-2</option>
                <option value="3">Edition-3</option>
                <option value="4">Edition-4</option>
                <option value="5">Edition-5</option>
            </select>
        </td>
        <td><select name="sales[${salesIndex}][profession_id]" class="form-control"><option></option>${professionOptions}</select></td>
        <td><select name="sales[${salesIndex}][currency_id]" class="form-control"><option></option>${currencyOptions}</select></td>
        <td><input type="number" step="0.01" name="sales[${salesIndex}][currency_rate]" class="form-control"></td>
        <td><input type="number" step="0.01" name="sales[${salesIndex}][conversion_rate]" class="form-control"></td>
        <td>
            <input type="number" step="0.01"
                   name="sales[${salesIndex}][price]"
                   class="form-control salesAmount text-right"
                   value="0">
        </td>
        <td><select name="sales[${salesIndex}][code]" class="form-control"><option></option>${currencyCodeOptions}</select></td>
        <td><input type="text" name="sales[${salesIndex}][remark]" class="form-control"></td>
    </tr>`;

    tbody.insertAdjacentHTML('beforeend', row);
    salesIndex++;
});

/* ================= VISA COST ================= */
document.getElementById('addVisaRow').addEventListener('click', function () {
    let tbody = document.querySelector('#visa tbody');

    let row = `
    <tr>
        <td>
            <button type="button" class="btn btn-xs btn-danger removeRow">🗑️</button>
        </td>
        <td><input type="date" name="visa_costs[${visaIndex}][date]" class="form-control"></td>
        <td>
            <select name="visa_costs[${visaIndex}][edition]" class="form-control">
                <option value="1">Edition-1</option>
                <option value="2">Edition-2</option>
            </select>
        </td>
        <td><select name="visa_costs[${visaIndex}][profession_id]" class="form-control"><option></option>${professionOptions}</select></td>
        <td><select name="visa_costs[${visaIndex}][currency_id]" class="form-control"><option></option>${currencyOptions}</select></td>
        <td><input type="number" step="0.01" name="visa_costs[${visaIndex}][visa_currency_rate]" class="form-control"></td>
        <td><input type="number" step="0.01" name="visa_costs[${visaIndex}][visa_conversion_rate]" class="form-control"></td>
        <td>
            <input type="number" step="0.01"
                   name="visa_costs[${visaIndex}][visacostbdt]"
                   class="form-control visaAmount text-right"
                   value="0">
        </td>
        <td><input type="text" name="visa_costs[${visaIndex}][note]" class="form-control"></td>
    </tr>`;

    tbody.insertAdjacentHTML('beforeend', row);
    visaIndex++;
});

/* ================= REMOVE ROW ================= */
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('removeRow')) {
        e.target.closest('tr').remove();
        calculateSalesTotal();
        calculateVisaTotal();
    }
});

/* ================= TOTAL CALC ================= */
document.addEventListener('input', function (e) {

    if (e.target.classList.contains('salesAmount')) {
        calculateSalesTotal();
    }

    if (e.target.classList.contains('visaAmount')) {
        calculateVisaTotal();
    }
});

function calculateSalesTotal() {
    let total = 0;
    document.querySelectorAll('.salesAmount').forEach(el => {
        total += parseFloat(el.value) || 0;
    });
    document.getElementById('sales_total').value = total.toFixed(2);
}

function calculateVisaTotal() {
    let total = 0;
    document.querySelectorAll('.visaAmount').forEach(el => {
        total += parseFloat(el.value) || 0;
    });
    document.getElementById('visa_total').value = total.toFixed(2);
}

// Calculate initial totals
calculateSalesTotal();
calculateVisaTotal();
});
</script>

@endpush