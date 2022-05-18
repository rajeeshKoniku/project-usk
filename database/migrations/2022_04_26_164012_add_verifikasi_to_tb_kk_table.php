<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifikasiToTbKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_kk', function (Blueprint $table) {
            $table->integer('verifikasi_spi')->nullable();
            $table->integer('verifikasi_sarpras')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_kk', function (Blueprint $table) {
            $table->dropColumn('verifikasi_spi');
            $table->dropColumn('verifikasi_sarpras');
        });
    }
}
