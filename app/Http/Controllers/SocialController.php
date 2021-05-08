<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Socialite;
use Exception;
use Auth;
use App\User;
use DB;
use Log;

class SocialController extends Controller
{
    /* facebook page redirect function */

    public function redirectToFacebook() {

        return Socialite::driver('facebook')->redirect();
        \Log::info('socialite driver error');
    }

/* facebook login user create and check existence of user */

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $existUser = User::where('email',$user->getEmail())->first();
            if(!empty($existUser)) {
                Auth::loginUsingId($existUser->id);
            }else {
                $userModel = new User;
                $userModel->name = $user->getName();
                $userModel->role_id = '2';
                $userModel->email =  $user->getEmail();
                $userModel->password = bcrypt('12345678');
                $userModel->facebook_id = $user->getId();
                $createdUser = $userModel->save();
                $lastId = \DB::getPdo()->lastInsertId();
                Auth::loginUsingId($lastId);
            }
            return Redirect::to('/home');
        }catch (Exception $e) {
            return 'error';
        }
    }

/* google page redirect function */

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

/* google login user create and check existence of user */
    public function handleGoogleCallback() {
        
        try {
            $googleUser = Socialite::driver('google')->user();
            //dd($googleUser);
            $existUser = User::where('email',$googleUser->email)->first();
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->role_id = '2';
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = bcrypt('12345678');
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return Redirect::to('/home');
        } 
        catch (Exception $e) {
            return 'error';    
        }
    }

}
