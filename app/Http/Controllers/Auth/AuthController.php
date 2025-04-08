<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required', 'password' => 'required']);

        if (Auth::attempt($credentials)) {
            return match (Auth::user()->role) {
                'admin' => redirect('/admin')->with('status', 'Selamat datang ' . Auth::user()->name),
                'tasker' => redirect('/tasker')->with('status', 'Selamat datang ' . Auth::user()->name),
                'worker' => redirect('/worker')->with('status', 'Selamat datang ' . Auth::user()->name),
            };
        }
        return back()->with('error', 'Login gagal!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
