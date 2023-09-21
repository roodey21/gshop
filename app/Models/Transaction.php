<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Transaction extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function histories ()
    {
        return $this->hasMany(TransactionHistory::class);
    }

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

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'payment_method');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
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

    public function getStatusNameAttribute()
    {
        $color = match ($this->status) {
            0 => 'blue',
            1 => 'azure',
            2 => 'yellow',
            3 => 'green',
            4 => 'green',
            default => 'red'
        };

        $color_bs4 = match ($this->status) {
            0 => 'secondary',
            1 => 'warning',
            2 => 'info',
            3 => 'success',
            4 => 'success',
            default => 'danger'
        };

        $text = match ($this->status) {
            0 => 'Menunggu Pembayaran',
            1 => 'Menunggu Konfirmasi',
            2 => 'Pesanan Diproses',
            3 => 'Pesanan Dikirim',
            4 => 'Pesanan Selesai',
            default => 'Pesanan Dibatalkan'
        };
        return [
            'text' => $text,
            'color' => $color,
            'color_bs4' => $color_bs4
        ];
    }

    public function getInvoiceAttribute()
    {
        return 'INV/' . $this->code;
    }

    public function getPaymentProofAttribute()
    {
        return $this->getFirstMediaUrl('proof') ?: null;
    }
}
