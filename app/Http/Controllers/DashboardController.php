<?php
namespace App\Http\Controllers;

use App\Models\Pond;
use App\Models\PremiumContent;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = request()->session()->get('user');
        $ponds = Pond::where("user_id", $user->id)->get();
        $transactions = TransactionDetail::where('user_id', $user->id)->get();
        return view('pages.admin.index', compact('user', 'ponds', 'transactions'));
    }
    
    public function academy()
    {
        $user   = request()->session()->get('user');
        $ponds  = Pond::where("user_id", $user->id)->get();
        $videos = PremiumContent::all();
        return view('pages.admin.academy', compact('user', 'videos'));
    }

    public function academyview ($id)
    {
        $videos = PremiumContent::where('id', $id)->first();
        return view('pages.admin.academy-view', compact('videos'));
    }

    public function transactionHistory(){
        $user = request()->session()->get('user');
        $transactions = TransactionDetail::where('user_id', $user->id)->get();
        return view('pages.admin.transaction-hist', compact('user', 'transactions'));
    }
}
