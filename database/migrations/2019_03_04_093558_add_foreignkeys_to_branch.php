<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
             //$table->foreign('company_id')->references('company_name')->on('company')->onUpdate('RESTRICT')->onDelete('CASCADE');
             $table->foreign('company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('CASCADE');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch', function (Blueprint $table) {
             $table->dropForeign('branch_company_id_foreign');
        });
    }
}
