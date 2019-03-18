<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('sender_id')->unsigned()->index('appointment_sender_id_foreign');
            $table->Integer('receiver_id')->unsigned()->index('appointment_receiver_id_foreign');
            $table->datetime('appointment_date'); // remove this // datetime default null
            $table->Integer('appointment_status'); // tiny int
            $table->boolean('status'); // should be small / tiny int
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
        Schema::dropIfExists('appointment');
    }
}
