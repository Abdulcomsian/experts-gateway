<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;use App\Models\Language;
use Auth;
use Illuminate\Support\Facades\Redirect;

class languageController extends Controller
{
    public function index()
    {
        $languages = Language::get();
        return view('admin.language.index', compact('languages'));
    }      

    public function create()
    {
        return view('admin.language.add');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $language = Language::where('id',$id)->first();
            return view('admin.language.edit', compact('language'));
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
            'language_slug'=>'required|unique:languages,name,'.$request->id,
        ]);
        try {
        $language= new Language;
        $language->name = $request->name;
        $language->language_slug = $request->language_slug;
        $language->save();
            toastSuccess('Successfully Added');
            return redirect('admin/language');
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request,[ 
            'name'=>'required', 
        ]);
        try {
        $language= Language::find($request->language_id);
        $language->name = $request->name;
        $language->language_slug = $request->language_slug;
        $language->save();
        toastSuccess('Successfully Update');
        return redirect('admin/language');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            Language::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
