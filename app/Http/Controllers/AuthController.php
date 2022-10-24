<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:6|max:30|string',
            'username' => 'required|min:4|max:20|unique:users|alpha_dash',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'repeat_password' => 'required|same:password',
        ]);

        $validatedData = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($validatedData);

        return redirect(route('login'))->with('success', 'Berhasil registrasi, <strong>Silahkan login!</strong>');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $remember = ($request->has('remember')) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = User::where('email', $request->email)->first();
            Auth::login($user, $remember);

            return redirect()->route('admin')->with('success', "<strong>Selamat datang $user->username</strong>, Anda berhasil login!");
        }

        return redirect()->route('login')->with('error', '<strong>Oppss!</strong> Email atau password salah.');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', "<strong>Anda berhasil logout!</strong>");
    }
}
