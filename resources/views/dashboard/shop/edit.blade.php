@extends('dashboard.layouts.app')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Edit Shop</h1>
        </div>
        <div class="section-body">
            <div>
                <a hx-get="{{ route('shops.index') }}" hx-target="#app" hx-push-url="true"
                    class="btn btn-primary mb-3 text-white">Go back</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form hx-post="{{ route('shops.update', $shop->id) }}" hx-target="#app" hx-swap="innerHTML">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $shop->name }}">
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
                                        value="{{ $shop->shop_rent }}">
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
                                        value="{{ $shop->per_unit_cost }}">
                                    @error('per_unit_cost')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

