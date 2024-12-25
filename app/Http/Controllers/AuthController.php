<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|max:12|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('login.index')->with('success', 'Selamat anda berhasil mendaftar');
    }

    // login
    public function authenticate(Request $request)
    {
        // remember akan masuk ke remember_token
        $remember = $request->has('remember');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $remember)) {
            // regenerate session (di _token) untuk menghindari Session Fixation
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'Selamat anda berhasil masuk');
        }

        return redirect()->back()->with('error', 'Gagal Login')->withInput();
    }

    // logout
    public function logout(Request $request)
    {
        // ganti token remember token
        Auth::user()->setRememberToken(Str::random(60));

        // hapus autentikasi
        Auth::logout();

        // hapus data sesi user (session id di database berubah) agar sesi lama tidak dapat diakses
        $request->session()->invalidate();

        // regenerate token sesi untuk mencegah CSRF (di request_cookies)
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
