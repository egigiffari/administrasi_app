<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'code' => 'HIK_CCT_1',
                'merk' => 1,
                'name' => 'CCTV Hikvision',
                'type' => 'Hikvision DS-2CE56C0T-IRP White 3.8 mm',
                'spec' => 'HD720p',
                'unit' => 'unit',
                'last_price' => 1200000,
                'image' => 'uploads/products/default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'CAM_ANT_1',
                'merk' => 2,
                'name' => 'ANTENA',
                'type' => 'Cambium ePMP Force 300-25 Subcriber Module',
                'spec' => 'ePMP 300-25 802.11AC Wave 2 Solution',
                'unit' => 'unit',
                'last_price' => 2750000,
                'image' => 'uploads/products/default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'AXI_CCT_1',
                'merk' => 3,
                'name' => 'CCTV Axis M1125-E IP Camera',
                'type' => 'Hikvision DS-2CE56C0T-IRP White 3.8 mm',
                'spec' => 'HD720p',
                'unit' => 'unit',
                'last_price' => 8699400,
                'image' => 'uploads/products/default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
