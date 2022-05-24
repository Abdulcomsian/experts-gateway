<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'name' => 'L.L.B (3 year)',
            'education_slug' => 'L.L.B (3 year)',
        ]);

        Education::create([
            'name' => 'L.L.B (5 year)',
            'education_slug' => 'L.L.B (5 year)',
        ]);

        Education::create([
            'name' => 'L.L.M',
            'education_slug' => 'L.L.M',
        ]);
    }
}
