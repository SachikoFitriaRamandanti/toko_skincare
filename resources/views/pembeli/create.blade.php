@extends('layouts.main')

@section('container')
<div>
<form action="/pembeli/tambah" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
    <input type="text" class="form-control" name="nama_pembeli" >
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
@stop
