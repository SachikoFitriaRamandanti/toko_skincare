@extends('layouts.main')

@section('container')
<div>
<form action="/pegawai/update/{{$data->id_pegkasir}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_pegkasir" class="form-label">Nama Pegawai Kasir</label>
    <input type="text" class="form-control" value="{{$data->nama_pegkasir}}" name="nama_pegkasir">
  </div>
  <div class="mb-3">
    <label for="no_telepon" class="form-label">No Telepon</label>
    <input type="number" class="form-control" value="{{$data->no_telepon}}" name="no_telepon">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
@stop
