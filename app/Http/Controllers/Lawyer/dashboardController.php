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

        if($lawyer->status == 0)
        {
           return view('lawyer.build_profile',compact('lawyer','languages','expertises')); 
        }
        elseif($lawyer->status == 2)
        {
            return view('lawyer.profile',compact('lawyer'));
        }
        
    }

    public function profile_store(Request $request)
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
        $blog= new Blog;
        $blog->title = $request->title;
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
}
