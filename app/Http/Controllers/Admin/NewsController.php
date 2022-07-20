<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $news = News::get();
        return view('admin.news.index', compact('news'));
    }      

    public function create()
    {
        return view('admin.news.add');
    }

    public function show($id)
    {
        $new = News::find($id);
        return view('admin.news.show', compact('new'));
    }

    public function store(Request $request)
    {
           // dd($request->all());
        $user_id = Auth::id();
        $this->validate($request,[  
            'title'=>'required', 
            'description'=>'required',    
            'image'=>'required',    

        ]);

        $new= new News;
        $new->title = $request->title;
        $new->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move(public_path('news/'),$image_name);
            $new->image=$image_name;
        }
        $new->save();

        toastSuccess('Successfully Added');
        return redirect('admin/news');
    }

    public function edit($id)
    {
        $new = News::find($id);
        return view('admin.news.edit', compact('new'));
    }

    public function update(Request $request,$id)
    {
          // dd($request->all(),$id);
        $user_id = Auth::id();
        $this->validate($request,[  
            'title'=>'required', 
            'description'=>'required',    

        ]);

        $new= News::find($id);
        $new->title = $request->title;
        $new->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move(public_path('news/'),$image_name);
            $new->image=$image_name;
        }
        $new->save();

        toastSuccess('Successfully Added');
        return redirect('admin/news');
    }

    public function destroy($id)
    {
        try {
            News::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
