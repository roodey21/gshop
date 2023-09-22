<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getTotalCartAttribute()
    {
        $total = 0;
        foreach ($this->carts as $cart) {
            $price = $cart->product->discount > 0 ? $cart->product->discount : $cart->product->pprice;
            $total += ($price* $cart->qty);
        }
        return number_format($total, 0, ',', ',');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getHaventGiveReviewAttribute()
    {
        $reviews = ProductReview::with(['transaction','product'])->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('is_displayed', 0)->count();
        return $reviews;
    }
}
