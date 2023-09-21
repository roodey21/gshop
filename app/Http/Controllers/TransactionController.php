<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'transactionDetails'])->latest()->paginate(10);
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $histories = $transaction->histories()->latest()->get();
        return view('admin.transaction.show', compact('transaction', 'histories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateConfirm(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'confirm' => 'required|in:PENDING,SUCCESS,FAILED',
        ]);

        if ($validated['confirm'] == 'SUCCESS') {
            $status = 2;
        } else if ($validated['confirm'] == 'FAILED') {
            $status = 5;
        }
        $transaction->update([
            'status' => $status,
        ]);
        $transaction->histories()->create([
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Status transaksi telah berhasil diupdate!');
    }

    public function updateResi(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'resi' => 'required|string|max:255',
        ]);

        $transaction->update([
            'resi' => $validated['resi'],
            'status' => 3,
        ]);

        $transaction->histories()->create([
            'status' => 3,
            'additional_info' => $validated['resi'],
        ]);

        return redirect()->back()->with('success', 'Resi transaksi telah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function finishOrder(Transaction $transaction)
    {
        $transaction->update([
            'status' => 4
        ]);

        $transaction->histories()->create([
            'status' => $transaction->status,
        ]);

        return redirect()->back()->with('success', 'Pesanan telah berhasil dikonfirmasi');
    }
}
