<?php

namespace App\Http\Controllers\Admin\Processing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processing\Worker;
use App\Models\Country;
use App\Models\Profession;
use App\Models\LocalAgent;
use App\Models\District;
use Illuminate\Support\Facades\Auth;

class PassportEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Worker::with(['country', 'profession', 'localAgent', 'district'])->latest()->paginate(20);
        return view('admin.processing.passport_entry.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.processing.passport_entry.create', [
            'countries' => Country::all(),
            'professions' => Profession::all(),
            'agents' => LocalAgent::all(),
            'districts' => District::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $passportEntry = new Worker();
        $passportEntry->passport_no = $request->passport_no;
        $passportEntry->name = $request->name;
        $passportEntry->fathers_name = $request->fathers_name;
        $passportEntry->mothers_name = $request->mothers_name;
        $passportEntry->date_of_birth = $request->date_of_birth;
        $passportEntry->passport_issue_date = $request->passport_issue_date;
        $passportEntry->passport_expire_date = $request->passport_expire_date;
        $passportEntry->birth_place = $request->birth_place;
        $passportEntry->country_id = $request->country_id;
        $passportEntry->working_profession_id = $request->working_profession_id;
        $passportEntry->grade = $request->grade;
        $passportEntry->basic_salary = $request->basic_salary;
        $passportEntry->education = $request->education;
        $passportEntry->overseas_experiance = $request->overseas_experiance;
        $passportEntry->religion = $request->religion;
        $passportEntry->district_id = $request->district_id;
        $passportEntry->local_experience = $request->local_experience;
        $passportEntry->address = $request->address;
        $passportEntry->local_agent_id = $request->local_agent_id;
        $passportEntry->gender = $request->gender;
        $passportEntry->user_id = Auth()->user()->id;
        $passportEntry->note = $request->note;
        $passportEntry->save();
        
        return redirect()->route('passport-entries.index')->with('success', 'Worker created successfully');
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
    public function edit(string $id)
    {
        $passportEntry = Worker::findOrFail($id);
        return view('admin.processing.passport_entry.edit', [
            'passportEntry' => $passportEntry,
            'countries' => Country::all(),
            'professions' => Profession::all(),
            'agents' => LocalAgent::all(),
            'districts' => District::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $passportEntry = Worker::findOrFail($id);
        $passportEntry->update($request->all());
        return redirect()->route('passport-entries.index')->with('success', 'Passport Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $passportEntry = Worker::findOrFail($id);
        $passportEntry->delete();
        
        return redirect()->route('passport-entries.index')->with('success', 'Passport Entry deleted successfully');

    }
}
