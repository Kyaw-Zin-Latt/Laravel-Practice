<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isBaned == 1){
            Auth::logout();
            return redirect()->route("login")->with("toast",["icon"=>"error","title"=>"You are Baned"]);
        }
        return $next($request);
    }
}
