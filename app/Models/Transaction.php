<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getSubTotalAttribute()
    {
        $total = 0;
        foreach ($this->transactionDetails as $detail) {
            $total += ($detail->price * $detail->qty);
        }
        return number_format($total, 0, ',', ',');
    }

    public function getTotalPriceAttribute()
    {
        $total = 0;
        foreach ($this->transactionDetails as $detail) {
            $total += ($detail->price * $detail->qty );
        }

        $totalPrice = $total + $this->delivery_cost;
        return number_format($totalPrice, 0, ',', ',');
    }
}
