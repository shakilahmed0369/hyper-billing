<div class="card">
    <div class="card-header">
        <h6>Unit Calculation</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Current Unit</th>
                        <th>Previous Unit</th>
                        <th>Total Used</th>
                        <th>Per Unit Cost</th>
                        <th>Total Charge</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $unitCalculation['current_unit'] }}</td>
                        <td>{{ $unitCalculation['previous_unit'] }}</td>
                        <td>{{ $unitCalculation['total_used_unit'] }}</td>
                        <td>{{ $unitCalculation['per_unit_cost'] }}</td>
                        <td>৳{{ $unitCalculation['total_charge'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td><b>Entry Date</b></td>
                    <td>{{ $entryDate }}</td>
                </tr>
                <tr>
                    <td><b>Shop Name</b></td>
                    <td>{{ $shop->name }}</td>
                </tr>
                <tr>
                    <td><b>Shop Rent</b></td>
                    <td>৳{{ $shop->shop_rent }}</td>
                </tr>
                <tr>
                    <td><b>Electricity Bill</b></td>
                    <td>৳{{ $unitCalculation['total_charge'] }}</td>
                </tr>
                <tr>
                    <td><b>Total Amount</b></td>
                    <td>৳{{ $payableAmount }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{ route('shop-billings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            <input type="hidden" name="shop_rent" value="{{ $shop->shop_rent }}">
            <input type="hidden" name="per_unit_cost" value="{{ $shop->per_unit_cost }}">
            <input type="hidden" name="previous_unit" value="{{ $unitCalculation['previous_unit'] }}">
            <input type="hidden" name="current_unit" value="{{ $unitCalculation['current_unit'] }}">
            <input type="hidden" name="total_used_unit" value="{{ $unitCalculation['total_used_unit'] }}">
            <input type="hidden" name="total_cost" value="{{ $payableAmount }}">
            <input type="hidden" name="entry_date" value="{{ $entryDate }}">

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
