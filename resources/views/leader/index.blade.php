@extends('layout.master')
@section('judul')
    Halaman Data Leader
@endsection

@push('scripts')
    <script src="{{ asset('layout/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('layout/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css" />
@endpush

@section('content')
    <a href="/leader/create" class="btn btn-primary">Tambah Leader</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomer HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_leader as $key => $leader)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $leader->name }}</td>
                    <td>{{ $leader->email }}</td>
                    <td>{{ $leader->phone }}</td>
                    <td>
                        <form action="/leader/{{ $leader->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/leader/{{ $leader->id }}" class="btn btn-success btn-sm">Detail</a>
                            <a href="/leader/{{ $leader->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" class="btn btn-danger btn-sm" onclick="" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <h1>Data Kosong</h1>
            @endforelse
        </tbody>
    </table>
@endsection
