<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Expertise;

class ExpertisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expertise::create([
            'name' => 'Family Law',
            'expertise_slug' => 'Family Law',
        ]);

        Expertise::create([
            'name' => 'Banking Law',
            'expertise_slug' => 'Banking Law',
        ]);

        Expertise::create([
            'name' => 'Traffic Law',
            'expertise_slug' => 'Traffic Law',
        ]);
    }
}
