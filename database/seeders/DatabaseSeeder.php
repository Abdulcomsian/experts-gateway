<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);  
        $this->call(ExpertisesTableSeeder::class);  
        $this->call(LanguageTableSeeder::class);    
        $this->call(MembershipTableSeeder::class);    
        $this->call(EducationsTableSeeder::class);    
        $this->call(PartiseAreaTableSeeder::class);    
    }
}
