<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->addRolesAndPermissions();
    }
    
    private function addRolesAndPermissions()
    {
        // create permissions for an admin
        $adminPermissions = collect(['create user', 'edit user', 'delete user'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        // add admin role
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($adminPermissions);
        // add a default user role
        Role::create(['name' => 'agent']);       
    }
}
