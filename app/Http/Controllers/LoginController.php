<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah user adalah assessor
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     // Jika login berhasil dan user adalah assessor
        //     if (Auth::user()->assessor) {
        //         return redirect()->route('assessor.dashboard');  // Redirect ke halaman Assessor
        //     } else {
        //         Auth::logout();
        //         return back()->withErrors(['error' => 'Anda tidak memiliki akses sebagai Assessor.']);
        //    }


        // retry() back()->withErrors(['error' => 'Email atau password salah']);
    }

    public function logout()
    {
        // Auth::logout();
        return redirect()->route('login');
    }
}
