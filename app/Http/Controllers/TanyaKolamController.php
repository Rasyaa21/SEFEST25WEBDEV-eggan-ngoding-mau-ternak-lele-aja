<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TanyaKolamController extends Controller
{
    public function index(){
        return view('pages.section.tanyaKolam');
    }
}
