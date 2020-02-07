<?php

use App\Lead;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::class, 10)->create([
			'user_id' => factory(App\User::class)->create(),
			'property_id' => factory(Property::class)->create(),
			'lead_id' => factory(Lead::class)->create(),
		]);
    }
}
