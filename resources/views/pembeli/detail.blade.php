@extends('layouts.main')

@section('container')
<div style="text-align:right" class="mb-3">
  <a type="button" href="/pembeli/tambah" class="btn btn-primary" >Tambah Data</a>
</div>
<table class="table table-primary table-striped">
  <h2>Data Pembeli</h2>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pembeli</th>
      <th scope="col">Alamat</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($datas as $data)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$data->nama_pembeli}}</td>
        <td>{{$data->alamat}}</td>
        <td>
            <a type="button" href="/pembeli/edit/{{$data->id_pembeli}}" class="btn btn-warning" >Ubah Data</a>
            <form action="/pembeli/hapus-sementara/{{$data->id_pembeli}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-primary border-0" onclick="return confirm('Yakin mau hapus sementara?')">Hapus Sementara</button>
            </form>
            <form action="/pembeli/hapus/{{$data->id_pembeli}}" method="post" class="d-inline">
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