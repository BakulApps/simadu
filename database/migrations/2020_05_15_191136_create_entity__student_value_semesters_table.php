<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityStudentValueSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__student_value_semesters', function (Blueprint $table) {
            $table->id('value_id');
            $table->integer('value_point');
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
        Schema::dropIfExists('entity__student_value_semesters');
    }
}
