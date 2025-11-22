<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Licence;
use App\Models\User;

class LicenceController extends Controller
{
    // List all licences
    public function index()
    {
        $licences = Licence::with('user')->latest()->paginate(10);
        return view('admin.master_info.licence.index', compact('licences'));
    }

    // Show create form
    public function create()
    {
        $users = User::select('id','name')->get();

        return view('admin.master_info.licence.create', compact('users'));
    }

    // Store new licence
    public function store(Request $request)
    {
        $request->validate([
            'licence' => 'required|unique:licences,licence',
            'rlno' => 'required|unique:licences,rlno',
            'user_id' => 'required|string|max:60',
            'address' => 'nullable|string|max:200',
        ]);

        Licence::create($request->all());

        return redirect()->route('licence.index')->with('success', 'Licence created successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $licence = Licence::findOrFail($id);
        $users = User::select('id','name')->get();

        return view('admin.master_info.licence.edit', compact('licence', 'users'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $licence = Licence::findOrFail($id);

        $request->validate([
            'licence' => "required|unique:licences,licence,{$id}",
            'rlno' => "required|unique:licences,rlno,{$id}",
            'user_id' => 'required|integer',
            'address' => 'nullable|string|max:200',
        ]);

        $licence->update($request->all());
        return redirect()->route('licence.index')->with('success', 'Licence updated successfully!');
    }

    // Delete
    public function destroy($id)
    {
        Licence::findOrFail($id)->delete();
        return redirect()->route('licence.index')->with('success', 'Licence deleted successfully!');
    }
}
