<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AddPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'delete user']);


        
        $admin = Role::whereId(1)->first();
        $admin->givePermissionTo(['create user', 'edit user', 'view user', 'delete user']);

        $principal = Role::whereId(2)->first();
        $principal->givePermissionTo('view user');

        // remove like that $principal->revokePermissionTo('create user');
        // check like that if (auth()->user()->hasPermissionTo('create user')) {
        //     // Logic for permission to create user
        // }

        // in controller ----
        // if (auth()->user()->can('create user')) {
        //     // User can create a user
        // } else {
        //     abort(403, 'Unauthorized action.');
        // }
    }
}
