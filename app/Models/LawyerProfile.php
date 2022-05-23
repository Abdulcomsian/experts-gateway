<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lawyerexpertises()
    {
        return $this->belongsToMany(Project::class, 'lawyers_has_expertises', 'expertise_id', 'lawyer_profile_id');
    }

    public function lawyermemberships()
    {
        return $this->belongsToMany(Project::class, 'lawyers_has_memberships', 'membership_id', 'lawyer_profile_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
