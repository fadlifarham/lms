<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationTicketToModulAndUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('modul_id')->references('id')->on('modules');

            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
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
            $table->dropForeign(['modul_id']);
            $table->dropColumn('modul_id');

            $table->dropForeign(['ticket_type_id']);
            $table->dropColumn('ticket_type_id');
        });
    }
}
