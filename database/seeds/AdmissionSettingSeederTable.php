<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmissionSettingSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admission_entity__settings')->insert([
            'setting_app_name' => 'Sistem Informasi Madrasah Terpadu',
            'setting_app_subname' => 'SIMADU',
            'setting_app_notify' => \Carbon\Carbon::now(),
            'setting_school_fundation' => 'Yayasan Sultan Hadlirin',
            'setting_school_ladder' => 2,
            'setting_school_name' => 'Sultan Hadlirin Mantingan ',
            'setting_school_slug' => 'Shahabat Menjadi Generasi Hebat',
            'setting_school_nsm' => '121233200027',
            'setting_school_npsn' => '20364289',
            'setting_school_phone' => '082229366506',
            'setting_school_email' => 'info@mts-sh.sch.id',
            'setting_school_website' => 'http://mts-sh.sch.id',
            'setting_school_address' => 'Jl. Sultan Hadlirin KM 01 Mantingan Tahunan Jepara',
            'setting_school_zipos' => '59432',
            'setting_school_headmaster_name' => 'Drs. H. Sukanto',
            'setting_school_headmaster_nip' => '-',
        ]);
    }
}
