<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expertise()
    {
        return $this->belongsTo(Expertise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
