@extends('dashboard.layouts.app')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Shop List</h1>
        </div>
        <div class="section-body">
            <div>
                <a hx-get="{{ route('shops.create') }}" hx-target="#app" hx-push-url="true"
                    class="btn btn-primary mb-3 text-white">Create new</a>
            </div>

            <table class="table table-striped table-md-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rent</th>
                        <th scope="col">Per Unit Cost</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->shop_rent }}</td>
                        <td>{{ $shop->per_unit_cost }}</td>
                        <td class="d-flex">
                            <div>
                                <button hx-get="{{ route('shops.edit', $shop->id) }}" hx-target="#app" class="btn btn-sm btn-primary mr-2">Edit</button>
                            </div>
                            <form action="{{ route('shops.destroy', $shop->id) }}" hx-confirm="Are you sure?" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                            </form>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </section>
@endsection
