<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function register(){
        $user = request()->session()->get('user');
        if(!$user){
            return view('pages.frontend.auth.register');
        }
        return redirect()->route('dashboard');
    }

    public function store(UserRegisterRequest $req){   
        $data = $req->validated();
        $user = $this->userRepo->register($data);
        $req->session()->put('user', $user);
        session()->save();
        return redirect()->route('dashboard');
    }   

    public function login(){
        return view('pages.frontend.auth.login');
    }

    public function loginLogic(LoginRequest $req){
        $data = $req->validated();
        $user = $this->userRepo->login($data);
        $req->session()->put('user', $user);
        session()->save();
        return redirect()->route('dashboard');
    }
}
