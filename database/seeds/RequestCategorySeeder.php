<?php           

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_categories')->insert([
            [
                'name' => 'Pengajuan Pembelian Material Proyek',
                'code' => '/TC/PB/',
                'type' => 1,
                'division_id' => 3,
                'syarat' => ''  
            ],
            [
                'name' => 'Pengajuan Pembelian Peralatan/Perlengkapan Proyek',
                'code' => '/TC/PPP/',
                'type' => 1,
                'division_id' => 3,
                'syarat' => ''
            ],
            [
                'name' => 'Pengajuan RAB',
                'code' => '/TC/PPP/',
                'type' => 2,
                'division_id' => 3,
                'syarat' => ''
            ],
            [
                'name' => 'Pengajuan Pajak',
                'code' => '/TC/PPP/',
                'type' => 2,
                'division_id' => 3,
                'syarat' => ''
            ],
            [
                'name' => 'Pengajuan Operasional Kantor',
                'code' => '/TC/PPP/',
                'type' => 2,
                'division_id' => 1,
                'syarat' => ''
            ],
            [
                'name' => 'Pengajuan Pembelian Perlengkapan Kantor',
                'code' => '/TC/PPP/',
                'type' => 1,
                'division_id' => 1,
                'syarat' => ''
            ],
        ]);
    }
}
