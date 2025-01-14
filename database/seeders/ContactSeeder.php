<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::create([
            "address" => "123 Main Street, Suite 100, Cityville, Country",
            "phone" => "+1 555-123-4567",
            "phone_1" => "+1 555-987-6543",
            "email" => "info@expertGateway.com",
            "linkedIn_link" => "https://www.linkedin.com/",
            "instagram_link" => "https://www.instagram.com/",
            "facebook_link" => "https://www.facebook.com/",
            "twitter_link" => "https://twitter.com/",
        ]);
        
    }
}
