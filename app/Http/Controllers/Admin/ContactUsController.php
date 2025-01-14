<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\ContactUs;
use App\Notifications\ContactUsNotification;
use Auth;
use Notification;
use Illuminate\Support\Facades\Redirect;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;
use Yoeunes\Toastr\Facades\Toastr;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::first();
        return view('admin.contact_us.index', compact('contact_us'));
    }

    public function create()
    {
        return view('admin.contact_us.add');
    }

    public function show($id)
    {
        $contact_us = ContactUs::where('id', $id)->first();
        return view('admin.contact_us.show', compact('contact_us'));
    }

    public function edit($id)
    {
        try {
            $contact_us = ContactUs::where('id', $id)->first();
            return view('admin.contact_us.edit', compact('contact_us'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|max:18|min:11',
            'email' => 'required|email',
            'linkedin_link' => 'required|url',
            'instagram_link' => 'required|url',
            'facebook_link' => 'required|url',
            'twitter_link' => 'required|url',
        ]);

        $contact_us = new ContactUs;
        $contact_us->address = $request->address;
        $contact_us->phone = $request->phone;
        if ($request->phone_1) {
            $contact_us->phone_1 = $request->phone_1;
        }
        $contact_us->email = $request->email;
        $contact_us->linkedin_link = $request->linkedin_link;
        $contact_us->instagram_link = $request->instagram_link;
        $contact_us->facebook_link = $request->facebook_link;
        $contact_us->twitter_link = $request->twitter_link;
        $contact_us->save();
        toastSuccess('Successfully Added');
        return redirect('admin/contact_us');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|max:18|min:11',
            'email' => 'required|email',
            'linkedin_link' => 'required|url',
            'instagram_link' => 'required|url',
            'facebook_link' => 'required|url',
            'twitter_link' => 'required|url',
        ]);
        $contact_us = ContactUs::find($id);
        $contact_us->address = $request->address;
        $contact_us->phone = $request->phone;
        if ($request->phone_1) {
            $contact_us->phone_1 = $request->phone_1;
        }
        $contact_us->email = $request->email;
        $contact_us->linkedin_link = $request->linkedin_link;
        $contact_us->instagram_link = $request->instagram_link;
        $contact_us->facebook_link = $request->facebook_link;
        $contact_us->twitter_link = $request->twitter_link;
        $contact_us->save();
        toastSuccess('Successfully Update');
        return redirect('admin/contact_us');
    }

    public function destroy($id)
    {
        try {
            ContactUs::FindorFail($id)->delete();
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function notifyAdmin(Request $request){
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email",
            'phone' => "required",
            'practice' => "required",
            "message" => "required",
        ]);

        try{
            $name  = $request->first_name . " "  . $request->last_name;
            $email = $request->email;
            $phone = $request->phone;
            $practice = $request->practice;
            $message = $request->message;

            Notification::route("mail", env('CONTACT_EMAIL'))->notify(new ContactUsNotification($name, $email, $phone, $practice, $message));

            toastr()->success("Message Delivered Successfully!");
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }
}
