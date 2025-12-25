<div id="sales" class="tab-pane fade show active">
<table class="table table-bordered mt-2">
<thead class="bg-purple text-white">
<tr>
    <th width="30"></th>
    <th>Date</th>
    <th>Edition</th>
    <th>Profession</th>
    <th>Currency</th>
    <th>Currency Rate</th>
    <th>Conversion Rate</th>
    <th>Sales Price BDT</th>
    <th>Code</th>
    <th>Remark</th>
</tr>
</thead>
<tbody>
@php
$salesData = $project->sales ?? [];
if (empty($salesData)) {
    $salesData = [0 => []];
}
@endphp
@foreach($salesData as $index => $sale)
<tr>
    <td>
        <button type="button" class="btn btn-xs btn-danger removeRow">🗑️</button>
    </td>
    <td><input type="date" name="sales[{{ $index }}][date]" class="form-control" value="{{ $sale->date ?? '' }}"></td>
    <td><select name="sales[{{ $index }}][edition]" class="form-control">
        <option value="1" @selected(($sale->edition ?? 1) == 1)>Edition-1</option>
        <option value="2" @selected(($sale->edition ?? 1) == 2)>Edition-2</option>
        <option value="3" @selected(($sale->edition ?? 1) == 3)>Edition-3</option>
        <option value="4" @selected(($sale->edition ?? 1) == 4)>Edition-4</option>
        <option value="5" @selected(($sale->edition ?? 1) == 5)>Edition-5</option>
    </select></td>
    <td><select name="sales[{{ $index }}][profession_id]" class="form-control">
            <option></option>
        @foreach($professions as $key => $profession)
            <option value="{{$profession->id}}" @selected(($sale->profession_id ?? '') == $profession->id)>{{$profession->name}}</option>
        @endforeach
    </select></td>
    <td><select name="sales[{{ $index }}][currency_id]" class="form-control">
            <option></option>
        @foreach($currencies as $key => $currency)
            <option value="{{$currency->id}}" @selected(($sale->currency_id ?? '') == $currency->id)>{{$currency->currency}}</option>
        @endforeach
    </select></td>
    <td><input type="number" step="0.01" name="sales[{{ $index }}][currency_rate]" class="form-control" value="{{ $sale->currency_rate ?? 0 }}"></td>
    <td><input type="number" step="0.01" name="sales[{{ $index }}][conversion_rate]" class="form-control" value="{{ $sale->conversion_rate ?? 0 }}"></td>
    <td><input type="number" step="0.01" name="sales[{{ $index }}][price]" class="form-control salesAmount text-right" value="{{ $sale->price ?? 0 }}"></td>
    <td><select name="sales[{{ $index }}][code]" class="form-control">
            <option></option>
        @foreach($currencies as $key => $currency)
            <option value="{{$currency->currency_code}}" @selected(($sale->code ?? '') == $currency->currency_code)>{{$currency->currency_code}}</option>
        @endforeach
    </select>
    <td><input type="text" name="sales[{{ $index }}][remark]" class="form-control" value="{{ $sale->remark ?? '' }}"></td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr class="bg-light">
    <th width="30">
        <button type="button" class="btn btn-xs btn-success" id="addSalesRow">+</button>
    </th>

    <th colspan="6" class="text-right">Total :</th>
    <th>
        <input type="text" id="sales_total" class="form-control text-right" readonly value="0">
    </th>
    <th colspan="2"></th>
</tr>
</tfoot>
</table>
</div>
