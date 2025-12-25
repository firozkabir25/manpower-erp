<?php

namespace App\Http\Controllers\Admin\Processing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processing\Project;
use App\Models\{ Company, Country, ForeignAgent,
    AccCostCenter, Currency, Source, Profession
};
use DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with([
            'company','country','foreignAgent','user','profession',
        ])->latest()->paginate(20);

        return view('admin.processing.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.processing.projects.create', [
            'project' => new Project(),
            'companies' => Company::all(),
            'countries' => Country::all(),
            'agents' => ForeignAgent::all(),
            'costCenters' => AccCostCenter::all(),
            'currencies' => Currency::all(),
            'sources' => Source::all(),
            'professions' => Profession::all(),
        ]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $project = Project::create([
                'start_date' => $request->start_date,
                'country_id' => $request->country_id,
                'company_id' => $request->company_id,
                'project' => $request->project,
                'cost_center_id' => $request->cost_center_id,
                'project_code' => $request->project_code,
                'foreign_agent_id' => $request->foreign_agent_id,
                'total_visa' => $request->total_visa,
                'document_receive_date' => $request->document_receive_date,
                'profession_id' => $request->profession_id,
                'visa_block' => $request->visa_block,
                'description' => $request->description,
                'source_id' => $request->source_id,
                'currency_id' => $request->currency_id,
                'user_id' => auth()->id(),
            ]);

            // SALES PRICE
            if ($request->sales) {
                foreach ($request->sales as $row) {
                    $project->salesPrices()->create($row + [
                        'user_id' => auth()->id()
                    ]);
                }
            }

            // VISA COST
            if ($request->visa_costs) {
                foreach ($request->visa_costs as $row) {
                    $project->visaCosts()->create($row + [
                        'user_id' => auth()->id()
                    ]);
                }
            }
        });

        return redirect()->route('projects.index')
            ->with('success','Project created successfully');
    }

    public function edit(Project $project)
    {
        $project->load(['salesPrices','visaCosts']);

        return view('admin.processing.projects.edit', [
            'project' => $project,
            'companies' => Company::all(),
            'countries' => Country::all(),
            'agents' => ForeignAgent::all(),
            'costCenters' => AccCostCenter::all(),
            'currencies' => Currency::all(),
            'sources' => Source::all(),
            'professions' => Profession::all(),
        ]);
    }

    public function show(Project $project)
    {
        $project->load(['salesPrices','visaCosts','company','country','foreignAgent','user','profession','costCenter','currency','source','branch']);

        return view('admin.processing.projects.show', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        DB::transaction(function () use ($request, $project) {

            $project->update($request->except(['sales','visa_costs']));

            $project->salesPrices()->delete();
            $project->visaCosts()->delete();

            if ($request->sales) {
                foreach ($request->sales as $row) {
                    $project->salesPrices()->create($row + [
                        'user_id' => auth()->id()
                    ]);
                }
            }

            if ($request->visa_costs) {
                foreach ($request->visa_costs as $row) {
                    $project->visaCosts()->create($row + [
                        'user_id' => auth()->id()
                    ]);
                }
            }
        });

        return redirect()->route('projects.index')
            ->with('success','Project updated successfully');
    }
}
