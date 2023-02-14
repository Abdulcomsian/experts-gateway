<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            User::truncate();
            // DB::table('roles')->truncate();

            $adminRole = DB::table('roles')->where('name','Admin')->first();

            $lawyerRole = DB::table('roles')->where('name','Lawyer')->first();
            $userRole = DB::table('roles')->where('name','User')->first();

            $admin = User::create([
                'f_name' => 'Admin First Name',
                'l_name' => 'Admin Last Name',
                'email' => 'admin@gmail.com',
                'phone' => '03005456559',
                'status' => '1',
                'country' => 'Pakistan',
                'password' => Hash::make('password1')
            ]);

            $lawyer = User::create([
                'f_name' => 'Lawyer F_name',
                'l_name' => 'Lawyer L_name',
                'email' => 'lawyer@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1')
            ]);


            $user = User::create([
                'f_name' => 'User First Name',
                'l_name' => 'User Last Name',
                'email' => 'user@gmail.com',
                'phone' => '03005456559',
                'status' => '1',
                'country' => 'Pakistan',
                'password' => Hash::make('password1')
            ]);

            $lawyer1 = User::create([
                'f_name' => 'Lawyer F_name',
                'l_name' => 'Lawyer L_name',
                'email' => 'lawyer2@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1')
            ]);

            $admin->assignRole($adminRole->name);
            $lawyer->assignRole($lawyerRole->name);
            $lawyer1->assignRole($lawyerRole->name);
            $user->assignRole($userRole->name);
        }
    }
}
