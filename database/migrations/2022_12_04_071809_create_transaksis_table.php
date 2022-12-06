<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PegawaiKasir;
use App\Models\Barang;
use App\Models\Pembeli;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_trans');
            $table->integer('jml_barang');
            $table->integer('total_bayar');
            $table->date('tgl_trans');
            $table->foreignIdFor(PegawaiKasir::class,'id_pegkasir');        
            $table->foreignIdFor(Barang::class,'id_barang');        
            $table->foreignIdFor(Pembeli::class,'id_pembeli');        
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
