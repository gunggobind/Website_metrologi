<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengujianPengujiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengujian_penguji', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('pengujian_id')->unsigned();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
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
        Schema::dropIfExists('tb_pengujian_penguji');
    }
}
