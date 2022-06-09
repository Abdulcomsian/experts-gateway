<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyersHasMembership extends Model
{
    use HasFactory;
    protected $table = 'lawyers_has_memberships';
    protected $guarded = [];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
