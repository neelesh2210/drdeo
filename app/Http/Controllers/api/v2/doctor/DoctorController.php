<?php

namespace App\Http\Controllers\api\v2\doctor;

use Auth;
use App\Models\Doctor;
use Illuminate\Support\Str;
use App\Models\DoctorSlider;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:10',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:8',
        ]);

        $doctor = Doctor::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $doctor->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token,'token_type' => 'Bearer',]);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $check_user=Doctor::where('phone_number',$request->phone_number)->first();

        if(!empty($check_user))
        {
            if(Hash::check($request->password, $check_user->password))
            {
                $check_user->access_token =  $check_user->createToken('MyApp')->plainTextToken;
                return response()->json($check_user);
            }
            else
            {
                return response()->json(['msg'=>'Wrong Password!'],401);
            }
        }
        else
        {
            return response()->json(['msg'=>'Phone Number Not Exists!'],401);
        }
    }

    public function get_docotor()
    {
        return Doctor::where('id',Auth::user()->id)->first();
    }

}
