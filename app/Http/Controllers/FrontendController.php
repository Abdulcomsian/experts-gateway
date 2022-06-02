<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\News;
use App\Models\User;
use App\Models\Blog;
use App\Models\LawyerProfile;
use App\Models\Expertise;
use App\Models\FixedService;
use App\Models\LawyersHasLanguage;
use App\Models\LawyersHasExpertise;
use Spatie\Permission\Models\Role;
use DB;

class FrontendController extends Controller
{
    public function landing_page()
    {
        $contact_us = ContactUs::first();
        $news = News::latest()->take(10)->get();
        $fixed_services = FixedService::where('status',1)->get();
        $lawyers = User::whereHas('roles', function($q){ $q->where('name', 'Lawyer'); } )->where('status',1)->get();
        return view('welcome' , compact('contact_us','fixed_services','news','lawyers'));
    }

    public function experts()
    {
        $contact_us = ContactUs::first();
        $expertises = Expertise::get();
        $news = News::latest()->take(10)->get();
        $lawyers = User::whereHas('roles', function($q){ $q->where('name', 'Lawyer'); } )->where('status',1)->get();
        return view('frontend.experts' , compact('contact_us','news','lawyers','expertises'));
    }

    public function contact_us()
    {
        $contact_us = ContactUs::first();
        return view('frontend.contact_us' , compact('contact_us'));
    } 

    public function services()
    {
        $services = FixedService::where('status',1)->get();
        $expertises = Expertise::get();
        return view('frontend.services' , compact('services','expertises'));
    }  

    public function search(Request $request)
    {
        $data = '';
        $search = $request->get('search');
        if($search != '')
        {
            $data = DB::table('fixed_services')
            ->where('expertise_id','like','%' .$search. '%')
            ->get();
        }
        else
        // if you want to show all the data
        {
            $data = DB::table('categories')
            ->orderBy('title','asc')
            ->get();
        }
        return json_encode($data);
    }

    public function search_expert(Request $request)
    {
        $data = '';
        $search_expert = $request->get('search_expert');
        if($search != '')
        {
            $data = DB::table('fixed_services')
            ->where('expertise_id','like','%' .$search. '%')
            ->get();
        }
        else
        // if you want to show all the data
        {
            $data = DB::table('categories')
            ->orderBy('title','asc')
            ->get();
        }
        return json_encode($data);
    }

    public function expert_detail($id)
    {
        $lawyer_profile = LawyerProfile::find($id);
        $lawyer_language = LawyersHasLanguage::with('language')->where('lawyer_profile_id',$lawyer_profile->id)->get();
        $lawyer_expertises = LawyersHasExpertise::where('lawyer_profile_id',$lawyer_profile->id)->get();
        $blogs=Blog::where('user_id',$lawyer_profile->user_id)->where('status',1)->get();
        $fixed_services = FixedService::where('user_id',$lawyer_profile->user_id)->where('status',1)->get();
        return view('frontend.expert_detail' , compact('lawyer_profile','lawyer_language','lawyer_expertises','blogs','fixed_services'));
    } 
}
