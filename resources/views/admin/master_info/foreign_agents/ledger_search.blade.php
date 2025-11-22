<div class="modal-header">
    <h5 class="modal-title">Select Ledger</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ledger Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ledgers as $ledger)
            <tr onclick="selectLedger({{ $ledger->id }}, '{{ $ledger->ledger }}')" style="cursor:pointer;">
                <td>{{ $ledger->id }}</td>
                <td>{{ $ledger->ledger }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
