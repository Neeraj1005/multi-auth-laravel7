<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
            // return redirect(RouteServiceProvider::HOME);
            //here it will check if admin/user is logged in then then pop up the login page
            if ($guard == 'admin') {
                return redirect('admin/dashboard');
            }
            else if($guard == 'user')
            {
                return redirect('user/dashboard');
            }

        }

        return $next($request);
    }
}
