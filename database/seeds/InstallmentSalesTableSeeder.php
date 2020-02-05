<?php

use App\Lead;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class InstallmentSalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::class, 'installments', 20)->create([
			'user_id' => factory(App\User::class)->create(),
			'property_id' => factory(Property::class)->create(['invoicing' => true]),
			'lead_id' => factory(Lead::class)->create(),
		]);
    }
}
