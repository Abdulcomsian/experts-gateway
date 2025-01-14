<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'f_name' => 'Donald',
                'l_name' => 'Trump',
                'email' => 'donaldtrump@gmail.com',
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
                'f_name' => 'John',
                'l_name' => 'Doe',
                'email' => 'john.doe@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer2 = User::create([
                'f_name' => 'Jane',
                'l_name' => 'Smith',
                'email' => 'jane.smith@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer3 = User::create([
                'f_name' => 'Robert',
                'l_name' => 'Brown',
                'email' => 'robert.brown@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer4 = User::create([
                'f_name' => 'Emily',
                'l_name' => 'Davis',
                'email' => 'emily.davis@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer5 = User::create([
                'f_name' => 'Michael',
                'l_name' => 'Johnson',
                'email' => 'michael.johnson@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer6 = User::create([
                'f_name' => 'Sarah',
                'l_name' => 'Lee',
                'email' => 'sarah.lee@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer7 = User::create([
                'f_name' => 'David',
                'l_name' => 'Martinez',
                'email' => 'david.martinez@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer8 = User::create([
                'f_name' => 'Sophia',
                'l_name' => 'Wilson',
                'email' => 'sophia.wilson@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            
            $lawyer9 = User::create([
                'f_name' => 'James',
                'l_name' => 'Anderson',
                'email' => 'james.anderson@gmail.com',
                'status' => '1',
                'password' => Hash::make('password1'),
            ]);
            

            $admin->assignRole($adminRole->name);
            $lawyer->assignRole($lawyerRole->name);
            $lawyer1->assignRole($lawyerRole->name);
            $lawyer2->assignRole($lawyerRole->name);
            $lawyer3->assignRole($lawyerRole->name);
            $lawyer4->assignRole($lawyerRole->name);
            $lawyer5->assignRole($lawyerRole->name);
            $lawyer6->assignRole($lawyerRole->name);
            $lawyer7->assignRole($lawyerRole->name);
            $lawyer8->assignRole($lawyerRole->name);
            $lawyer9->assignRole($lawyerRole->name);
            $user->assignRole($userRole->name);
        }
    }
}
