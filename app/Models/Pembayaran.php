<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paketPembelajaran()
    {
        return $this->belongsTo(PaketPembelajaran::class);
    }

    public function pembayaranSelesai()
    {
        return $this->hasOne(PembayaranSelesai::class);
    }
}
