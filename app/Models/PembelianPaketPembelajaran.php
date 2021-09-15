<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianPaketPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pembelian_paket_pembelajaran';
    protected $fillable = ['peserta_didik_id', 'paket_pembelajaran_id'];

    public function pesertaDidik()
    {
        return $this->belongsTo(User::class, 'peserta_didik_id');
    }

    public function paketPembelajaran()
    {
        return $this->belongsTo(PaketPembelajaran::class);
    }

    public function pesertaDidikHasPaketPembelajaran()
    {
        return $this->hasOne(PesertaDidikHasPaketPembelajaran::class);
    }
}
