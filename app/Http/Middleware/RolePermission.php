<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\IconWithPanel;
use App\Models\Modules;
use Illuminate\Support\Facades\Auth;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $roleId[] = Auth::user()->role_id;
            $url = $request->segment(2);

            // Find the module associated with the current URL segment
            $getModule = IconWithPanel::where('url', $url)->first();

            // dd(Auth::user()->extra_module);
            if(Auth::user()->extra_module != 0){
                $expExtraMod = explode(',',Auth::user()->extra_module);
                // dd($expExtraMod);
                $roleId = array_merge($roleId,$expExtraMod);
                // dd($moduleIdArr);
            }

            if (isset($getModule)) {
                // Check if the user's role has permission to access this module
                $moduleCheck = Modules::whereIn('role_id', $roleId)
                    ->whereRaw('FIND_IN_SET("' . $getModule->id . '", module_id)')
                    ->get();

                if (isset($moduleCheck)) {
                    return $next($request);
                }
            }
        }

        // Unauthorized access, return a 403 response
        return abort(403, 'Unauthorized access');
    }
}
