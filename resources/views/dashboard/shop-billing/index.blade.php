@extends('dashboard.layouts.app')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Shop Billings</h1>
        </div>
        <div class="section-body">
            <div>
                <a hx-get="{{ route('shop-billings.create') }}" hx-target="#app" hx-push-url="true"
                    class="btn btn-primary mb-3 text-white">Create new</a>
            </div>

            <table class="table table-striped table-md-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Shop</th>
                        <th scope="col">Total Bill</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billings as $bill)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ date('d-F-Y', strtotime($bill->entry_date)) }}</td>
                        <td>{{ $bill->shop->name}}</td>
                        <td>{{ $bill->total_cost }}</td>
                        <td class="d-flex">
                            {{-- <div>
                                <button hx-get="{{ route('shops.edit', $shop->id) }}" hx-target="#app" class="btn btn-sm btn-primary mr-2">Edit</button>
                            </div> --}}
                            <form action="{{ route('shop-billings.destroy', $bill->id) }}" hx-confirm="Are you sure?" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                            </form>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $billings->links() }}
        </div>
    </section>
@endsection
