<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
