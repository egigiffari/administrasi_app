<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(RequestCategorySeeder::class);
        $this->call(RequestTypeSeeder::class);
        $this->call(RequestResponsibleSeeder::class);
        $this->call(OfferResponsibleSeeder::class);
        $this->call(ReportSettingSeeder::class);
        $this->call(PositionUserSeeder::class);
    }
}
