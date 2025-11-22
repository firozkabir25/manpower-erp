<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WorkingProfession;

class WorkingProfessionController extends Controller
{
    public function index()
    {
        $data = WorkingProfession::latest()->get();
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

        WorkingProfession::create($data);

        return redirect()->route('working-professions.index')
                         ->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = WorkingProfession::findOrFail($id);
        return view('admin.master_info.working_professions.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:60',
        ]);

        $data = WorkingProfession::findOrFail($id);
        $update = $request->all();
        $update['user_id'] = auth()->id() ?? $data->user_id ?? 'system';
        $data->update($update);

        return redirect()->route('working-professions.index')
                         ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        WorkingProfession::findOrFail($id)->delete();
        return redirect()->route('working-professions.index')
                         ->with('success', 'Deleted Successfully');
    }
}
