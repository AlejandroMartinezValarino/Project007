<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'usuario' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('usuario', 'password');

    if ($credentials['usuario'] === 'admin' && $credentials['password'] === '1234') {
        $request->session()->put('logged_in', true);

        return redirect()->route('menu');
    } else {
        return back()->withErrors([
            'login' => 'Usuario o contraseña incorrectos.',
        ]);
    }
}

    public function logout(Request $request)
    {
        $request->session()->put('logged_in',false);

        return redirect()->route('showLogin');
    }
}
