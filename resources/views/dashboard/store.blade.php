@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Store</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('store.create') }}" class="btn btn-sm btn-outline-secondary">Tambah Data</a>
            </div>
        </div>
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
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->description }}</td>
                        <td>{{ $store->price }}</td>
                        <td>{{ $store->stock_quantity }}</td>
                        <td>
                            <form action="{{ route('store.update', ['store' => $store->id]) }}" method="put"
                                style="display: inline;">
                                @csrf
                                <button type="submit" class="badge bg-info"
                                    style="border: none; background-color: transparent; cursor: pointer;">
                                    Edit
                                </button>
                            </form>

                            <form id="delete-form" action="{{ route('store.delete', ['id' => $store->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger delete-btn"
                                    style="border: none; background-color: transparent; cursor: pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();

            var link = $(this).data('delete-form');

            Swal.fire({
                title: "Apakah Yakin Untuk Dihapus?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        });
    });
</script>
