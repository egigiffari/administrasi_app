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
            // Operasional Proyek
                // Rizal
                [
                    'category_id' => 1,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Teknik',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 1,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 1,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Operasional Teknik
                // Rizal
                [
                    'category_id' => 2,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Teknik',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 2,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 2,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Pembelian Material Proyek
                // Rizal
                [
                    'category_id' => 3,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Teknik',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 3,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 3,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Perlengkapan peralatan Inventaris Proyek
                // Rizal
                [
                    'category_id' => 4,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Teknik',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 4,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 4,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // RAB Teknik
                // Kris
                [
                    'category_id' => 5,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 5,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 5,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            
            // Operasional Pemasaran
                // Hazri
                [
                    'category_id' => 6,
                    'user_id' => 5,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Pemasaran',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 6,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Rizal
                [
                    'category_id' => 6,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 3
                ],
            // Promosi Pemasaran
                // Hazri
                [
                    'category_id' => 7,
                    'user_id' => 5,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Pemasaran',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 7,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Rizal
                [
                    'category_id' => 7,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 3
                ],
            // Sebelum Proyek
                // Hazri
                [
                    'category_id' => 8,
                    'user_id' => 5,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Pemasaran',
                    'priority' => 1
                ],
                // Kris
                [
                    'category_id' => 8,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 2
                ],
                // Rizal
                [
                    'category_id' => 8,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 3
                ],
            // RAB Pemasaran
                // Kris
                [
                    'category_id' => 9,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 9,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 9,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Operasional Kantor
                // Kris
                [
                    'category_id' => 10,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 10,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 10,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Operasional Keuangan
                // Kris
                [
                    'category_id' => 11,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 11,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 11,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Pembelian Perlengkapan Kantor
                // Kris
                [
                    'category_id' => 12,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 12,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 12,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Anggaran Kantor
                // Kris
                [
                    'category_id' => 13,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 13,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 13,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Anggaran Keuangan
                // Kris
                [
                    'category_id' => 14,
                    'user_id' => 6,
                    'subject' => 'Diperiksa',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 14,
                    'user_id' => 4,
                    'subject' => 'Diperiksa',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 14,
                    'user_id' => 5,
                    'subject' => 'Disetujui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            // Pembayaran Pajak
                // Kris
                [
                    'category_id' => 15,
                    'user_id' => 6,
                    'subject' => 'Disetujui',
                    'as' => 'Manager Keuangan',
                    'priority' => 1
                ],
                // Rizal
                [
                    'category_id' => 15,
                    'user_id' => 4,
                    'subject' => 'Disetujui',
                    'as' => 'Finance Audit',
                    'priority' => 2
                ],
                // Hazri
                [
                    'category_id' => 15,
                    'user_id' => 5,
                    'subject' => 'Diketahui',
                    'as' => 'Direktur',
                    'priority' => 3
                ],
            
        ]);
    }
}
