<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position_user')->insert([
            // Administrator
            [
                'user_id'       => 1,
                'position_id'   => 1,
            ],
            [
                'user_id'       => 1,
                'position_id'   => 16,
            ],
            // Admin
            [
                'user_id'       => 2,
                'position_id'   => 1,
            ],
            // Guest
            [
                'user_id'       => 3,
                'position_id'   => 13,
            ],
            // Fahrul Rizal
            [
                'user_id'       => 4,
                'position_id'   => 2,
            ],
            [
                'user_id'       => 4,
                'position_id'   => 3,
            ],
            [
                'user_id'       => 4,
                'position_id'   => 5,
            ],
            [
                'user_id'       => 4,
                'position_id'   => 13,
            ],
            // Hazri
            [
                'user_id'       => 5,
                'position_id'   => 1,
            ],
            [
                'user_id'       => 5,
                'position_id'   => 4,
            ],
            [
                'user_id'       => 5,
                'position_id'   => 13,
            ],
            // Kris
            [
                'user_id'       => 6,
                'position_id'   => 6,
            ],
            [
                'user_id'       => 6,
                'position_id'   => 13,
            ],
            // Natanael
            [
                'user_id'       => 7,
                'position_id'   => 9,
            ],
            [
                'user_id'       => 7,
                'position_id'   => 13,
            ],
            // Dodo
            [
                'user_id'       => 8,
                'position_id'   => 13,
            ],
            // Ibnu
            [
                'user_id'       => 9,
                'position_id'   => 14,
            ],
            // Layla
            [
                'user_id'       => 10,
                'position_id'   => 17,
            ],
            // Putera
            [
                'user_id'       => 11,
                'position_id'   => 14,
            ],
            // Sabda
            [
                'user_id'       => 12,
                'position_id'   => 14,
            ],
            // Dimas
            [
                'user_id'       => 13,
                'position_id'   => 14,
            ],
        ]);
    }
}
