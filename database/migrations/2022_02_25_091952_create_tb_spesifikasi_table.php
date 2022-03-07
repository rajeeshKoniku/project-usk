<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSpesifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_spesifikasi', function (Blueprint $t) {
            $t->id();
            $t->string('akun');
            $t->text('kebutuhan_kegiatan');
            $t->text('jenis_kegiatan');
            $t->text('merk');
            $t->text('type');
            $t->text('catalog');
            $t->text('kuantitas');
            $t->text('durasi');
            $t->text('kegiatan');
            $t->text('harga_Satuan');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_spesifikasi');
    }
}
