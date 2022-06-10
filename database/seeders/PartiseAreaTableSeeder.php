<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\PartiseArea;

class PartiseAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartiseArea::create([
            'name' => 'Rawalpindi Kachari',
        ]);

        PartiseArea::create([
            'name' => 'Islamabad Kachari F-8',
        ]);

        PartiseArea::create([
            'name' => 'High Court',
        ]);

        PartiseArea::create([
            'name' => 'Supreme Court',
        ]);
    }
}
