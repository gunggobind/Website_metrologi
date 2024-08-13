<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengujianAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengujian_alat', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('pengujian_id')->unsigned();
            $table->string('jenis_uttp')->nullable();
            $table->string('nama_alat')->nullable();
            $table->string('kapasitas_skala_terkecil')->nullable();
            $table->string('merk_model')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pengujian_id')->references('id')->on('tb_pengujian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengujian_alat');
    }
}
