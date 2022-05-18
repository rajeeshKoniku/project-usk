<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRpk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rpk', function (Blueprint $kiyomasa) {
            $kiyomasa->id();
            $kiyomasa->string('kode_ik')->nullable();
            $kiyomasa->string('kode_program')->nullable();
            $kiyomasa->string('rincian_program')->nullable();
            $kiyomasa->string('nama_kegiatan')->nullable();
            $kiyomasa->string('TOR/KAK/ProposalProject')->nullable();
            $kiyomasa->string('Kebutuhan_Kegiatan')->nullable();
            $kiyomasa->string('Rencana_Jadwal_Pelaksanaan')->nullable();
            $kiyomasa->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_rpk');
    }
}
