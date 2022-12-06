<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $datas = DB::select('select * from pembelis WHERE deleted_at is null');
        
        return view('pembeli.detail', [            
            "datas" => $datas,
            "title" => "Pembeli"
        ]);
}
public function add(){
    return view('pembeli.create', [
        "title" => "Pembeli"
    ]);
}
public function store(Request $request){

    // dd($request->all());
    DB::insert('insert into pembelis (nama_pembeli, alamat) values (?, ?)', [
        $request->nama_pembeli,
        $request->alamat

    ]);
    // dd('masuk mba');
    return redirect('/pembeli');
}
public function edit($id){
    $data = DB::select('select * from pembelis where id_pembeli = ?',[$id])[0];
    return view('pembeli.edit', [
        "data" => $data,
        "title" => "Pembeli"
    ]);
}
public function update(Request $request, $id_pembeli){

    // dd($request->all());
    DB::update('update pembelis set nama_pembeli = ?, alamat = ? where id_pembeli = ?',[
        $request->nama_pembeli,
        $request->alamat,
        $id_pembeli

    ]);

    return redirect('/pembeli');
}

public function destroy($id_pembeli)
{
    DB::delete('delete from pembelis where id_pembeli = ?',[
        $id_pembeli
    ]);
    return redirect('/pembeli');

}
public function softDelete(Request $request, $id_pembeli){

    DB::update('update pembelis set deleted_at = ? where id_pembeli = ?',[
        now(),
        $id_pembeli
    ]);

    return redirect('/pembeli');
}

}


