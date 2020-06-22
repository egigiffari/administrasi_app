<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('levels')->insert([
            [
                'name' => 'administrator',
                'capacity' => 90
            ],
            [
                'name' => 'manager',
                'capacity' => 30
            ],
            [
                'name' => 'common admin',
                'capacity' => 20
            ],
            [
                'name' => 'user',
                'capacity' => 10
            ],
        ]);
    }
}
