<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikHasPaketPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'peserta_didik_has_paket_pembelajaran';
    protected $fillable = ['peserta_didik_id', 'paket_pembelajaran_id', 'pembelian_paket_pembelajaran_id'];

    public function pesertaDidik()
    {
        return $this->belongsTo(User::class);
    }

    public function paketPembelajaran()
    {
        return $this->belongsTo(PaketPembelajaran::class);
    }

    public function pembelianPaketPembelajaran()
    {
        return $this->belongsTo(PembelianPaketPembelajaran::class);
    }

    public function pesertaDidikHasJadwal()
    {
        return $this->hasOne(PesertaDidikHasJadwal::class);
    }
}
