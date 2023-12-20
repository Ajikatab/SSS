@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Store</h1>

    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($stores as $store)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->description }}</td>
                        <td>{{ $store->price }}</td>
                        <td>{{ $store->stock_quantity }}</td>
                        <td>
                            <a href="{{ route('store.update', ['store' => $store->id]) }}" method="post"
                                class="badge bg-info"><i class="bi bi-eye"></i></a>
                            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="badge bg-danger"><i class="bi bi-x-circle"></i></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
