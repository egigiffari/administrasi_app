<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'code' => Str::upper(Str::substr('Hikvision', 0, 3)),
                'name' => 'Hikvision',
            ],
            [
                'code' => Str::upper(Str::substr('Cambium', 0, 3)),
                'name' => 'Cambium',
            ],
            [
                'code' => Str::upper(Str::substr('Axis', 0, 3)),
                'name' => 'Axis',
            ]
        ]);
    }
}
