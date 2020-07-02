<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_responsibles')->insert([
            [
                'category_id' => 1,
                'user_id' => 2,
                'subject' => 'Menyetujui',
                'as' => 'Direktur',
                'priority' => 99
            ],
            [
                'category_id' => 2,
                'user_id' => 2,
                'subject' => 'Menyetujui',
                'as' => 'Direktur',
                'priority' => 99
            ],
        ]);
    }
}
