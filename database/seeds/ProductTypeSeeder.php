<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            [
                'name' => 'Mechanical',
                'slug' => Str::slug('mechanical')
            ],
            [
                'name' => 'Electrical',
                'slug' => Str::slug('electrical')
            ],
            [
                'name' => 'IT',
                'slug' => Str::slug('it')
            ],
            [
                'name' => 'Sipil',
                'slug' => Str::slug('sipil')
            ],
        ]);
    }
}
