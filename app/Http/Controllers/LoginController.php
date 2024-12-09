<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function welcome(Request $request)
    {
        // Validación
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intento de autenticación
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        // Redireccionar al dashboard si las credenciales son correctas
        return redirect()->route('post.index');
    }
}
