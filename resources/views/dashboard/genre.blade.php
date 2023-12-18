@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Genre</h1>

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
            @foreach ($genres as $genre)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->category_name }}</td>
                        <td>
                            <a href="/dashboard/genre/{{ $genre->category_id }}" class="badge bg-info"><i
                                    class="bi bi-eye"></i></a>
                            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="badge bg-danger"><i class="bi bi-x-circle"></i></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
