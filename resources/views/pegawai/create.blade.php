@extends('layouts.main')

@section('container')
<div>
<form action="/pegawai/tambah" method="post">
  @csrf
  <div class="mb-3">
    <label for="nama_pegkasir" class="form-label">Nama Pegawai</label>
    <input type="text" class="form-control" name="nama_pegkasir" >
  </div>
  <div class="mb-3">
    <label for="no_telepon" class="form-label">No Telepon</label>
    <input type="Text" class="form-control" name="no_telepon">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
@stop
