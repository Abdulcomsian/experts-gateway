<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Expertise;
use App\Models\Language;
use App\Models\LawyerProfile;
use App\Models\LawyersHasEducation;
use App\Models\Education;
use App\Models\Membership;
use App\Models\LawyersHasMembership;
use App\Models\LawyersHasExpertise;
use App\Models\LawyersHasLanguage;
use App\Mail\LawyerApprovedMAil;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class dashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        return view('admin.dashboard.index');
    }

    public function lawyer_applications()
    {
        $user_id = Auth::id();
        $lawyer_profiles = LawyerProfile::where('complete','2')->get();
        return view('admin.lawyer.lawyer_applications',compact('lawyer_profiles'));
    }

    public function users()
    {
        $user_id = Auth::id();
        $users = Role::where('name', 'User')->first()->users()->get();
        return view('admin.user.index',compact('users'));
    }

    public function lawyer_profile_show($id)
    {
        // dd($id);
        $lawyer_profile = LawyerProfile::where('user_id',$id)->first();
        $user = user::where('id',$lawyer_profile->user_id)->first();
        $languages = Language::get();
        $educations = Education::get();
        $memberships = Membership::get();
        $lawyer_educations = LawyersHasEducation::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_memberships = LawyersHasMembership::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',$lawyer_profile->id)->get();
        return view('admin.lawyer.show', compact('lawyer_profile','languages','lawyer_language','lawyer_educations','lawyer_memberships'));
        
    }

    public function update_lawyer_status(Request $request,$id)
    {
        try {
        $user= User::find($id);
        $user->status = $request->status;
        $user->save();
        if($user->status == 1)
        {
            $details = [
            'f_name' => $user->f_name,
            'email' => $user->email
            ];

            // dd($details);
   
            Mail::to($user->email)->send(new LawyerApprovedMAil($details));
        }
        toastSuccess('Successfully Update Status');
        return redirect('admin/lawyer_applications');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit_lawyer_profile($id)
    {
        $lawyer_profile = LawyerProfile::where('user_id',$id)->first();
        $user = user::where('id',$lawyer_profile->user_id)->first();
        $languages = Language::get();
        $educations = Education::get();
        $memberships = Membership::get();
        $lawyer_educations = LawyersHasEducation::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_memberships = LawyersHasMembership::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',$lawyer_profile->id)->get();
        return view('admin.lawyer.edit', compact('lawyer_profile','user','lawyer_language','languages','educations','memberships','lawyer_educations','lawyer_memberships'));
        
    }

    public function update_lawyer_profile(Request $request,$id)
    {
        $user_id = Auth::id();
        $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            // 'title'=>'required', 
            'description'=>'required', 
            'address'=>'required', 
            'education_id'=>'required', 
            'language_id'=>'required', 
            'membership_id'=>'required', 

        ]);
        $lawyer= LawyerProfile::where('id',$id)->first();
        $lawyer_profile= LawyerProfile::find($id);
        // $lawyer_profile->title = $request->title;
        $lawyer_profile->description = $request->description;
        $lawyer_profile->address = $request->address;
        // $lawyer_profile->education = implode($request->education, ',');
        // $lawyer_profile->membership = implode($request->membership, ',');
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

        $user= User::where('id',$lawyer->user_id)->first();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->save();
        LawyersHasLanguage::where('lawyer_profile_id',$id)->delete();
        LawyersHasEducation::where('lawyer_profile_id',$id)->delete();
        LawyersHasMembership::where('lawyer_profile_id',$id)->delete();
        
        foreach($request->language_id as $language)
        {
            $lawyer_language = new LawyersHasLanguage;
            $lawyer_language->language_id = $language;
            $lawyer_language->lawyer_profile_id = $lawyer->id;
            $lawyer_language->save();
        }

        foreach($request->education_id as $education)
        {
            $lawyer_education = new LawyersHasEducation;
            $lawyer_education->education_id = $education;
            $lawyer_education->lawyer_profile_id = $lawyer->id;
            $lawyer_education->save();
        }

        foreach($request->membership_id as $membership)
        {
            $lawyer_membership = new LawyersHasMembership;
            $lawyer_membership->membership_id = $membership;
            $lawyer_membership->lawyer_profile_id = $lawyer->id;
            $lawyer_membership->save();
        }

        toastSuccess('Successfully Updated');
        return Redirect::back();
    }

    public function edit_user($id)
    {
        $user = user::where('id',$id)->first();
        return view('admin.user.edit', compact('user'));
        
    }

    public function update_user(Request $request,$id)
    {
        $user_id = Auth::id();
        if($request->phone_input != null)
        {
           $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            'email'=>'required', 
            'phone'=>'required', 
            'phone_input'=>'required', 
            'country'=>'required', 

        ]); 
        }
        else
        {
            $this->validate($request,[ 
                'f_name'=>'required', 
                'l_name'=>'required', 
                'email'=>'required', 

            ]);
        }
        if($request->phone_input != null)
        {
            $user= User::find($id);
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            $user->phone = $request->phone_input;
            $user->country = $request->country;
            
            $user->save();
        }
        else
        {
            $user= User::find($id);
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            
            $user->save();
        }


        toastSuccess('Successfully Updated');
        return redirect('admin/users');
    }

    public function show_user($id)
    {
        // dd($id);
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
        
    }
}
