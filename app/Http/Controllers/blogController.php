<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\Expertise;
use Illuminate\Support\Facades\Redirect;

class blogController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index',compact('blogs'));
    }

    public function show($id)
    {
        try {
            $blog = Blog::where('id',$id)->first();
            return view('admin.blog.show_blog', compact('blog'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function create(Request $request)
    {
            $user_id = Auth::id();
            $lawyer = User::where('id',$user_id)->first();
            $expertises = Expertise::get();
            $blogs = Blog::where('user_id',$user_id)->get();
            return view('blogs.add_blog', compact('lawyer','expertises','blogs'));

    }
    //admin create blog
    public function create_blog()
    {
            $user_id = Auth::id();
            $expertises = Expertise::get();
            return view('admin.blog.create_blog', compact('expertises'));
    }
    //admin save blog
    public function save_blog(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[
            'image'=>'required',
            'title'=>'required',
            'short_description'=>'required',
            'expertise_id'=>'required',
            'description'=>'required',
        ]);
        $blog= new Blog;
        $blog->title = $request->title;
        $blog->user_id = $user_id;
        $blog->expertise_id = $request->expertise_id;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move(public_path('blogs/'),$image_name);
            $blog->image=$image_name;
        }
        $blog->status=1;
        $blog->save();
        toastSuccess('Successfully Added');
        return redirect('admin/blogs');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[
            'image'=>'required',
            'title'=>'required',
            'short_description'=>'required',
            'expertise_id'=>'required',
            'description'=>'required',
            //'short_description'=>'required',

        ]);
        $blog= new Blog;
        $blog->title = $request->title;
        $blog->user_id = $user_id;
        $blog->expertise_id = $request->expertise_id;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move(public_path('blogs/'),$image_name);
            $blog->image=$image_name;
        }
        $blog->save();
        toastSuccess('Successfully Added');
        return redirect('lawyer/create');
    }

    public function blog($id)
    {
        $user_id = Auth::id();
        $blog = Blog::where('id',$id)->first();

        $lawyer = User::where('id',$user_id)->first();
        return view('lawyer.blog', compact('blog','lawyer'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        $contact_us = ContactUs::first();
        return view('user.blogs', compact('blogs','contact_us'));
    }

    public function client_blog($id)
    {
        $blog = Blog::where('id',$id)->first();
        $contact_us = ContactUs::first();
        return view('user.client_blog', compact('blog','contact_us'));
    }

    public function update_blog_status(Request $request,$id)
    {
        // dd($id);
        try {
        $blog= Blog::find($id);
        $blog->status = $request->status;
        $blog->save();
        toastSuccess('Successfully Update Status');
        return redirect('admin/blogs');

        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
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

    public function update(Request $request,$blog)
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
            $image->move(public_path('blogs/'),$image_name);
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

    public function destroy(Request $request , $id)
    {
        $blog = Blog::findorfail($id);
        // Blog::FindorFail($id)->delete();
        if($blog->image)
        {
            $filePath = public_path("blogs").'/' . $blog->image;
            @unlink($filePath);
        }
        $blog->delete();
        toastr()->success('Successfully Deleted');
        return back();


    }


}
