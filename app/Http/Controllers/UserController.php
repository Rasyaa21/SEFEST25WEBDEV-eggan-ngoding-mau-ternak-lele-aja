<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('pages.frontend.auth.register');
    }

    public function login(){
        return view('pages.frontend.auth.login');
    }
}
