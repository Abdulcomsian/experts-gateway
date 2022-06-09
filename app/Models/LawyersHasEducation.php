<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyersHasEducation extends Model
{
    use HasFactory;

    protected $table = 'lawyers_has_educations';
    protected $guarded = [];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
