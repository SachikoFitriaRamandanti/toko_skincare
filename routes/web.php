<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TransaksiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome', [
//         "title" => "Home"
//     ]);
// });


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
            return view('welcome', [
                "title" => "Home"
            ]);
        })->name('home');;
});
Route::post('/search', [BarangController::class, 'search'])->name("transaksi.search");
Route::get('/skincare', [BarangController::class, 'index']);
Route::get('/skincare/tambah', [BarangController::class, 'add']);
Route::post('/skincare/tambah', [BarangController::class, 'store']);
Route::get('/skincare/edit/{data:id_barang}', [BarangController::class, 'edit']);
Route::post('/skincare/update/{data:id_barang}', [BarangController::class, 'update']);
Route::delete('/skincare/hapus/{data:id_barang}', [BarangController::class, 'destroy']);
Route::get('/pembeli', [PembeliController::class, 'index']);
Route::get('/pembeli/tambah', [PembeliController::class, 'add']);
Route::post('/pembeli/tambah', [PembeliController::class, 'store']);
Route::get('/pembeli/edit/{data:id_pembeli}', [PembeliController::class, 'edit']);
Route::post('/pembeli/update/{data:id_pembeli}', [PembeliController::class, 'update']);
Route::delete('/pembeli/hapus/{data:id_pembeli}', [PembeliController::class, 'destroy']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'add']);
Route::post('/pegawai/tambah', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{data:id_pegkasir}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update/{data:id_pegkasir}', [PegawaiController::class, 'update']);
Route::delete('/pegawai/hapus/{data:id_pegkasir}', [PegawaiController::class, 'destroy']);

Route::get('/pesan', [TransaksiController::class, 'index']);
Route::get('/pesan/tambah', [TransaksiController::class, 'add']);
Route::post('/pesan/tambah', [TransaksiController::class, 'store']);
Route::get('/pesan/edit/{data:id_trans}', [TransaksiController::class, 'edit']);
Route::delete('/pesan/hapus-sementara/{data:id_trans}', [TransaksiController::class, 'softDelete']);
Route::delete('/pesan/hapus-permanen/{data:id_trans}', [TransaksiController::class, 'hardDelete']);


