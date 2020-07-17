<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_responsibles')->insert([
            // Operasional Proyek
                // Rizal
                [
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Teknik',
                    'priority' => 1
                ],
                // Kris
                [
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Hazri
                [
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
        ]);
    }
}
