<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialite = Socialite::driver('google')->stateless()->user();
        dd($socialite);

        $isUser = User::where("google_id",$socialite->id)->first();
        if (isset($isUser)) {
            Auth::login($isUser);
        } else {

            $user = new User();
            $user->name = $socialite->name;
            if (isset($socialite->email)) {
                $user->email = $socialite->email;
            }
            $user->photo = $socialite->avatar;
            $user->facebook_id = $socialite->id;
            $user->password = Hash::make(uniqid());
            $user->save();

        }

        return redirect()->route("/");



    }
}
