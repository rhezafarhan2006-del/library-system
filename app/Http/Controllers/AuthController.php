<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib di-import agar Auth::attempt dan Auth::logout dikenali

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    // Tambahkan flash message sukses login di sini
    return redirect()->intended(route('books.index'))
        ->with('success', 'Berhasil login! Selamat datang kembali.');
}

        return back()
            ->withErrors([
                'email' => 'Email atau Password tidak sesuai',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request){ // Menambahkan parameter Request $request
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}