<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Membership::create([
            'name' => 'Standard',
            'amount' => '100',
            'membership_slug' => 'Standard',
        ]);

        Membership::create([
            'name' => 'Gold',
            'amount' => '100',
            'membership_slug' => 'Gold',
        ]);

        Membership::create([
            'name' => 'Diamond',
            'amount' => '100',
            'membership_slug' => 'Diamond',
        ]);
    }
}
