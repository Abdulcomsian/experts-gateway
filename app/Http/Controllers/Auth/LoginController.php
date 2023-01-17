<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use App\Models\ContactUs;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    // Custom Login form
    public function showLoginForm()
    {
        $contact_us = ContactUs::first();
        return view('auth.login',compact('contact_us'));
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('Admin'))
        {
            $this->getAccessToken();
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('admin.dashboard');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('User'))
        {
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('landing-page');

            return $this->redirectTo;
        }

        elseif(Auth::user()->hasRole('Lawyer'))
        {
            $user = User::where('id',Auth::id())->first();
            $this->redirectTo = route('lawyer.profile');

            return $this->redirectTo;
        }

        // elseif(Auth::user()->hasRole('user'))
        // {
        //     $this->redirectTo = route('user.users.index');

        //     return $this->redirectTo;
        // }

        else
        {
            $this->redirectTo = route('home');

            return $this->redirectTo;

        }
    }

    public function getAccessToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://go.outseta.com/tokens',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'username={{username}}&password={{password}}',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
