<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademyTransactionController extends Controller
{
    public function index() {
        return view('pages.frontend.academy.index');
    }
}
