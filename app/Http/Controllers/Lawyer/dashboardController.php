<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

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
        return view('lawyer.profile',compact('lawyer'));
    }
}
