<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\assignRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(App\User::class)->create(['email' => 'admin@crm.com']);
        $admin->assignRole('super-admin');

        $agent = factory(App\User::class)->create(['email' => 'agent@crm.com', 'is_agent' => true]);
        $agent->assignRole('agent');
    }
}
