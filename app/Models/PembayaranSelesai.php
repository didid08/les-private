<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSelesai extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_selesai';

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }
}
