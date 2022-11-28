<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeNumber;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $home_numbers=HomeNumber::get();
        return view('admin.home_number.index',compact('home_numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home_number.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'active_members'=>'required',
            'years_of_excellence'=>'required',
            'key_countries'=>'required',
            'trust_rating'=>'required',
            'areas_of_expertise'=>'required'
        ]);
        try {
            $all_inputs=$request->except('_token');
            $home_number = HomeNumber::create($all_inputs);
            Session::flash('success', 'Successfully Added');
            return redirect()->back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $home_number=HomeNumber::find($id);
            return view('admin.home_number.edit',compact('home_number'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'active_members'=>'required',
            'years_of_excellence'=>'required',
            'key_countries'=>'required',
            'trust_rating'=>'required',
            'areas_of_expertise'=>'required'
        ]);
        try{
            $all_inputs=$request->except('_token','put');
            $home_number=HomeNumber::find($id)->update($all_inputs);
            Session::flash('success', 'Successfully Updated');
            return redirect()->back();
        } catch (\Exception $exception) {
           Session::flash('error', $exception->getMessage());
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeNumber::findorfail($id)->delete();
       Session::flash('success', 'Successfully Deleted');
        return back();
    }
}
