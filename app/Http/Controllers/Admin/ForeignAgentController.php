<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ForeignAgent;
use App\Models\Country;

class ForeignAgentController extends Controller
{
    public function index()
    {
        $agents = ForeignAgent::with(['country','ledger','user'])->latest()->paginate(20);
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
            'country_id'=> 'nullable|exists:countries,id',
            'ledger_id' => 'nullable|exists:acc_ledgers,id',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ? (string)auth()->id() : ($data['user_id'] ?? 'system');

        ForeignAgent::create($data);

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
            'country_id'=> 'nullable|exists:countries,id',
            'ledger_id' => 'nullable|exists:acc_ledgers,id',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ? (string)auth()->id() : ($data['user_id'] ?? $foreign_agent->user_id ?? 'system');

        $foreign_agent->update($data);

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
