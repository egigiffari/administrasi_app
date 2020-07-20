<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'Direktur',
                'division_id' => 1
            ],
            [
                'name' => 'Komisaris',
                'division_id' => 1
            ],
            [
                'name' => 'Financial Audit',
                'division_id' => 1
            ],
            [
                'name' => 'Manager Pemasaran',
                'division_id' => 2
            ],
            [
                'name' => 'Manager Teknik',
                'division_id' => 3
            ],
            [
                'name' => 'Manager Keuangan',
                'division_id' => 4
            ],
            [
                'name' => 'Senior Manager',
                'division_id' => 1
            ],
            [
                'name' => 'Junior Manager',
                'division_id' => 1
            ],
            [
                'name' => 'Admin Umum',
                'division_id' => 1
            ],
            [
                'name' => 'Admin Pemasaran',
                'division_id' => 2
            ],
            [
                'name' => 'Admin Teknik',
                'division_id' => 3
            ],
            [
                'name' => 'Admin Keuangan',
                'division_id' => 3
            ],
            [
                'name' => 'Business Relation',
                'division_id' => 2
            ],
            [
                'name' => 'Supervisi',
                'division_id' => 3
            ],
            [
                'name' => 'Civil Engineering',
                'division_id' => 3
            ],
            [
                'name' => 'Programmer',
                'division_id' => 3
            ],
            [
                'name' => 'Cashier',
                'division_id' => 4
            ],
            [
                'name' => 'Purchasing',
                'division_id' => 4
            ],
            [
                'name' => 'Accounting',
                'division_id' => 4
            ],
        ]);
    }
}
