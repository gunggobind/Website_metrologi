<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengujianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengujian', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengujian')->nullable();
            $table->string('alat_ukur_yang_diuji')->nullable();
            $table->string('pemilik')->nullable();
            $table->string('alamat_pemilik')->nullable();
            $table->date('tanggal_pengujian')->nullable();
            $table->string('metoda_pengujian')->nullable();
            $table->string('standar_pengujian')->nullable();
            $table->string('hasil_pengujian')->nullable();
            $table->date('berlaku_sampai_dengan')->nullable();
            $table->string('telepon')->nullable();
            $table->integer('harga')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengujian');
    }
}
