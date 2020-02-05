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
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
           // LeadsTableSeeder::class,
            //PropertiesTableSeeder::class,
            //SalesTableSeeder::class,
            //InstallmentSalesTableSeeder::class,
        ]);
    }
}
