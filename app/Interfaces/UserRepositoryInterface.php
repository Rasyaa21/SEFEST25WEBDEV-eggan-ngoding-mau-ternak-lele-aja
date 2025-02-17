<?php 

namespace App\Interfaces;

interface UserRepositoryInterface{
    public function register($req);
    public function login($req);
    public function logout();
    public function update($req);
    public function showDetail();
}