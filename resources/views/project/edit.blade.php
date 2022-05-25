@extends('layout.master')
@section('judul')
    Halaman Edit project
@endsection

@section('content')
    <form action="/project/{{ $project->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Project</label>
            <input type="text" value="{{ $project->name }}" class="form-control" name="name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Nama Client</label>
            <select class="form-control" name="client_id">
                @foreach ($data_client as $item) 
                    @if ($item->id == $project->client_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Nama Leader</label>
            <select class="form-control" name="leader_id">
                @foreach ($data_leader as $item) 
                    @if ($item->id == $project->leader_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('leader_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ $project->start_date->format('Y-m-d') }}">
        </div>
        @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Tanggal Berakhir</label>
            <input type="date" class="form-control" name="end_date" value="{{ $project->end_date->format('Y-m-d') }}">
        </div>
        @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror  
        <div class="form-group">
            <label>Progress</label>
            <input type="text" value="{{ $project->progress }}" class="form-control" name="progress">
        </div>
        @error('progress')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection