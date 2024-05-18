<div class="card">
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Shop Rent</label>
                        <input type="text" name="shop_rent"
                            class="form-control @error('shop_rent') is-invalid @enderror"
                            value="{{ old('shop_rent') }}">
                        @error('shop_rent')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Per Unit cost</label>
                        <input type="text" name="per_unit_cost"
                            class="form-control @error('per_unit_cost') is-invalid @enderror"
                            value="{{ old('per_unit_cost') }}">
                        @error('per_unit_cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
