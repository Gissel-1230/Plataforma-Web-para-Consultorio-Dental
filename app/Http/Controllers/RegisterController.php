<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function welcome(Request $request)
    {
        //dd($request->get('username'));
        //Validación
        $validate=$request->validate([
            'name'=>'required|min:3',
            'username'=>'required|unique:users|min:3|max:30',
            'email'=>'required|email|unique:users|email|max:60',
            'password'=> 'required|confirmed'
        ]);

    dd('Creando Usuario');

        
    }
}
