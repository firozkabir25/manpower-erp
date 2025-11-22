<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('user')->latest()->paginate(10);
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
            'user_id' => 'nullable',
            'address' => 'nullable|string|max:300',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ? (string)auth()->id() : ($data['user_id'] ?? 'system');

        Sponsor::create($data);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully.');
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
            'user_id' => 'nullable',
            'address' => 'nullable|string|max:300',
        ]);

        $update = $request->all();
        $update['user_id'] = auth()->id() ? (string)auth()->id() : ($update['user_id'] ?? $sponsor->user_id ?? 'system');
        $sponsor->update($update);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted successfully.');
    }
}
