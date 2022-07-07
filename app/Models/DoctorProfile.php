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
        'degree_name',
        'profile_name',
        'adhar_card',
        'pan_card',
        'degree',
        'institute_name',
        'year_of_completion',
        'city',
        'address',
        'registration_id',
        'registration_council_name',
        'year_of_registration',
        'registration_document'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function doctor_category()
    {
        return $this->belongsTo(DoctorCategory::class,'specialization');
    }

}
