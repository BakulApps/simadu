<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateEntityValueSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_entity__value_semesters', function (Blueprint $table) {
            $table->id('value_id');
            $table->integer('value_point_pg');
            $table->integer('value_point_kt');
            $table->integer('student_id');
            $table->integer('subject_id');
            $table->integer('semester_id');
            $table->integer('year_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduate_entity__value_semesters');
    }
}
