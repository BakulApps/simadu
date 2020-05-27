<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateEntityNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_entity__notifies', function (Blueprint $table) {
            $table->string('notify_id');
            $table->string('notify_number');
            $table->string('notify_status');
            $table->string('notify_value_pg');
            $table->string('notify_value_pg_total');
            $table->string('notify_value_kt');
            $table->string('notify_value_kt_total');
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
        Schema::dropIfExists('graduate_entity__notifies');
    }
}
