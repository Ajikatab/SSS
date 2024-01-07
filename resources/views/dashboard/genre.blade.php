@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Genre</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('genre.create') }}" class="btn btn-sm btn-outline-secondary">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->category_name }}</td>
                        <td>
                            <form action="{{ route('genres.edit', ['id' => $genre['id']]) }}" method="put"
                                style="display: inline;">
                                @csrf
                                <button type="submit" class="badge bg-info"
                                    style="border: none; background-color: transparent; cursor: pointer;">
                                    Edit
                                </button>
                            </form>
                            <form id="delete-form" action="{{ route('genres.destroy', ['id' => $genre['id']]) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger delete-btn"
                                    style="border: none; background-color: transparent; cursor: pointer;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada data genre.</td>
                    </tr>
                @endforelse
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
