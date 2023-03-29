<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('1234567890')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

            public function redirectToFacebook()
            {
                return Socialite::driver('facebook')->redirect();
            }

            public function handleFacebookCallback()
            {
                try {
                
                    $user = Socialite::driver('facebook')->user();
                 
                    $finduser = User::where('facebook_id', $user->id)->first();
                
                    if($finduser){
                 
                        Auth::login($finduser);
                
                        return redirect()->intended('dashboard');
                 
                    }else{
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'facebook_id'=> $user->id,
                            'password' => encrypt('Test123456')
                        ]);
                
                        Auth::login($newUser);
                
                        return redirect()->intended('dashboard');
                    }
                
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            }





}

