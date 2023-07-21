<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSertifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('kode_sertifikasi_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kode_sertifikasi_id')->references('id')->on('kode_sertifikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign(['user_id']);
        // $table->dropColumn('user_id');

        // $table->dropForeign(['kode_sertifikasi_id']);
        // $table->dropColumn('kode_sertifikasi_id');

        Schema::dropIfExists('sertifikasi');
    }
}
