<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $datas = DB::select('select * from pegawai_kasirs');
        
        return view('pegawai.detail', [
            "datas" => $datas,
            "title" => "Pegawai"
        ]);
}
public function add(){
    return view('pegawai.create', [
        "title" => "Pegawai"
    ]);
}
public function store(Request $request){

    // dd($request->all());
    DB::insert('insert into pegawai_kasirs (nama_pegkasir, no_telepon) values(:nama_pegkasir, :no_telepon)', [
        'nama_pegkasir' => $request->nama_pegkasir,
        'no_telepon' => $request->no_telepon

    ]);
    // dd('masuk mba');
    return redirect('/pegawai');
    }

    public function edit($id){
        $data = DB::select('select * from pegawai_kasirs where id_pegkasir = ?',[$id])[0];
        return view('pegawai.edit', [
            "data" => $data,
            "title" => "Pegawai"
        ]);
    }
    public function update(Request $request, $id_pegkasir){

        // dd($request->all());
        DB::update('update pegawai_kasirs set nama_pegkasir = ?, no_telepon = ? where id_pegkasir = ?',[
            $request->nama_pegkasir,
            $request->no_telepon,
            $id_pegkasir
    
        ]);
    
        return redirect('/pegawai');
    }
    
    public function destroy($id_pegkasir)
    {
        DB::delete('delete from pegawai_kasirs where id_pegkasir = ?',[
            $id_pegkasir
        ]);
        return redirect('/pegawai');
    
    }
}
