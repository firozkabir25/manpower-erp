<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Expense;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();
        return view('admin.master_info.countries.index', compact('countries'));
    }

    private function overseasList()
    {
        return [
            "Abcd","APPOINMENT","ATTESTED PC FORWARD","Batel","BMET Card",
            "CALLING RECEIVED","DEPLOYED","DOCUMENT","E-VISA","ENTRY VISA",
            "FINGER PRINT RECEIVED DATE","FINGER PRINT SEND DATE","Flight Confirm",
            "IP Received","LABOUR CONTACT","Manpower done","MEDICAL",
            "MEDICAL CARD RECEIVE","MEDICAL CARD SEND","Medical Received",
            "PASSPORT OUT STATUS","POLICE CLEARANCE","RETURN BACK","SMART CARD",
            "TRAINING","VISA CANCEL","VISA RECEIVED","WORK PERMIT"
        ];
    }

    public function create()
    {
        $overseasList = $this->overseasList();
        $expenseList = Expense::where('active','1')->orderBy('sort')->get();

        return view('admin.master_info.countries.create', compact('overseasList','expenseList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short' => 'required',
        ]);

        Country::create([
            'name' => $request->name,
            'short' => $request->short,
            'user_id' => auth()->id() ?? 1,
            'visa_expire_days' => $request->visa_expire_days,
            'police_expire_days' => $request->police_expire_days,
            'medical_expire_days' => $request->medical_expire_days,
            'overseas_status' => json_encode($request->overseas_status),
            'expense_id' => json_encode($request->expense_id),
        ]);

        return redirect()->route('country.index')->with('success','Saved Successfully!');
    }

    public function edit(Country $country)
    {
        $overseasList = $this->overseasList();
        $expenseList = Expense::where('active','1')->orderBy('sort')->get();

        return view('admin.master_info.countries.edit', compact('country','overseasList','expenseList'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'short' => 'required',
        ]);

        $country->update([
            'name' => $request->name,
            'short' => $request->short,
            'visa_expire_days' => $request->visa_expire_days,
            'police_expire_days' => $request->police_expire_days,
            'medical_expire_days' => $request->medical_expire_days,
            'overseas_status' => json_encode($request->overseas_status),
            'expense_id' => json_encode($request->expense_id),
        ]);

        return redirect()->route('country.index')->with('success','Updated Successfully!');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index')->with('success','Deleted Successfully!');
    }
}
