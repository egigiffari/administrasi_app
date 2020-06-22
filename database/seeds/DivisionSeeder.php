<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            [
                'name' => 'PT. Maha Akbar Sejahtera',
            ],
            [
                'name' => 'Pemasaran',
            ],
            [
                'name' => 'Teknik',
            ],
            [
                'name' => 'Keuangan',
            ],
        ]);
    }
}
