@extends('layouts.app')

@section('title','View Project')

@section('content')
<div class="card card-purple">
    <div class="card-header">
        <h3>Project Details</h3>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <a href="{{ route('projects.edit', $project) }}" class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i> Edit
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $project->id }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $project->start_date }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $project->country?->name }}</td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td>{{ $project->company?->name }}</td>
                    </tr>
                    <tr>
                        <th>Project</th>
                        <td>{{ $project->project }}</td>
                    </tr>
                    <tr>
                        <th>Cost Center</th>
                        <td>{{ $project->costCenter?->name }}</td>
                    </tr>
                    <tr>
                        <th>Project Code</th>
                        <td>{{ $project->project_code }}</td>
                    </tr>
                    <tr>
                        <th>Foreign Agent</th>
                        <td>{{ $project->foreignAgent?->name }}</td>
                    </tr>
                    <tr>
                        <th>Total Visa</th>
                        <td>{{ number_format($project->total_visa, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Document Receive Date</th>
                        <td>{{ $project->document_receive_date }}</td>
                    </tr>
                    <tr>
                        <th>Working Profession</th>
                        <td>{{ $project->profession?->name }}</td>
                    </tr>
                    <tr>
                        <th>Visa Block</th>
                        <td>{{ $project->visa_block }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $project->description }}</td>
                    </tr>
                    <tr>
                        <th>Source / Sub Agency</th>
                        <td>{{ $project->source?->name }}</td>
                    </tr>
                    <tr>
                        <th>Active</th>
                        <td>{{ $project->active ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td>{{ $project->user?->name }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <h4>Sales Prices</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Edition</th>
                        <th>Profession</th>
                        <th>Currency</th>
                        <th>Currency Rate</th>
                        <th>Conversion Rate</th>
                        <th>Sales Price BDT</th>
                        <th>Code</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($project->salesPrices as $sale)
                    <tr>
                        <td>{{ $sale->date }}</td>
                        <td>Edition-{{ $sale->edition }}</td>
                        <td>{{ $sale->profession?->name }}</td>
                        <td>{{ $sale->currency?->currency }}</td>
                        <td>{{ number_format($sale->currency_rate, 2) }}</td>
                        <td>{{ number_format($sale->conversion_rate, 2) }}</td>
                        <td>{{ number_format($sale->price, 2) }}</td>
                        <td>{{ $sale->code }}</td>
                        <td>{{ $sale->remark }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No sales prices found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <hr>

        <h4>Visa Costs</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Edition</th>
                        <th>Profession</th>
                        <th>Currency</th>
                        <th>Currency Rate</th>
                        <th>Conversion Rate</th>
                        <th>Visa Cost BDT</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($project->visaCosts as $visa)
                    <tr>
                        <td>{{ $visa->date }}</td>
                        <td>Edition-{{ $visa->edition }}</td>
                        <td>{{ $visa->profession?->name }}</td>
                        <td>{{ $visa->currency?->currency }}</td>
                        <td>{{ number_format($visa->visa_currency_rate, 2) }}</td>
                        <td>{{ number_format($visa->visa_conversion_rate, 2) }}</td>
                        <td>{{ number_format($visa->visacostbdt, 2) }}</td>
                        <td>{{ $visa->note }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No visa costs found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection