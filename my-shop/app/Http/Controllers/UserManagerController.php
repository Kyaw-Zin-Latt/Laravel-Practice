<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagerController extends Controller
{
    public function index() {
        $users = User::all();
        return view("user-manager.index",compact("users"));
    }

    public function changeAdmin(Request $request) {
        $user = User::find($request->id);
        $user->role = "0";
        $user->update();
        return redirect()->route("user-manager.index")->with("toast",["title"=>"Role Updated","icon"=>"success"]);
    }

    public function toBan(Request $request) {
        $user = User::find($request->id);
        $user->isBaned = "1";
        $user->update();
        return redirect()->route("user-manager.index")->with("toast",["title"=>"$user->name is Baned","icon"=>"success"]);
    }

    public function toUnBan(Request $request) {
        $user = User::find($request->id);
        $user->isBaned = "0";
        $user->update();
        return redirect()->route("user-manager.index")->with("toast",["title"=>"$user->name is UnBaned","icon"=>"success"]);
    }

    public function changePassword(Request $request) {
        $validator = Validator::make($request->all(),[
            "password" => "required|min:8|String",
        ]);

        if ($validator->fails()) {
            return response()->json(["status"=>422,"message"=>$validator->errors()]);
        }

        $currentUser = User::find($request->id);
        $currentUser->password = Hash::make($request->password);
        $currentUser->update();

        return response()->json(["status"=>200,"message"=>"Password Change for $currentUser->name is complete."]);
    }
}
