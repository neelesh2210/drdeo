<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSlotBooking extends Model
{
    use HasFactory;

    protected $fillable =[
        'customer_id',
        'doctor_id',
        'date',
        'day',
        'slot',
        'status',
        'delete_stauts'
    ];
}
