<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        dd($request->all());
    }

    protected function authenticated($request, $user)
    {


        if (auth::check() && Auth::user()->role_id != 0) {
            $this->redirectTo = route('backend.dashboard');
        } else if (auth::check() && Auth::user()->role_id == 0) {
            return redirect()->route('');
        } else {
            return redirect()->route('login');
        }


        // switch ($user->role_id) {
        //     case 1:
        //         $this->redirectTo = route('superadmin.dashboard');
        //         break;
        //     case 2:
        //         $this->redirectTo = route('admin.dashboard');
        //         break;
        //     case 3:
        //         $this->redirectTo = route('manager.dashboard');
        //         break;
        //     case 4:
        //         $this->redirectTo = route('user.dashboard');
        //         break;
        //     default:
        //         $this->redirectTo = RouteServiceProvider::HOME;
        //         break;
        // }
    }
}
