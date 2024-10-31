<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // sleep(1);

        // dd($request);

        $fields = $request->validate([
            'avatar' => ['file', 'nullable', 'max:100'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required', 'confirmed']
        ]);
        // dd($request);
        if($request->hasFile('avatar')){
            $fields['avatar'] = Storage::disk('public')->put('avatar', $request->avatar);
        }

        $user = User::create($fields);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
