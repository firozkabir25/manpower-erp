<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $data = Expense::with('user')->orderBy('sort', 'asc')->get();
        return view('admin.master_info.expenses.index', compact('data'));
    }

    public function create()
    {
        return view('admin.master_info.expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:60',
            'sort'    => 'required|numeric',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ?? '';

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = Expense::findOrFail($id);
        return view('admin.master_info.expenses.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|max:60',
            'sort'    => 'required|numeric',
        ]);

        $data = Expense::findOrFail($id);
        $update = $request->all();
        $update['user_id'] = auth()->id() ?? $data->user_id ?? '';
        $data->update($update);

        return redirect()->route('expenses.index')->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Expense::findOrFail($id)->delete();
        return redirect()->route('expenses.index')->with('success', 'Deleted Successfully');
    }

    public function toggleActive(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        // Toggle value
        $expense->active = $expense->active == '1' ? '0' : '1';
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

}
