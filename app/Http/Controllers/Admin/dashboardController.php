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
            $blog = Blog::where('id',$id)->first();
            return view('admin.blog.show_blog', compact('blog'));
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
   
            \Mail::to($user->email)->send(new \App\Mail\LawyerApprovedMail($details));
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
            $blog = Blog::where('id',$id)->first();
            $expertises = Expertise::get();
            return view('admin.blog.edit_blog', compact('blog','expertises'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update_lawyer_profile(Request $request,$blog)
    {
        $user_id = Auth::id();
        $this->validate($request,[ 
            'title'=>'required', 
            'short_description'=>'required', 
            'expertise_id'=>'required', 
            'description'=>'required', 

        ]);
        try {
        $blog= Blog::find($blog);
        $blog->title = $request->title;
        $blog->expertise_id = $request->expertise_id;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('blogs/',$image_name);
            $blog->image=$image_name;
        }
        $blog->save();
        toastSuccess('Successfully Updated');
        return redirect('admin/blogs');
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
