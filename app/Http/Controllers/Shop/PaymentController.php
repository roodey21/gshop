<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function index(Transaction $transaction)
    {
        $banks = Bank::isActive()->get();
        return view('shop.payment', compact('transaction', 'banks'));
    }

    public function uploadProof(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id != auth()->id()) {
            abort(403);
        }
        $validated = $request->validate([
            'payment_method' => 'required|exists:banks,id',
            'proof' => 'required|image|max:2048'
        ]);

        DB::transaction(function () use ($validated, $transaction) {
            $transaction->update([
                'status' => 1,
                'payment_method' => $validated['payment_method']
            ]);
            $transaction->histories()->create([
                'status' => 1,
            ]);
            $transaction->addMedia($validated['proof'])
                ->toMediaCollection('proof');
        });

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload, silahkan tunggu konfirmasi dari admin');
    }
}
