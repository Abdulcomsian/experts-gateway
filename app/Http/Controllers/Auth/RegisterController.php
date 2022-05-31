<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ContactUs;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $contact_us = ContactUs::first();
        return view('auth.register',compact('contact_us'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['type'] == 'lawyer'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],

            ]);

        }
        else
        {
            return Validator::make($data, [
                'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'phone' => ['required'],

            ]); 
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
            if($data['type'] == 'lawyer'){
                $splitName = explode(' ', $data['name'], 2); 
                
                    $user = User::create([
                        'f_name' => $splitName['0'],
                        'l_name' => $splitName['1'],
                        'email' => $data['email'],
                        'status' => 0,
                        'password' => Hash::make($data['password']),
                    ]);

                    $user->assignRole('Lawyer'); 
                
               
            }
            else{
                $user = User::create([
                    'f_name' => $data['f_name'],
                    'l_name' => $data['l_name'],
                    'email' => $data['email'],
                    'country' => $data['country'],
                    'phone' => $data['phone_input'],
                    'status' => 1,
                    'password' => Hash::make($data['password']),
                ]);

                $user->assignRole('User');
            }

        return $user;
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('User'))
        {
            $this->redirectTo = route('landing-page');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Lawyer'))
        {
            $this->redirectTo = route('lawyer.profile');

            return $this->redirectTo;
        }

        else
        {
            $this->redirectTo = route('admin.dashboard');

            return $this->redirectTo;
        }
    }
}
