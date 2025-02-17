<?php

namespace App\Http\Controllers;

use App\Models\MarketplaceTransaction;
use Illuminate\Http\Request;
use App\Models\Pond;
use App\Models\TransactionDetail;

class DashboardController extends Controller
{   
    public function index(){
        $user = request()->session()->get('user');
        $ponds = Pond::where("user_id", $user->id)->get();
        $transactions = TransactionDetail::where('user_id', $user->id)->get();
        return view('pages.admin.index', compact('user', 'ponds', 'transactions'));
    }

    public function transactionHistory(){
        $user = request()->session()->get('user');
        $transactions = TransactionDetail::where('user_id', $user->id)->get();
        return view('pages.admin.transaction-hist', compact('user', 'transactions'));
    }
}
