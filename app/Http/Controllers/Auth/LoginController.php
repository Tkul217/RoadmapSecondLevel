<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        $errors = collect();

        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            $errors = $errors->merge(['email' => 'Wrong email']);
        }

        elseif($user->password !== Hash::make($request->get('password'))) {
            $errors = $errors->merge(['password' => 'Wrong password']);
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors($errors->toArray());
    }

    public function logout(){
        Auth::logout();

        session()->regenerate();

        return redirect()->route('login');
    }
}
