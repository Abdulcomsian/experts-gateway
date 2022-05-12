<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        return view('admin.dashboard.index');
    }
}
