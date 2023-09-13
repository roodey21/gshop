<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(USer::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getFormattedTotalAttribute()
    {
        return 'Rp. '.number_format($this->product->price * $this->qty, 0, ',', ',');
    }
}
