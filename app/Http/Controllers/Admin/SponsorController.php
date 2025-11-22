<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::latest()->paginate(10);
        return view('admin.master_info.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.master_info.sponsors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sponsor_id' => 'required|unique:sponsors,sponsor_id',
            'name' => 'nullable|string|max:100',
            'name_arabic' => 'nullable|string|max:100',
            'user_id' => 'required|string|max:60',
            'address' => 'nullable|string|max:300',
        ]);

        Sponsor::create($request->all());

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor created successfully.');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.master_info.sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'sponsor_id' => 'required|unique:sponsors,sponsor_id,' . $sponsor->id,
            'name' => 'nullable|string|max:100',
            'name_arabic' => 'nullable|string|max:100',
            'user_id' => 'required|string|max:60',
            'address' => 'nullable|string|max:300',
        ]);

        $sponsor->update($request->all());

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor deleted successfully.');
    }
}
