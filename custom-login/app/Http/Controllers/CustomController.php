<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    public function login() {
        return view("login");
    }

    public function loginAccount(Request $request) {

        $name = $request->name;
        if (is_numeric($name)) {
            if (Auth::attempt(['phone' => $request->name, 'password' => $request->password])) {
                // Authentication passed...
                return redirect()->route('home');
            }
        } else {
            if (Auth::attempt(['email' => $request->name, 'password' => $request->password])) {
                // Authentication passed...
                return redirect()->route('home');
            }
        }


        return $request;
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
