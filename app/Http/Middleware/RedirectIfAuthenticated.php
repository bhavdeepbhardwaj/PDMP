<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if($user->role_id != 0){
                return redirect()->route('backend.dashboard');
            }else{
                return redirect()->route('home');
            }
            // switch ($user->role_id) {
            //     case 1:
            //         return redirect()->route('superadmin.dashboard');
            //     case 2:
            //         return redirect()->route('admin.dashboard');
            //     case 3:
            //         return redirect()->route('manager.dashboard');
            //     case 4:
            //         return redirect()->route('user.dashboard');
            //     default:
            //         // Redirect to the default home route if the user's role is not recognized.
            //         return redirect()->route('home');
            // }
        }

        return $next($request);
    }
}
