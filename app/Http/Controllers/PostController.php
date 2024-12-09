<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;



class PostController extends Controller
{
    //
    protected $routeMiddleware = [
        
        'auth' => Authenticate::class,
    ];
    
    public function index(){
        
        return view ('dashboard');
        
    }
}

