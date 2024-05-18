@extends('dashboard.layouts.app')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Shop List</h1>
        </div>
        <div class="section-body">
            <div>
                <a hx-get="{{ route('shops.index') }}" hx-target="#app" hx-push-url="true"
                    class="btn btn-primary mb-3 text-white">Go back</a>
            </div>

            <x-session-alert />

            <div class="card">
                <div class="card-body">
                    <form hx-post="{{ route('shop-billings.calculate') }}" hx-target="#app" hx-swap="innerHTML">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                        value="{{ date('Y-m-d') }}">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Shop</label>
                                    <select name="shop" id="" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($shops as $shop)
                                            <option value="{{ $shop->id  }}">{{ $shop->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('shop')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Current Unit</label>
                                    <input type="text" name="current_unit"
                                        class="form-control @error('current_unit') is-invalid @enderror"
                                        value="{{ old('current_unit') }}">
                                    @error('current_unit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Calculate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="calculation-card"></div>

        </div>
    </section>
@endsection
