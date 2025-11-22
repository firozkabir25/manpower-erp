@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Add Country</h3>
        <form action="{{ route('country.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label>Short Name *</label>
                    <input type="text" name="short" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label>Visa Expire Days</label>
                    <input type="number" name="visa_expire_days" class="form-control" value="0">
                </div>

                <div class="col-md-4 mt-3">
                    <label>Police Expire Days</label>
                    <input type="number" name="police_expire_days" class="form-control" value="0">
                </div>

                <div class="col-md-4 mt-3">
                    <label>Medical Expire Days</label>
                    <input type="number" name="medical_expire_days" class="form-control" value="0">
                </div>

                <div class="col-md-6 mt-3 position-relative">
                    <label>Overseas Status</label>
                    <input type="text" id="overseas_input" class="form-control" placeholder="Click to select" readonly >
                    <div id="overseas_box" class="dropdown-panel" style=" display:none; height:350px; overflow-y:scroll; border:1px solid #ddd;
                            padding:10px; position:absolute; width:95%; background:#fff; z-index:999;">
                        <input type="text" class="form-control mb-2" placeholder="Search..." id="overseas_search">
                        <div class="row" id="overseas_list">
                            @foreach($overseasList as $item)
                            <div class="col-md-6 mb-1 overseas-item">
                                <input type="checkbox" class="ov-item" value="{{ $item }}" name="overseas_status[]">
                                {{ $item }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3 position-relative">
                    <label>Expense Head</label>
                    <input type="text" id="expense_input" class="form-control" placeholder="Click to select" readonly>
                    <div id="expense_box" class="dropdown-panel" style="display:none; height:350px; overflow-y:scroll; border:1px solid #ddd;
                            padding:10px; position:absolute; width:95%; background:#fff; z-index:999;">
                        <input type="text" class="form-control mb-2" placeholder="Search..." id="expense_search">
                        <div class="row" id="expense_list">
                            @foreach($expenseList as $exp)
                                <div class="col-md-6 mb-1 expense-item">
                                    <input type="checkbox" class="exp-item" value="{{ $exp->id }}" name="expense_id[]">
                                    {{ $exp->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>
    </div>
    <script>
        document.getElementById('overseas_input').onclick = () => {
            document.getElementById('overseas_box').style.display = 'block';
        };
        document.getElementById('expense_input').onclick = () => {
            document.getElementById('expense_box').style.display = 'block';
        };

        document.addEventListener('click', function(e){
            if(!e.target.closest('.position-relative')){
                document.getElementById('overseas_box').style.display = 'none';
                document.getElementById('expense_box').style.display = 'none';
            }
        });

        function updateInput(inputId, itemsClass){
            let selected = [];
            document.querySelectorAll('.' + itemsClass + ':checked').forEach(e=>{
                selected.push(e.parentNode.textContent.trim());
            });
            document.getElementById(inputId).value = selected.join(', ');
        }

        document.querySelectorAll('.ov-item').forEach(e=>{
            e.addEventListener('change', () => updateInput('overseas_input','ov-item'));
        });

        document.querySelectorAll('.exp-item').forEach(e=>{
            e.addEventListener('change', () => updateInput('expense_input','exp-item'));
        });

        document.getElementById('overseas_search').addEventListener('keyup', function(){
            let value = this.value.toLowerCase();
            document.querySelectorAll('.overseas-item').forEach(item=>{
                item.style.display = item.textContent.toLowerCase().includes(value) ? 'block' : 'none';
            });
        });

        document.getElementById('expense_search').addEventListener('keyup', function(){
            let value = this.value.toLowerCase();
            document.querySelectorAll('.expense-item').forEach(item=>{
                item.style.display = item.textContent.toLowerCase().includes(value) ? 'block' : 'none';
            });
        });
    </script>
@endsection
