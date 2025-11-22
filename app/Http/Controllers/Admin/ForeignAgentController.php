<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForeignAgent;
use App\Models\Country;

class ForeignAgentController extends Controller
{
    public function index()
    {
        $agents = ForeignAgent::with('country')->latest()->paginate(20);
        return view('admin.master_info.foreign_agents.index', compact('agents'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.master_info.foreign_agents.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:100',
            'email'     => 'required|email|max:30',
            'phone'     => 'required|max:20',
            'address'   => 'nullable|max:300',
            'user_id'   => 'required|max:60',
            'country_id'=> 'nullable|integer',
            'ledger_id' => 'nullable|integer',
        ]);

        ForeignAgent::create($request->all());

        return redirect()->route('foreign-agents.index')
            ->with('success', 'Foreign Agent created successfully.');
    }

    public function edit(ForeignAgent $foreign_agent)
    {
        $countries = Country::all();
        return view('admin.master_info.foreign_agents.edit', [
            'agent' => $foreign_agent,
            'countries' => $countries
        ]);
    }

    public function update(Request $request, ForeignAgent $foreign_agent)
    {
        $request->validate([
            'name'      => 'required|max:100',
            'email'     => 'required|email|max:30',
            'phone'     => 'required|max:20',
            'address'   => 'nullable|max:300',
            'user_id'   => 'required|max:60',
            'country_id'=> 'nullable|integer',
            'ledger_id' => 'nullable|integer',
        ]);

        $foreign_agent->update($request->all());

        return redirect()->route('foreign-agents.index')
            ->with('success', 'Foreign Agent updated successfully.');
    }

    public function destroy(ForeignAgent $foreign_agent)
    {
        $foreign_agent->delete();

        return back()->with('success', 'Foreign Agent deleted.');
    }

    public function ledgerSearch()
    {
        $ledgers = \App\Models\AccLedger::select('id', 'ledger')->get();
        return view('admin.master_info.foreign_agents.ledger_search', compact('ledgers'));
    }

}
