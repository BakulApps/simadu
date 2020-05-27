<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateEntityStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_entity__students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name');
            $table->string('student_nisn')->unique();
            $table->string('student_nism');
            $table->string('student_class');
            $table->string('student_place_birth')->nullable();
            $table->date('student_birthday')->nullable();
            $table->string('student_gender')->nullable();
            $table->string('student_address')->nullable();
            $table->string('student_parent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduate_entity__students');
    }
}
