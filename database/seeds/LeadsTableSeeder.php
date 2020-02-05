<?php

use Illuminate\Database\Seeder;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Lead::class, 5)->create([
            'created_by' => 1,
            'user_id' => 1,
        ]);

    	factory(App\Lead::class, 5)->create([
            'is_customer' => true,
            'created_by' => 1,
            'user_id' => 1,
        ]);
    }
}
