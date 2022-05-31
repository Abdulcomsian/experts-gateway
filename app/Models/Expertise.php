<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lawyerexpertises()
    {
        return $this->hasMany(LawyersHasExpertise::class);
    }

    public function fixed_service()
    {
        return $this->hasMany(FixedService::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
