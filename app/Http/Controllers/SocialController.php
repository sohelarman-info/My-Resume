<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;
use Auth;

class SocialController extends Controller
{
    function GitHubLogin(){
        return Socialite::driver('github')->redirect();
    }
    function GitHubLoginCallBack(){
        $user = Socialite::driver('github')->user();
        if (User::where('email', $user->getEmail())->exists()) {
            $get_user = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($get_user, true);
            return redirect()->to('/home');
        }else {
            $create_user = User::create([
                'name'          => $user->getName(),
                'email'         => $user->getEmail(),
                'provider_id'   => $user->getId(),
                'provider'      => 'github',
                //set app\user.php fillable 'provider_id'
            ]);
            // return $create_user;
            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }
    }
    function GoogleLogin(){
        return Socialite::driver('google')->redirect();
    }
    function GoogleLoginCallBack(){
        $user = Socialite::driver('google')->user();
        if (User::where('email', $user->getEmail())->exists()) {
            $get_user = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($get_user, true);
            return redirect()->to('/home');
        }else {
            $create_user = User::create([
                'name'          => $user->getName(),
                'email'         => $user->getEmail(),
                'provider'      => 'google',
                'provider_id'   => $user->getId(),
            ]);
            // return $create_user;
            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }

        // echo $user->getId();
        // echo $user->getNickname();
        // echo $user->getName();
        // echo $user->getEmail();
        // echo $user->getAvatar();

    }
    function FacebookLogin(){
        return Socialite::driver('facebook')->redirect();
    }
    function FacebookLoginCallBack(){
        $user = Socialite::driver('facebook')->user();
        if (User::where('email', $user->getEmail())->exists()) {
            $get_user = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($get_user, true);
            return redirect()->to('/home');
        }else {
            $create_user = User::create([
                'name'          => $user->getName(),
                'email'         => $user->getEmail(),
                'provider'      => 'facebook',
                'provider_id'   => $user->getId(),
            ]);
            // return $create_user;
            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }

        // echo $user->getId();
        // echo $user->getNickname();
        // echo $user->getName();
        // echo $user->getEmail();
        // echo $user->getAvatar();

    }
}
