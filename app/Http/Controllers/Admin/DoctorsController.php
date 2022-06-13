<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\CPU\Helpers;
use App\Models\DoctorSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{

    public function sliders()
    {
        $list = DoctorSlider::orderBy('id', 'desc')->paginate(Helpers::pagination_limit());

        return view('admin-views.doctors.slider', compact('list'));
    }

    public function storeSlider(Request $request)
    {
        //return $request->all();
        $doctor_slider=new DoctorSlider;
        $doctor_slider->link=$request->url;

        $file= $request->file('image');
        $filename= date('YmdHi').rand().$file->getClientOriginalName();
        $file-> move(public_path('/doctor_sliders'), $filename);

        $doctor_slider->image= $filename;
        $doctor_slider->save();

        return back();

    }

    public function deleteSlider($id)
    {
        DoctorSlider::find($id)->delete();

        return back();
    }

}
