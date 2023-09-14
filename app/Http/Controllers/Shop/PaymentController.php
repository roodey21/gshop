<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index($id)
    {
        // $carts = Cart::all();
        $carts = auth()->user()->carts;
        $transaction = Transaction::find($id);
        $transactions = TransactionDetail::get();
        $couriers = Courier::all();
        return view('shop.payment', compact('carts', 'transaction', 'transactions', 'couriers'));
    }
}
