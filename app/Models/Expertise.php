<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function LawyerProfiles()
    {
        return $this->belongsToMany(User::class, 'lawyers_has_expertises', 'expertise_id', 'lawyer_profile_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
