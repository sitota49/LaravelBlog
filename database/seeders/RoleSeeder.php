<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new role
        $role = new Role;
        $role->name = "Super Admin";
        $role->save();

        $adminRole = new Role;
        $adminRole->name = 'Admin';
        $adminRole->save();
    }
}
