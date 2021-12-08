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
      

        $adminRole = new Role;
        $adminRole->name = 'Super Admin';
        $adminRole->save();

        $authorRole = new Role;
        $authorRole->name = "Author";
        $authorRole->save();
    }
}
