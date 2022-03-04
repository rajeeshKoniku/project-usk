<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kk', function (Blueprint $t) {
            $t->id();
            $t->foreignId('ik_id');
            $t->text('indikator_kinerja');
            $t->string('pk_menteri');
            $t->string('tw_1');
            $t->string('tw_2');
            $t->string('tw_3');
            $t->string('tw_4');
            $t->string('bobot');
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
        Schema::dropIfExists('tb_kk');
    }
}
