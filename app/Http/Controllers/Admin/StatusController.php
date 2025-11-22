<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $data = Status::orderBy('sort')->get();
        return view('admin.master_info.status.index', compact('data'));
    }

    public function create()
    {
        return view('admin.master_info.status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'sort' => 'nullable|numeric'
        ]);

        Status::create([
            'name' => $request->name,
            'user_id' => auth()->id() ?? 'system',
            'sort' => $request->sort ?? 0
        ]);

        return redirect()->route('status.index')
                         ->with('success', 'Status added successfully');
    }

    public function edit($id)
    {
        $data = Status::findOrFail($id);
        return view('admin.master_info.status.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:30',
            'sort' => 'nullable|numeric'
        ]);

        $data = Status::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'sort' => $request->sort
        ]);

        return redirect()->route('status.index')
                         ->with('success', 'Status updated successfully');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();

        return redirect()->route('status.index')
                         ->with('success', 'Status deleted');
    }
}
