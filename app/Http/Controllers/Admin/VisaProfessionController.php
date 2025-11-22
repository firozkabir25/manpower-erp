<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\VisaProfession;

class VisaProfessionController extends Controller
{
    public function index()
    {
        $data = VisaProfession::with('user')->latest()->get();
        return view('admin.master_info.visaprofession.index', compact('data'));
    }

    public function create()
    {
        return view('admin.master_info.visaprofession.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
            'namearabic' => 'required|max:60',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ?? 'system';

        VisaProfession::create($data);

        return redirect()->route('visa-profession.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = VisaProfession::findOrFail($id);
        return view('admin.master_info.visaprofession.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:60',
            'namearabic' => 'required|max:60',
        ]);

        $data = VisaProfession::findOrFail($id);
        $update = $request->all();
        $update['user_id'] = auth()->id() ?? $data->user_id ?? 'system';
        $data->update($update);

        return redirect()->route('visa-profession.index')->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        VisaProfession::findOrFail($id)->delete();
        return redirect()->route('visa-profession.index')->with('success', 'Deleted Successfully');
    }
}
