<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_types')->insert([
            [
                'name' => 'pembelian'
            ],
            [
                'name' => 'biaya'
            ]
        ]);
    }
}
