<?php

use Illuminate\Database\Seeder;

class AdmissionUserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admission_entity__users')->insert([
            'user_name' => 'admin',
            'user_pass' => bcrypt('admin12345'),
            'user_fullname' => 'Administrator',
            'user_role' => 1,
        ]);
    }
}
