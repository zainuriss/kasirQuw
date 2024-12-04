<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah email terdaftar
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email belum terdaftar.')->withInput();
        }

        // Cek apakah password benar
        if (!Hash::check($credentials['password'], $user->password)) {
            return redirect()->back()->with('error', 'Password salah.')->withInput();
        }

        // Lakukan login jika valid
        Auth::login($user);

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // Redirect berdasarkan usertype
        if ($user->usertype === 'petugas') {
            return redirect('dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->intended(route('admin.dashboard'))->with('success', 'Login berhasil!');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
