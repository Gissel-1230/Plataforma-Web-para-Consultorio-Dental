<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function welcome(Request $request)
    {
        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);



        //dd($request->get('username'));
        //Validación
        $validate = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|email|unique:users|email|max:60',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);


        // Autenticación de usuario 
        Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ]);

       
       





        //Redireccionar
        return redirect()->route('post.index');
    }
}
