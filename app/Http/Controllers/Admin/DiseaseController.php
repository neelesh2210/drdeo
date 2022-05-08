<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases=Disease::latest()->paginate(10);
        return view('admin-views.disease.view',compact('diseases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image'=> 'required'
        ], [
            'name.required' => 'Disease name is required!',
            'image.required' => 'Disease image is required!',
        ]);

        $disease = new Disease;
        $disease->name = $request->name;
        $disease->slug = Str::slug($request->name);
        $disease->icon = ImageManager::upload('disease/', 'png', $request->file('image'));
        $disease->save();

        Toastr::success('Disease added successfully!');
        return back();
    }

    public function edit(Request $request)
    {
        $data = Disease::where('id', $request->id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $disease = Disease::find($request->id);
        $disease->name = $request->name;
        $disease->slug = Str::slug($request->name);
        if($request->image)
        {
            $disease->icon = ImageManager::update('disease/', $disease->icon, 'png', $request->file('image'));
        }
        $disease->save();
        // return response()->json();
        Toastr::success('Disease updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        Disease::destroy($request->id);
        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Disease::orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }
}
