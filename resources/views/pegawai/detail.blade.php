@extends('layouts.main')

@section('container')
<div style="text-align:right" class="mb-3">
  <a type="button" href="/pegawai/tambah" class="btn btn-primary" >Tambah Data</a>
</div>
<table class="table table-primary table-striped">
  <h2>Data Pegawai Kasir</h2>

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pegawai</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($datas as $data)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$data->nama_pegkasir}}</td>
        <td>{{$data->no_telepon}}</td>
        <td>
            <a type="button" href="/pegawai/edit/{{$data->id_pegkasir}}" class="btn btn-warning" >Ubah Data</a>
            <form action="/pegawai/hapus/{{$data->id_pegkasir}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Yakin mau hapus data')">Hapus Data</button>
            </form>

            <!-- <a type="button" class="btn btn-danger">Hapus Data</a> -->
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@stop