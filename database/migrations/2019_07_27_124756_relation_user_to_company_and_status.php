<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationUserToCompanyAndStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->integer('company_id')->after('remember_token')->unsigned();
            // $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('status_id')->after('remember_token')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropForeign(['company_id']);
            // $table->dropColumn('company_id');

            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
}
