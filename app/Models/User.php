<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $fillable = [
        'f_name',
        'm_name',
        'l_name',
        'name',
        'email',
        'phone',
        'country',
        'password',
        'status',
        'dob',
        'full_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function billing_address()
    {
        return $this->hasMany(BillingAddress::class);
    }

    public function lawyer_profile()
    {
        return $this->hasMany(LawyerProfile::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function fixed_service()
    {
        return $this->hasMany(FixedService::class);
    }

    public function single_lawyer_profile()
    {
        return $this->hasOne(LawyerProfile::class);
    }
}
