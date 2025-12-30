<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profession;

class WorkingProfessionController extends Controller
{
    public function index()
    {
        $data = Profession::latest()->get();
        return view('admin.master_info.working_professions.index', compact('data'));
    }

    public function create()
    {
        return view('admin.master_info.working_professions.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:60',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ?? 'system';

        Profession::create($data);

        return redirect()->route('working-professions.index')
                         ->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = Profession::findOrFail($id);
        return view('admin.master_info.working_professions.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:60',
        ]);

        $data = Profession::findOrFail($id);
        $update = $request->all();
        $update['user_id'] = auth()->id() ?? $data->user_id ?? 'system';
        $data->update($update);

        return redirect()->route('working-professions.index')
                         ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Profession::findOrFail($id)->delete();
        return redirect()->route('working-professions.index')
                         ->with('success', 'Deleted Successfully');
    }
}
