<?php

namespace App\Http\Controllers\Admin\Processing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processing\VisaBlock;
use App\Models\Company;
use App\Models\Sponsor;
use App\Models\VisaProfession;
use App\Models\Licence;
use Auth;

class VisaBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocks = VisaBlock::with(['company','sponsor','profession','licence','user'])->latest()->paginate(20);
        return view('admin.processing.visa_blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.processing.visa_blocks.create', [
            'companies' => Company::all(),
            'sponsors' => Sponsor::all(),
            'professions' => VisaProfession::all(),
            'licences' => Licence::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required',
            'company_id' => 'nullable',
            'block_number' => 'required',
            'sponsor_id' => 'nullable',
            'alwaka_no' => 'nullable',
            'quantity' => 'required|numeric',
            'visa_profession' => 'nullable',
            'licence_id' => 'nullable',
            'active' => 'nullable|boolean',
        ]);

        $data['user_id'] = Auth::id();
        $data['active'] = $request->active ?? 1;

        VisaBlock::create($data);

        return redirect()->route('visa-blocks.index')->with('success', 'Visa Block Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaBlock $visaBlock)
    {
        return view('admin.processing.visa_blocks.edit', [
            'item' => $visaBlock,
            'companies' => Company::all(),
            'sponsors' => Sponsor::all(),
            'professions' => VisaProfession::all(),
            'licences' => Licence::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisaBlock $visaBlock)
    {
        $data = $request->validate([
            'date' => 'required',
            'company_id' => 'nullable',
            'block_number' => 'required',
            'sponsor_id' => 'nullable',
            'alwaka_no' => 'nullable',
            'quantity' => 'required|numeric',
            'visa_profession' => 'nullable',
            'licence_id' => 'nullable',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $request->active ?? 1;

        $visaBlock->update($data);

        return redirect()->route('visa-blocks.index')->with('success', 'Visa Block Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaBlock $visaBlock)
    {
        $visaBlock->delete();
        return redirect()->route('visa-blocks.index')->with('success', 'Visa Block Deleted');
    }
}
