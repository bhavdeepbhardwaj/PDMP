<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    public function __construct()
    {
        $user = Auth::user();

        if (Auth::check() && $user) {
            switch ($user->role_id) {
                case 1:
                    $this->redirectTo = route('superadmin.dashboard');
                    break;
                case 2:
                    $this->redirectTo = route('admin.dashboard');
                    break;
                case 3:
                    $this->redirectTo = route('manager.dashboard');
                    break;
                case 4:
                    $this->redirectTo = route('user.dashboard');
                    break;
                default:
                    $this->redirectTo = RouteServiceProvider::HOME;
                    break;
            }
        } else {
            $this->redirectTo = RouteServiceProvider::HOME;
        }

        $this->middleware('guest')->except('logout');
    }
}
