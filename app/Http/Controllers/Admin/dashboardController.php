<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\LawyersHasMembership;
use App\Models\Membership;
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
        $lawyer_profiles = LawyerProfile::where('complete','6')->get();
        return view('admin.lawyer.lawyer_applications',compact('lawyer_profiles'));
    }

    public function lawyer_profile_show($id)
    {
        try {
            $lawyer_profile = LawyerProfile::where('id',$id)->first();
            return view('admin.lawyer_profile.show', compact('lawyer_profile'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
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
        try {
            $lawyer_profile = LawyerProfile::where('id',$id)->first();
            $user = user::where('id',$lawyer_profile->user_id)->first();
            $languages = Language::get();
            $expertises = Expertise::get();
            $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',1)->get();
            $lawyer_expertises = LawyersHasExpertise::where('lawyer_profile_id',$lawyer_profile->id)->get();
            return view('admin.lawyer.edit', compact('lawyer_profile','user','lawyer_expertises','lawyer_language','languages','expertises'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update_lawyer_profile(Request $request,$id)
    {
        $user_id = Auth::id();
        $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            'title'=>'required', 
            'profile_detail'=>'required', 
            'address'=>'required', 
            'expertise_id'=>'required', 
            'language_id'=>'required', 
            'education'=>'required', 
            'membership'=>'required', 

        ]);
        $lawyer= LawyerProfile::where('id',$id)->first();
        $lawyer_profile= LawyerProfile::find($id);
        $lawyer_profile->title = $request->title;
        $lawyer_profile->profile_detail = $request->profile_detail;
        $lawyer_profile->address = $request->address;
        $lawyer_profile->education = implode($request->education, ',');
        $lawyer_profile->membership = implode($request->membership, ',');
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
        LawyersHasExpertise::where('lawyer_profile_id',$id)->delete();
        
        foreach($request->language_id as $language)
        {
            $lawyer_language = new LawyersHasLanguage;
            $lawyer_language->language_id = $language;
            $lawyer_language->lawyer_profile_id = $lawyer->id;
            $lawyer_language->save();
        }
        foreach($request->expertise_id as $expertise)
        {
            $lawyer_expertise = new LawyersHasExpertise;
            $lawyer_expertise->expertise_id = $expertise;
            $lawyer_expertise->lawyer_profile_id = $lawyer->id;
            $lawyer_expertise->save();
        }

        toastSuccess('Successfully Updated');
        return Redirect::back();
    }
}
