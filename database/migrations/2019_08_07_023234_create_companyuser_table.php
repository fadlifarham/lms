<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyuser', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status_company_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('status_company_id')->references('id')->on('status_company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companyuser', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            // $table->dropColumn('user_id');

            $table->dropForeign(['company_id']);
            // $table->dropColumn('company_id');

            $table->dropForeign(['status_company_id']);
        });

        Schema::dropIfExists('companyuser');
    }
}
