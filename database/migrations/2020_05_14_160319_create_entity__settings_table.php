<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__settings', function (Blueprint $table) {
            $table->id('setting_id');
            $table->string('setting_app_name')->nullable();
            $table->string('setting_app_subname')->nullable();
            $table->string('setting_school_fundation')->nullable();
            $table->string('setting_school_ladder')->nullable();
            $table->string('setting_school_name')->nullable();
            $table->string('setting_school_slug')->nullable();
            $table->string('setting_school_nsm')->nullable();
            $table->string('setting_school_npsn')->nullable();
            $table->string('setting_school_phone')->nullable();
            $table->string('setting_school_email')->nullable();
            $table->string('setting_school_website')->nullable();
            $table->string('setting_school_address')->nullable();
            $table->string('setting_school_zipos')->nullable();
            $table->string('setting_school_headmaster_name')->nullable();
            $table->string('setting_school_headmaster_nip')->nullable();
            $table->integer('setting_value_semester_point')->nullable();
            $table->integer('setting_value_exam_point')->nullable();
            $table->text('setting_notify_letter')->nullable();
            $table->text('setting_notify_header')->nullable();
            $table->text('setting_notify_footer')->nullable();
            $table->dateTime('setting_notify_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__settings');
    }
}
