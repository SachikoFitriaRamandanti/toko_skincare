@extends('layouts.main')

@section('container')
<div>
<form action="/pembeli/update/{{$data->id_pembeli}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
    <input type="text" class="form-control" value="{{$data->nama_pembeli}}" name="nama_pembeli">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
@stop
