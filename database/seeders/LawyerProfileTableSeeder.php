<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\LawyerProfile;

class LawyerProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LawyerProfile::create([
            'user_id' => '2',
            'gender' => 'Male',
            'linkedin_url' => 'https://www.google.com',
            'address' => 'Islamabad Pakistan',
            'complete' => '2',
            'b_image' => '1655462922.png',
            'image' => '1655462922.png',
            'partise_area' => '2',
            'description' => '<p>sdfdsfsdf sfsfsd sdfsf</p>',
            'country' => '166',
            'state' => '2729',
            'city' => '31573',
        ]);

        LawyerProfile::create([
            'user_id' => '4',
            'gender' => 'Male',
            'linkedin_url' => 'https://www.google.com',
            'address' => 'Islamabad Pakistan',
            'complete' => '2',
            'b_image' => '1655462922.png',
            'image' => '1655462922.png',
            'partise_area' => '3',
            'description' => '<p>sdfdsfsdf sfsfsd sdfsf</p>',
            'country' => '1',
            'state' => '2729',
            'city' => '31573',
        ]);
    }
}
