<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;


class LinkedinController extends Controller
{
    
        // $splitName = explode(' ', $data['name'], 2);
        //     'f_name' => $splitName[0],
        //     'l_name' => $splitName[1] ?? '',

        public function linkedinRedirect()
        {
            return Socialite::driver('linkedin')->redirect();
        }
           
        public function linkedinCallback()
        {
            try {
         
                $user = Socialite::driver('linkedin')->user();
                dd($user);
                $splitName = explode(' ', $user->name, 2);
                dd($splitName);
                $linkedinUser = User::where('oauth_id', $user->id)->first();
          
                if($linkedinUser){
          
                    Auth::login($linkedinUser);
         
                    return redirect('/lawyer/profile');
          
                }else{
                    $user = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'oauth_id' => $user->id,
                        'oauth_type' => 'linkedin',
                        'password' => encrypt('admin12345')
                    ]);
         
                    Auth::login($user);
          
                    return redirect('/lawyer/profile');
                }
         
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }     
}
