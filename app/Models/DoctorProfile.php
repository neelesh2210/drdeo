<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $fillable =[
        'doctor_id',
        'title',
        'specialization',
        'designation',
        'experience',
        'gender',
        'adhar_card',
        'pan_card',
        'degree',
        'institute_name',
        'year_of_completion',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
