<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraduateUserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('graduate_entity__users')->insert([
            'user_name' => 'administrator',
            'user_pass' => bcrypt('admin12345'),
            'user_fullname' => 'Administrator',
            'user_role' => 1,
        ]);
    }
}
