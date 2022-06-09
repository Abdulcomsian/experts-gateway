<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'education_name' => 'L.L.B (3 years)',
        ]);

        Education::create([
            'education_name' => 'L.L.B (5 years)',
        ]);

        Education::create([
            'education_name' => 'L.L.M',
        ]);

        Education::create([
            'education_name' => 'Barrister',
        ]);
    }
}
