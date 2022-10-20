<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use Illuminate\Support\Facades\Redirect;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
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
            'title'=>'required', 
            'description'=>'required',    
            'image'=>'required',    

        ]);
        try {
            $service= new Service;
            $service->title = $request->title;
            $service->description = $request->description;
            $service->user_id=Auth::user()->id;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();
                $image_name =time().'.'. $extensions;
                $image->move(public_path('services/'),$image_name);
                $service->image=$image_name;
            }
            if($request->hasfile('feature_image'))
            {
                $image = $request->file('feature_image');
                $extensions =$image->extension();
                $image_name =time().'.'. $extensions;
                $image->move(public_path('services/'),$image_name);
                $service->feature_image=$image_name;
            }
            $service->save();
            toastSuccess('Successfully Added');
            return redirect('admin/services');
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
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
         $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
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
        $user_id = Auth::id();
        $this->validate($request,[  
            'title'=>'required', 
            'description'=>'required',    

        ]);
        try {
            $service= Service::find($id);
            $service->title = $request->title;
            $service->description = $request->description;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move(public_path('services/'),$image_name);
                $service->image=$image_name;
            }
            if($request->hasfile('feature_image'))
            {
                $image = $request->file('feature_image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move(public_path('services/'),$image_name);
                $service->feature_image=$image_name;
            }
            $service->save();
            toastSuccess('Successfully Updated');
            return redirect('admin/services');
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
        try {
            Service::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
