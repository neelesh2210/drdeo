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
         return $slot=['morning'=>array('start_time'=>'09:00 AM','end_time'=>'11:00 AM','status'=>1),'evening'=>array('start_time'=>'05:00 PM','end_time'=>'9:00 PM','status'=>1)];
        $data=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        return response()->json(['data' => $data]);
    }

    public function saveDocotorProfile(Request $request)
    {
        $doctor_profile=new DoctorProfile;
        $doctor_profile->doctor_id=Auth::user()->id;
        $doctor_profile->title=$request->title;
        $doctor_profile->specialization=$request->specialization;
        $doctor_profile->experience=$request->experience;
        $doctor_profile->gender=$request->gender;
        if(!empty($request->adhar_card))
        {
            $adhar_card = time().rand().$request->adhar_card->extension();
            $request->adhar_card->move(public_path('doctor_documents'), $adhar_card);
            $doctor_profile->adhar_card=$adhar_card;
        }
        if(!empty($request->pan_card))
        {
            $pan_card = time().rand().$request->pan_card->extension();
            $request->pan_card->move(public_path('doctor_documents'), $pan_card);
            $doctor_profile->pan_card=$pan_card;
        }
        if(!empty($request->degree))
        {
            $degree = time().rand().$request->degree->extension();
            $request->degree->move(public_path('doctor_documents'), $degree);
            $doctor_profile->degree=$degree;
        }

        $doctor_profile->institute_name=$request->institute_name;
        $doctor_profile->year_of_completion=$request->year_of_completion;

        $doctor_profile->save();

        return response()->json(['data' => $doctor_profile->with('doctor')->get()]);
    }

}
