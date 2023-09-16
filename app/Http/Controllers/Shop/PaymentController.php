<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index($id)
    {
        $transaction = Transaction::with('transactionDetails')->find($id);
        return view('shop.payment', compact('transaction'));
    }
}
