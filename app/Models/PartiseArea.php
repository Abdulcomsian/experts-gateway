<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartiseArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lawyer_profile()
    {
        return $this->hasMany(LawyerProfile::class);
    }
}
