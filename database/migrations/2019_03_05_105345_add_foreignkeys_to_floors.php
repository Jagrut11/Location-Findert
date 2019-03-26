<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToFloors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('floors', function (Blueprint $table) {
            //
            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('RESTRICT')->onDelete('CASCADE');
<<<<<<< HEAD
                         
=======
                         $table->foreign('company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('CASCADE');
>>>>>>> 2a276e59120dada48f8f80afa737a5a4afe06363

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('floors', function (Blueprint $table) {
            //
            // $table->dropForeign('floors_company_id_foreign');
            // $table->dropForeign('floors_branch_id_foreign');
        });
    }
}
