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
use App\Models\LawyersHasEducation;
use App\Models\Education;
use App\Models\Membership;
use App\Models\Country;  
use App\Models\State;  
use App\Models\City;  
use App\Models\LawyersHasMembership;
use App\Models\LawyersHasLanguage;
use Validator;
use App\Mail\ApprovalMail;
use App\Mail\LawyerApprovedMAil;
use App\Models\Blog;
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
        $educations = Education::get();
        $memberships = Membership::get();
        $states = State::get();
        $lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
        $lawyer_language =null;
        $lawyer_educations =null;
        $lawyer_memberships =null;
        $countries = Country::get();
        $city = null;
        if($lawyer_profile)
        {
            $city = City::where('id',$lawyer_profile->city)->first();
            $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',$lawyer_profile->id)->get();
            $lawyer_educations = LawyersHasEducation::where('lawyer_profile_id',$lawyer_profile->id)->get();
            $lawyer_memberships = LawyersHasMembership::where('lawyer_profile_id',$lawyer_profile->id)->get();
            if($lawyer->status == 0)
            {
               return view('lawyer.build_profile',compact('countries','lawyer','lawyer_profile','lawyer_language','lawyer_educations','lawyer_memberships','languages','educations','memberships','lawyer_profile','city','states','countries')); 
            }
            elseif($lawyer->status == 1)
            {
                $country = Country::where('id',$lawyer_profile->country)->first();
                $state = State::where('id',$lawyer_profile->state)->first();
                $city = City::where('id',$lawyer_profile->city)->first();
                return view('lawyer.profile',compact('lawyer','lawyer_profile','lawyer_language','lawyer_educations','lawyer_memberships','city','state','country'));
            }

        }
        else{
            if($lawyer->status == 0)
            {
               return view('lawyer.build_profile',compact('lawyer','countries','languages','educations','memberships','lawyer_profile','lawyer_language','lawyer_educations','lawyer_memberships','city','states','countries')); 
            }
            elseif($lawyer->status == 2)
            {
                return view('lawyer.profile',compact('lawyer'));
            }
        }
        
    }

    public function profile_store_1(Request $request)
    {
    //    dd($request->all()); 
        $messages = [
            'f_name.required' => 'Please Enter First Name',
            'l_name.required' => 'Please Enter Last Name',
            'gender.required' => 'Please Enter Gender',
            'dob.required' => 'Please Enter Date of Birth',
            'image.required' => 'Please provide a profile picture',
            'b_image.required' => 'Please provide your background image',
            'description.required' => 'Enter Description here',
        ];

        $validatorRules = [
            'f_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'image' => 'required',
            'b_image' => 'required',
            'linkedin_url' => 'required',
            'description' => 'required|max:10000',
        ];

        $validator = Validator::make($request->all(), $validatorRules, $messages);

        ### On fail returns responses ###
        if ($validator->fails()) {
            if ($validator->fails()) {
                return $this->errorResponse($validator->messages(), 422);
            }
        } else {
            $user_id = Auth::id();
            $chk_lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
            if($chk_lawyer_profile)
            {
                $lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
            }
            else{
                $lawyer_profile = new LawyerProfile;
            }
            $lawyer_profile->user_id = $user_id;
            if($chk_lawyer_profile)
            {
                if($chk_lawyer_profile->image && $chk_lawyer_profile->address)
                {
                    $lawyer_profile->complete = 2;
                }
                elseif($request->image && $chk_lawyer_profile->address){
                    $lawyer_profile->complete = 2;
                }
                elseif($chk_lawyer_profile->image && $chk_lawyer_profile->address == null){
                    $lawyer_profile->complete = 1;
                }
            }
            else{
                $lawyer_profile->complete = 1;
            }
            $lawyer_profile->linkedin_url = $request->linkedin_url;
            $lawyer_profile->description = $request->description;
            $lawyer_profile->gender = $request->gender;
            $lawyer_profile->dob = $request->dob;
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
            return response()->json(['success'=>'Profile Created Successfully','complete'=>$lawyer_profile->complete]);
        }
        
            
    }

    public function profile_store_2(Request $request)
    {
        $messages = [
            'partise_area.required' => 'Please provide your partise area',
            'address.required' => 'Please provide your address',
            'language_id.required' => 'Please provide Language',
            'membership_id.required' => 'Please provide membership',
            'education_id.required' => 'Enter Education here',
        ];

        $validatorRules = [
            'partise_area' => 'required',
            'address' => 'required',
            'language_id' => 'required',
            'membership_id' => 'required',
            'education_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $validatorRules, $messages);

        ### On fail returns responses ###
        if ($validator->fails()) {
            if ($validator->fails()) {
                return $this->errorResponse($validator->messages(), 422);
            }
        } else {
            $user_id = Auth::id();
            $chk_lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
            if($chk_lawyer_profile)
            {
                $lawyer_profile = LawyerProfile::where('user_id',$user_id)->first();
            }
            else{
                $lawyer_profile = new LawyerProfile;
            }
            $lawyer_profile->user_id = $user_id;
            $lawyer_profile->address = $request->address;
            $lawyer_profile->partise_area = $request->partise_area;
            $lawyer_profile->country = $request->country;
            $lawyer_profile->state = $request->state;
            $lawyer_profile->city = $request->city;
            if($request->secondary_partise_area)
            {
                $lawyer_profile->secondary_partise_area = $request->secondary_partise_area;
            }
            if($request->third_partise_area)
            {
                $lawyer_profile->third_partise_area = $request->third_partise_area;
            }
            if($chk_lawyer_profile)
            {
                if($chk_lawyer_profile->image && $chk_lawyer_profile->address)
                {
                    $lawyer_profile->complete = 2;
                }
                elseif($chk_lawyer_profile->image && $request->address){
                    $lawyer_profile->complete = 2;
                }
                elseif($chk_lawyer_profile->image == null && $chk_lawyer_profile->address){
                    $lawyer_profile->complete = 1;
                }
            }
            else{
                $lawyer_profile->complete = 1;
            }
            $lawyer_profile->save();

            LawyersHasLanguage::where('lawyer_profile_id',$chk_lawyer_profile->id)->delete();
            LawyersHasEducation::where('lawyer_profile_id',$chk_lawyer_profile->id)->delete();
            LawyersHasMembership::where('lawyer_profile_id',$chk_lawyer_profile->id)->delete();

            foreach($request->language_id as $language)
            {
                $lawyer_language= new LawyersHasLanguage;
                $lawyer_language->language_id = $language;
                $lawyer_language->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_language->save();
            }

            foreach($request->education_id as $education)
            {
                $lawyer_education= new LawyersHasEducation;
                $lawyer_education->education_id = $education;
                $lawyer_education->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_education->save();
            }

            foreach($request->membership_id as $membership)
            {
                $lawyer_membership= new LawyersHasMembership;
                $lawyer_membership->membership_id = $membership;
                $lawyer_membership->lawyer_profile_id = $lawyer_profile->id;
                $lawyer_membership->save();
            }

            return response()->json(['success'=>'Profile Created Successfully','complete'=>$lawyer_profile->complete]);

            
        }
    }

    
    protected function errorResponse($message = null, $code, $redirectURL = null)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => null,
            'redirectURL' => $redirectURL,
        ], $code);

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

    public function edit_profile($id)
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::find($id);
        $languages = Language::get();
        $educations = Education::get();
        $memberships = Membership::get();
        $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_educations = LawyersHasEducation::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_memberships = LawyersHasMembership::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $countries = Country::get();
        $city = City::where('id',$lawyer_profile->city)->first();
        $states = State::get();
        return view('lawyer.profile.edit_profile',compact('lawyer_profile','languages','educations','memberships','lawyer_language','lawyer_educations','lawyer_memberships','countries','city','states'));
    }

    public function update_lawyer_profile(Request $request,$id)
    {
        // dd($request->all(),$id);
        $user_id = Auth::id();
        $this->validate($request,[ 
            'f_name'=>'required', 
            'l_name'=>'required', 
            // 'title'=>'required', 
            'description'=>'required', 
            'address'=>'required', 
            // 'expertise_id'=>'required', 
            'language_id'=>'required', 
            'education_id'=>'required', 
            'membership_id'=>'required', 
            'country'=>'required', 
            'state'=>'required', 
            'city'=>'required', 

        ]);
        $lawyer= LawyerProfile::where('id',$id)->first();
        $lawyer_profile= LawyerProfile::find($id);
        // $lawyer_profile->title = $request->title;
        $lawyer_profile->description = $request->description;
        $lawyer_profile->address = $request->address;
        $lawyer_profile->country = $request->country;
        $lawyer_profile->state = $request->state;
        $lawyer_profile->city = $request->city;
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
        return redirect('lawyer/profile');
    }

    public function orders()
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        $lawyer = User::where('id',$user_id)->first();
        return view('lawyer.order.index',compact('lawyer_profile','lawyer'));
    }

    public function earning()
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        $lawyer = User::where('id',$user_id)->first();
        return view('lawyer.earning',compact('lawyer_profile','lawyer'));   
    }

    public function public_question()
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        $lawyer = User::where('id',$user_id)->first();
        return view('lawyer.public_question',compact('lawyer_profile','lawyer'));   
    }

    public function insights()
    {
        $user_id = Auth::id();
        $lawyer_profile= LawyerProfile::where('user_id',$user_id)->first();
        $lawyer = User::where('id',$user_id)->orderBy('id','DESC')->first();
        $latest_blog = Blog::where('user_id',$lawyer->id)->first();
        if($latest_blog)
        {
            $blogs = Blog::where('user_id',$lawyer->id)->Where('id', '!=', $latest_blog->id)->get();
        }
        else
        {
            $blogs = 0;
        }
        return view('lawyer.insights',compact('lawyer_profile','lawyer','blogs','latest_blog'));   
    }
}
