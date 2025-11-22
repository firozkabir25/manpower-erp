<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocalAgent;
use App\Models\AccLedger;
use Illuminate\Support\Facades\Auth;

class LocalAgentController extends Controller
{
    public function index()
    {
        $localagents = LocalAgent::with('ledger', 'user')->latest()->paginate(10);

        return view('admin.master_info.localagents.index', compact('localagents'));
    }

    public function create()
    {
        $ledgers = AccLedger::orderBy('ledger')->get();
        return view('admin.master_info.localagents.create', compact('ledgers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:100',
            'nid'       => 'required|numeric',
            'phone'     => 'nullable|max:60',
            'email'     => 'required|email|max:30',
            'address'   => 'nullable|max:200',
            'ledger_id' => 'nullable|exists:acc_ledgers,id',
            'code'      => 'required|numeric',
        ]);

        LocalAgent::create([
            'name'      => $request->name,
            'nid'       => $request->nid,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'address'   => $request->address,
            'ledger_id' => $request->ledger_id,
            'code'      => $request->code,
            'user_id'   => Auth::id(),
        ]);

        return redirect()->route('localagent.index')
            ->with('success', 'Local agent added successfully!');
    }

    public function edit($id)
    {
        $localagent = LocalAgent::findOrFail($id);
        $ledgers = AccLedger::orderBy('ledger')->get();

        return view('admin.master_info.localagents.edit', compact('localagent', 'ledgers'));
    }

    public function update(Request $request, $id)
    {
        $localagent = LocalAgent::findOrFail($id);

        $request->validate([
            'name'      => 'required|max:100',
            'nid'       => 'required|numeric',
            'phone'     => 'nullable|max:60',
            'email'     => 'required|email|max:30',
            'address'   => 'nullable|max:200',
            'ledger_id' => 'nullable|exists:acc_ledgers,id',
            'code'      => 'required|numeric',
        ]);

        $localagent->update([
            'name'      => $request->name,
            'nid'       => $request->nid,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'address'   => $request->address,
            'ledger_id' => $request->ledger_id,
            'code'      => $request->code,
        ]);

        return redirect()->route('localagent.index')
            ->with('success', 'Local agent updated successfully!');
    }

    public function destroy($id)
    {
        LocalAgent::findOrFail($id)->delete();

        return redirect()->route('localagent.index')
            ->with('success', 'Local agent deleted successfully!');
    }
}
