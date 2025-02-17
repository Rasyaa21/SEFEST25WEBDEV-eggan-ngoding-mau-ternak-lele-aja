<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserRepository implements UserRepositoryInterface{
    public function register($req)
    {
        $user = User::create([
            "name" => $req['name'],
            "email" => $req['email'],
            "password" => bcrypt($req['password'])
        ]);
        return $user;
    }

    public function login($req)
    {
        $user = User::where('email', $req['email'])->first();
        if($user){
            if(Hash::check($req['password'], $user->password)){    
                return $user;
            }
        }
        return false;
    }

    public function update($req)
    {
        // $user = User::find(request()->session()->get('user'));
    }

    public function logout()
    {
        
    }

    public function showDetail()
    {
        
    }
}