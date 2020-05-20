<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__notifies', function (Blueprint $table) {
            $table->string('notify_id');
            $table->string('notify_number');
            $table->string('notify_status');
            $table->string('notify_value');
            $table->string('notify_value_total');
            $table->string('notify_view')->nullable();
            $table->string('notify_print')->nullable();
            $table->string('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__notifies');
    }
}
