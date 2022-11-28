<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\News;
use App\Models\User;
use App\Models\Blog;
use App\Models\LawyerProfile;
use App\Models\Expertise;
use App\Models\Education;
use App\Models\Membership;
use App\Models\FixedService;
use App\Models\LawyersHasLanguage;
use App\Models\LawyersHasEducation;
use App\Models\LawyersHasMembership;
use App\Models\Country;
use App\Models\PartiseArea;
use App\Models\HomeSlider;
use App\Models\Service;
use App\Models\HomeNumber;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function landing_page()
    {
        $contact_us = ContactUs::first();
        $news = News::latest()->take(10)->get();
        $educations = Education::get();
        $PartiseArea = PartiseArea::get();
        $fixed_services = FixedService::where('status', 1)->get();
        $lawyers = User::with('lawyer_profile')->whereHas('roles', function ($q) {
            $q->where('name', 'Lawyer');
        })->where('status', 1)->get();
        $services = Service::latest()->take(10)->get();
        $countries = Country::get();
        $home_sliders = HomeSlider::get();
        $home_numbers=HomeNumber::first();
        return view('welcome', compact('home_sliders', 'services', 'contact_us', 'fixed_services', 'news', 'lawyers', 'educations', 'countries', 'PartiseArea','home_numbers'));
    }

    public function about_us()
    {
        $about_us = AboutUs::first();
        $contact_us = ContactUs::first();
        $news = News::latest()->take(10)->get();
        $services = Service::latest()->take(10)->get();
        $fixed_services = FixedService::where('status', 1)->get();
        $home_numbers=HomeNumber::first();
        return view('frontend.about_us', compact('about_us', 'contact_us', 'news', 'fixed_services', 'services','home_numbers'));
    }

    public function experts(Request $request)
    {
        $contact_us = ContactUs::first();
        $educations = Education::get();
        $PartiseArea = PartiseArea::get();
        $memberships = Membership::get();
        $news = News::latest()->take(10)->get();
        $countries = Country::get();
        if ($request->search_expert) {
            $searchparm = '';
            $lawyers = DB::table('lawyer_profiles')
                ->leftJoin('users', 'lawyer_profiles.user_id', '=', 'users.id')
                ->leftJoin('partise_areas', 'lawyer_profiles.partise_area', '=', 'lawyer_profiles.id')
                ->select('lawyer_profiles.*', 'users.f_name as f_name', 'users.l_name as l_name', 'partise_areas.name as practicename')
                ->where('lawyer_profiles.partise_area', $request->search_expert)
                ->where('lawyer_profiles.country', $request->country)
                ->get();
            return view('frontend.experts', compact('contact_us', 'news', 'lawyers', 'educations', 'memberships', 'searchparm', 'countries', 'PartiseArea'));
        } else {
            $lawyers = User::with('lawyer_profile')->whereHas('roles', function ($q) {
                $q->where('name', 'Lawyer');
            })->where('status', 1)->get();
            return view('frontend.experts', compact('contact_us', 'news', 'lawyers', 'educations', 'memberships', 'countries', 'PartiseArea'));
        }

    }

    public function contact_us()
    {
        $contact_us = ContactUs::first();
        return view('frontend.contact_us', compact('contact_us'));
    }

    public function services()
    {
        $services = FixedService::where('status', 1)->get();
        $expertises = Expertise::get();
        return view('frontend.services', compact('services', 'expertises'));
    }

    public function service_detail($id)
    {
        $service = Service::find($id);
        return view('frontend.service-detail', compact('service'));
    }

    public function search(Request $request)
    {
        $data = '';
        $search = $request->get('search');
        if ($search != '') {
            $data = DB::table('fixed_services')
                ->where('expertise_id', $search)
                ->get();
        } else // if you want to show all the data
        {
            $data = DB::table('categories')
                ->orderBy('title', 'asc')
                ->get();
        }
        return json_encode($data);
    }

    public function search_expert(Request $request)
    {
        $data = '';
        $search_expert = $request->get('search_expert');
        // if($search_expert != '')
        // {
        //     $expertises = DB::table('lawyers_has_expertises')
        //     // ->where('expertise_id','like','%' .$search_expert. '%')
        //     ->where('expertise_id', $search_expert)
        //     ->get();
        //     foreach($expertises as $expertise)
        //     {
        //        $data = DB::table('lawyer_profiles')->where('id',$expertise->lawyer_profile_id)->get();
        //     }
        // }
        // else
        // // if you want to show all the data
        // {
        //     $data = DB::table('categories')
        //     ->orderBy('title','asc')
        //     ->get();
        // }

        // $data = DB::table('lawyers_has_expertises')
        //     ->leftJoin('lawyer_profiles', 'lawyer_profiles.id', '=', 'lawyers_has_expertises.lawyer_profile_id')
        //     ->select('lawyer_profiles.*')
        //     ->where('lawyers_has_expertises.expertise_id',$search_expert)
        //     ->get();
        //     dd($data);

        // $data = DB::table('lawyers_has_expertises')
        //    ->leftJoin('lawyer_profiles', 'lawyer_profiles.id', '=', 'lawyers_has_expertises.lawyer_profile_id')
        //    ->leftJoin('users', 'lawyer_profiles.user_id', '=', 'users.id')
        //    ->leftJoin('expertises', 'lawyers_has_expertises.expertise_id', '=', 'expertises.id')
        //    ->select('lawyer_profiles.*','users.f_name as f_name','users.l_name as l_name','expertises.name as expertises_name')
        //    ->where('lawyers_has_expertises.expertise_id',$search_expert)
        //    ->where('users.id','lawyer_profiles.user_id')
        //    ->get();

        $data = DB::table('lawyers_has_educations')
            ->leftJoin('lawyer_profiles', 'lawyer_profiles.id', '=', 'lawyers_has_educations.lawyer_profile_id')
            ->leftJoin('users', 'lawyer_profiles.user_id', '=', 'users.id')
            ->leftJoin('education', 'lawyers_has_educations.education_id', '=', 'education.id')
            ->select('lawyer_profiles.*', 'users.f_name as f_name', 'users.l_name as l_name', 'education.education_name as education_name')
            ->where('lawyers_has_educations.education_id', $search_expert)
            //->where('users.id','lawyer_profiles.user_id')
            ->get();
        return json_encode($data);
    }

    public function expert_detail($id)
    {
        $lawyer_profile = LawyerProfile::find($id);
        $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id', $lawyer_profile->id)->get();
        $lawyer_educations = LawyersHasEducation::where('lawyer_profile_id', $lawyer_profile->id)->get();
        $lawyer_memberships = LawyersHasMembership::where('lawyer_profile_id', $lawyer_profile->id)->get();
        $blogs = Blog::where('user_id', $lawyer_profile->user_id)->where('status', 1)->get();
        $fixed_services = FixedService::where('user_id', $lawyer_profile->user_id)->where('status', 1)->get();
        return view('frontend.expert_detail', compact('lawyer_profile', 'lawyer_language', 'blogs', 'fixed_services', 'lawyer_educations', 'lawyer_memberships'));
    }

    public function lawyer_login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => "password1",
        ];

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::attempt($credentials)) {
                return true;
            }
        } else {
            $lawyerRole = DB::table('roles')->where('name','Lawyer')->first();
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make('password1');
            $user->status = 0;
            $user->f_name=$request->f_name;
            $user->l_name=$request->l_name;
            $user->assignRole($lawyerRole->name);
            if($user->save())
            {
                $checkPracticarea=PartiseArea::where('name',$request->partise_area)->first();
                if($checkPracticarea)
                {
                    LawyerProfile::where('user_id',$user->id)->update(['partise_area'=>$checkPracticarea->id]);
                }
                
                $reg_credentials = [
                    'email' => $request->email,
                    'password' => "password1",
                ];
                if (Auth::attempt($reg_credentials)) {
                    return true;
                }
            }
        }
//        if (Auth::attempt($credentials)) {
//            return true;
//        }
        return false;
    }

    public function loader()
    {
        $contact_us = ContactUs::first();
        $news = News::latest()->take(10)->get();
        $educations = Education::get();
        $PartiseArea = PartiseArea::get();
        $fixed_services = FixedService::where('status', 1)->get();
        $lawyers = User::with('lawyer_profile')->whereHas('roles', function ($q) {
            $q->where('name', 'Lawyer');
        })->where('status', 1)->get();
        $services = Service::latest()->take(10)->get();
        $countries = Country::get();
        $home_sliders = HomeSlider::get();
        return view('loader', compact('home_sliders', 'services', 'contact_us', 'fixed_services', 'news', 'lawyers', 'educations', 'countries', 'PartiseArea'));
    }


    //thank you after successfull regsiter
    public function ThankYou()
    {
        return view('thankyou');
    }

   
}
