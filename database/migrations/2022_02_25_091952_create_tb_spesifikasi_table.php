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
            $t->string('Akun');
            $t->text('Kebutuhan_Kegiatan');
            $t->text('Jenis_Kegiatan');
            $t->text('Merk');
            $t->text('Type');
            $t->text('Catalog');
            $t->text('Kuantitas');
            $t->text('Durasi');
            $t->text('Kegiatan');
            $t->text('Harga_Satuan');
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
