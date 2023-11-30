<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(){
        try {
            $usergoogle=Socialite::driver('google')->user();
            $user=User::where('google_id',$google_user->getId())->first();
            if(!$user){
                $new_user=User::create([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'google_id'=>$google_user->getId()

                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }
            else{
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
