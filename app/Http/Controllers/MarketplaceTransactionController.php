<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceTransactionController extends Controller
{
    public function index() {
        return view('pages.section.marketPlace');
    }
}
