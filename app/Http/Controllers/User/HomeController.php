<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.dashboard', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $histories = $transaction->histories()->latest()->get();
        return view('user.transaction.show', compact('transaction', 'histories'));
    }

    public function account()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.account', compact('transactions'));
    }

    public function review()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.review', compact('transactions'));
    }

}
