<?php

namespace App\Http\Controllers\Admin\Processing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processing\Worker;
use App\Models\Processing\Project;
use App\Models\{Country, Profession, LocalAgent, District};

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::with(['country', 'workingProfession', 'localAgent', 'user', 'district', 'project'])->latest()->paginate(20);

        return view('admin.processing.workers.index', compact('workers'));
    }

    public function create()
    {
        $projects = Project::all();
        $countries = Country::all();
        $professions = WorkingProfession::all();
        $agents = LocalAgent::all();
        $districts = District::all();

        return view('admin.processing.workers.create', compact('projects', 'countries', 'professions', 'agents', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'passport_no' => 'required|unique:workers',
            'project_id' => 'required',
            'country_id' => 'required',
            'working_profession_id' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        Worker::create($data);

        return redirect()->route('workers.index')->with('success', 'Worker created successfully');
    }

    public function show(Worker $worker)
    {
        $worker->load(['country', 'workingProfession', 'localAgent', 'user', 'district', 'project']);

        return view('admin.processing.workers.show', compact('worker'));
    }

    public function edit(Worker $worker)
    {
        $projects = Project::all();
        $countries = Country::all();
        $professions = WorkingProfession::all();
        $agents = LocalAgent::all();
        $districts = District::all();

        return view('admin.processing.workers.edit', compact('worker', 'projects', 'countries', 'professions', 'agents', 'districts'));
    }

    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required',
            'passport_no' => 'required|unique:workers,passport_no,' . $worker->id,
            'project_id' => 'required',
            'country_id' => 'required',
            'working_profession_id' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $worker->update($data);

        return redirect()->route('workers.index')->with('success', 'Worker updated successfully');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('success', 'Worker deleted successfully');
    }
}