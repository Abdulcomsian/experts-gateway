<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Expertise;
use App\Models\Language;
use App\Models\LawyerProfile;
use App\Models\LawyersHasExpertise;
use App\Models\LawyersHasLanguage;
use Validator;
use App\Mail\ApprovalMail;
use App\Mail\LawyerApprovedMAil;
use Illuminate\Support\Facades\Redirect;

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
        if($lawyer_profile)
        {
            $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',1)->get();
            $lawyer_expertises = LawyersHasExpertise::where('lawyer_profile_id',$lawyer_profile->id)->get();
            if($lawyer->status == 0)
            {
               return view('lawyer.build_profile',compact('lawyer','lawyer_language','lawyer_expertises','languages','expertises','lawyer_profile')); 
            }
            elseif($lawyer->status == 1)
            {
                return view('lawyer.profile',compact('lawyer','lawyer_profile','lawyer_language','lawyer_expertises'));
            }

        }
        else{
            if($lawyer->status == 0)
            {
               return view('lawyer.build_profile',compact('lawyer','languages','expertises','lawyer_profile')); 
            }
            elseif($lawyer->status == 2)
            {
                return view('lawyer.profile',compact('lawyer'));
            }
        }
        
    }

    public function profile_store_1(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'f_name'=>'required|string|max:255', 
            'l_name'=>'required|string|max:255', 
            'title'=>'required|string', 
            'image'=>'required',   
            'b_image'=>'required',   

        ]);
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer_profile != null)
        {
            $lawyer_profile= LawyerProfile::find($lawyer_profile->id);
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->title = $request->title;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('lawyer_profile/',$image_name);
                $lawyer_profile->image=$image_name;
            }
            if($request->hasfile('b_image'))
            {
                $c_image = $request->file('b_image');
                $c_extensions =$c_image->extension();

                $image_c_name =time().'.'. $c_extensions;
                $c_image->move('lawyer_cover_image/',$image_c_name);
                $lawyer_profile->b_image=$image_c_name;
            }
            $lawyer_profile->save();

            $user= User::where('id',$user_id)->first();
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->save();
        }
        else{
            $lawyer_profile= new LawyerProfile;
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->title = $request->title;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('lawyer_profile/',$image_name);
                $lawyer_profile->image=$image_name;
            }
            if($request->hasfile('b_image'))
            {
                $c_image = $request->file('b_image');
                $c_extensions =$c_image->extension();

                $image_c_name =time().'.'. $c_extensions;
                $c_image->move('lawyer_cover_image/',$image_c_name);
                $lawyer_profile->b_image=$image_c_name;
            }
            $lawyer_profile->save();

            $user= User::where('id',$user_id)->first();
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->save();
        }
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
            'title'=>'required|string', 

        ]);
        $lawyer_profile= LawyerProfile::find($id);
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lawyer_profile/',$image_name);
            $lawyer_profile->image=$image_name;
            
        }

        if($request->hasfile('b_image'))
        {
            $c_image = $request->file('b_image');
            $c_extensions =$c_image->extension();

            $image_c_name =time().'.'. $c_extensions;
            $c_image->move('lawyer_cover_image/',$image_c_name);
            $lawyer_profile->b_image=$image_c_name;
        }
        $lawyer_profile->title = $request->title;
        $lawyer_profile->save();
        
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
            'address'=>'required', 
            'language_id'=>'required', 
            'expertise_id'=>'required',   

        ]);
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer_profile != null)
        {
            $lawyer_profile= LawyerProfile::find($lawyer_profile->id);
            $lawyer_profile->address = $request->address;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();

            foreach($request->language_id as $language)
            {
                $lawyer_language= new LawyersHasLanguage;
                $lawyer_language->language_id = $language;
                $lawyer_language->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_language->save();
            }

            foreach($request->expertise_id as $expertise)
            {
                $lawyer_expertise = new LawyersHasExpertise;
                $lawyer_expertise->expertise_id = $expertise;
                $lawyer_expertise->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_expertise->save();
            }
        }
        else{
            $lawyer_profile= new LawyerProfile;
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->address = $request->address;
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();

            foreach($request->language_id as $language)
            {
                $lawyer_language= new LawyersHasLanguage;
                $lawyer_language->language_id = $language;
                $lawyer_language->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_language->save();
            }

            foreach($request->expertise_id as $expertise)
            {
                $lawyer_expertise = new LawyersHasExpertise;
                $lawyer_expertise->expertise_id = $expertise;
                $lawyer_expertise->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_expertise->save();
            }
            
            
        }
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }

    public function profile_update_2(Request $request,$id)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'address'=>'required',  
            'language_id'=>'required',  
            'expertise_id'=>'required',  

        ]);
        LawyersHasLanguage::where('lawyer_profile_id',$id)->delete();
        LawyersHasExpertise::where('lawyer_profile_id',$id)->delete();
        foreach($request->language_id as $language)
        {
            $lawyer_language = new LawyersHasLanguage;
            $lawyer_language->language_id = $language;
            $lawyer_language->lawyer_profile_id = $id;
            $lawyer_language->save();
        }
        foreach($request->expertise_id as $expertise)
        {
            $lawyer_expertise = new LawyersHasExpertise;
            $lawyer_expertise->expertise_id = $expertise;
            $lawyer_expertise->lawyer_profile_id = $id;
            $lawyer_expertise->save();
        }
        
        $lawyer_profile= LawyerProfile::find($id);
        $lawyer_profile->address = $request->address;
        $lawyer_profile->save();
        
        
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
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
            $lawyer_profile->user_id = $user_id;
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

    public function profile_store_4(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[  
            'education'=>'required',  

        ]);
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer_profile != null)
        {
            $lawyer_profile= LawyerProfile::find($lawyer_profile->id);
            $lawyer_profile->education = implode($request->education, ',');
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        else{
            $lawyer_profile= new LawyerProfile;
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->education = implode($request->education, ',');
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }

    public function profile_update_4(Request $request,$id)
    {
        $user_id = Auth::id();

        $this->validate($request,[  
            'education'=>'required',  

        ]);

        $lawyer_profile= LawyerProfile::find($id);
        $lawyer_profile->education = implode($request->education, ',');
        $lawyer_profile->save();
        
        toastSuccess('Successfully Updated');
        return redirect('lawyer/profile');
    }

    public function profile_store_5(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[  
            'membership'=>'required',  

        ]);
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        if($lawyer_profile != null)
        {
            $lawyer_profile= LawyerProfile::find($lawyer_profile->id);
            $lawyer_profile->membership = implode($request->membership, ',');
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        else{
            $lawyer_profile= new LawyerProfile;
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->membership = implode($request->membership, ',');
            $lawyer_profile->complete = $request->complete;
            $lawyer_profile->save();
        }
        toastSuccess('Successfully Added');
        return redirect('lawyer/profile');
    }

    public function profile_update_5(Request $request,$id)
    {
        $user_id = Auth::id();

        $this->validate($request,[  
            'membership'=>'required',  

        ]);

        $lawyer_profile= LawyerProfile::find($id);
        $lawyer_profile->membership = implode($request->membership, ',');
        $lawyer_profile->save();
        
        toastSuccess('Successfully Updated');
        return redirect('lawyer/profile');
    }

    public function submit_approval(Request $request)
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        $user= User::where('id',$user_id)->first();
        $lawyer_profile->complete = $request->complete;
        $lawyer_profile->save();
        $details = [
        'f_name' => $user->f_name,
        'email' => $user->email
        ];

        // dd($details);
   
    \Mail::to('admin@gmail.com')->send(new \App\Mail\ApprovalMail($details));

        toastSuccess('Successfully Updated');
        return redirect('lawyer/profile');
    }
}
