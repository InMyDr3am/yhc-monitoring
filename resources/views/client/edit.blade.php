@extends('layout.master')
@section('judul')
    Halaman Edit Client
@endsection

@section('content')
    
    <form action="/client/{{ $client->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Client</label>
            <input type="text" value="{{ $client->name }}" class="form-control" name="name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Alamat Client</label>
            <input type="text" value="{{ $client->address }}" class="form-control" name="address">
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>No Hp</label>
            <input type="text" value="{{ $client->phone }}" class="form-control" name="phone">
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection