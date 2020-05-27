<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionEntityStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_entity__students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name');
            $table->string('student_nisn')->unique();
            $table->string('student_nik')->nullable();
            $table->string('student_place_birth')->nullable();
            $table->date('student_birthday')->nullable();
            $table->string('student_gender')->nullable();
            $table->string('student_religion')->nullable();
            $table->string('student_address')->nullable();
            $table->string('student_place_sibling')->nullable();
            $table->string('student_sibling')->nullable();
            $table->string('student_achievement')->nullable();
            $table->string('student_father_name')->nullable();
            $table->string('student_father_nik')->nullable();
            $table->string('student_father_study')->nullable();
            $table->string('student_father_religion')->nullable();
            $table->string('student_father_job')->nullable();
            $table->string('student_mother_name')->nullable();
            $table->string('student_mother_nik')->nullable();
            $table->string('student_mother_study')->nullable();
            $table->string('student_mother_religion')->nullable();
            $table->string('student_mother_job')->nullable();
            $table->string('student_parent_value')->nullable();
            $table->string('student_no_kk')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_from_school')->nullable();
            $table->string('student_from_school_npsn')->nullable();
            $table->string('student_no_ijazah')->nullable();
            $table->string('student_no_skhun')->nullable();
            $table->string('student_value_exam')->nullable();
            $table->string('student_program')->nullable();
            $table->string('student_boarding')->nullable();
            $table->string('student_sttb_file')->nullable();
            $table->string('student_skhun_file')->nullable();
            $table->string('student_photo_file')->nullable();
            $table->string('student_akta_file')->nullable();
            $table->string('student_kk_file')->nullable();
            $table->string('student_pip_file')->nullable();
            $table->string('student_status')->nullable();
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
        Schema::dropIfExists('admission_entity__students');
    }
}
