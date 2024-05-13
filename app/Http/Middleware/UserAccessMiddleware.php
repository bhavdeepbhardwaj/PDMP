<?php

namespace App\Http\Middleware;

use App\Models\IconWithPanel;
use App\Models\Modules;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role_id != 0) {
            $fullurl = request()->url();
            $url = basename($fullurl);
            // dd($url);
            $moduleName = IconWithPanel::where('url',$url)->select('id')->first();
            // if(isset($moduleName)){
            //     $moduleArr[] = $moduleName->id;
            // }else{
            //     $moduleArr = [];
            // }

            $roleWiseData = Modules::where('role_id', Auth::user()->role_id)->select('module_id')->first();
            // dd($roleWiseData);
            if(isset($roleWiseData)){
                $roleWiseDataArr = array_filter(explode(',',$roleWiseData->module_id));
            }else{
                $roleWiseDataArr = [];
            }

            $userData = User::where('id',auth()->user()->id)->select('extra_module')->first();
            if(isset($userData)){
                $userDataArr = array_filter(explode(',',$userData->extra_module));
            }else{
                $userDataArr =[];
            }

            $userRoleMerge = array_merge($roleWiseDataArr,$userDataArr);
            // dd($moduleName->id);
            // dd($roleWiseDataArr,$userDataArr);
            if(in_array($moduleName->id,$userRoleMerge)){
                return $next($request);
            } else {
                abort(403,'Unauthorized Action');
            }

            // if ($moduleName && in_array($moduleName->id, $userRoleMerge)) {
            //     return $next($request);
            // } else {
            //     abort(403, 'Unauthorized Action');
            // }


            // abort(403, 'Unauthorized action.');
        } elseif (Auth::check() && Auth::user()->role_id == 0) {
            return redirect()->route('backend.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (Auth::check() && Auth::user()->role_id != 0) {
    //         $fullUrl = request()->url();
    //         $url = basename($fullUrl);

    //         // Validate URL format
    //         if (!filter_var($fullUrl, FILTER_VALIDATE_URL)) {
    //             abort(400, 'Invalid URL');
    //         }

    //         try {
    //             // Use prepared statements for better security
    //             $moduleName = IconWithPanel::where('url', $url)->select('id')->firstOrFail();
    //         } catch (\Exception $e) {
    //             abort(404, 'Resource not found');
    //         }

    //         $roleWiseData = Modules::where('role_id', Auth::user()->role_id)->select('module_id')->first();
    //         if (isset($roleWiseData)) {
    //             $roleWiseDataArr = array_filter(explode(',', $roleWiseData->module_id));
    //         } else {
    //             $roleWiseDataArr = [];
    //         }

    //         $userData = User::where('id', auth()->user()->id)->select('extra_module')->first();
    //         if (isset($userData)) {
    //             $userDataArr = array_filter(explode(',', $userData->extra_module));
    //         } else {
    //             $userDataArr = [];
    //         }

    //         $userRoleMerge = array_merge($roleWiseDataArr, $userDataArr);

    //         if (in_array($moduleName->id, $userRoleMerge)) {
    //             return $next($request);
    //         } else {
    //             abort(403, 'Unauthorized Action');
    //         }
    //     } elseif (Auth::check() && Auth::user()->role_id == 0) {
    //         return redirect()->route('backend.dashboard');
    //     } else {
    //         return redirect()->route('login');
    //     }
    // }
}
