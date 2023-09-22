<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
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
        $reviews = ProductReview::with(['transaction','product'])->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('is_displayed', 0)->latest()->paginate(10);

        $lastReviews = ProductReview::with(['transaction','product'])->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('is_displayed', 1)->latest()->paginate(10);

        return view('user.review', compact('reviews','lastReviews'));
    }

    public function reviewUpdate(Request $request, ProductReview $review)
    {
        $validated = $request->validate([
            'rating' => 'required|min:1|max:5|numeric',
            'review' => 'nullable'
        ]);
        $validated['is_displayed'] = 1;

        $review->update($validated);

        return redirect()->back()->with('success', 'Review berhasil dikirim!');
    }

}
