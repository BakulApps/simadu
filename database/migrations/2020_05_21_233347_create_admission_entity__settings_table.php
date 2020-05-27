<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionEntitySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_entity__settings', function (Blueprint $table) {
            $table->id('setting_id');
            $table->string('setting_app_name')->nullable();
            $table->string('setting_app_subname')->nullable();
            $table->dateTime('setting_app_notify');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admission_entity__settings');
    }
}
