@extends('layout.master')
@section('judul')
    Halaman Project Monitoring
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
    <a href="/project/create" class="btn btn-primary">Tambah Project</a><br><br>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Client</th>
                <th>Project Leader</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Progress</th>
                <th style='text-align:center'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_project as $key => $project)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client->name }}</td>
                    <td><b>{{ $project->leader->name }}</b>
                        <br>{{ $project->leader->email }}</td>
                    <td>{{ Carbon\Carbon::parse($project->start_date)->translatedFormat(' d F Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($project->end_date)->translatedFormat(' d F Y') }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $project->progress }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <b>{{ $project->progress }}%</b></td>
                    <td style='text-align:center'>
                        <form action="/project/{{ $project->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"> <i class="fas fa-regular fa-trash"></i></button>
                            <a href="/project/{{ $project->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-duotone fa-pen"></i></a>
                        </form>
                    </td>
                </tr>
            @empty
                <h1>Data Kosong</h1>
            @endforelse
        </tbody>
    </table>
@endsection
