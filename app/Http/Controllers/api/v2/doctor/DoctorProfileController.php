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
        $input=$request->all();

        $input['doctor_id']=Auth::user()->id;
        if(!empty($request->adhar_card))
        {
            $adhar_card = time().rand().'.'.$request->adhar_card->extension();
            $request->adhar_card->move(public_path('doctor_documents'), $adhar_card);
            $input['adhar_card']=$adhar_card;
        }
        if(!empty($request->pan_card))
        {
            $pan_card = time().rand().'.'.$request->pan_card->extension();
            $request->pan_card->move(public_path('doctor_documents'), $pan_card);
            $input['pan_card']=$pan_card;
        }
        if(!empty($request->degree))
        {
            $degree = time().rand().'.'.$request->degree->extension();
            $request->degree->move(public_path('doctor_documents'), $degree);
            $input['degree']=$degree;
        }

        DoctorProfile::create($input);

         $doctor_profile=DoctorProfile::where('doctor_id',Auth::user()->id)->with('doctor')->first();

         if(!empty($doctor_profile->adhar_card))
         {
            $doctor_profile->adhar_card=public_path('doctor_documents/'.$doctor_profile->adhar_card);
         }
         if(!empty($doctor_profile->pan_card))
         {
            $doctor_profile->pan_card=public_path('doctor_documents/'.$doctor_profile->pan_card);
         }
         if(!empty($doctor_profile->degree))
         {
            $doctor_profile->degree=public_path('doctor_documents/'.$doctor_profile->degree);
         }

        return response()->json(['data' => $doctor_profile]);
    }

}
