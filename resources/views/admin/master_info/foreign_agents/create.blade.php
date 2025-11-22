@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Foreign Agent</div>
    <div class="card-body">
        <form action="{{ route('foreign-agents.store') }}" method="POST">
            @csrf
            @include('admin.master_info.foreign_agents.form', ['agent' => null])
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>


<div class="modal fade" id="ledgerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="ledgerModalContent"></div>
    </div>
</div>

<script>
function openLedgerPopup() {
    fetch("{{ route('ledger.search') }}")
        .then(res => res.text())
        .then(html => {
            document.getElementById("ledgerModalContent").innerHTML = html;
            new bootstrap.Modal(document.getElementById('ledgerModal')).show();
        });
}

function selectLedger(id, name) {
    document.getElementById("ledger_id").value = id;
    document.getElementById("ledger_name").value = name;
    bootstrap.Modal.getInstance(document.getElementById('ledgerModal')).hide();
}
</script>
@endsection
