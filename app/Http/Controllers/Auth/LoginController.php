<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function authenticated(Request $request, $user)
    {
        if ($user->akses == 'admin') {
            return redirect()->route('Admin.beranda');
        } elseif ($user->akses == 'pns') {
            return redirect()->route('Pns.beranda');
        } else {
            Auth::logout();
            flash('Anda tidak memiliki hak akses')->error();
            return redirect()->route('login');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login_sneat');
    }
    
}
