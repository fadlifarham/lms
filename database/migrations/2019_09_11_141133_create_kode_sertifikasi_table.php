<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKodeSertifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kode_sertifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->unsigned();
            $table->string('kode');
            $table->boolean('status');
            $table->date('training_date');
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign(['module_id']);
        // $table->dropColumn('module_id');
        
        Schema::dropIfExists('kode_sertifikasi');
    }
}
