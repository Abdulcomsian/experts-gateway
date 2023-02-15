<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_sliders=HomeSlider::paginate(10);
        return view('admin.home_slider.index',compact('home_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawyers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
        return view('admin.home_slider.add', ['lawyers' => $lawyers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
            'image'=>'required',
        ]);
        try {
            $home_slider = new HomeSlider();
            $home_slider->name = $request->name;
            $home_slider->type = $request->type;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move(public_path('home_slider/'),$image_name);
                $home_slider->image=$image_name;
            }
            $home_slider->save();
            Session::flash('success', 'Successfully Added');
            return redirect()->back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $home_slider=HomeSlider::find($id);
            return view('admin.home_slider.edit',compact('home_slider'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
        ]);
        try{
            $home_slider = HomeSlider::findorfail($id);
            $home_slider->name = $request->name;
            $home_slider->type = $request->type;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move(public_path('home_slider/'),$image_name);
                $home_slider->image=$image_name;
            }
            $home_slider->save();
            toastSuccess('Successfully Updated');
            return redirect()->back();
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = HomeSlider::findorfail($id);
        // Blog::FindorFail($id)->delete();
        if($blog->image)
        {
            $filePath = public_path("blogs").'/' . $blog->image;
            @unlink($filePath);
        }
        $blog->delete();
        toastr()->success('Successfully Deleted');
        return back();
    }
}
