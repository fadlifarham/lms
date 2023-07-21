<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modul_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('ticket_type_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('progress_in_module');
            $table->boolean('progress_in_section');
            $table->string('certificate')->nullable();
            $table->integer('sertifikasi_chance');
            $table->integer('hot_chance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
