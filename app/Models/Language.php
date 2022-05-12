<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function LawyerProfiles()
    {
        return $this->belongsToMany(User::class, 'lawyers_has_languages', 'language_id', 'lawyer_profile_id');
    }
}
