<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'additional_info'];

    protected $casts = [
        'status' => 'integer'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getStatusNameAttribute()
    {
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
        ];
    }

    public function getCreatedAtIndonesiaAttribute()
    {
        $createdAt = Carbon::parse($this->created_at);
        $indonesiaTime = $createdAt->setTimezone('Asia/Jakarta');
        return $indonesiaTime->format('d-M-Y, H:i');
    }

}
