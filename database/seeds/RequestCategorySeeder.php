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
                'division_id' => 2,
                'syarat' => ''  
            ],
            [
                'name' => 'Pengajuan Pembelian Peralatan/Perlengkapan Proyek',
                'code' => '/TC/PPP/',
                'type' => 1,
                'division_id' => 2,
                'syarat' => ''
            ],
        ]);
    }
}
