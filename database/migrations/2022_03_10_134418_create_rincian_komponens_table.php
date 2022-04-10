<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianKomponensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rincian_komponen', function (Blueprint $t) {
            $t->id();
            $t->string('Keg');
            $t->integer('KRO');
            $t->string('RO');
            $t->integer('KP');
            $t->string('SK');
            $t->string('Sub_Komponen');
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
        Schema::dropIfExists('rincian_komponens');
    }
}
