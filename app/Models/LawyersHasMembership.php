<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyersHasMembership extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
