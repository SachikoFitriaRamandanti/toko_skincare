<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $datas = DB::select('select * from barangs');
    return view('barang.detail', [
        "datas" => $datas,
        "title" => "Produk"
    ]);
}
public function add(){
    return view('barang.create', [
        "title" => "Produk"
    ]);
}
public function store(Request $request){

    // dd($request->all());
    DB::insert('insert into barangs (nama_barang, harga) values(:nama_barang, :harga)', [
        'nama_barang' => $request->nama_barang,
        'harga' => $request->harga

    ]);
    //  dd('masuk mba');
    return redirect('/skincare');
}

public function edit($id){
    $data = DB::select('select * from barangs where id_barang = ?',[$id])[0];
    return view('barang.edit', [
        "data" => $data,
        "title" => "Produk"
    ]);
}

public function update(Request $request, $id_barang){

    // dd($request->all());
    DB::update('update Barangs set nama_barang = ?, harga = ? where id_barang = ?',[
        $request->nama_barang,
        $request->harga,
        $id_barang

    ]);

    return redirect('/skincare');
}

public function destroy($id_barang)
{
    DB::delete('delete from barangs where id_barang = ?',[
        $id_barang
    ]);
    return redirect('/skincare');

}

public function search(Request $request)
    {
        $request->validate([
            'name' => 'required',      
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        $datas = DB::table('barangs')->where('nama_barang','like','%'.$request->name.'%')->paginate(5);
        return view('barang.detail', [
            "datas" => $datas,
            "title" => "Produk"
        ]);
    }

    // public function search(Request $request) {
        
    //     if($request->has('search')){
    //     }else{
    //         $datas = DB::table('sumda')->paginate(5);
    //     }
    //     return view('sumda.index')
    //     ->with('datas', $datas);
    // }
    
}
