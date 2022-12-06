@extends('layouts.main')

@section('container')
<div>
<form action="/skincare/tambah" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" name="harga">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
@stop
