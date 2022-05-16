<?php

namespace App\Http\Controllers\api\v2\doctor;

use Auth;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorProfileController extends Controller
{

    public function getDocotorProfile()
    {
        $data=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        return response()->json(['data' => $data]);
    }

    public function saveDocotorProfile(Request $request)
    {
        DoctorProfile::create([
            'doctor_id'=>Auth::user()->id,
            'title'=>$request->title,
            'specialization'=>$request->specialization,
            'experience'=>$request->experience,
            'gender'=>$request->gender,
        ]);

        $data=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        return response()->json(['data' => $data]);
    }

}
