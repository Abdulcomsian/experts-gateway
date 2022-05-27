<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Auth;
use Illuminate\Support\Facades\Redirect;

class aboutUsController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::first();
        return view('admin.about_us.index', compact('about_us'));
    }      

    public function create()
    {
        return view('admin.about_us.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $about_us = AboutUs::where('id',$id)->first();
            return view('admin.about_us.edit', compact('about_us'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
         // dd($request->all());
        $this->validate($request,[ 
            'title'=>'required', 
            'description'=>'required', 
            'image'=>'required',
        ]);
        try {
        $about_us= new AboutUs;
        $about_us->title = $request->title;
        $about_us->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('about_us/',$image_name);
            $about_us->image=$image_name;
        }
        $about_us->save();
            toastSuccess('Successfully Added');
            return redirect('admin/about_us');
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$id)
    {
         // dd($request->all(),$id);
        $this->validate($request,[ 
            'title'=>'required', 
            'description'=>'required', 
        ]);
        $about_us= AboutUs::find($id);
        $about_us->title = $request->title;
        $about_us->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('about_us/',$image_name);
            $about_us->image=$image_name;
        }
        $about_us->save();
        toastSuccess('Successfully Update');
        return redirect('admin/about_us');
        
    }

    public function destroy($id)
    {
        try {
            AboutUs::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
