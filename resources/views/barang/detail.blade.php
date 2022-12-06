@extends('layouts.main')

@section('container')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

<h2>Data Barang Skincare</h2>
<div style="text-align:right" class="mb-3">
<form action="{{ route('transaksi.search') }}" class="d-flex" method="post">
    @csrf
          <input type="text" placeholder="Search Skincare" class="form-control me-2" id="name" name="name">
          <input type="submit" class="btn btn-primary" value="Cari" />
    </div>
    <div class="text-center">
    </div>
  </form>
  <div class="container">
    <a type="button" href="/skincare/tambah" class="btn btn-primary" >Tambah Data</a>
    
  </div>
  <br />
    <table class="table table-primary table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Skincare</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($datas as $data)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$data->nama_barang}}</td>
            <td>{{$data->harga}}</td>
            <td>
                <a type="button" href="/skincare/edit/{{$data->id_barang}}" class="btn btn-warning" >
                
                <i class="bi bi-pencil-square"></i>
                </a>
                <form action="/skincare/hapus/{{$data->id_barang}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Yakin mau hapus data')">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </form>

                <!-- <a type="button" class="btn btn-danger">Hapus Data</a> -->
            </td>
          </tr>
        @endforeach
        
      
      </tbody>
    </table>
</div>
@stop