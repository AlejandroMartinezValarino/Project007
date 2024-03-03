<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('usuario', 'password');

    if ($credentials['usuario'] === 'admin' && $credentials['password'] === '1234') {
        $request->session()->put('logged_in', true);

        return redirect()->route('menu');
    } else {
        return back()->withErrors([
            'login' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
}
}
