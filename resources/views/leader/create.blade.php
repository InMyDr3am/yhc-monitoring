@extends('layout.master')
@section('judul')
    Halaman Tambah Leader
@endsection

@section('content')

<form action="/leader" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Leader</label>
        <input type="text" class="form-control" name="name">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>No HP</label>
        <input type="text" class="form-control" name="phone">
    </div>
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection