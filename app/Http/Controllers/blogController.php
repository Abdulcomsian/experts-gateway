<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;

class blogController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $blogs = Blog::get();
        return view('blogs.index',compact('blogs'));
    }
}
