<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AirLine;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::latest()->paginate(10);
        return view('admin.master_info.airlines.index', compact('airlines'));
    }

    public function create()
    {
        return view('admin.master_info.airlines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
            'code' => 'required|max:30',
        ]);

        Airline::create([
            'name' => $request->name,
            'code' => $request->code,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('airline.index')
            ->with('success', 'Airline created successfully!');
    }

    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('admin.master_info.airlines.edit', compact('airline'));
    }

    public function update(Request $request, $id)
    {
        $airline = Airline::findOrFail($id);

        $request->validate([
            'name' => 'required|max:60',
            'code' => 'required|max:30',
        ]);

        $airline->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('airline.index')
            ->with('success', 'Airline updated successfully!');
    }

    public function destroy($id)
    {
        Airline::findOrFail($id)->delete();

        return redirect()->route('airline.index')
            ->with('success', 'Airline deleted successfully!');
    }
}
