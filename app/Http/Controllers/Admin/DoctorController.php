<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function sliders()
    {
        return view('admin-views.doctors.slider');
    }

}
