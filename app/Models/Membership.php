<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function LawyerProfiles()
    {
        return $this->belongsToMany(User::class, 'lawyers_has_memberships', 'membership_id', 'lawyer_profile_id');
    }

}
