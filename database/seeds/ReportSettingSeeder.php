<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_settings')->insert([
            'syarat' => 'Ketentuan dan Syarat : ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
