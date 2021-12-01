<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new user
        $user = new User;
        $user->name = 'Aman';
        $user->email = 'aman@gmail.com';
        $user->password = Hash::make("12345678");
        $user->save();

        // Find admin Role
        $adminRole = Role::where('name', 'Admin')->first();
        
        if($adminRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $adminRole->id;
            $user_role->save();
        }

         $superAdminRole = Role::where('name', 'Super Admin')->first();
        
        if($superAdminRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $superAdminRole->id;
            $user_role->save();
        }

    }
}
