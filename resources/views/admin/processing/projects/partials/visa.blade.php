<div id="visa" class="tab-pane fade">
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
    <th>Visa Cost BDT</th>
    <th>Remarks</th>
</tr>
</thead>
<tbody>
@php
$visaData = $project->visa_costs ?? [];
if (empty($visaData)) {
    $visaData = [0 => []]; // For create, one empty row
}
@endphp
@foreach($visaData as $index => $visa)
<tr>
    <td>
        <button type="button" class="btn btn-xs btn-danger removeRow">🗑️</button>
    </td>
    <td><input type="date" name="visa_costs[{{ $index }}][date]" class="form-control" value="{{ $visa->date ?? '' }}"></td>
    <td><select name="visa_costs[{{ $index }}][edition]" class="form-control">
        <option value="1" @selected(($visa->edition ?? 1) == 1)>Edition-1</option>
        <option value="2" @selected(($visa->edition ?? 1) == 2)>Edition-2</option>
    </select></td>
    <td><select name="visa_costs[{{ $index }}][profession_id]" class="form-control">
        <option></option>
        @foreach($professions as $key => $profession)
            <option value="{{$profession->id}}" @selected(($visa->profession_id ?? '') == $profession->id)>{{$profession->name}}</option>
        @endforeach
    </select></td>
    <td><select name="visa_costs[{{ $index }}][currency_id]" class="form-control">
        <option></option>
        @foreach($currencies as $key => $currency)
            <option value="{{$currency->id}}" @selected(($visa->currency_id ?? '') == $currency->id)>{{$currency->currency}}</option>
        @endforeach
    </select></td>
    <td><input type="number" step="0.01" name="visa_costs[{{ $index }}][visa_currency_rate]" class="form-control" value="{{ $visa->visa_currency_rate ?? 0 }}"></td>
    <td><input type="number" step="0.01" name="visa_costs[{{ $index }}][visa_conversion_rate]" class="form-control" value="{{ $visa->visa_conversion_rate ?? 0 }}"></td>
    <td><input type="number" step="0.01" name="visa_costs[{{ $index }}][visacostbdt]" class="form-control visaAmount text-right" value="{{ $visa->visacostbdt ?? 0 }}"></td>
    <td><input type="text" name="visa_costs[{{ $index }}][note]" class="form-control" value="{{ $visa->note ?? '' }}"></td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr class="bg-light">
    <th width="30">
        <button type="button" class="btn btn-xs btn-success" id="addVisaRow">+</button>
    </th>

    <th colspan="6" class="text-right">Total :</th>
    <th>
        <input type="text" id="visa_total" class="form-control text-right" readonly value="0">
    </th>
    <th></th>
</tr>
</tfoot>

</table>
</div>
