<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Country;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with(['country','user'])->paginate(25);
        return view('admin.master_info.companies.index', compact('companies'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.master_info.companies.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'short_name' => 'nullable|string|max:20',
            'name_arabic' => 'nullable|string|max:200',
            'country_id' => 'nullable|exists:countries,id',
            'id_number' => 'required|string|max:15',
            'contact_by' => 'nullable|string|max:60',
            'address' => 'nullable|string|max:200',
            'email' => 'required|email|max:30',
            'phone' => 'required|string|max:25',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        Company::create($data);

        return redirect()->route('company.index')->with('success', 'Company created successfully!');
    }

    public function edit(Company $company)
    {
        $countries = Country::all();
        return view('admin.master_info.companies.edit', compact('company', 'countries'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'short_name' => 'nullable|string|max:20',
            'name_arabic' => 'nullable|string|max:200',
            'country_id' => 'nullable|exists:countries,id',
            'id_number' => 'required|string|max:15',
            'contact_by' => 'nullable|string|max:60',
            'address' => 'nullable|string|max:200',
            'email' => 'required|email|max:30',
            'phone' => 'required|string|max:25',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('success', 'Company deleted successfully!');
    }
}
