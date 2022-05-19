<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'English',
            'language_slug' => 'English',
        ]);

        Language::create([
            'name' => 'Arabic',
            'language_slug' => 'Arabic',
        ]);

        Language::create([
            'name' => 'Urdu',
            'language_slug' => 'Urdu',
        ]);
    }
}
