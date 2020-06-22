<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('suppliers')->insert([
            [
                'code' => 'SP_001',
                'name' => Str::random(13),
                'email' => Str::random(10) . '@gmail.com',
                'address' => Str::random(120),
                'phone' => rand(0,12),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'SP_002',
                'name' => Str::random(13),
                'email' => Str::random(10) . '@gmail.com',
                'address' => Str::random(120),
                'phone' => rand(0,12),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'SP_003',
                'name' => Str::random(13),
                'email' => Str::random(10) . '@gmail.com',
                'address' => Str::random(120),
                'phone' => rand(0,12),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
    }
}
