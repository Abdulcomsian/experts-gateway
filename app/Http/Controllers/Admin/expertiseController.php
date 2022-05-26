<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use Auth;
use Illuminate\Support\Facades\Redirect;

class expertiseController extends Controller
{
    public function index()
    {
        $expertises = Expertise::get();
        return view('admin.expertise.index', compact('expertises'));
    }      

    public function create()
    {
        return view('admin.expertise.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $expertise = Expertise::where('id',$id)->first();
            return view('admin.expertise.edit', compact('expertise'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $this->validate($request,[ 
            'name'=>'required', 
            'expertise_slug'=>'required|unique:expertises,name,'.$request->id,
        ]);
        try {
        $expertise= new Expertise;
        $expertise->name = $request->name;
        $expertise->expertise_slug = $request->expertise_slug;
        $expertise->save();
            toastSuccess('Successfully Added');
            return redirect('admin/expertise');
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request,$id)
    {
         // dd($request->all(),$id);
        $this->validate($request,[ 
            'name'=>'required', 
        ]);
        $expertise= Expertise::find($id);
        $expertise->name = $request->name;
        $expertise->expertise_slug = $request->expertise_slug;
        $expertise->save();
        toastSuccess('Successfully Update');
        return redirect('admin/expertise');
        
    }

    public function destroy($id)
    {
        try {
            Expertise::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
