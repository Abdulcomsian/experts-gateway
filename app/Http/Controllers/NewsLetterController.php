<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Newsletter;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class NewsLetterController extends Controller
{
    public function index()
    {
        return view('admin.news_letter.index');
    } 

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'subscriber_email'=>'required|email',

        ]);
        // dd(Newsletter::getMember('rajaatif927@gmail.com'));
        if (Newsletter::isSubscribed($request->subscriber_email)) 
        {
            return redirect()->back()->with('failure', 'Sorry! You have already subscribed ');
        }
        else
        {
            Newsletter::subscribe($request->subscriber_email);
            return redirect()->back()->with('alert', 'Thanks For Subscribe');
        }
    
    }     

}
