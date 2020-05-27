<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterLadderSeederTable::class);
        $this->call(GraduateSettingSeederTable::class);
        $this->call(GraduateUserSeederTable::class);
        $this->call(AdmissionSettingSeederTable::class);
        $this->call(AdmissionUserSeederTable::class);
    }
}
