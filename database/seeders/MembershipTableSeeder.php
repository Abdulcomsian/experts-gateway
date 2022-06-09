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
            'membership_name' => 'Lawyer Association',
        ]);

        Membership::create([
            'membership_name' => 'Lawyer foundation',
        ]);
    }
}
