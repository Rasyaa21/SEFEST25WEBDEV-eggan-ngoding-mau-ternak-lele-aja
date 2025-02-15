<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    
    public function index(){
        $user = request()->session()->get('user');
        return view('pages.admin.index', compact('user'));
    }


    public function hasilPantau(){
        if (!session()->has('pond_data') || !session()->has('pond_result')) {
            return redirect()->route('pantau.kolam');
        }
    
        return view('pages.admin.hasil-pantau', compact('data', 'res'));
    }
}
