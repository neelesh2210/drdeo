<?php

namespace App\Http\Controllers\api\v2\doctor;

use Auth;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use App\Models\DoctorCategory;
use App\Models\DoctorSlotBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorProfileController extends Controller
{

    public function getDocotorProfile()
    {
        $data=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        $data->doctor_profile->specialization=DoctorCategory::where('id',$data->doctor_profile->specialization)->first();

        if(!empty($data->doctor_profile->adhar_card))
        {
            $data->doctor_profile->adhar_card=asset('public/doctor_documents/'.$data->doctor_profile->adhar_card);
        }
        if(!empty($data->doctor_profile->pan_card))
        {
            $data->doctor_profile->pan_card=asset('public/doctor_documents/'.$data->doctor_profile->pan_card);
        }
        if(!empty($data->doctor_profile->degree))
        {
            $data->doctor_profile->degree=asset('public/doctor_documents/'.$data->doctor_profile->degree);
        }
        if(!empty($data->doctor_profile->registration_document))
        {
            $data->doctor_profile->registration_document=asset('public/doctor_documents/'.$data->doctor_profile->registration_document);
        }
        if(!empty($data->doctor_profile->profile_photo))
        {
            $data->doctor_profile->profile_photo=asset('public/doctor_documents/'.$data->doctor_profile->profile_photo);
        }

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
        if(!empty($request->registration_document))
        {
            $registration_document = time().rand().'.'.$request->registration_document->extension();
            $request->registration_document->move(public_path('doctor_documents'), $registration_document);
            $input['registration_document']=$registration_document;
        }
        if(!empty($request->profile_photo))
        {
            $profile_photo = time().rand().'.'.$request->profile_photo->extension();
            $request->profile_photo->move(public_path('doctor_documents'), $profile_photo);
            $input['profile_photo']=$profile_photo;
        }

        $check_doctor=DoctorProfile::where('doctor_id',Auth::user()->id)->first();
        if(!empty($check_doctor))
        {
            DoctorProfile::where('doctor_id',Auth::user()->id)->update($input);
        }
        else
        {
            DoctorProfile::create($input);
        }

        $doctor=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        $doctor->doctor_profile->specialization=DoctorCategory::where('id',$doctor->doctor_profile->specialization)->first();

        if(!empty($doctor->doctor_profile->adhar_card))
        {
            $doctor->doctor_profile->adhar_card=asset('public/doctor_documents/'.$doctor->doctor_profile->adhar_card);
        }
        if(!empty($doctor->doctor_profile->pan_card))
        {
            $doctor->doctor_profile->pan_card=asset('public/doctor_documents/'.$doctor->doctor_profile->pan_card);
        }
        if(!empty($doctor->doctor_profile->degree))
        {
            $doctor->doctor_profile->degree=asset('public/doctor_documents/'.$doctor->doctor_profile->degree);
        }
        if(!empty($doctor->doctor_profile->registration_document))
        {
            $doctor->doctor_profile->registration_document=asset('public/doctor_documents/'.$doctor->doctor_profile->registration_document);
        }
        if(!empty($doctor->doctor_profile->profile_photo))
        {
            $doctor->doctor_profile->profile_photo=asset('public/doctor_documents/'.$doctor->doctor_profile->profile_photo);
        }

        return response()->json(['data' => $doctor]);
    }

    public function getDocotorSlot(Request $request)
    {
        $data=DoctorSlot::where('doctor_id',Auth::user()->id)->first();
        if(!empty($data))
        {
            $data->monday=json_decode($data->monday);
            $data->tuesday=json_decode($data->tuesday);
            $data->wednesday=json_decode($data->wednesday);
            $data->thursday=json_decode($data->thursday);
            $data->friday=json_decode($data->friday);
            $data->saturday=json_decode($data->saturday);
            $data->sunday=json_decode($data->sunday);
        }

        return response()->json(['data' => $data]);

    }

    public function saveDocotorSlot(Request $request)
    {
        DoctorSlot::updateOrCreate([
            'doctor_id'=>Auth::user()->id
        ],
        [
            'monday'=>$request->monday,
            'tuesday'=>$request->tuesday,
            'wednesday'=>$request->wednesday,
            'thursday'=>$request->thursday,
            'friday'=>$request->friday,
            'saturday'=>$request->saturday,
            'sunday'=>$request->sunday,
        ]);

        $data=DoctorSlot::where('doctor_id',Auth::user()->id)->first();
        $data->monday=json_decode($data->monday);
        $data->tuesday=json_decode($data->tuesday);
        $data->wednesday=json_decode($data->wednesday);
        $data->thursday=json_decode($data->thursday);
        $data->friday=json_decode($data->friday);
        $data->saturday=json_decode($data->saturday);
        $data->sunday=json_decode($data->sunday);

        return $data;

    }

    public function getDocotorCategory(Request $request)
    {
        $doctor_categories=DoctorCategory::where('delete_status',0)->where('status',1)->get();
        foreach($doctor_categories as $doctor_category)
        {
            $doctor_category->image=asset('public/doctor_categories/'.$doctor_category->image);
        }

        return response()->json(['doctor_categories'=>$doctor_categories]);
    }

    public function docotorDashboard(Request $request)
    {
        $data=Doctor::where('id',Auth::user()->id)->with('doctor_profile')->first();

        $profile_percent=0;

        if(!empty($data->name))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->email))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->phone_number))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->specialization))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->designation))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->experience))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->gender))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->degree_name))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->profile_photo))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->adhar_card))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->pan_card))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->degree))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->institute_name))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->year_of_completion))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->city))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->address))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->registration_id))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->registration_council_name))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->year_of_registration))
        {
            $profile_percent=$profile_percent+5;
        }
        if(!empty($data->doctor_profile->registration_document))
        {
            $profile_percent=$profile_percent+5;
        }

        return response()->json(['profile_percent'=>$profile_percent,'verification_status'=>$data->status]);

    }

    public function bookingHistories(Request $request)
    {
        return $list=DoctorSlotBooking::where('doctor_id',Auth::user()->id)->where('date','<=',date('d-m-Y'))->with('customer')->paginate(20);
    }

    public function upcomingBooking(Request $request)
    {
        return $list=DoctorSlotBooking::where('doctor_id',Auth::user()->id)->where('date','>=',date('d-m-Y'))->with('customer')->paginate(20);
    }

}
