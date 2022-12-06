@extends('layouts.main')

@section('container')
<div>
<form action="/skincare/update/{{$data->id_barang}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{$data->nama_barang}}" name="nama_barang">
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" value="{{$data->harga}}" name="harga">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
@stop
