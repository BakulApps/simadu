<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityMasterSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__master_subjects', function (Blueprint $table) {
            $table->id('subject_id');
            $table->integer('subject_number');
            $table->string('subject_code')->unique();
            $table->string('subject_name');
            $table->text('subject_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__master_subjects');
    }
}
