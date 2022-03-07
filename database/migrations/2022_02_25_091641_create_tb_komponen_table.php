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
            $t->text('kebutuhan_kegiatan');
            $t->text('rincian_komponen');
            $t->string('akun');
            $t->text('jenis_belanja');
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
