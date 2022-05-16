<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Doctor extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $fillable =[
        'name',
        'email',
        'phone_number',
        'password',
    ];

    public function doctor_profile()
    {
        return $this->hasOne(DoctorProfile::class,'doctor_id');
    }

}
