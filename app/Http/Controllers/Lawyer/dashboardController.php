<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Expertise;
use App\Models\Language;
use App\Models\LawyerProfile;

class dashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        return view('lawyer.dashboard.index');
    }

    public function profile()
    {
        $user_id = Auth::id();
        $lawyer = User::where('id',$user_id)->first();
        $languages = Language::get();
        $expertises = Expertise::get();
        $lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer->status == 0)
        {
           return view('lawyer.build_profile',compact('lawyer','languages','expertises','lawyer_profile')); 
        }
        elseif($lawyer->status == 2)
        {
            return view('lawyer.profile',compact('lawyer'));
        }
        
    }

    public function profile_store_1(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'f_name'=>'required|string|max:255', 
            'l_name'=>'required|string|max:255', 
            'image'=>'required',   

        ]);
        $lawyer_profile= new LawyerProfile;
        $lawyer_profile->user_id = $user_id;
        $lawyer_profile->complete = $request->complete;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lawyer_profile/',$image_name);
            $lawyer_profile->image=$image_name;
        }
        $lawyer_profile->save();

        $user= User::where('id',$user_id)->first();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->save();
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }


    public function profile_update_1(Request $request,$id)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[  
            'f_name'=>'required|string|max:255', 
            'l_name'=>'required|string|max:255', 

        ]);
        $lawyer_profile= LawyerProfile::find($id);
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lawyer_profile/',$image_name);
            $lawyer_profile->image=$image_name;
            $lawyer_profile->save();
        }
        
        $user= User::where('id',$user_id)->first();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->save();
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }

    public function profile_store_2(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'f_name'=>'required|string|max:255', 
            'l_name'=>'required|string|max:255', 
            'address'=>'required', 
            'image'=>'required', 
            'language_id'=>'required', 
            'expertise_id'=>'required', 
            'profile_detail'=>'required', 
            'qualification'=>'required',  

        ]);
        $lawyer_profile= new LawyerProfile;
        $lawyer_profile->title = $request->title;
        $blog->user_id = $user_id;
        $blog->expertise_id = $request->expertise_id;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lawyer_profile/',$image_name);
            $blog->image=$image_name;
        }
        $blog->save();
        toastSuccess('Successfully Added');
        return redirect('lawyer/create');
    }

    public function profile_store_3(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[  
            'profile_detail'=>'required',  

        ]);
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer_profile != null)
        {
            $lawyer_profile= LawyerProfile::find($lawyer_profile->id);
            $lawyer_profile->profile_detail = $request->profile_detail;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        else{
            $lawyer_profile= new LawyerProfile;
            $lawyer_profile->profile_detail = $request->profile_detail;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }

    public function profile_update_3(Request $request,$id)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'profile_detail'=>'required',  

        ]);
        
        $lawyer_profile= LawyerProfile::find($id);
        $lawyer_profile->profile_detail = $request->profile_detail;
        $lawyer_profile->save();
        
        
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }
}
