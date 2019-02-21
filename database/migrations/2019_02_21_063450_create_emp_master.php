<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_emp_master', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seat_no')->unsigned()->index('emp_master_seat_no_foreign');
            $table->integer('company_id')->unsigned()->index('emp_master_company_id_foreign');
            $table->integer('branch_id')->unsigned()->index('emp_master_branch_id_foreign');
            $table->integer('floor_id')->unsigned()->index('emp_master_floor_id_foreign');
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
        Schema::dropIfExists('create_emp_master');
    }
}
