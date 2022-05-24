@extends('layout.master')
@section('judul')
    Halaman Edit Leader
@endsection

@section('content')
    
    <form action="/leader/{{ $leader->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Leader</label>
            <input type="text" value="{{ $leader->name }}" class="form-control" name="name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Email</label>
            <input type="text" value="{{ $leader->email }}" class="form-control" name="email">
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>No Hp</label>
            <input type="text" value="{{ $leader->phone }}" class="form-control" name="phone">
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection