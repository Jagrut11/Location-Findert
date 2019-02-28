<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToEmpMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_emp_master', function (Blueprint $table) {
            $table->foreign('seat_no')->references('number')->on('seat')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('floor_id')->references('id')->on('floor')->onUpdate('RESTRICT')->onDelete('CASCADE');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_emp_master', function (Blueprint $table) {
            //
            $table->dropForeign('create_emp_master_id_foreign');
            $table->dropForeign('create_emp_master_id_foreign');
            $table->dropForeign('create_emp_master_id_foreign');
            $table->dropForeign('create_emp_master_id_foreign');
            $table->dropForeign('create_emp_master_id_foreign');
        });
    }
}
