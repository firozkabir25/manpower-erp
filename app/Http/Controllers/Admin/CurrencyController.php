<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::with('country', 'user')->latest()->paginate(10);
        return view('admin.master_info.currencies.index', compact('currencies'));
    }

    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('admin.master_info.currencies.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'nullable|exists:countries,id',
            'currency' => 'required|max:20',
            'currency_code' => 'nullable|max:3',
            'currency_symbol' => 'nullable|max:10',
            '_value' => 'required|numeric',
        ]);

        Currency::create([
            'country_id' => $request->country_id,
            'currency' => $request->currency,
            'currency_code' => $request->currency_code,
            'currency_symbol' => $request->currency_symbol,
            '_value' => $request->_value,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('currency.index')
            ->with('success', 'Currency created successfully!');
    }

    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $countries = Country::orderBy('name')->get();
        return view('admin.master_info.currencies.edit', compact('currency', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $request->validate([
            'country_id' => 'nullable|exists:countries,id',
            'currency' => 'required|max:20',
            'currency_code' => 'nullable|max:3',
            'currency_symbol' => 'nullable|max:10',
            '_value' => 'required|numeric',
        ]);

        $currency->update([
            'country_id' => $request->country_id,
            'currency' => $request->currency,
            'currency_code' => $request->currency_code,
            'currency_symbol' => $request->currency_symbol,
            '_value' => $request->_value,
        ]);

        return redirect()->route('currency.index')
            ->with('success', 'Currency updated successfully!');
    }

    public function destroy($id)
    {
        Currency::findOrFail($id)->delete();

        return redirect()->route('currency.index')
            ->with('success', 'Currency deleted successfully!');
    }
}
