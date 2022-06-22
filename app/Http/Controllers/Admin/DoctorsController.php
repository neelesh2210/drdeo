<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\CPU\Helpers;
use App\Models\DoctorSlider;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
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

    public function categories()
    {
        $list = DoctorCategory::where('delete_status',0)->orderBy('id', 'desc')->paginate(Helpers::pagination_limit());

        return view('admin-views.doctors.category', compact('list'));
    }

    public function storeCategories(Request $request)
    {
        //return $request->all();
        $doctor_category=new DoctorCategory;
        $doctor_category->name=$request->name;

        $file= $request->file('image');
        $filename= date('YmdHi').rand().$file->getClientOriginalName();
        $file-> move(public_path('/doctor_categories'), $filename);

        $doctor_category->image= $filename;
        $doctor_category->save();

        return back();
    }

    public function deleteCategory($id)
    {
        //return $id;
        DoctorCategory::find($id)->update(['delete_status'=>1]);

        return back();
    }

    public function doctorList()
    {
        $list=Doctor::orderBy('id','desc')->paginate(10);

        return view('admin-views.doctors.doctor_list',compact('list'));
    }

    public function verifyDoctor(Request $request)
    {
        Doctor::where('id',$request->id)->update([
            'status'=>$request->status
        ]);
    }

}
