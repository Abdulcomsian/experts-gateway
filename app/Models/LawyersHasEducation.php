<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyersHasEducation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
