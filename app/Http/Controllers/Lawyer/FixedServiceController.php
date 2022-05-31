<?php

namespace App\Http\Controllers\lawyer;

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
        $lawyer = User::where('id',$user_id)->first();
        $contact_us = ContactUs::first();
        $expertises = Expertise::get();
        $fixed_services = FixedService::where('user_id',$user_id)->get();
        return view('lawyer.fixed_service.index', compact('fixed_services','expertises','lawyer','contact_us'));
    }      

    

    public function edit($id)
    {
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[  
            'title'=>'required', 
            'price'=>'required', 
            'short_des'=>'required', 
            'description'=>'required', 
            'image'=>'required',   
            'time_limit'=>'required',   
            'expertise_id'=>'required',   
            'included'=>'required',   
            'not_included'=>'required',   

        ]);

        $fixed_service= new FixedService;
        $fixed_service->user_id = $user_id;
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
            $image->move('fixed_service/',$image_name);
            $fixed_service->image=$image_name;
        }
        $fixed_service->save();

        toastSuccess('Successfully Added');
        return redirect('lawyer/fixed-service');
    }

    public function update(Request $request,$id)
    {
        
        
    }

    public function fixed_service_detail($id)
    {
        $user_id = Auth::id();
        $lawyer = User::where('id',$user_id)->first();
        $contact_us = ContactUs::first();
        $fixed_service = FixedService::find($id);
        return view('lawyer.fixed_service.detail', compact('fixed_service','lawyer','contact_us'));
    }

    public function service_detail($id)
    {
        $contact_us = ContactUs::first();
        $fixed_service = FixedService::find($id);
        $service_count = FixedService::where('expertise_id',$fixed_service->expertise_id)->take(5)->get();
        return view('frontend.fixed_service.detail', compact('fixed_service','contact_us','service_count'));
    }
}
