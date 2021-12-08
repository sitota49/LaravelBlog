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
        $adminRole = Role::where('name', 'Super Admin')->first();
        
        if($adminRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $adminRole->id;
            $user_role->save();
        }
         $authorRole = Role::where('name', 'Author')->first();
        
        if($authorRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $authorRole->id;
            $user_role->save();

        }

       
        $user2 = new User;
        $user2->name = 'Abebe';
        $user2->email = 'abebe@gmail.com';
        $user2->password = Hash::make("12345678");
        $user2->save();

          $authorRole = Role::where('name', 'Author')->first();
        
        if($authorRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user2->id;
            $user_role->role_id = $authorRole->id;
            $user_role->save();

        }

         $user3 = new User;
        $user3->name = 'Mahlet';
        $user3->email = 'mahlet@gmail.com';
        $user3->password = Hash::make("12345678");
        $user3->save();

        // Find admin Role
        $adminRole = Role::where('name', 'Super Admin')->first();
        
        if($adminRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user3->id;
            $user_role->role_id = $adminRole->id;
            $user_role->save();
        }

    }
}
