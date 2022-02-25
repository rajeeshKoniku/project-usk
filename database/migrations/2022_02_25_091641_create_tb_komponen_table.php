<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKomponenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_komponen', function (Blueprint $t) {
            $t->id();
            $t->text('Kebutuhan_Kegiatan');
            $t->text('Rincian_Komponen');
            $t->string('Akun');
            $t->text('Jenis_Belanja');
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
        Schema::dropIfExists('tb_komponen');
    }
}
