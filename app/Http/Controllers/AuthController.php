<?php

namespace App\Http\Controllers;

use App\Mail\NewUserEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {

        // 1. validacija korisnika
        // 2. kreiranje korisnika
        // 3. vracanje na dashboard (redirect) sa porukom

        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:100',
                'username' => 'required|min:3|max:100|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
            ]
        );


        $user = User::create(
            [
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]
        );

        // slanje emaila
        Mail::to($user->email)->send(new NewUserEmail($user));

        return redirect()->route('dashboard')->with('success', "Uspjesno ste se registrovali.");
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate() {

        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if(auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', "Uspjesno ste se logovali.");
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Pogresan email ili password.'
        ]);
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', "Uspjesno ste se izlogovali.");
    }
}
