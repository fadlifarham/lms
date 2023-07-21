<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationCompanyUserToTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('company_user_id')->unsigned()->nullable();

            $table->foreign('company_user_id')->references('id')->on('companyuser');
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
            $table->dropForeign(['company_user_id']);
            $table->dropColumn('company_user_id');
        });

        Schema::dropIfExists('tickets');
    }
}
