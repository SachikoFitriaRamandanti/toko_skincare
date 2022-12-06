@extends('layouts.main')

@section('container')
<div>
<form action="/pesan/update/{{$data->id_trans}}" method="get">
  @csrf
  <div class="mb-3">
    <label for="total_bayar" class="form-label">Nama Pembeli</label>
    <select class="form-select" aria-label="Default select example" name="id_pembeli">
      <option selected value="">Open this select menu</option>
      @foreach($data as $beli)
      <option value="{{$beli->id_pembeli}}">{{$beli->nama_pembeli}}</option>
      @endforeach
    </select>
    </div>
  <div class="mb-3">
    <label for="total_bayar" class="form-label">Nama Barang</label>
    <select class="form-select" aria-label="Default select example" name="id_barang">
      <option selected>Open this select menu</option>
      @foreach($barang as $brg)
      <option value="{{$brg->id_barang}}">{{$brg->nama_barang}} / Rp{{$brg->harga}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="total_bayar" class="form-label">Nama Pegawai Kasir</label>
    <select class="form-select" aria-label="Default select example" name="id_pegkasir">
    <option selected>Open this select menu</option>
      @foreach($pegkasir as $kasir)
      <option value="{{$kasir->id_pegkasir}}">{{$kasir->nama_pegkasir}}</option>
      @endforeach
    </select>
    </div>
  <!-- <div class="mb-3">
    <label for="total_bayar" class="form-label">Total Bayar</label>
    <input type="text" class="form-control" name="total_bayar">
  </div> -->
  
  <div class="mb-3">
    <label for="jml_barang" class="form-label">Jumlah Barang</label>
    <input type="number" class="form-control" name="jml_barang">
  </div>
  <div class="mb-3">
    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
    <input type="date" class="form-control" name="tgl_transaksi">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
@stop
