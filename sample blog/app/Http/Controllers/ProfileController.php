<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view("profile.edit");
    }

    public function update(Request $request)
    {
        $request->validate([
            "photo" => "required|mimes:jpg,png,jpeg",
        ]);

        $file = $request->file('photo');
        $newFileName = uniqid() . "_profile." . $file->getClientOriginalExtension();
        //        $file->move("img/","$newFileName");
        $dir = "/public/profile/";
        Storage::putFileAs($dir, $file, $newFileName);

        $user = User::find(Auth::id());
        $user->photo = $newFileName;
        $user->update();

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        Auth::logout();
        return redirect()->route("login");
    }
}
