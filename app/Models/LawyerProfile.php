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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function partise_area_3()
    {
        return $this->belongsTo(PartiseArea::class,'partise_area','id');
    }

    public function partise_area_1()
    {
        return $this->belongsTo(PartiseArea::class,'secondary_partise_area','id');
    }

    public function partise_area_2()
    {
        return $this->belongsTo(PartiseArea::class,'third_partise_area','id');
    }
}
