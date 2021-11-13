<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Permission::create(['name' => 'view_users']);
        \App\Models\Permission::create(['name' => 'edit_users']);
        \App\Models\Permission::create(['name' => 'view_roles']);
        \App\Models\Permission::create(['name' => 'edit_roles']);
        \App\Models\Permission::create(['name' => 'view_products']);
        \App\Models\Permission::create(['name' => 'edit_products']);
        \App\Models\Permission::create(['name' => 'view_orders']);
        \App\Models\Permission::create(['name' => 'edit_orders']);
    }
}
