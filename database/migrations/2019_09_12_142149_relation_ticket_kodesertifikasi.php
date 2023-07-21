<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationTicketKodesertifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('kode_sertifikasi_id')->unsigned()->nullable()->after('ticket_type_id');

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
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['kode_sertifikasi_id']);
            $table->dropColumn('kode_sertifikasi_id');
        });
    }
}
