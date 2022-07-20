<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FixedService;
use App\Models\User;
use App\Models\Expertise;
use App\Models\ContactUs;
use Auth;
use Illuminate\Support\Facades\Redirect;

class FixedServiceController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $fixed_services = FixedService::get();
        return view('admin.fixed_service.index', compact('fixed_services'));
    }      

    public function create()
    {
        return view('admin.language.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $fixed_service = FixedService::find($id);
        $expertises = Expertise::get();
        return view('admin.fixed_service.edit', compact('fixed_service','expertises'));
    }

    public function update(Request $request,$id)
    {
          // dd($request->all(),$id);
        $user_id = Auth::id();
        $this->validate($request,[  
            'title'=>'required', 
            'price'=>'required', 
            'short_des'=>'required', 
            'description'=>'required', 
            'time_limit'=>'required',   
            'expertise_id'=>'required',   
            'included'=>'required',   
            'not_included'=>'required',   

        ]);

        $fixed_service= FixedService::find($id);
        $fixed_service->title = $request->title;
        $fixed_service->price = $request->price;
        $fixed_service->short_des = $request->short_des;
        $fixed_service->description = $request->description;
        $fixed_service->time_limit = $request->time_limit;
        $fixed_service->included = $request->included;
        $fixed_service->expertise_id = $request->expertise_id;
        $fixed_service->not_included = $request->not_included;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move(public_path('fixed_service/'),$image_name);
            $fixed_service->image=$image_name;
        }
        $fixed_service->save();

        toastSuccess('Successfully Added');
        return redirect('admin/fixed-service');
    }

    public function service_detail($id)
    {
        $fixed_service = FixedService::find($id);
        return view('admin.fixed_service.show', compact('fixed_service'));
    }

    public function update_service_status(Request $request,$id)
    {
        try {
        $fixed_service= FixedService::find($id);
        $fixed_service->status = $request->status;
        $fixed_service->save();
        toastSuccess('Successfully Update Status');
        return redirect('admin/fixed-service');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }    }
}
