<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if((Auth::user()->role_id == 2 ) && (Auth::user()->status == 'active')) {
                return redirect('/home');
            }
            Auth::logout();
            Session::flush();
            $request->session()->flash('success','Thanks to registering with us. Your account will get activate with in 4 hours after verification.');
        }
            
        return $next($request);
    }
}
