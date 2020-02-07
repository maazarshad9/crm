<?php

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property::class, 3)->create();
        factory(Property::class, 2)->create(['sold' => true]);
        factory(Property::class, 3)->create(['invoicing' => true, 'sold' => true]);
    }
}
