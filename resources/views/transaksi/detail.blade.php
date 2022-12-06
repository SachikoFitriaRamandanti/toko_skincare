@extends('layouts.main')

@section('container')
<div style="text-align:right" class="mb-3">
  <a type="button" href="/pesan/tambah" class="btn btn-primary" >Tambah Data</a>
</div>
<div>
  <h2>Data Transaksi</h2>
  <table class="table table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah Pesanan</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($datas as $data)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$data->nama_barang}}</td>
        <td>{{$data->jml_barang}}</td>
        <td>{{$data->total_bayar}}</td>
        <td>
        <a type="button" href="/pesan/edit/{{$data->id_trans}}" class="btn btn-warning" >Ubah Data</a>
            <!-- <button type="button" class="btn btn-warning">Ubah Data</button> -->
            <form action="/pesan/hapus-sementara/{{$data->id_trans}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-primary border-0" onclick="return confirm('Yakin mau hapus sementara?')">Hapus Sementara</button>
            </form>
            <form action="/pesan/hapus-permanen/{{$data->id_trans}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Yakin mau hapus permanen?')">Hapus Permanen</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
  </table>
</div>
@stop