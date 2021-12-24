<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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

        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/')->with('status','Access Denied! as you are not as admin');
            }
        }else {
            return redirect('/login')->with('status','Please Login First');
        }
    }
}
