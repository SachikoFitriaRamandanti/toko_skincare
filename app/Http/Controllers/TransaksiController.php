<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $datas = DB::select('select * from transaksis t inner join barangs b on t.id_barang = b.id_barang where deleted_at IS NULL');

        return view('transaksi.detail', [
            "title" => "Transaksi",
            "datas" => $datas
        ]);
}
public function add(){
    $pembeli = DB::select('select * from pembelis');
    $barang = DB::select('select * from barangs');
    $pegkasir = DB::select('select * from pegawai_kasirs');
    // dd($pembeli, $barang, $pegkasir);
    
    return view('transaksi.create', [
        'pembeli' => $pembeli,
        'barang' => $barang,
        'pegkasir' => $pegkasir,
        "title" => "Transaksi"
    ]);
}
public function store(Request $request){

    $harga = DB::select('select harga from barangs where id_barang = ?', [
        $request->id_barang
    ])[0];
    //   dd($request);
    $jml_barang=$request->jml_barang;
    // setype($jml_barang, "integer");
    $total_harga=$harga->harga * intval($jml_barang);
    // dd($total_harga);
    DB::insert('insert into transaksis (total_bayar, tgl_trans, jml_barang, id_barang, id_pegkasir, id_pembeli) values(:total_bayar, :tgl_trans, :jml_barang, :id_barang, :id_pegkasir, :id_pembeli)', [
        'total_bayar' =>$total_harga,
        'tgl_trans' => $request->tgl_transaksi,
        'jml_barang' => $request->jml_barang,
        'id_barang' => $request->id_barang,
        'id_pegkasir' => $request->id_pegkasir,
        'id_pembeli' => $request->id_pembeli,

    ]);
    // dd('masuk mba');
    return redirect('/pesan');
}
public function edit($id){
    $pembeli = DB::select('select * from pembelis');
    $barang = DB::select('select * from barangs');
    $pegkasir = DB::select('select * from pegawai_kasirs');
    $data = DB::select('select * from transaksis where id_trans = ?',[$id])[0];

    return view('transaksi.create', [
        'pembeli' => $pembeli,
        'barang' => $barang,
        'pegkasir' => $pegkasir,
        "title" => "Transaksi"
    ]);
}
public function update(Request $request, $id_trans){

    // dd($request->all());
    DB::update('update transaksis set total_bayar = ?, tgl_transaksi = ?, jml_barang = ?, where id_pegkasir]] = ?',[
        $request->tgl_transaksi,
        $total_harga,
        $request->jml_barang,
        $request->id_barang,
        $request->id_pegkasir,
        $request->id_pembeli

    ]);

    return redirect('/pesan');
}
public function hardDelete($id_trans)
{
    DB::delete('delete from transaksis where id_trans = ?',[
        $id_trans
    ]);
    return redirect('/pesan');

}

public function softDelete(Request $request, $id_trans){

    DB::update('update transaksis set deleted_at = ? where id_trans = ?',[
        now(),
        $id_trans
    ]);

    return redirect('/pesan');
}



}
