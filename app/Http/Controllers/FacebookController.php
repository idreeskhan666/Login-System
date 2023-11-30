<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class FacebookController extends Controller
{
    public function facebookpage(){

        return socialite::driver('facebook')->redirect();
    }
    public function facebookredirect(){
      try{

        $user=socialite::driver('facebook')->user();
        $finduser=user::where('facebook_id,$user->id')->first();
        if($finduser){
            Auth::login($finduser);
            return redirect()->intended('dashboard');
        }
        else{
            $newUser=User::updateOrCreate(['email'->$user->email],
            [
                'name'->$user->name,
                'facebook_id'->$user->id,
                'password'->encrypt('123456dummy'),
            ]);
            Auth::login($newUser);
            return redirect()->intended('dashboard');
        }
        } catch(Exception $e){
            dd($e->getmessage());
        }
    }
    }



