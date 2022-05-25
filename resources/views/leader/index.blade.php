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
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="/leader/create" class="btn btn-primary">Tambah Leader</a><br><br>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomer HP</th>
                <th style='text-align:center'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_leader as $key => $leader)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $leader->name }}</td>
                    <td>{{ $leader->email }}</td>
                    <td>{{ $leader->phone }}</td>
                    <td style='text-align:center'>
                        <form action="/leader/{{ $leader->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"> <i class="fas fa-regular fa-trash"></i></button>
                            <a href="/leader/{{ $leader->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-duotone fa-pen"></i></a>
                        </form>
                    </td>
                </tr>
            @empty
                <h1>Data Kosong</h1>
            @endforelse
        </tbody>
    </table>
@endsection
