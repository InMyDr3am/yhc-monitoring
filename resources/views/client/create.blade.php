@extends('layout.master')
@section('judul')
    Halaman Tambah Client
@endsection

@section('content')

<form action="/client" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Client</label>
        <input type="text" class="form-control" name="name">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Alamat Client</label>
        <input type="text" class="form-control" name="address">
    </div>
    @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>No HP</label>
        <input type="text" class="form-control" name="phone">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection