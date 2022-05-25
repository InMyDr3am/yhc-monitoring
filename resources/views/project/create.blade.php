@extends('layout.master')
@section('judul')
    Halaman Tambah Leader
@endsection

@section('content')

<form action="/project" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Project</label>
        <input type="text" class="form-control" name="name">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror    
    <div class="form-group">
        <label>Nama Client</label>
        <select class="form-control" name="client_id">
            <option value="">--Pilih Client--</option>
            @foreach ($data_client as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    @error('client_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Nama Leader Project</label>
        <select class="form-control" name="leader_id">
            <option value="">--Pilih Leader--</option>
            @foreach ($data_leader as $leader)
                <option value="{{ $leader->id }}">{{ $leader->name }}</option>
            @endforeach
        </select>
    </div>
    @error('leader_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" class="form-control" name="start_date">
    </div>
    @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Tanggal Berakhir</label>
        <input type="date" class="form-control" name="end_date">
    </div>
    @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror       
    <div class="form-group">
        <label>Progress</label>
        <input type="number" class = "form-control" pattern="[0-9]+([,\.][0-9]+)?" name="progress"
           title="The number input must start with a number and use either comma or a dot as a decimal character."/>
    </div>
    @error('progress')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection