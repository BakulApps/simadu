<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLadderSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entity__master_ladders')->insert([
            [
                'ladder_code' => 'MI',
                'ladder_name' => 'Madrasah Ibtidaiyah'
            ],
            [
                'ladder_code' => 'MTs',
                'ladder_name' => 'Madrasah Tsanawiyah'
            ],
            [
                'ladder_code' => 'MA',
                'ladder_name' => 'Madrasah Aliyah'
            ],
        ]);
    }
}
