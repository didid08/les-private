<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikHasPaketPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pendidik_has_paket_pembelajaran';
    protected $fillable = ['pendidik_id', 'paket_pembelajaran_id'];

    public function pendidik()
    {
        return $this->belongsTo(User::class);
    }

    public function paketPembelajaran()
    {
        return $this->belongsTo(PaketPembelajaran::class);
    }
}
